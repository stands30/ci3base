<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class sessiondata extends CI_Controller{
    function initializeData(){
        **// imports libraries.**
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        if(!$this->session->userdata('email')):
            redirect('login');
        endif;
    }

}