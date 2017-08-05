<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'models/Entities/About.php';

/**
 * Created by PhpStorm.
 * User: Chinedu
 * Date: 20/07/2017
 * Time: 3:11 PM
 */
class About_m extends CI_Model
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
     * Function to get all about us contents
     * @return bool
     */
    public function getAllAbout()
    {
        try{
            $abouts = $this->em->getRepository('About')->findAll();
            return $abouts;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to get about us detail by id
     * @param $id
     * @return bool
     */
    public function getAboutById($id)
    {
        try{
            $about = $this->em->getRepository('About')->find($id);
            return $about;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to update a record
     * @param $about
     * @return bool
     */
    public function updateAbout($about)
    {
        try{
            $this->em->merge($about);
            $this->em->flush();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to add about us
     * @param $about
     * @return bool
     */
    public function addAbout($about)
    {
        try{
            $this->em->persist($about);
            $this->em->flush();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to delete an about us record
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        try{
            $about = $this->em->getRepository('About')->find($id);
            $this->em->remove($about);
            $this->em->flush();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }
}