<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'models/Entities/Services.php';

/**
 * Created by PhpStorm.
 * User: Chinedu
 * Date: 17/07/2017
 * Time: 10:28 PM
 */
class Service extends CI_Controller
{
    /**
     * Service constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if(!is_validated()){
            redirect(BASEURL);
        }
        $this->load->model('service_m');
        $this->load->library('user_agent');
        $this->load->library('upload');
        date_default_timezone_set("Africa/Lagos");
    }

    /**
     * Index function to display the services page
     */
    public function index()
    {
        $data = array(
            'data' => array(
                'title' => 'Services',
                'page_title' => 'Services',
                'services' => $this->service_m->getAllServices()
            ),
            'content' => 'services/index',
            'pageFooter' => 'services/footer'
        );
        $this->load->view('template', $data);
    }

    /**
     * Function to add a status
     */
    public function add()
    {
        $title = $this->security->xss_clean($this->input->post('title'));
        $description = $this->security->xss_clean($this->input->post('description'));
        $image = $this->security->xss_clean($this->input->post('image'));
        $status = $this->security->xss_clean($this->input->post('status'));
        $new_file = "";

        if($this->input->is_ajax_request()) {
            if(isset($image)){
                $filename = $_FILES['image']['name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $new_file = md5($filename) . '.' . $ext;
                $config = array(
                    'upload_path' => SERVICE_IMAGE_URL,
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

            $service = new Services();
            $service->setTitle($title);
            $service->setImage($new_file);
            $service->setDescription($description);
            $service->setStatus($status);
            $addService = $this->service_m->addService($service);

            if($addService){
                $check = true;
                echo json_encode($check);
                exit();
            }

            $check = false;
            echo json_encode($check);
            exit();
        }else{
            redirect($this->agent->referrer());
        }
    }

    /**
     * Function to change the status of a service
     */
    public function status()
    {
        $id = base64_decode($this->security->xss_clean($this->input->get('id')));
        if($this->input->is_ajax_request()){
            $service = $this->service_m->getServiceById($id);
            if($service){
                if($service->getStatus() == 1){
                    //change status to 0
                    $service->setStatus(0);
                    $update = $this->service_m->updateService($service);
                }else{
                    //change status to 1
                    $service->setStatus(1);
                    $update = $this->service_m->updateService($service);
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

    /**
     * Function to delete a service from the database
     */
    public function delete()
    {
        $id = base64_decode($this->security->xss_clean($this->input->get('id')));
        if($this->input->is_ajax_request()){
            $service = $this->service_m->getServiceById($id);
            $image = $service->getImage();
            if(isset($image)){
                $file = SERVICE_IMAGE_URL.$image;
                unlink($file);
            }

            $result = $this->service_m->delete($id);
            if($result){
                $check = true;
                echo json_encode($check);
                exit();
            }

            $check = false;
            echo json_encode($check);
            exit();
        }else{
            redirect($this->agent->referrer());
        }
    }
}