<?php 

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class ADM_Controller extends CI_Controller {

    var $_data;
    
    function __construct()
    {
        parent::__construct();
        $this->_setup_data();
        $this->_setup_navigation();
    }
    
    private function _setup_data()
    {
        $data = array();
        $data['page_title'] = 'Admin - CuCindelaras.Org';
        $data['content'] = '';
        
        $this->_data = $data;
    }
    
    protected function _setup_navigation()
    {
        $vars = array(
            'active' => array(
                'class' => $this->router->class,
                'method' => $this->router->method,
                'params' => $this->uri->segment_array()
            )
        );
        $this->_data['navigation'] = $this->load->view('admin/navigation', $vars, TRUE);
    }
    
}