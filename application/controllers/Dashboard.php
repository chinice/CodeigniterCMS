<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Chinedu
 * Date: 17/07/2017
 * Time: 4:53 PM
 */
class Dashboard extends CI_Controller
{
    /**
     * Dashboard constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if(!is_validated()){
            redirect(BASEURL);
        }
    }

    /**
     * Index function
     */
    public function index()
    {
        $data = array(
            'content' => 'dashboard/dashboard',
            'pageFooter' => 'dashboard/dashboard_footer',
            'data' => array(
                'title' => 'Dashboard',
                'page_title' => 'Dashboard'
            )
        );
        $this->load->view('template', $data);
    }
}