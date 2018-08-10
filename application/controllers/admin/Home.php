<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_auth();
        $this->load->library('template');
        $this->load->model('admin/home_m');
    }

    public function index()
    {
        $data['family'] = $this->home_m->select_family()->row();
        $data['invite'] = $this->home_m->select_invite()->row();
        $data['kursi']  = $this->home_m->select_kursi()->row();
        $data['arrive'] = $this->home_m->select_arrive()->row();
        $this->template->display('admin/home_view', $data);
    }

    public function data_list()
    {
        $List = $this->home_m->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row    = array();
            $row[]  = $no;
            $row[]  = $r->table_name;
            $row[]  = number_format($r->jumlah_undangan, 0, '', ',');
            $row[]  = number_format($r->jumlah_scan, 0, '', ',');
            $row[]  = number_format($r->jumlah_kursi, 0, '', ',');
            $row[]  = number_format($r->jumlah_datang, 0, '', ',');
            $row[]  = number_format($r->sisa, 0, '', ',');
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->home_m->count_all(),
            "recordsFiltered" => $this->home_m->count_filtered(),
            "data"            => $data,
        );

        echo json_encode($output);
    }
}
/* Location: ./application/controller/admin/Home.php */
