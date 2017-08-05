<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AboutUs extends CI_Controller
{
    /**
     * AboutUs constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if(!is_validated()){
            redirect(BASEURL);
        }
        $this->load->model('about_m');
        $this->load->model('content_m');
        $this->load->library('user_agent');
        date_default_timezone_set("Africa/Lagos");
    }

    /**
     *Function to load the index page
     */
    public function index()
    {
        $data = array(
            'data' => array(
                'title' => 'About us',
                'page_title' => 'About Us',
                'abouts' => $this->about_m->getAllAbout(),
                'contents' => $this->content_m->getAllContents()
            ),
            'content' => 'about/index',
            'pageFooter' => 'about/footer'
        );
        $this->load->view('template', $data);
    }

    /**
     * Function to add a new record
     */
    public function add()
    {
        //get all posted data
        $content = $this->security->xss_clean($this->input->post('content'));
        $title = $this->security->xss_clean($this->input->post('title'));
        $description = $this->security->xss_clean($this->input->post('description'));
        $id = $this->security->xss_clean($this->input->post('id'));

        if($this->input->is_ajax_request()){

            /**
             * If ID is set, update the data
             */
            if($id != ""){
                $about = $this->about_m->getAboutById(base64_decode($id));
                $about->setContentid($content);
                $about->setTitle($title);
                $about->setDescription($description);
                $result = $this->about_m->updateAbout($about);
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
            $about = new About();
            $about->setContentid($content);
            $about->setTitle($title);
            $about->setDescription($description);
            $about->setStatus(1);
            $result = $this->about_m->addAbout($about);
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
     * Function to get data by id
     */
    public function get_data()
    {
        //get content id
        $id = base64_decode($this->security->xss_clean($this->input->get('id')));
        //check if it is an ajax request
        if($this->input->is_ajax_request()){
            $about = $this->about_m->getAboutById($id);
            $data = [
                'content' => $about->getContentid(),
                'title' => $about->getTitle(),
                'description' => $about->getDescription()
            ];
            echo json_encode($data);
        }else{
            redirect($this->agent->referrer());
        }
    }

    /**
     * Function to delete a record
     */
    public function delete()
    {
        $id = base64_decode($this->security->xss_clean($this->input->get('id')));
        if($this->input->is_ajax_request()){
            $result = $this->about_m->delete($id);
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
     * Function to change status
     */
    public function changeStatus()
    {
        $id = base64_decode($this->security->xss_clean($this->input->get('id')));
        if($this->input->is_ajax_request()){
            $about = $this->about_m->getAboutById($id);
            if($about){
                if($about->getStatus() == 1){
                    //change status to 0
                    $about->setStatus(0);
                    $update = $this->about_m->updateAbout($about);
                }else{
                    //change status to 1
                    $about->setStatus(1);
                    $update = $this->about_m->updateAbout($about);
                }
                if($update){
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