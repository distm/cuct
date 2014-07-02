<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Download extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('download');
    }
    
    function index()
    {
        $s = $this->input->get('s', TRUE);
        $file = base64_decode($s);
        $file_path = SERVER_BASE_PATH . 'share/fm/download/' . $file;
        if(file_exists($file_path) && ! is_dir($file_path))
        {
            $data = file_get_contents($file_path);
            force_download($file, $data);
        }
        else
        {
            show_404();
        }        
    }

}