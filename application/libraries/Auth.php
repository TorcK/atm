<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Extension to CI_Image_lib library
 * 
 * @author kastigar
 *
 */
class Auth
{
    function set_session_lib($session_lib)
    {
        $this->session_lib = $session_lib;
    }
    
    function has_identity()
    {
        $identity = $this->get_identity();
        return !empty($identity);
    }
    
    function get_identity()
    {
        return $this->session_lib->userdata('my_auth_lib_data');
    }
    
    function set_identity($identity)
    {
        $this->session_lib->set_userdata('my_auth_lib_data', $identity);
    }
    
    function clear_identity()
    {
        $this->session_lib->unset_userdata('my_auth_lib_data');
    }
}