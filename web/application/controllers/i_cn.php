<?php
/**
 * Created by JetBrains PhpStorm.
 * User: koumei
 * Date: 13/02/14
 * Time: 5:33 PM
 * To change this template use File | Settings | File Templates.
 */
class I_cn extends CI_Controller{
    public function index(){
        if($this->input->post('lm')){

        }
    }

    public function reg_usr(){

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('txtEmail', 'Email', 'required|valid_email|is_unique[sync_usr.sync_usr_login]');
        $this->form_validation->set_rules('txtPassword', 'Password', 'trim|required|matches[txtConfirmPassword]|md5');
        $this->form_validation->set_rules('txtConfirmPassword', 'Password Confirmation', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $reg_form_content = $this->load->view('usr/reg_form', array(), true);
            $this->show_page('Register coono', $reg_form_content);
        }
        else
        {

        }


    }

    public function show_page($title='Coono', $content){
        $this->load->helper('url');
        $this->load->view('master_view', array('my_content' => $content, 'my_title' => $title));
    }

    public function signin(){
        $this->load->helper('form');
        $this->load->helper('url');

        $reg_form_content = $this->load->view('signin', array(), true);
        $this->show_page('Sign in', $reg_form_content);
    }
}

?>