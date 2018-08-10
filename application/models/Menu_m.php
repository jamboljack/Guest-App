<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Menu_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select_user($username)
    {
        $this->db->select('*');
        $this->db->from('guest_users');
        $this->db->where('user_username', $username);

        return $this->db->get();
    }

    public function select_meta()
    {
        $this->db->select('*');
        $this->db->from('guest_meta');
        $this->db->where('meta_id', 1);

        return $this->db->get();
    }
}
/* Location: ./application/model/Menu_m.php */
