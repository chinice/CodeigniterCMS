<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'models/Entities/Users.php';

/**
 * Created by PhpStorm.
 * User: Chinedu
 * Date: 17/07/2017
 * Time: 10:28 PM
 */
class User extends CI_Controller
{
    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if(!is_validated()){
            redirect(BASEURL);
        }
        $this->load->model('user_m');
        $this->load->model('department_m');
        $this->load->library('user_agent');
        $this->load->library('upload');
        $this->load->library('form_validation');
        date_default_timezone_set("Africa/Lagos");
    }

    /**
     * Index function
     */
    public function index()
    {
        $data = array(
            'data' => array(
                'title' => 'Users',
                'page_title' => 'Users',
                'users' => $this->user_m->getAllUsers(),
                'departments' => $this->department_m->getAllDepartments()
            ),
            'content' => 'user/users',
            'pageFooter' => 'user/footer'
        );
        $this->load->view('template', $data);
    }

    /**
     * Function to add a user to the database
     */
    public function add()
    {
        $first_name = $this->security->xss_clean($this->input->post('firstname'));
        $last_name = $this->security->xss_clean($this->input->post('lastname'));
        $username = $this->security->xss_clean($this->input->post('username'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $position = $this->security->xss_clean($this->input->post('position'));
        $department = $this->security->xss_clean($this->input->post('department'));
        $personalInfo = $this->security->xss_clean($this->input->post('personal_info'));
        $images = $this->security->xss_clean($this->input->post('image'));
        $new_file = "";

        if($this->input->is_ajax_request()) {
            //upload the file
            if (isset($images)) {
                $filename = $_FILES['image']['name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $new_file = md5($filename) . '.' . $ext;

                $config = array(
                    'upload_path' => UPLOAD_IMAGE_URL,
                    'allowed_types' => 'jpeg|jpg|png',
                    'max_size' => '2048000',
                );
                $config['file_name'] = $new_file;
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('image')) {
                    $data['status'] = false;
                    $data['message'] = $this->upload->display_errors();
                    echo json_encode($data);
                    exit();
                }
            }
            //get the file name
            $user = new Users();
            $user->setUsername($username);
            $user->setPassword(sha1('password'));
            $user->setProfileImage($new_file);
            $user->setFirstname($first_name);
            $user->setLastname($last_name);
            $user->setEmail($email);
            $user->setPosition($position);
            $user->setDepartment($department);
            $user->setPersonalinfo($personalInfo);
            $user->setStatus(1);

            $check = $this->user_m->addUser($user);

            if ($check) {
                $data['status'] = true;
                $data['message'] = "User was successfully created";
                echo json_encode($data);
                exit();
            }
            $data['status'] = false;
            $data['message'] = $check;
            echo json_encode($data);
            exit();
        }else{
            redirect($this->agent->referrer());
        }
    }

    /**
     * Function to delete a user from the system
     */
    public function delete()
    {
        $id = base64_decode($this->security->xss_clean($this->input->get('id')));
        if($this->input->is_ajax_request()) {
            //find user to delete profile image if any
            $user = $this->user_m->findUser($id);
            $profile_pix = $user->getProfileImage();
            if(isset($profile_pix)){
                $file = UPLOAD_IMAGE_URL.$profile_pix;
                unlink($file);
            }
            $result = $this->user_m->deleteUser($id);

            if($result == true){
                $data['status'] = true;
                $data['message'] = 'User was successfully deleted';
                echo json_encode($data);
                exit();
            }else{
                $data['status'] = false;
                $data['message'] = 'Unable to delete user';
                echo json_encode($data);
                exit();
            }
        }else{
            redirect($this->agent->referrer());
        }
    }

    /**
     * Function to change the status of a user
     */
    public function status()
    {
        $id = base64_decode($this->security->xss_clean($this->input->get('id')));

        if($this->input->is_ajax_request()){
            $user = $this->user_m->findUser($id);
            if($user){
                if($user->getStatus() == 1){
                    //change status to 0
                    $user->setStatus(0);
                    $update = $this->user_m->updateUser($user);
                }else{
                    //change status to 1
                    $user->setStatus(1);
                    $update = $this->user_m->updateUser($user);
                }
                if($update){
                    //form and return data
                    $status = true;
                }else{
                    $status = false;
                }
                echo json_encode($status);
                exit();
            }
        }else{
            redirect($this->agent->referrer());
        }
    }
}