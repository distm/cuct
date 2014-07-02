<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Warta_usaha extends FT_Controller {
    
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        $this->hal();
    }
    
    function baca($id='')
    {
        $this->_data['banner'] = '<div class="line"></div>';
        
        // get content
        $get = $this->db->limit(1)
                        ->get_where('warta_usaha', array('id'=>$id));
        
        if($get && $get->num_rows() > 0)
        {
            $vars = array('warta_usaha'=>$get->row_array());
            $this->_data['content'] = $this->load->content('baca', $vars, TRUE);
            $this->load->view("main", $this->_data);
        }
        else
        {
            show_404();
        }
    }
    
    function hal($halaman=1)
    {
        $this->_data['banner'] = '<div class="line"></div>';
        
        $limit = 10;
        $start = abs($halaman) < 1 ? 0 : ((abs($halaman) -1) * $limit);        
        $get = $this->db->limit($limit, $start)
                        ->order_by('tanggal_input', 'desc')
                        ->get('warta_usaha');
        
        $warta_usaha = ($get && $get->num_rows()>0) ? $get->result_array() : FALSE;
        $vars = array(
            'warta_usaha' => $warta_usaha,
            'paging' => paging(array(
                'base_url' => base_url('warta_usaha/hal'),
                'first_url' => base_url('warta_usaha'),
                'per_page' => $limit,
                'total_rows' => $this->db->count_all('warta_usaha'),
                'uri_segment' => 3
            ))
        );
        
        $this->_data['content'] = $this->load->content('warta_usaha', $vars, TRUE);
        
        // load main page
        $this->load->view("main", $this->_data);
    }
    
}