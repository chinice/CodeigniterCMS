<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'models/Entities/Inquiry.php';
/**
 * Created by PhpStorm.
 * User: Chinedu
 * Date: 02/08/2017
 * Time: 11:28 AM
 */
class Enquiry_m extends CI_Model
{
    /**
     * @var
     */
    var $em;

    /**
     * Department_m constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->em = $this->doctrine->em;
    }

    /**
     * Function to get all enquiries
     * @return bool
     */
    public function getAllEnquiry()
    {
        try{
            $enquiry = $this->em->getRepository('Inquiry')->findAll();
            return $enquiry;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to get enquiry by id
     * @param $id
     * @return bool
     */
    public function getEnquiryById($id)
    {
        try{
            $content = $this->em->getRepository('Inquiry')->find($id);
            return $content;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to update a status
     * @param $enquiry
     * @return bool
     */
    public function update($enquiry)
    {
        try{
            $this->em->merge($enquiry);
            $this->em->flush();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to delete an enquiry
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        try{
            $enquiry = $this->getEnquiryById($id);
            $this->em->remove($enquiry);
            $this->em->flush();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }
}