<?php 

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Download extends ADM_Controller {

    function __construct()
    {
        parent::__construct();
        //$this->load->model('produk_model');
    }
    
    function index()
    {
        $this->_data['content'] = $this->load->content('fm-iframe', '', TRUE);
        $this->load->view('admin/main', $this->_data);
    }

}