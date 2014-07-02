<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends FT_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    
    function index()
    {}
    
    function _check()
    {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        
        $check = $this->db->where(array('username'=>$username, 'password'=>$password))
                          ->count_all_results('users');
                          
        if($check === 1)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('_check', 'Invalid username or password!');
            return FALSE;
        }
    }
    
    function check()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|callback__check');
        
        if($this->form_validation->run() !== FALSE)
        {
            $auth_access = md5($this->input->post('username', TRUE));
            $target_url = $this->session->userdata('last_position');
            if(! $target_url)
            {
                $target_url = base_url('admin');
            }
            
            $this->session->set_userdata('auth_access', $auth_access);
            redirect($target_url);
        }
        else
        {
            // load main page
            $this->load->view("login");
        }
    }
    
    function login()
    {
        // load main page
        $this->load->view("login");
    }
    
    function logout()
    {
        // load main page
        echo '<h3>Logging out...</h3>';
        $this->session->unset_userdata(array(
            'last_position' => '',
            'auth_access' => ''
        ));
        $this->session->sess_destroy();
        redirect(base_url());
    }
    
}