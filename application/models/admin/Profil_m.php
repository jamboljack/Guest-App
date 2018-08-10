<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Profil_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function select_detail()
    {
        $username = $this->session->userdata('username');

        $this->db->select('*');
        $this->db->from('guest_users');
        $this->db->where('user_username', $username);

        return $this->db->get();
    }

    public function update_data_diri()
    {
        $user_username = $this->session->userdata('username');

        $data = array(
            'user_name'        => stripHTMLtags($this->input->post('name', 'true')),
            'user_dept'        => trim($this->input->post('dept', 'true')),
            'user_mobile'      => trim($this->input->post('hp', 'true')),
            'user_email'       => trim(stripHTMLtags($this->input->post('email', 'true'))),
            'user_date_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('user_username', $user_username);
        $this->db->update('guest_users', $data);
    }

    public function update_avatar($username)
    {
        $data = array(
            'user_avatar'      => $this->upload->file_name,
            'user_date_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('user_username', $username);
        $this->db->update('guest_users', $data);
    }

    public function update_password()
    {
        $user_username = $this->session->userdata('username');
        $password      = trim($this->input->post('newpassword', 'true'));

        $data = array(
            'user_password'    => sha1($password),
            'user_date_update' => date('Y-m-d H:i:s'),
        );

        $this->db->where('user_username', $user_username);
        $this->db->update('guest_users', $data);
    }
}
/* Location: ./application/model/admin/Profil_m.php */
