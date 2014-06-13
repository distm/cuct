<?php 

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kabar_model extends CI_Model {

    function kabars($limit=20, $start=0)
    {
        $get = $this->db->limit($limit, $start)
                        ->order_by('tanggal_input', 'DESC')
                        ->get('kabar');
        
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