<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'models/Entities/Contact.php';
require_once APPPATH.'models/Entities/Home.php';
require_once APPPATH.'models/Entities/Content.php';
require_once APPPATH.'models/Entities/Department.php';
/**
 * Created by PhpStorm.
 * User: Chinedu
 * Date: 20/07/2017
 * Time: 3:09 PM
 */
class Setup extends CI_Controller
{
    /**
     * Setup constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if(!is_validated()){
            redirect(BASEURL);
        }
        $this->load->model('contact_m');
        $this->load->model('home_m');
        $this->load->model('content_m');
        $this->load->model('department_m');
        $this->load->library('user_agent');
        $this->load->library('upload');
        $this->load->library('form_validation');
        date_default_timezone_set("Africa/Lagos");
    }

    /**
     * Function to display the contact details page
     */
    public function contact_details()
    {
        $data = array(
            'data' => array(
                'title' => 'Setup - Contact Details',
                'page_title' => 'Setup / Contact Details',
                'contact' => $this->contact_m->getAllContact()
            ),
            'content' => 'setup/contact/index',
            'pageFooter' => 'setup/contact/footer'
        );
        $this->load->view('template', $data);
    }

    /***
     * Function to add or update contact details
     */
    public function add_contact()
    {
        //get all posted data
        $email = $this->security->xss_clean($this->input->post('email'));
        $phone = $this->security->xss_clean($this->input->post('phone'));
        $person = $this->security->xss_clean($this->input->post('contact_person'));
        $address = $this->security->xss_clean($this->input->post('address'));
        $website = $this->security->xss_clean($this->input->post('website'));
        $facebook = $this->security->xss_clean($this->input->post('facebook'));
        $twitter = $this->security->xss_clean($this->input->post('twitter'));
        $linkedin = $this->security->xss_clean($this->input->post('linkedin'));

        if($this->input->is_ajax_request()){
            $contact = $this->contact_m->getAllContact();
            if($contact){
                //edit entry
                $contact->setEmail($email);
                $contact->setPhone($phone);
                $contact->setContactperson($person);
                $contact->setAddress($address);
                $contact->setWebsite($website);
                $contact->setFacebook($facebook);
                $contact->setTwitter($twitter);
                $contact->setLinkedin($linkedin);

                $check = $this->contact_m->update($contact);
            }else{
                //create new entry
                $addContact = new Contact();
                $addContact->setEmail($email);
                $addContact->setPhone($phone);
                $addContact->setContactperson($person);
                $addContact->setAddress($address);
                $addContact->setWebsite($website);
                $addContact->setFacebook($facebook);
                $addContact->setTwitter($twitter);
                $addContact->setLinkedin($linkedin);

                $check = $this->contact_m->addContact($addContact);
            }

            if($check){
                $status = true;
                echo json_encode($status);
                exit();
            }

            $status = false;
            echo json_encode($status);
            exit();
        }else{
            redirect($this->agent->referrer());
        }
    }

    /**
     * Function to load the home image view
     */
    public function home()
    {
        $data = array(
            'data' => array(
                'title' => 'Setup - Home image',
                'page_title' => 'Setup / Homepage Image',
                'homes' => $this->home_m->getAllHome()
            ),
            'content' => 'setup/home/index',
            'pageFooter' => 'setup/home/footer'
        );
        $this->load->view('template', $data);
    }


    /**
     * Function to load the content view
     */
    public function content()
    {
        $data = array(
            'data' => array(
                'title' => 'Setup - Content',
                'page_title' => 'Setup / Content',
                'contents' => $this->content_m->getAllContents()
            ),
            'content' => 'setup/content/index',
            'pageFooter' => 'setup/content/footer'
        );

        $this->load->view('template', $data);
    }

