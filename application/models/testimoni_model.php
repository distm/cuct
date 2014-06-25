<?php 

class Testimoni_model extends CI_Model {

    function cari_testimoni($keys, $limit=20, $start=0)
    {
        if(! $keys)
        {
            return FALSE;
        }
        
        foreach((array)$keys as $key)
        {
            $this->db->or_like('konten', $key);
        }
    
        $get = $this->db->limit($limit, $start)
                        ->order_by('tanggal_input', 'DESC')
                        ->get('testimoni');
        
        if($get && $get->num_rows()>0)
        {
            return $get->result_array();
        }
        else
        {
            return FALSE;
        }
    }
    
    function detail($id)
    {
        if(! $id)
        {
            return FALSE;
        }
        
        $get = $this->db->limit(1)
                        ->get_where('testimoni', array('id'=>$id));
        
        return ($get && $get->num_rows()>0) ? $get->row_array() : FALSE;
    }
    
    function testimoni($limit=6, $offset=0)
    {
        $get = $this->db->limit($limit, $offset)
                        ->order_by('tanggal_input', 'DESC')
                        ->get('testimoni');
        
        return ($get && $get->num_rows()>0) ? $get->result_array() : FALSE;
    }

}