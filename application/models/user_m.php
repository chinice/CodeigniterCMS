<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'models/Entities/Users.php';
/**
 * Created by PhpStorm.
 * User: Chinedu
 * Date: 15/07/2017
 * Time: 3:58 PM
 */
class User_m extends CI_Model
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
     * Functions to authenticate a user
     * @param $username
     * @param $password
     * @return string
     */
    public function login($username, $password)
    {
        try{
            $details = array(
                'username' => $username,
                'password' => $password,
                'status' => 1
            );
            $user = $this->em->getRepository('Users')->findOneBy($details);
            return $user;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to add a new user
     * @param $user
     * @return bool|string
     */
    public function addUser($user)
    {
        try{
            $this->em->persist($user);
            $this->em->flush();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to get user by Id
     * @param $id
     * @return bool
     */
    public function findUser($id)
    {
        try{
            $user = $this->em->getRepository('Users')->find($id);
            return $user;
        }catch(Exception $ex){
            return false;
        }
    }
    /**
     * Fucntion to get all users in the database
     * @return string
     */
    public function getAllUsers()
    {
        try{
            $users = $this->em->getRepository('Users')->findAll();
            return $users;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to delete a user from the database
     * @param $id
     * @return bool|string
     */
    public function deleteUser($id)
    {
        try{
            $user = $this->em->getRepository('Users')->find($id);
            $this->em->remove($user);
            $this->em->flush();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to update a user
     * @param $user
     * @return bool
     */
    public function updateUser($user)
    {
        try{
            $this->em->merge($user);
            $this->em->flush();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }
}