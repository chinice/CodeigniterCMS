<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'models/Entities/Home.php';
/**
 * Created by PhpStorm.
 * User: Chinedu
 * Date: 26/07/2017
 * Time: 5:43 PM
 */
class Home_m extends CI_Model {
    /**
     * @var
     */
    var $em;

    /**
     * Login_m constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->em = $this->doctrine->em;
    }

    /**
     * Function to add a new home page image/ details
     * @param $home
     * @return bool
     */
    public function addHome($home)
    {
        try{
            $this->em->persist($home);
            $this->em->flush();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to get all home slider images
     * @return bool
     */
    public function getAllHome()
    {
        try{
            $homes = $this->em->getRepository('Home')->findAll();
            return $homes;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to get home image by id
     * @param $id
     * @return bool
     */
    public function getHomeById($id)
    {
        try{
            $home = $this->em->getRepository('Home')->find($id);
            return $home;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to update a home image
     * @param $home
     * @return bool
     */
    public function updateHome($home)
    {
        try{
            $this->em->merge($home);
            $this->em->flush();
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to delete a home image
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        try{
            $home = $this->em->getRepository('Home')->find($id);
            $this->em->remove($home);
            $this->em->flush();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }
}