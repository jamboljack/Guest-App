<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Template
{
    protected $_ci;
    public function __construct()
    {
        $this->_ci = &get_instance();
    }

    public function display($template, $data = null)
    {
        $data['_header']  = $this->_ci->load->view('template/header', $data, true);
        $data['_footer']  = $this->_ci->load->view('template/footer', $data, true);
        $data['_sidebar'] = $this->_ci->load->view('template/sidebar', $data, true);
        $data['content']  = $this->_ci->load->view($template, $data, true);

        $this->_ci->load->view('/template.php', $data);
    }
}
/* Location: ./application/libraries/Template.php */
