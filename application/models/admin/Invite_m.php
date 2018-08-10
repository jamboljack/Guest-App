<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invite_m extends CI_Model
{
    public $table        = 'v_invite';
    public $column_order = array(null, null, 'invite_code', 'family_name', 'family_address',
        'family_phone', 'table_name', 'invite_count');
    public $column_search = array('invite_code', 'family_name', 'family_address', 'family_phone',
        'table_name', 'invite_count');
    public $order = array('family_name' => 'asc');

    public $table1         = 'v_family';
    public $column_order1  = array(null, null, 'family_name', 'family_gender', 'family_address', 'family_phone');
    public $column_search1 = array('family_name', 'family_gender', 'family_address', 'family_phone');
    public $order1         = array('family_name' => 'asc');

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_datatables_query()
    {
        if ($this->input->post('lstTable', 'true')) {
            $this->db->where('table_id', $this->input->post('lstTable', 'true'));
        }
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
            'invite_code'   => trim($this->input->post('barcode', 'true')),
            'table_id'      => $this->input->post('lstTable', 'true'),
            'family_id'     => $this->input->post('id', 'true'),
            'invite_count'  => $this->input->post('number', 'true'),
            'invite_update' => date('Y-m-d H:i:s'),
        );

        $this->db->insert('guest_invite', $data);
    }

    private function _get_family_datatables_query()
    {
        $this->db->from($this->table1);

        $i = 0;
        foreach ($this->column_search1 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search1) - 1 == $i) {
                    $this->db->group_end();
                }

            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order1[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_family_datatables()
    {
        $this->_get_family_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_family_filtered()
    {
        $this->_get_family_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_family_all()
    {
        $this->db->from($this->table1);
        return $this->db->count_all_results();
    }

    public function select_by_id($invite_id)
    {
        $this->db->select('*');
        $this->db->from('v_invite');
        $this->db->where('invite_id', $invite_id);

        return $this->db->get();
    }

    public function update_data()
    {
        $invite_id = $this->input->post('invite_id', 'true');

        $data = array(
            'table_id'      => $this->input->post('lstTable', 'true'),
            'invite_count'  => $this->input->post('number', 'true'),
            'invite_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('invite_id', $invite_id);
        $this->db->update('guest_invite', $data);
    }

    public function delete_data($id)
    {
        $this->db->where('invite_id', $id);
        $this->db->delete('guest_invite');
    }
}
/* Location: ./application/models/admin/Invite_m.php */
