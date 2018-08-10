<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_error extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->output->set_status_header('404');
        $this->load->view('404_view');
    }
}
/* Location: ./application/controller/My_error.php */