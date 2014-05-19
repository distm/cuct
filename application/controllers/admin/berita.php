<?php 

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Berita extends ADM_Controller {

    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        $this->load->view('admin/main', $this->_data);
    }

}
