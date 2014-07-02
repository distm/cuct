<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Misc extends FT_Controller {
    
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
    }
    
    function grab($key='')
    {
        $this->_data['banner'] = '<div class="line"></div>';
        
        // get content
        $vars = array(
            'key' => $key,
            'title' => ucwords(str_replace('-', ' ', $key))
        );
        $this->_data['content'] = $this->load->content('misc', $vars, TRUE);
        
        // load main page
        $this->load->view("main", $this->_data);
    }
    
}