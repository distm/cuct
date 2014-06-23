<?php 

class Testimoni_model extends CI_Model {

    function testimoni($limit=6, $offset=0)
    {
        $get = $this->db->limit($limit, $offset)
                        ->order_by('tanggal_input', 'DESC')
                        ->get('testimoni');
        
        return ($get && $get->num_rows()>0) ? $get->result_array() : FALSE;
    }

}