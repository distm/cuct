<?php 

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Folder extends ADM_Controller {

    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        $this->banner();
    }
    
    function banner()
    {
        $this->_data['content'] = $this->load->content('banner', '', TRUE);
        $this->load->view('admin/main', $this->_data);
    }
    
    function download()
    {
        $this->_data['content'] = $this->load->content('download', '', TRUE);
        $this->load->view('admin/main', $this->_data);
    }

}