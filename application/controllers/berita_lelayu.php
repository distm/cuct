<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Berita_lelayu extends FT_Controller {
    
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
                        ->get_where('lelayu', array('id'=>$id));
        
        if($get && $get->num_rows() > 0)
        {
            $vars = array('berita_lelayu'=>$get->row_array());
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
                        ->get('lelayu');
        
        $berita_lelayu = ($get && $get->num_rows()>0) ? $get->result_array() : FALSE;
        $vars = array(
            'berita_lelayu' => $berita_lelayu,
            'paging' => paging(array(
                'base_url' => base_url('berita_lelayu/hal'),
                'first_url' => base_url('berita_lelayu'),
                'per_page' => $limit,
                'total_rows' => $this->db->count_all('lelayu'),
                'uri_segment' => 3
            ))
        );
        
        $this->_data['content'] = $this->load->content('berita_lelayu', $vars, TRUE);
        
        // load main page
        $this->load->view("main", $this->_data);
    }
    
}