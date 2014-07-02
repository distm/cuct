<?php 

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Testimoni extends ADM_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('testimoni_model');
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
            $this->db->or_like('konten', $key);
        }
        $total_rows = $this->db->count_all_results('testimoni');
    
        $vars = array(
            'active_listgroup_menu' => '',
            'testimoni' => $this->testimoni_model->cari_testimoni($keys, $limit, $start),
            'cari' => $q,
            'paging' => paging(array(
                'total_rows' => $total_rows,
                'per_page' => $limit,
                'uri_segment' => 3,
                'base_url' => admin_url('testimoni/cari'),
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
            redirect(admin_url('testimoni'));
        }
        
        $detail = $this->testimoni_model->detail($id);
        if(! $detail)
        {
            show_404();
        }
        
        $delete = $this->db->delete('testimoni', array('id'=>$id));
        if($delete)
        {
            $avatar = avatar_path() . $detail['foto'];
            if(file_exists($avatar) && ! is_dir($avatar))
            {
                unlink($avatar);
            }
            
            $this->session->set_flashdata('flashdata', 'Testimoni berhasil dihapus');
            $back = @$_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : admin_url('testimoni');
            redirect($back);
        }
        else
        {
            $this->session->set_flashdata('flashdata', 'Testimoni tidak dapat dihapus');
            $back = @$_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : admin_url('testimoni');
            redirect($back);
        }
    }
    
    function edit($id='')
    {
        if(! $id)
        {
            redirect(admin_url('testimoni'));
        }
        
        $detail = $this->testimoni_model->detail($id);
        if(! $detail)
        {
            show_404();
        }
        
        $vars = array(
            'active_listgroup_menu' => 'edit',
            'detail' => $detail,
            'mode' => 'edit'
        );
        $this->_data['content'] = $this->load->content('form', $vars, TRUE);
        $this->load->view('admin/main', $this->_data);        
    }
    
    function table($page=1)
    {
        $limit = 10;
        $offset = (abs((int)$page) > 0) ? ((abs((int)$page)-1)*$limit) : 0;
    
        $vars = array(
            'active_listgroup_menu' => 'table',
            'testimoni' => $this->testimoni_model->testimoni($limit, $offset),
            'paging' => paging(array(
                'total_rows' => $this->db->count_all('testimoni'),
                'per_page' => $limit,
                'uri_segment' => 3,
                'base_url' => admin_url('testimoni/table'),
                'first_url' => admin_url('testimoni')
            ))
        );
        $this->_data['content'] = $this->load->content('table', $vars, TRUE);
        $this->load->view('admin/main', $this->_data);
    }
    
    function tambah()
    {
        $vars = array(
            'active_listgroup_menu' => 'tambah'
        );
        $this->_data['content'] = $this->load->content('form', $vars, TRUE);
        $this->load->view('admin/main', $this->_data);
    }
    
    function simpan()
    {
        $this->form_validation->set_rules(array(
            array('field'=>'nama', 'label'=>'Nama', 'rules'=>'required|trim'),
            array('field'=>'konten', 'label'=>'Konten', 'rules'=>'required|trim')
        ));
        
        $this->form_validation->set_message('required', '%s harus diisi.');
        if($this->form_validation->run() !== FALSE)
        {
            $nama_foto = $this->upload_foto();
            if($nama_foto !== FALSE)
            {
                $post_data = array(
                    'nama' => $this->input->post('nama', TRUE),
                    'email' => '',
                    'konten' => $this->input->post('konten')
                );
                
                if(! is_numeric($nama_foto))
                {
                    $post_data['foto'] = $nama_foto;
                }
                
                $mode = $this->input->post('mode');
                if($mode != 'edit')
                {
                    $post_data['tanggal_input'] = date('YmdHis');
                    $save = $this->db->insert('testimoni', $post_data);
                }
                else
                {
                    $id = $this->input->post('id', TRUE);
                    $save = $this->db->update('testimoni', $post_data, array('id'=>$id));
                }
                
                $message = $save ? 'Testimoni tersimpan' : 'Testimoni gagal disimpan';
                $this->session->set_flashdata(array(
                    'flashdata' => $message,
                    'flashid' => md5($post_data['nama'])
                ));
                redirect(admin_url('testimoni'));
            }
            else
            {
                $this->session->set_flashdata('flashdata', 'Foto tidak dapat diunggah');
                $back = @$_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : admin_url('testimoni/tambah');
                redirect($back);
            }
        }
        else
        {
            if($this->input->post('mode') == 'edit')
            {
                $id = $this->input->post('id', TRUE);
                $this->edit($id);
            }
            else
            {
                $this->tambah();
            }
        }
    }
    
    function upload_foto()
    {
        if($_FILES['foto']['error'] == 0)
        {
            $path = avatar_path();
            $ext = strtolower(substr($_FILES['foto']['name'], strrpos($_FILES['foto']['name'], '.')));
            $new_file_name = url_title($this->input->post('nama'), '_', TRUE) . $ext;
            
            if(move_uploaded_file($_FILES['foto']['tmp_name'], $path.$new_file_name))
            {
                $this->load->library('image_lib');
                
                $crop_size = 100;
                $config['image_library'] = 'gd2';
                $config['source_image']	= $path.$new_file_name;
                $config['maintain_ratio'] = TRUE;
                
                // make size
                $size = getimagesize($path.$new_file_name);
                $config['height'] = $crop_size;
                $config['width'] = ceil(($config['height'] * $size[0]) / $size[1]);
                if($config['width'] < $crop_size)
                {
                    $config['width'] = $crop_size;
                    $config['height'] = ($config['width'] * $size[1]) / $size[0];
                }
                
                // resize
                $this->image_lib->initialize($config);
                if($this->image_lib->resize())
                {
                    $this->image_lib->clear();
                    if($config['width'] != $config['height'])
                    {
                        // crop
                        $dif = ($config['width'] > $config['height']) ? ($config['width']-$config['height']) : ($config['height']-$config['width']);
                        $set_axis = ($config['width'] > $config['height']) ? 'x' : 'y';
                        
                        $crop_config['image_library'] = 'gd2';
                        $crop_config['source_image'] = $path.$new_file_name;
                        $crop_config['width'] = $crop_size;
                        $crop_config['height'] = $crop_size;
                        $crop_config['x_axis'] = $set_axis == 'x' ? ($dif/2) : 0;
                        $crop_config['y_axis'] = $set_axis == 'y' ? ($dif/2) : 0;
                        $crop_config['maintain_ratio'] = FALSE;

                        $this->image_lib->initialize($crop_config); 
                        if($this->image_lib->crop())
                        {
                            return $new_file_name;
                        }
                    } // crop
                    else
                    {
                        // no crop needed
                        return $new_file_name;
                    }
                } // resized
            } // uploaded
            
            // file detected but couldn't be uploaded
            return FALSE;
            
        } // file no error
        else
        {
            // skip add photo
            return $_FILES['foto']['error'];
        }
    }

}
