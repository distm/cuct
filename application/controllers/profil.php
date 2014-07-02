<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profil extends FT_Controller {
    
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
    }
    
    private function _get_profile($judul='')
    {
        if(! $judul)
        {
            return FALSE;
        }
        
        $get = $this->db->limit(1)
                        ->get_where('profil', array('judul'=>$judul));
        
        return ($get && $get->num_rows() > 0) ? $get->row_array() : FALSE;
    }
    
    function grab($key='')
    {
        $this->_data['banner'] = '<div class="line"></div>';
        
        // get content
        $judul = ucwords(str_replace('-', ' ', $key));
        $vars['profil'] = $this->_get_profile($judul);
        if($vars['profil'] !== FALSE)
        {
            $this->_data['content'] = $this->load->content('profil', $vars, TRUE);
            
            // load main page
            $this->load->view("main", $this->_data);
        }
        else
        {
            show_404();
        }
    }
    
}