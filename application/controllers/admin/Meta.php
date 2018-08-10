<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Meta extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_auth();
        $this->load->library('template');
        $this->load->model('admin/meta_m');
    }

    public function index()
    {
        $data['detail'] = $this->meta_m->select_detail()->row();
        $this->template->display('admin/master/meta_view', $data);
    }

    public function updatedata()
    {
        $this->meta_m->update_data();
    }
}

/* Location: ./application/controller/admin/Meta.php */
