<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk_dan_layanan extends FT_Controller {
    
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
    }
    
    private function _get_produk($nama_produk='')
    {
        if(! $nama_produk)
        {
            return FALSE;
        }
        
        $get = $this->db->limit(1)
                        ->get_where('produk', array('nama_produk'=>$nama_produk));
        
        return ($get && $get->num_rows() > 0) ? $get->row_array() : FALSE;
    }
    
    function kategori($ctg='')
    {
        if(! $ctg)
        {
            show_404();
        }
        
        $kategori = ucwords(str_replace('-', ' ', $ctg));
        $get = $this->db->get_where('produk', array('kategori'=>$kategori));
        
        if($get && $get->num_rows() > 0)
        {
            $vars = array(
                'kategori' => $kategori,
                'produk' => $get->result_array()
            );
            $this->_data['content'] = $this->load->content('table', $vars, TRUE);
            
            // load main page
            $this->load->view("main", $this->_data);
        }
        else
        {
            show_404();
        }
    }
    
    function grab($ctg='', $key='')
    {
        if(! $key)
        {
            $this->kategori($ctg);
        }
        else
        {
            $this->_data['banner'] = '<div class="line"></div>';
            
            // get content
            $nama_produk = ucwords(str_replace('-', ' ', $key));
            $nama_produk = preg_replace_callback('/\_\w/', function($match){
                return str_replace('_', '.', strtoupper($match[0]));
            }, $nama_produk);
            
            $vars['produk'] = $this->_get_produk($nama_produk);
            if($vars['produk'] !== FALSE)
            {
                $vars['kategori'] = ucwords(str_replace('-', ' ', $ctg));
                $this->_data['content'] = $this->load->content('produk', $vars, TRUE);
                
                // load main page
                $this->load->view("main", $this->_data);
            }
            else
            {
                show_404();
            }
        }
    }
    
}