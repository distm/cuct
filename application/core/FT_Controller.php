<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class FT_Controller extends MY_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->_setup_data();
    }
    
    private function _setup_data()
    {
        $this->_data['navigation'] = $this->_navigation();
        $this->_data['page_title'] = 'Credit Union Cindelaras Tumangkar - CuCindelaras.Org';
        $this->_data['header'] = $this->load->view('default/header', '', TRUE);
        $this->_data['footer'] = $this->load->view('default/footer', '', TRUE);
        $this->_data['content'] = '';
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