    /**
     * Function to add a content to the database
     */
    public function add_content()
    {
        //get all posted data
        $name = $this->security->xss_clean($this->input->post('name'));
        $status = $this->security->xss_clean($this->input->post('status'));
        $description = $this->security->xss_clean($this->input->post('description'));
        $id = $this->security->xss_clean($this->input->post('id'));

        if($this->input->is_ajax_request()){

            /**
             * If ID is set, update the data
             */
            if($id != ""){
                $getContent = $this->content_m->getContentById(base64_decode($id));
                $getContent->setName($name);
                $getContent->setDescription($description);
                $getContent->setStatus($status);
                $result = $this->content_m->updateContent($getContent);
                if($result){
                    $check = true;
                }else{
                    $check = false;
                }
                echo json_encode($check);
                exit();
            }

            /**
             * Insert a new content if ID not set.
             */
            $content = new Content();
            $content->setName($name);
            $content->setDescription($description);
            $content->setStatus($status);
            $result = $this->content_m->addContent($content);
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

    /**
     * Function to delete a content
     */
    public function delete_content()
    {
        $id = base64_decode($this->security->xss_clean($this->input->get('id')));
        if($this->input->is_ajax_request()){
            $result = $this->content_m->deleteContent($id);
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

    /**
     * Function to change the status of a content
     */
    public function change_content_status()
    {
        $id = base64_decode($this->security->xss_clean($this->input->get('id')));
        if($this->input->is_ajax_request()){
            $content = $this->content_m->getContentById($id);
            if($content){
                if($content->getStatus() == 1){
                    //change status to 0
                    $content->setStatus(0);
                    $update = $this->content_m->updateContent($content);
                }else{
                    //change status to 1
                    $content->setStatus(1);
                    $update = $this->content_m->updateContent($content);
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
     * Function to get data to edit
     */
    public function get_data()
    {
        //get content id
        $id = base64_decode($this->security->xss_clean($this->input->get('id')));
        //check if it is an ajax request
        if($this->input->is_ajax_request()){
            $content = $this->content_m->getContentById($id);
            if($content->getStatus())
                $status = 1;
            else
                $status = 0;

            $data = [
                'name' => $content->getName(),
                'status' => $status,
                'description' => $content->getDescription()
            ];
            echo json_encode($data);
        }else{
            redirect($this->agent->referrer());
        }
    }


    /**
     * Function to load the department page
     */
    public function departments()
    {
        $data = array(
            'data' => array(
                'title' => 'Setup - Department',
                'page_title' => 'Setup / Departments',
                'departments' => $this->department_m->getAllDepartments()
            ),
            'content' => 'setup/department/index',
            'pageFooter' => 'setup/department/footer'
        );

        $this->load->view('template', $data);
    }

    /**
     * Function to add department
     */
    public function add_department()
    {
        //get all posted data
        $name = $this->security->xss_clean($this->input->post('name'));
        $status = $this->security->xss_clean($this->input->post('status'));
        $code = $this->security->xss_clean($this->input->post('code'));

        $id = $this->security->xss_clean($this->input->post('id'));

        if($this->input->is_ajax_request()){
            /**
             * If ID is set, update the data
             */
            if($id != ""){
                $getDept = $this->department_m->getDepartmentById(base64_decode($id));
                $getDept->setName($name);
                $getDept->setCode($code);
                $getDept->setStatus($status);
                $result = $this->department_m->updateDept($getDept);
                if($result){
                    $check = true;
                }else{
                    $check = false;
                }
                echo json_encode($check);
                exit();
            }

            /**
             * Insert a new content if ID not set.
             */
            $dept = new Department();
            $dept->setName($name);
            $dept->setCode($code);
            $dept->setStatus($status);
            $result = $this->department_m->addDept($dept);
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

    /**
     * Function to change the status of a dept
     */
    public function change_dept_status()
    {
        $id = base64_decode($this->security->xss_clean($this->input->get('id')));
        if($this->input->is_ajax_request()){
            $dept = $this->department_m->getDepartmentById($id);
            if($dept){
                if($dept->getStatus() == 1){
                    //change status to 0
                    $dept->setStatus(0);
                    $update = $this->department_m->updateDept($dept);
                }else{
                    //change status to 1
                    $dept->setStatus(1);
                    $update = $this->content_m->updateContent($dept);
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
     * Function to delete a department
     */
    public function delete_department()
    {
        $id = base64_decode($this->security->xss_clean($this->input->get('id')));
        if($this->input->is_ajax_request()){
            $result = $this->department_m->deleteDept($id);
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

    /**
     * Function to get department
     */
    public function get_dept()
    {
        //get content id
        $id = base64_decode($this->security->xss_clean($this->input->get('id')));
        //check if it is an ajax request
        if($this->input->is_ajax_request()){
            $dept = $this->department_m->getDepartmentById($id);
            if($dept->getStatus())
                $status = 1;
            else
                $status = 0;

            $data = [
                'name' => $dept->getName(),
                'status' => $status,
                'code' => $dept->getCode()
            ];
            echo json_encode($data);
        }else{
            redirect($this->agent->referrer());
        }
    }
}