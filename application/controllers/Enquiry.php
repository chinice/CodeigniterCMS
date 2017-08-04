<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Chinedu
 * Date: 02/08/2017
 * Time: 11:26 AM
 */
class Enquiry extends CI_Controller
{
    /**
     * Enquiry constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if(!is_validated()){
            redirect(BASEURL);
        }
        $this->load->model('enquiry_m');
        $this->load->library('user_agent');
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->library('email');
        date_default_timezone_set("Africa/Lagos");
    }

    /**
     * Function to display the index page
     */
    public function index()
    {
        $data = array(
            'data' => array(
                'title' => 'Enquiry',
                'page_title' => 'Enquiries',
                'enquiries' => $this->enquiry_m->getAllEnquiry()
            ),
            'content' => 'enquiry/index',
            'pageFooter' => 'enquiry/footer'
        );
        $this->load->view('template', $data);
    }

    /**
     * Function to change the status of a dept
     */
    public function changeStatus()
    {
        $id = base64_decode($this->security->xss_clean($this->input->get('id')));
        if($this->input->is_ajax_request()){
            $enquiry = $this->enquiry_m->getEnquiryById($id);
            if($enquiry){
                if($enquiry->getStatus() == 1){
                    //change status to 0
                    $enquiry->setStatus(0);
                    $update = $this->enquiry_m->update($enquiry);
                }else{
                    //change status to 1
                    $enquiry->setStatus(1);
                    $update = $this->enquiry_m->update($enquiry);
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
     * Function to delete an enquiry
     */
    public function delete()
    {
        $id = base64_decode($this->security->xss_clean($this->input->get('id')));
        if($this->input->is_ajax_request()){
            $result = $this->enquiry_m->delete($id);
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
     * Function to reply an enquiry by sending an email
     */
    public function reply()
    {
        if($this->input->is_ajax_request()) {
            //send email to the user
            $from = $this->security->xss_clean($this->input->post('from'));
            $subject = $this->security->xss_clean($this->input->post('subject'));
            $message = $this->security->xss_clean($this->input->post('message'));

            $id = base64_decode($this->security->xss_clean($this->input->post('id')));
            $enquiry = $this->enquiry_m->getEnquiryById($id);
            //to email address
            $to = $enquiry->getEmail();

            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'abc@gmail.com',
                'smtp_pass' => 'passwrd',
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);
            if ($this->email->send()) {
                $check = true;
                echo json_encode($check);
            }
            $check = false;
            echo json_encode($check);
        }else{
            redirect($this->agent->referrer());
        }
    }

}