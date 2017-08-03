<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'models/Entities/Services.php';
/**
 * Created by PhpStorm.
 * User: Chinedu
 * Date: 15/07/2017
 * Time: 3:58 PM
 */
class Service_m extends CI_Model
{
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
     * Function to add services
     * @param $service
     * @return bool
     */
    public function addService($service)
    {
        try{
            $this->em->persist($service);
            $this->em->flush();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to get service by id
     * @param $id
     * @return bool
     */
    public function getServiceById($id)
    {
        try{
            $service = $this->em->getRepository('Services')->find($id);
            return $service;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to get all services
     * @return bool
     */
    public function getAllServices()
    {
        try{
            $services = $this->em->getRepository('Services')->findAll();
            return $services;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to update services
     * @param $service
     * @return bool
     */
    public function updateService($service)
    {
        try{
            $this->em->merge($service);
            $this->em->flush();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to delete a service
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        try{
            $service = $this->em->getRepository('Services')->find($id);
            $this->em->remove($service);
            $this->em->flush();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }
}