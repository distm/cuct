<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    var $_data;
    
    function __construct()
    {
        parent::__construct();
        $this->_setup_data();
    }
    
    private function _setup_data()
    {
        $data = array();
        $data['navigation'] = $this->_navigation();
        $data['page_title'] = 'Credit Union Cindelaras Tumangkar - CuCindelaras.Org';
        $data['header'] = $this->load->view('default/header', '', TRUE);
        $data['footer'] = $this->load->view('default/footer', '', TRUE);
        $data['content'] = '';
        
        $this->_data = $data;
    }
    
    protected function _navigation($active_item='')
    {
        $vars = array(
            'active' => array(
                'class' => $this->router->class,
                'method' => $this->router->method,
                'params' => $this->uri->segment_array(),
                'item' => $active_item
            )
        );
        return $this->load->view('default/navigation', $vars, TRUE);
    }
    
}
