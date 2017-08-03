<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'models/Entities/Contact.php';

/**
 * Created by PhpStorm.
 * User: Chinedu
 * Date: 20/07/2017
 * Time: 3:11 PM
 */
class Contact_m extends CI_Model
{
    /**
     * @var
     */
    var $em;

    /**
     * Contact_m constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->em = $this->doctrine->em;
    }

    /**
     * Function to add contact
     * @param $contact
     * @return bool
     */
    public function addContact($contact)
    {
        try{
            $this->em->persist($contact);
            $this->em->flush();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to get all contact details
     * @return bool
     */
    public function getAllContact()
    {
        try{
            $contacts = $this->em->getRepository('Contact')->find(1);
            return $contacts;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to update contact details
     * @param $contact
     * @return bool
     */
    public function update($contact)
    {
        try{
            $this->em->merge($contact);
            $this->em->flush();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }
}