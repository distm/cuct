<?php 

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk_model extends MY_Model {

    function detail($id_produk='')
    {
        if(! $id_produk)
        {
            return FALSE;
        }
        
        $get = $this->db->limit(1)
                        ->where('id', $id_produk)
                        ->get('produk');
                        
        return ($get && $get->num_rows()>0) ? $get->row_array() : FALSE;
    }

    function produk()
    {
        $get = $this->db->order_by("nama_produk LIKE '%.%'")
                        ->order_by('nama_produk, tanggal_input DESC')
                        ->get('produk');
        return ($get && $get->num_rows()>0) ? $get->result_array() : FALSE;
    }

    function produk_to_menu()
    {
        $produk = $this->produk();
        $result = array();
        
        $map_child = array();
        
        foreach($produk as $row)
        {
            if(strpos($row['nama_produk'], '.') === FALSE)
            {
                $kategori = $row['kategori'];
                $result[$kategori][] = $row;
                
                if($row['has_child'] == 'Y')
                {
                    $last_index = count($result[$kategori])-1;
                    $map_child[$kategori][$row['nama_produk']] = $last_index;
                }
            }
            
            if(strpos($row['nama_produk'], '.') !== FALSE)
            {
                $kategori = $row['kategori'];
                $arr_name = explode('.', $row['nama_produk']);
                $parent_index = $map_child[$kategori][$arr_name[0]];
                $result[$kategori][$parent_index]['childs'][] = $row;
            }
        }
        
        return $result;
        //return array($map_child, $result);
    }

}