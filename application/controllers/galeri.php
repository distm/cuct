<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Galeri extends FT_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->add_assets(array(
            assets_url('libs/lightbox/ekko-lightbox.css'),
            assets_url('libs/lightbox/dark.css'),
            assets_url('libs/lightbox/ekko-lightbox.js')
        ));
    }
    
    private function _get_files($path='')
    {
        if(! $path)
        {
            return FALSE;
        }
        
        $source = array();
        $files = get_dir_file_info($path);
        
        if(! $files)
        {
            return FALSE;
        }
        
        foreach($files as $file_name=>$file)
        {
            $file_path = rtrim($path,'/') .'/'. $file_name;
            if(! is_dir($file_path))
            {
                $source['files'][] = array(
                    'name' => $file['name'],
                    'size' => $file['size'],
                    'date' => $file['date']
                );
            }
            else
            {
                $f = array(
                    'name' => $file['name'],
                    'size' => $file['size'],
                    'date' => $file['date']
                );
                
                $childs = get_dir_file_info($file_path);
                foreach($childs as $child)
                {
                    $f['children'][] = array(
                        'name' => $child['name'],
                        'size' => $child['size'],
                        'date' => $child['date']
                    );
                }
                
                $source['dirs'][] = $f;
            }
        }
        
        return $source;
    }
    
    function index()
    {
        $this->_data['banner'] = '<div class="line"></div>';
    
        $segs = $this->uri->segment_array();
        $path = implode('/', $segs);
        $real_path = SERVER_BASE_PATH . 'share/fm/' . $path;
        
        $files = $this->_get_files($real_path);
        if($files)
        {
            $files['current_path'] = $path;
            $files['current_url_path'] = base_url($path) . '/';
            $this->_data['content'] = $this->load->content('table', $files, TRUE);
            
            // load main page
            $this->load->view("main", $this->_data);
        }
        else
        {
            show_404();
        }
    }
}