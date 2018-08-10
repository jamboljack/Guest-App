<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Family_m extends CI_Model
{
    public $table         = 'guest_family';
    public $column_order  = array(null, null, 'family_name', 'family_gender', 'family_address', 'family_phone');
    public $column_search = array('family_name', 'family_gender', 'family_address', 'family_phone');
    public $order         = array('family_name' => 'asc');

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_datatables_query()
    {
        $this->db->from($this->table);

        $i = 0;
        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function insert_data()
    {
        $data = array(
            'family_name'    => strtoupper(stripHTMLtags($this->input->post('name', 'true'))),
            'family_gender'  => $this->input->post('lstGender', 'true'),
            'family_address' => strtoupper($this->input->post('address', 'true')),
            'family_phone'   => trim($this->input->post('phone', 'true')),
            'family_update'  => date('Y-m-d H:i:s'),
        );

        $this->db->insert('guest_family', $data);
    }

    public function update_data()
    {
        $family_id = $this->input->post('id', 'true');
        $data      = array(
            'family_name'    => strtoupper(stripHTMLtags($this->input->post('name', 'true'))),
            'family_gender'  => $this->input->post('lstGender', 'true'),
            'family_address' => strtoupper($this->input->post('address', 'true')),
            'family_phone'   => trim($this->input->post('phone', 'true')),
            'family_update'  => date('Y-m-d H:i:s'),
        );
        $this->db->where('family_id', $family_id);
        $this->db->update('guest_family', $data);
    }

    public function delete_data($id)
    {
        $this->db->where('family_id', $id);
        $this->db->delete('guest_family');
    }
}
/* Location: ./application/models/admin/Family_m.php */
