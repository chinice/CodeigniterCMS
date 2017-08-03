<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'models/Entities/Content.php';

/**
 * Created by PhpStorm.
 * User: Chinedu
 * Date: 20/07/2017
 * Time: 3:11 PM
 */
class Content_m extends CI_Model
{
    /**
     * @var
     */
    var $em;

    /**
     * Content_m constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->em = $this->doctrine->em;
    }

    /**
     * Function to get all contents
     * @return bool
     */
    public function getAllContents()
    {
        try{
            $contents = $this->em->getRepository('Content')->findAll();
            return $contents;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to get content by id
     * @param $id
     * @return bool
     */
    public function getContentById($id)
    {
        try{
            $content = $this->em->getRepository('Content')->find($id);
            return $content;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to add a content to the database
     * @param $content
     * @return bool
     */
    public function addContent($content)
    {
        try{
            $this->em->persist($content);
            $this->em->flush();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to update a content
     * @param $content
     * @return bool
     */
    public function updateContent($content)
    {
        try{
            $this->em->merge($content);
            $this->em->flush();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Function to delete a content
     * @param $id
     * @return bool
     */
    public function deleteContent($id)
    {
        try{
            $service = $this->em->getRepository('Content')->find($id);
            $this->em->remove($service);
            $this->em->flush();
            return true;
        }catch(Exception $ex){
            return false;
        }
    }
}