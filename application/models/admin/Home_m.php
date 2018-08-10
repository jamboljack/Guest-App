<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home_m extends CI_Model
{
    public $table         = 'v_kursi';
    public $column_order  = array(null, 'table_name', null, null, null, null, null);
    public $column_search = array('table_name', 'jumlah_kursi', 'jumlah_datang', 'sisa');
    public $order         = array('table_name' => 'asc');

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

    public function select_family()
    {
        $this->db->select('count(family_id) as total');
        $this->db->from('guest_family');

        return $this->db->get();
    }

    public function select_kursi()
    {
        $this->db->select('SUM(invite_count) as total');
        $this->db->from('guest_invite');

        return $this->db->get();
    }

    public function select_invite()
    {
        $this->db->select('count(invite_id) as total');
        $this->db->from('guest_invite');

        return $this->db->get();
    }

    public function select_arrive()
    {
        $this->db->select('SUM(i.invite_count) as total');
        $this->db->from('guest_arrive a');
        $this->db->join('guest_invite i', 'a.invite_id=i.invite_id');

        return $this->db->get();
    }
}
/* Location: ./application/model/admin/Home_m.php */
