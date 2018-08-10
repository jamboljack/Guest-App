<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login_admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function check_user_account($username, $password)
    {
        $this->db->select('*');
        $this->db->from('guest_users');
        $this->db->where('user_username', $username);
        $this->db->where('user_password', $password);
        $this->db->where('user_status', 'Aktif');

        return $this->db->get();
    }

    public function get_user($username)
    {
        $this->db->select('*');
        $this->db->from('guest_users');
        $this->db->where('user_username', $username);
        $this->db->where('user_status', 'Aktif');

        return $this->db->get();
    }
}
/* Location: ./application/model/Login_admin_model.php */
