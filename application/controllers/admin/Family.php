<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Family extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_auth();
        $this->load->library('template');
        $this->load->model('admin/family_m');
    }

    public function index()
    {
        $this->template->display('admin/family/view');
    }

    public function data_list()
    {
        $List = $this->family_m->get_datatables();
        $data = array();
        $no   = $_POST['start'];

        foreach ($List as $r) {
            $no++;
            $row       = array();
            $family_id = $r->family_id;
            $row[]     = '  <a title="Edit Data" href="javascript:void(0)" onclick="edit_data(' . "'" . $family_id . "'" . ')">
                        <i class="icon-pencil"></i>
                        </a>
                            <a onclick="hapusData(' . $family_id . ')" title="Delete Data">
                                <i class="icon-close"></i>
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
            "recordsTotal"    => $this->family_m->count_all(),
            "recordsFiltered" => $this->family_m->count_filtered(),
            "data"            => $data,
        );

        echo json_encode($output);
    }

    public function savedata()
    {
        $this->family_m->insert_data();
    }

    public function get_data($id)
    {
        $data = $this->db->get_where('guest_family', array('family_id' => $id))->row();
        echo json_encode($data);
    }

    public function updatedata()
    {
        $this->family_m->update_data();
    }

    public function deletedata($id)
    {
        $this->family_m->delete_data($id);
        echo json_encode(array("status" => true));
    }
}
/* Location: ./application/controller/admin/Family.php */
