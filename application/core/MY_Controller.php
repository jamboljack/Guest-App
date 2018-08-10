<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    protected $data;
    public function __construct()
    {
        parent::__construct();
    }

    public function cek_auth()
    {
        if ($this->session->userdata('logged_in_guest-app') == '' || $this->session->userdata('username') == null) {
            $_SESSION['redirect'] = current_url();
            redirect('login_admin');
        }
    }
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */