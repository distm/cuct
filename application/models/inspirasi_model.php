<?php 

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inspirasi_model extends CI_Model {

    function detail($id)
    {
        if(! $id)
        {
            return FALSE;
        }
        
        $get = $this->db->limit(1)
                        ->get_where('inspirasi', array('id'=>$id));
        
        if($get && $get->num_rows())
        {
            return $get->row_array();
        }
        else
        {
            return FALSE;
        }
    }

    function inspirasi($limit=20, $start=0)
    {
        $get = $this->db->limit($limit, $start)
                        ->order_by('tanggal_input', 'DESC')
                        ->get('inspirasi');
        
        if($get && $get->num_rows()>0)
        {
            return $get->result_array();
        }
        else
        {
            return FALSE;
        }
    }
    
    function cari_inspirasi($keys, $limit=20, $start=0)
    {
        if(! $keys)
        {
            return FALSE;
        }
        
        foreach((array)$keys as $key)
        {
            $this->db->or_like('judul', $key);
        }
    
        $get = $this->db->limit($limit, $start)
                        ->order_by('tanggal_input', 'DESC')
                        ->get('inspirasi');
        
        if($get && $get->num_rows()>0)
        {
            return $get->result_array();
        }
        else
        {
            return FALSE;
        }
    }
    
    function tag_inspirasi($tag, $limit=20, $start=0)
    {
        if(! $tag)
        {
            return FALSE;
        }
        
        $get = $this->db->limit($limit, $start)
                        ->like('tags', $tag)
                        ->order_by('tanggal_input', 'DESC')
                        ->get('inspirasi');
        
        if($get && $get->num_rows()>0)
        {
            return $get->result_array();
        }
        else
        {
            return FALSE;
        }
    }
    
}