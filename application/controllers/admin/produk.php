<?php 

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk extends ADM_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
    }
    
    function index()
    {
        $this->table();
    }
    
    function edit($id_produk='', $nama_produk='', $nama_subproduk='')
    {
        // add assets
        $this->add_assets(array(
            assets_url('libs/tinymce/tinymce.min.js'),
            assets_url('libs/tinymce/tinymce-init.js')
        ));
    
        $vars = array(
            'mode' => 'edit',
            'detail' => $this->produk_model->detail($id_produk),
            'produk' => $this->produk_model->produk_to_menu(),
            'active_listgroup_menu' => $nama_produk ? $nama_produk : 'Simpanan',
            'active_listgroup_submenu' => $nama_subproduk,
            'caption_produk' => str_replace('-', ' ', $nama_produk),
            'caption_subproduk' => str_replace('-', ' ', $nama_subproduk)
        );
        
        $this->_data['content'] = $this->load->content('form', $vars, TRUE);
        $this->load->view('admin/main', $this->_data);
    }
    
    function hapus($id_produk='')
    {
        $detail = $this->produk_model->detail($id_produk);
        if($detail)
        {
            $delete = $this->db->delete('produk', array('id'=>$id_produk));
            $message = $delete !== FALSE ? 'Produk dan Layanan berhasil dihapus.' : 'Produk dan Layanan gagal dihapus.';
            $this->session->set_flashdata('flashdata', $message);
            
            $href = admin_url('produk/table/'. url_title($detail['kategori']));
            if($this->db->where('kategori', $detail['kategori'])->count_all_results('produk') == 0)
            {
                $href = admin_url('produk');
            }
            redirect($href);
        }
        else
        {
            redirect(admin_url("produk"));
        }
    }
    
    function simpan()
    {
        $post_data = array(
            'nama_produk' => $this->input->post('nama_produk', TRUE),
            'kategori' => $this->input->post('kategori', TRUE),
            'deskripsi' => $this->input->post('deskripsi', TRUE)
        );
        
        $mode = $this->input->post('mode', TRUE);
        if($mode == 'edit')
        {
            $id = $this->input->post('id', TRUE);
            $old_detail = $this->produk_model->detail($id);
            
            $save = $this->db->update('produk', $post_data, array('id'=>$id));
            if($save)
            {
                // update childs
                if($old_detail['nama_produk'] != $post_data['nama_produk'] && $old_detail['has_child'] == 'Y')
                {
                    $old_name_len = strlen($old_detail['nama_produk'])+1;
                    $sql = "UPDATE produk SET nama_produk=CONCAT('{$post_data['nama_produk']}', SUBSTR(nama_produk, {$old_name_len})) WHERE nama_produk LIKE '{$old_detail['nama_produk']}.%'";
                    $this->db->query($sql);
                }
            }
        }
        else
        {
            $post_data['tanggal_input'] = date('YmdHis');
            $save = $this->db->insert('produk', $post_data);
        }
        
        // update parent
        if($save && strpos($post_data['nama_produk'], '.') !== FALSE)
        {
            $arr_name = explode('.', $post_data['nama_produk']);
            $this->db->update('produk', array('has_child'=>'Y'), array('nama_produk'=>$arr_name[0]));
        }
    
        $this->session->set_flashdata(array(
            'flashdata' => $save ? 'Produk berhasil disimpan' : 'Produk gagal disimpan',
            'flashid' => md5($post_data['nama_produk'])
        ));
        redirect(admin_url('produk/table/'. url_title($post_data['kategori'])));
    }

    function tambah($nama_produk='', $nama_subproduk='')
    {
        // add assets
        $this->add_assets(array(
            assets_url('libs/tinymce/tinymce.min.js'),
            assets_url('libs/tinymce/tinymce-init.js')
        ));
    
        $vars = array(
            'produk' => $this->produk_model->produk_to_menu(),
            'active_listgroup_menu' => $nama_produk ? $nama_produk : 'Simpanan',
            'active_listgroup_submenu' => $nama_subproduk,
            'caption_produk' => str_replace('-', ' ', $nama_produk),
            'caption_subproduk' => str_replace('-', ' ', $nama_subproduk)
        );
        
        $this->_data['content'] = $this->load->content('form', $vars, TRUE);
        $this->load->view('admin/main', $this->_data);        
    }

    function tambah_subproduk($id_parent, $nama_produk='', $nama_subproduk='')
    {
        // add assets
        $this->add_assets(array(
            assets_url('libs/tinymce/tinymce.min.js'),
            assets_url('libs/tinymce/tinymce-init.js')
        ));
    
        $vars = array(
            'produk' => $this->produk_model->produk_to_menu(),
            'parent' => $this->produk_model->detail($id_parent),
            'active_listgroup_menu' => $nama_produk ? $nama_produk : 'Simpanan',
            'active_listgroup_submenu' => $nama_subproduk,
            'caption_produk' => str_replace('-', ' ', $nama_produk),
            'caption_subproduk' => str_replace('-', ' ', $nama_subproduk)
        );
        
        $this->_data['content'] = $this->load->content('form', $vars, TRUE);
        $this->load->view('admin/main', $this->_data);        
    }

    function table($nama_produk='', $nama_subproduk='')
    {
        $vars = array(
            'produk' => $this->produk_model->produk_to_menu(),
            'active_listgroup_menu' => $nama_produk ? $nama_produk : 'Simpanan',
            'active_listgroup_submenu' => $nama_subproduk,
            'caption_produk' => str_replace('-', ' ', $nama_produk),
            'caption_subproduk' => str_replace('-', ' ', $nama_subproduk)
        );
        
        //echo '<pre>'; print_r($vars); exit;
        
        $this->_data['content'] = $this->load->content('table', $vars, TRUE);
        $this->load->view('admin/main', $this->_data);        
    }

}