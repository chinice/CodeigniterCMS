<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'models/Entities/Department.php';
/**
 * Created by PhpStorm.
 * User: Chinedu
 * Date: 15/07/2017
 * Time: 3:58 PM
 */
class Department_m extends CI_Model
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
     * Function to get all departments
     * @return string
     */
    public function getAllDepartments()
    {
        try{
            $departments = $this->em->getRepository('Department')->findAll();
            return $departments;
        }catch(Exception $ex){
            return $ex->getMessage();
        }
    }

    /**
     * Function to get department by id
     * @param $id
     * @return bool
     */
    public function getDepartmentById($id)
    {
        try{
            $department = $this->em->getRepository('Department')->find($id);
            return $department;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to update department
     * @param $dept
     * @return bool
     */
    public function updateDept($dept)
    {
        try{
            $this->em->merge($dept);
            $this->em->flush();
            return false;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to add a department
     * @param $dept
     * @return bool
     */
    public function addDept($dept)
    {
        try{
            $this->em->persist($dept);
            $this->em->flush();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to delete a department
     * @param $id
     * @return bool
     */
    public function deleteDept($id)
    {
        try{
            $dept = $this->em->getRepository('Department')->find($id);
            $this->em->remove($dept);
            $this->em->flush();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }
}