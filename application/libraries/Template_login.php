<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Template_login
{
    protected $_ci;
    public function __construct()
    {
        $this->_ci = &get_instance();
    }

    public function display($template_login, $data = null)
    {
        $data['content'] = $this->_ci->load->view($template_login, $data, true);
        $this->_ci->load->view('/template_login.php', $data);
    }
}
/* Location: ./application/libraries/Template_login.php */
