<?php 

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Misc extends ADM_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
    }
    
    private function _misc()
    {
        $get = $this->db->get('misc');
        return ($get && $get->num_rows()>0) ? $get->result_array() : FALSE;
    }
    
    private function _detail($id_misc='')
    {
        if(! $id_misc)
        {
            return FALSE;
        }
        
        $get = $this->db->where('id', $id_misc)
                        ->limit(1)
                        ->get('misc');
        
        return ($get && $get->num_rows()>0) ? $get->row_array() : FALSE;
    }
    
    function index()
    {
        $this->table('Kutipan');
    }
    
    function hapus($id_misc='')
    {
        if(! $id_misc)
        {
            redirect(admin_url('misc'));
        }
        
        $detail = $this->_detail($id_misc);
        if($detail !== FALSE)
        {
            $delete = $this->db->delete('misc', array('id'=>$id_misc));
            $message = $delete ? 'Data berhasil dihapus' : 'Data gagal dihapus';
            $this->session->set_flashdata('flashdata', $message);
            redirect(admin_url('misc'));
        }
        else
        {
            $this->session->set_flashdata('flashdata', 'Data tidak ditemukan');
            redirect(admin_url('misc'));
        }
    }
    
    function simpan()
    {
        $post_data = array(
            'judul' => $this->input->post('judul', TRUE),
            'konten' => $this->input->post('konten', TRUE)
        );
        
        $id = $this->input->post('id', TRUE);
        if($id == 'tambah')
        {
            $post_data['tanggal_input'] = date();
            $save = $this->db->insert('misc', $post_data);
        }
        else
        {
            $save = $this->db->update('misc', $post_data, array('id'=>$id));
        }
        
        $message = $save ? 'Data berhasil disimpan' : 'Data gagal disimpan';
        $this->session->set_flashdata('flashdata', $message);
        redirect(admin_url('misc/table/'. url_title($post_data['judul'])));
    }
    
    function tambah()
    {
        // add assets
        $this->add_assets(array(
            assets_url('libs/tinymce/tinymce.min.js'),
            assets_url('libs/tinymce/tinymce-init.js')
        ));
    
        $vars = array(
            'active_listgroup_menu' => 'tambah',
            'judul' => 'Tambah',
            'misc' => $this->_misc(),
        );
        $this->_data['content'] = $this->load->content('table', $vars, TRUE);
        $this->load->view('admin/main', $this->_data);
    }
    
    function table($judul='')
    {
        // add assets
        $this->add_assets(array(
            assets_url('libs/tinymce/tinymce.min.js'),
            assets_url('libs/tinymce/tinymce-init.js')
        ));
    
        $vars = array(
            'active_listgroup_menu' => $judul,
            'judul' => str_replace('-', ' ', $judul),
            'misc' => $this->_misc(),
        );
        $this->_data['content'] = $this->load->content('table', $vars, TRUE);
        $this->load->view('admin/main', $this->_data);
    }
    
}