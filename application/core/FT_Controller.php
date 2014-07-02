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
        $this->_data['banner'] = $this->_setup_banner();
        $this->_data['slides'] = $this->_setup_slides();
        $this->_data['footer'] = $this->load->view('default/footer', '', TRUE);
        $this->_data['content'] = '';
    }
    
    private function _setup_banner()
    {
        $url_path = 'share/fm/banner/';
        $server_path = SERVER_BASE_PATH . $url_path;
    
        $sources = array(
            'images' => array(),
            'captions' => array()
        );
        $files = get_dir_file_info($server_path);
        
        foreach($files as $i=>$file)
        {
            $index = substr($i, 0, strpos($i, '.'));
            
            if(preg_match('/\.(jpg|jpeg|gif|png)/i', $file['name']))
            {
                $sources['images'][$index] = base_url($url_path . $file['name']);
            }
            
            if(preg_match('/\.(txt)/i', $file['name']))
            {
                $sources['captions'][$index] = read_file($server_path . $file['name']);
            }
        }
        
        return $this->load->view('default/banner', array('sources'=>$sources), TRUE);
    }
    
    private function _setup_slides()
    {
        $url_path = 'share/fm/banner-slide/';
        $server_path = SERVER_BASE_PATH . $url_path;
    
        $slides = array(
            'images' => array(),
            'captions' => array()
        );
        $files = get_dir_file_info($server_path);
        
        foreach($files as $i=>$file)
        {
            $index = substr($i, 0, strpos($i, '.'));
            
            if(preg_match('/\.(jpg|jpeg|gif|png)/i', $file['name']))
            {
                $slides['images'][$index] = base_url($url_path . $file['name']);
            }
            
            if(preg_match('/\.(txt)/i', $file['name']))
            {
                $slides['captions'][$index] = read_file($server_path . $file['name']);
            }
        }
        
        return $this->load->view('default/banner-slide', array('slides'=>$slides), TRUE);
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
