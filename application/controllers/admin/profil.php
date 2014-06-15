<?php 

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profil extends ADM_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
    }
    
    private function _profil()
    {
        $get = $this->db->get('profil');
        return ($get && $get->num_rows()>0) ? $get->result_array() : FALSE;
    }
    
    private function _detail($id_profil='')
    {
        if(! $id_profil)
        {
            return FALSE;
        }
        
        $get = $this->db->where('id', $id_profil)
                        ->limit(1)
                        ->get('profil');
        
        return ($get && $get->num_rows()>0) ? $get->row_array() : FALSE;
    }
    
    function index()
    {
        $this->table('Sejarah');
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
            $save = $this->db->insert('profil', $post_data);
        }
        else
        {
            $save = $this->db->update('profil', $post_data, array('id'=>$id));
        }
        
        $message = $save ? 'Profil berhasil disimpan' : 'Profil gagal disimpan';
        $this->session->set_flashdata('flashdata', $message);
        redirect(admin_url('profil/table/'. url_title($post_data['judul'])));
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
            'profil' => $this->_profil(),
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
            'profil' => $this->_profil(),
        );
        $this->_data['content'] = $this->load->content('table', $vars, TRUE);
        $this->load->view('admin/main', $this->_data);
    }
    
}