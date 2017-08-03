<?php  defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'models/Entities/Users.php';

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
		$this->load->library('user_agent');
		$this->load->library('form_validation');
		date_default_timezone_set("Africa/Lagos");
	}

	/**
	 * Index Page for this controller.
	 *
	 */
	public function index()
	{
		$data['title'] = "Welcome";
		$this->load->view('welcome_message', $data);
	}

	/**
	 * Function to load the password recovery page
	 */
	public function recovery()
	{
		$data['title'] = "Password Recovery";
		$this->load->view('password_recover', $data);
	}

	/**
	 * Function to log into the system
	 * @return string
	 */
	public function login()
	{
		$username 	= 	$this->security->xss_clean($this->input->post("username",TRUE));
		$password 	= 	$this->security->xss_clean($this->input->post("password",TRUE));

		if($this->input->is_ajax_request()){
			$user = $this->user_m->login($username, sha1($password));

			if($user){
				$data = array(
					'id'         =>  $user->getId(),
					'username'   =>  $user->getUsername(),
					'firstname'  =>  $user->getFirstname(),
					'lastname'   =>  $user->getLastname(),
					'email'		 =>  $user->getEmail(),
					'position'   =>  $user->getPosition(),
					'department' =>  $user->getDepartment(),
					'profile'	 =>	 $user->getProfileImage(),
					'validated'  =>  true
				);

				$this->session->set_userdata($data);
				$data['status'] = true;
				$data['redirect'] = BASEURL.'dashboard';
			}else{
				$data['status'] = false;
				$data['message'] = "Invalid username/ password";
			}

			echo json_encode($data);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(BASEURL);
	}
}
