<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arrive extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_auth();
        $this->load->library('template');
        $this->load->model('admin/arrive_m');
    }

    public function index()
    {
        $data['listTable'] = $this->db->get('guest_table')->result();
        $this->template->display('admin/arrive/view', $data);
    }

    public function data_list()
    {
        $List = $this->arrive_m->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row       = array();
            $arrive_id = $r->arrive_id;
            $row[]     = $no;
            $row[]     = $r->arrive_time;
            $row[]     = $r->invite_code;
            $row[]     = $r->family_name;
            $row[]     = $r->family_address;
            $row[]     = $r->family_phone;
            $row[]     = $r->table_name;
            $row[]     = $r->invite_count;
            $data[]    = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->arrive_m->count_all(),
            "recordsFiltered" => $this->arrive_m->count_filtered(),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function adddata()
    {
        $this->template->display('admin/arrive/add');
    }

    public function scandata()
    {
        $barcode   = trim($this->input->post('barcode', 'true'));
        $checkdata = $this->db->get_where('v_invite', array('invite_code' => $barcode))->row();
        if (count($checkdata) > 0) {
            $invite_id      = $checkdata->invite_id;
            $checkdataulang = $this->db->get_where('v_arrive', array('invite_id' => $invite_id))->row();

            if (count($checkdataulang) == 0) {
                $callback = array(
                    'status'  => 'success',
                    'msg'     => 'TAMU UNDANGAN VALID',
                    'id'      => $checkdata->invite_id,
                    'name'    => trim($checkdata->family_name),
                    'address' => trim($checkdata->family_address),
                    'phone'   => trim($checkdata->family_phone),
                    'table'   => trim($checkdata->table_name),
                    'count'   => $checkdata->invite_count,
                );
            } else {
                $callback = array(
                    'status'  => 'update',
                    'msg'     => 'TAMU UNDANGAN SUDAH PERNAH DATANG',
                    'id'      => $checkdata->invite_id,
                    'name'    => trim($checkdata->family_name),
                    'address' => trim($checkdata->family_address),
                    'phone'   => trim($checkdata->family_phone),
                    'table'   => trim($checkdata->table_name),
                    'count'   => $checkdata->invite_count,
                );
            }
        } else {
            $callback = array('status' => 'failed', 'msg' => 'TAMU UNDANGAN TIDAK VALID');
        }

        echo json_encode($callback);
    }

    public function savedata()
    {
        $this->arrive_m->insert_data();
    }
}
/* Location: ./application/controller/admin/Arrive.php */
