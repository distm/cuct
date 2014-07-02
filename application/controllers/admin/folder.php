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
    
    function banner_slide()
    {
        $this->_data['content'] = $this->load->content('banner-slide', '', TRUE);
        $this->load->view('admin/main', $this->_data);
    }
    
    function galeri()
    {
        $this->_data['content'] = $this->load->content('galeri', '', TRUE);
        $this->load->view('admin/main', $this->_data);
    }
    
    function download()
    {
        $this->_data['content'] = $this->load->content('download', '', TRUE);
        $this->load->view('admin/main', $this->_data);
    }

}