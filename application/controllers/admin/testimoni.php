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

}
