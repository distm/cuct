<?php 

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lelayu extends ADM_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('lelayu_model');
    }
    
    function index()
    {
        $this->table();
    }
    
    function cari($page=1)
    {
        $q = $this->input->post('keyword', TRUE);
        if(! $q)
        {
            $q = $this->input->get('q', TRUE);
        }        
        $keys = explode(' ', $q);
        
        $page = ((int)$page < 1) ? 1 : (int)$page;
        $limit = 10;
        $start = ($page <= 1) ? 0 : ($page-1) * $limit;
    
        // total rows
        foreach((array)$keys as $key)
        {
            $this->db->or_like('judul', $key);
        }
        $total_rows = $this->db->count_all_results('lelayu');
    
        $vars = array(
            'active_listgroup_menu' => '',
            'lelayu' => $this->lelayu_model->cari_lelayu($keys, $limit, $start),
            'cari' => $q,
            'paging' => paging(array(
                'total_rows' => $total_rows,
                'per_page' => $limit,
                'uri_segment' => 5,
                'base_url' => admin_url('berita/lelayu/cari'),
                'sufix' => '?q='. urlencode($q)
            ))
        );
        
        $this->_data['content'] = $this->load->content('table', $vars, TRUE);
        $this->load->view('admin/main', $this->_data);        
    }
    
    function delete($id='')
    {
        if(! $id)
        {
            redirect(admin_url('berita/lelayu'));
        }
        
        $delete = $this->db->delete('lelayu', array('id'=>$id));
        $message = $delete !== FALSE ? 'Berita lelayu berhasil dihapus.' : 'Berita lelayu gagal dihapus.';
        $this->session->set_flashdata('flashdata', $message);
        redirect(admin_url('berita/lelayu'));
    }
    
    function edit($id='')
    {
        if(! $id)
        {
            redirect(admin_url('berita/lelayu'));
        }
        
        // add assets
        $this->add_assets(array(
            assets_url('libs/tinymce/tinymce.min.js'),
            assets_url('libs/tinymce/tinymce-init.js')
        ));
    
        // variables for content
        $vars = array(
            'active_listgroup_menu' => 'edit',
            'mode' => 'edit',
            'detail' => $this->lelayu_model->detail($id)
        );
        $this->_data['content'] = $this->load->content('form', $vars, TRUE);
        
        // load maina view
        $this->load->view('admin/main', $this->_data);
        
    }
    
    function simpan()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('konten', 'Konten', 'trim|required');
        
        $this->form_validation->set_message('required', '%s harus diisi.');
        
        if($this->form_validation->run() !== FALSE)
        {
            $data = array(
                'judul' => $this->input->post('judul', TRUE), 
                'konten' => $this->input->post('konten', TRUE),
                'tanggal_input' => date('YmdHis')
            );
            
            $mode = $this->input->post('mode', TRUE);
            if($mode == 'edit')
            {
                unset($data['tanggal_input']);
                $id = $this->input->post('id', TRUE);
                $save = $this->db->update('lelayu', $data, array('id'=>$id));
            }
            else
            {
                $save = $this->db->insert('lelayu', $data);
            }
            
            $this->session->set_flashdata(array(
                'flashdata' => $save ? 'Berita lelayu berhasil disimpan' : 'Berita lelayu gagal disimpan',
                'flashid' => md5($data['judul'])
            ));
            redirect(admin_url('berita/lelayu'));
        }
        else
        {
            $this->tambah();
        }
    }
    
    function table($page=1)
    {
        $page = ((int)$page < 1) ? 1 : (int)$page;
        $limit = 10;
        $start = ($page <= 1) ? 0 : ($page-1) * $limit;
    
        $vars = array(
            'active_listgroup_menu' => 'table',
            'lelayu' => $this->lelayu_model->lelayu($limit, $start),
            'paging' => paging(array(
                'total_rows' => $this->db->count_all('lelayu'),
                'per_page' => $limit,
                'uri_segment' => 5,
                'base_url' => admin_url('berita/lelayu/table'),
                'first_url' => admin_url('berita/lelayu')
            ))
        );
        
        $this->_data['content'] = $this->load->content('table', $vars, TRUE);
        $this->load->view('admin/main', $this->_data);        
    }
    
    function tambah()
    {
        // add assets
        $this->add_assets(array(
            assets_url('libs/tinymce/tinymce.min.js'),
            assets_url('libs/tinymce/tinymce-init.js')
        ));
    
        // variables for content
        $vars = array(
            'active_listgroup_menu' => 'form'
        );
        $this->_data['content'] = $this->load->content('form', $vars, TRUE);
        
        // load maina view
        $this->load->view('admin/main', $this->_data);
    }

}
