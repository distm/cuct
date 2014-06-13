<?php 

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Beranda extends ADM_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('kabar_model');
    }
    
    function index()
    {
        $this->load->view('admin/main', $this->_data);
    }
    
}
