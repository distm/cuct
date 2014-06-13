<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public $_data;

    function __construct()
    {
        parent::__construct();
        $this->_data = array(
            'css' => array(),
            'js' => array()
        );
    }
    
    public function add_assets($files=array())
    {
        if(! $files)
        {
            return FALSE;
        }
        
        if(! is_array($files))
        {
            $files = array($files);
        }
        
        foreach($files as $file)
        {
            $type = strtolower(substr($file, strrpos($file, '.')+1));
            $url = (strpos($file, 'http') !== FALSE) ? $file : assets_url("{$type}/{$file}");
            $this->_data[$type][] = $url;
        }
    }

}
