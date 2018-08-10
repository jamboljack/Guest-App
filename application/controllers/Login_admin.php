<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_admin_model');
        $this->load->library('template_login');
    }

    public function index()
    {
        $session = $this->session->userdata('logged_in_guest-app');
        if ($session == false) {
            $this->template_login->display('admin/login_view');
        } else {
            redirect(site_url('admin/home'));
        }
    }

    public function validasi()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->template_login->display('admin/login_view');
        } else {
            $username  = trim($this->input->post('username', 'true'));
            $password  = trim($this->input->post('password', 'true'));
            $temp_user = $this->login_admin_model->get_user($username)->row();
            $num_user  = count($temp_user);

            if ($num_user == 0) {
                $this->session->set_flashdata('notification', '<b>Username Anda Tidak Terdaftar.</b>');
                redirect(site_url('login_admin'));
            } elseif ($num_user > 0) {
                $temp_account = $this->login_admin_model->check_user_account($username, sha1($password))->row();
                $num_account  = count($temp_account);
                if ($num_account > 0) {
                    $array_item = array(
                        'username'            => $temp_account->user_username,
                        'nama'                => $temp_account->user_name,
                        'avatar'              => $temp_account->user_avatar,
                        'level'               => $temp_account->user_level,
                        'logged_in_guest-app' => true,
                    );

                    $this->session->set_userdata($array_item);
                    redirect(site_url('admin/home'));
                } else {
                    $this->session->set_flashdata('notification', '<b>Username atau Password Anda Salah.</b>');
                    redirect(site_url('login_admin'));
                }
            }
        }
    }

    public function logout()
    {
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . 'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-chace');
        $this->session->sess_destroy();
        redirect(site_url('login_admin'));
    }
}
/* Location: ./application/controller/Login_admin.php */
