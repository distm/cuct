<?php 

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class ADM_Controller extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        
        // authenticate
        $this->_authenticate();
        
        // load library
        $this->load->library('form_validation');
        
        // setup
        $this->_setup_data();
        $this->_setup_navigation();
    }
    
    private function _authenticate()
    {
        $auth_access = $this->session->userdata('auth_access');
        if(! $auth_access)
        {
            $this->session->set_userdata('last_position', full_url());
            redirect(base_url('auth/login'));
            exit;
        }
    }
    
    private function _setup_data()
    {
        $cls = ucwords(str_replace('_', ' ', $this->router->class));
        $this->_data['page_title'] = trim(trim(trim($cls .' - Admin :: CuCindelaras.Org'), '-'));
        $this->_data['content'] = '';
    }
    
    protected function _setup_navigation($vars='')
    {
        if(! $vars)
        {
            $vars = array(
                'active' => array(
                    'class' => $this->router->class,
                    'method' => $this->router->method,
                    'params' => $this->uri->segment_array()
                )
            );
        }
        
        $this->_data['navigation'] = $this->load->view('admin/navigation', $vars, TRUE);
    }
    
}