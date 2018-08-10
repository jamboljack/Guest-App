<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arrive_m extends CI_Model
{
    public $table        = 'v_arrive';
    public $column_order = array(null, 'arrive_time', 'invite_code', 'family_name', 'family_address',
        'family_phone', 'table_name', 'invite_count');
    public $column_search = array('arrive_time', 'invite_code', 'family_name', 'family_address',
        'family_phone', 'table_name', 'invite_count');
    public $order = array('arrive_time' => 'desc');

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
        $invite_id = $this->input->post('id', 'true');
        $check     = $this->db->get_where('guest_arrive', array('invite_id' => $invite_id))->result();
        if (count($check) > 0) {
            $data = array(
                'arrive_count'  => $this->input->post('count_arrive', 'true'),
                'arrive_date'   => date('Y-m-d'),
                'arrive_time'   => date('H:i:s'),
                'arrive_update' => date('Y-m-d H:i:s'),
            );

            $this->db->where('invite_id', $invite_id);
            $this->db->update('guest_arrive', $data);
        } else {
            $data = array(
                'invite_id'     => $this->input->post('id', 'true'),
                'arrive_count'  => $this->input->post('count_arrive', 'true'),
                'arrive_date'   => date('Y-m-d'),
                'arrive_time'   => date('H:i:s'),
                'arrive_update' => date('Y-m-d H:i:s'),
            );

            $this->db->insert('guest_arrive', $data);
        }
    }
}
/* Location: ./application/models/admin/Arrive_m.php */
