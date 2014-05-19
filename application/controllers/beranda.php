<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Beranda extends MY_Controller {
    
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        // get content of `beranda`
        $this->_data['content'] = $this->load->content('beranda', '', TRUE);
        
        // load main page
        $this->load->view("main", $this->_data);
    }
    
    function admin_index_map()
    {
        echo 'FOO';
    }
    
}