<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Table extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_auth();
        $this->load->library('template');
        $this->load->model('admin/table_m');
    }

    public function index()
    {
        $this->template->display('admin/master/table_view');
    }

    public function data_list()
    {
        $List = $this->table_m->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row      = array();
            $table_id = $r->table_id;

            $row[] = '  <a title="Edit Data" href="javascript:void(0)" onclick="edit_data(' . "'" . $table_id . "'" . ')">
                        <i class="icon-pencil"></i>
                        </a>
                        <a onclick="hapusData(' . $table_id . ')" title="Delete Data">
                            <i class="icon-close"></i>
                        </a>';

            $row[] = $no;
            $row[] = $r->table_name;

            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->table_m->count_all(),
            "recordsFiltered" => $this->table_m->count_filtered(),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedata()
    {
        $this->table_m->insert_data();
    }

    public function get_data($id)
    {
        $data = $this->table_m->select_by_id($id)->row();
        echo json_encode($data);
    }

    public function updatedata()
    {
        $this->table_m->update_data();
    }

    public function deletedata($id)
    {
        $this->table_m->delete_data($id);
        echo json_encode(array("status" => true));
    }
}
/* Location: ./application/controller/admin/Table.php */
