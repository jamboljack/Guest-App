<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invite extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_auth();
        $this->load->library('template');
        $this->load->model('admin/invite_m');
    }

    public function index()
    {
        $data['listTable'] = $this->db->get('guest_table')->result();
        $this->template->display('admin/invite/view', $data);
    }

    public function data_list()
    {
        $List = $this->invite_m->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row       = array();
            $invite_id = $r->invite_id;
            $link      = site_url('admin/invite/editdata/' . $invite_id);
            $row[]     = '  <a href="' . $link . '" title="Edit Data"><i class="icon-pencil"></i></a>
                            <a onclick="hapusData(' . $invite_id . ')" title="Delete Data">
                                <i class="icon-close"></i>
                            </a>';
            $row[]  = $no;
            $row[]  = $r->invite_code;
            $row[]  = $r->family_name;
            $row[]  = $r->family_address;
            $row[]  = $r->family_phone;
            $row[]  = $r->table_name;
            $row[]  = $r->invite_count;
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->invite_m->count_all(),
            "recordsFiltered" => $this->invite_m->count_filtered(),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function adddata()
    {
        $data['listTable'] = $this->db->get('guest_table')->result();
        $this->template->display('admin/invite/add', $data);
    }

    private function code_exists($barcode)
    {
        $this->db->where('invite_code', $barcode);
        $query = $this->db->get('guest_invite');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function register_code_exists()
    {
        if (array_key_exists('barcode', $_POST)) {
            if ($this->code_exists($this->input->post('barcode', 'true')) == true) {
                echo json_encode(false);
            } else {
                echo json_encode(true);
            }
        }
    }

    public function data_family_list()
    {
        $List = $this->invite_m->get_family_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row       = array();
            $family_id = $r->family_id;
            $row[]     = '  <a title="Pilih Data" class="pilihData" data-id="' . $family_id . '" data-name="' . $r->family_name . '" data-gender="' . $r->family_gender . '" data-address="' . $r->family_address . '" data-phone="' . $r->family_phone . '">
                                <i class="icon-check"></i>
                            </a>';
            $row[]  = $no;
            $row[]  = $r->family_name;
            $row[]  = $r->family_gender;
            $row[]  = $r->family_address;
            $row[]  = $r->family_phone;
            $data[] = $row;
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->invite_m->count_family_all(),
            "recordsFiltered" => $this->invite_m->count_family_filtered(),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedata()
    {
        $this->invite_m->insert_data();
    }

    public function editdata($invite_id)
    {
        $data['listTable'] = $this->db->get('guest_table')->result();
        $data['detail']    = $this->invite_m->select_by_id($invite_id)->row();
        $this->template->display('admin/invite/edit', $data);
    }

    public function updatedata()
    {
        $this->invite_m->update_data();
    }

    public function deletedata($id)
    {
        $this->invite_m->delete_data($id);
        echo json_encode(array("status" => true));
    }
}
/* Location: ./application/controller/admin/Invite.php */
