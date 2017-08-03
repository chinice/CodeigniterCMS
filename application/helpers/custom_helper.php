<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Helper function to check if a user is logged in
 */
if(! function_exists('is_validated'))
{
    function is_validated()
    {
        $CI = & get_instance();  //get instance, access the CI superobject
        $isLoggedIn = $CI->session->userdata('validated');
        if( $isLoggedIn ) {
            return TRUE;
        }
        return FALSE;
    }
}


/**
 * Helper function to get users full name
 */
if(! function_exists('getFullName'))
{
    function getFullName()
    {
        $CI = & get_instance();
        return $CI->session->userdata('firstname').' '.$CI->session->userdata('lastname');
    }
}

/**
 * Function to get the profile pictures of users
 */
if(! function_exists('getProfileImage'))
{
    function getProfileImage($image, $alt = "")
    {
        if(isset($image)){
            return '<img src="'.BASEURL.UPLOAD_IMAGE_URL.$image.'" '.$alt.'>';
        }else{
            return '<img src="'.IMAGE_URL.'/users/avatar-1.jpg" '.$alt.'>';
        }
    }
}

/**
 * Function to get the profile pictures of users
 */
if(! function_exists('getServiceImage'))
{
    function getServiceImage($image, $alt = "")
    {
        if(isset($image)){
            return '<img src="'.BASEURL.SERVICE_IMAGE_URL.$image.'" '.$alt.'>';
        }else{
            return '<img src="'.IMAGE_URL.'/users/avatar-1.jpg" '.$alt.'>';
        }
    }
}

/**
 * Function to get status
 */
if(! function_exists('getStatus'))
{
    function getStatus($status)
    {
        if($status){
            return '<span class="label label-success">Active</span>';
        }else{
            return '<span class="label label-danger">Inactive</span>';
        }
    }
}

/**
 * Function to get status
 */
if(! function_exists('getEnquiryStatus'))
{
    function getEnquiryStatus($status)
    {
        if($status){
            return '<span class="label label-success">Treated</span>';
        }else{
            return '<span class="label label-danger">Not treated</span>';
        }
    }
}