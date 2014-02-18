<?php
/**
 * Created by JetBrains PhpStorm.
 * User: koumei
 * Date: 13/02/14
 * Time: 5:33 PM
 * To change this template use File | Settings | File Templates.
 */
class I_cn extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function index(){
        if($this->input->post('lm')){

        }
    }

    public function reg_usr(){

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->form_validation->set_rules('txtEmail', 'Email', 'required|valid_email|is_unique[sync_usr.sync_usr_login]');
        $this->form_validation->set_rules('txtPassword', 'Password', 'trim|required|matches[txtConfirmPassword]|md5');
        $this->form_validation->set_rules('txtConfirmPassword', 'Password Confirmation', 'required');

        $this->form_validation->set_message('is_unique', '%s has already signed up with Coono, please login or register using another email.');

        if ($this->form_validation->run() == FALSE)
        {
            $reg_form_content = $this->load->view('usr/reg_form', array(), true);
            $this->show_page('Register Coono', $reg_form_content);
        }
        else
        {
            $data = array(
                'sync_usr_login' => $this->input->post('txtEmail'),
                'sync_password' => $this->input->post('txtPassword'),
                'created_date' => time(),
                'updated_date' => time(),
                'logged_in_count' => 0,
                'disabled' => 0
            );
            $this->load->model('sync_usr');

            if($this->input->post('btnRegister')){
                $this->sync_usr->save($data);

                $this->session->set_flashdata('flashSuccess', 'User registered successfully.');
                redirect('/i_cn/signin');
            }

        }


    }

    public function show_page($title='Coono', $content){
        $this->load->helper('url');
        $this->load->view('master_view', array('my_content' => $content, 'my_title' => $title));
    }

    public function signin(){
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->form_validation->set_rules('txtEmail', 'Email', 'required|valid_email|xss_clean');
        $this->form_validation->set_rules('txtPassword', 'Password', 'trim|required|xss_clean|callback_check_user');

        if ($this->form_validation->run() == FALSE)
        {
            $reg_form_content = $this->load->view('signin', array(), true);
            $this->show_page('Sign In', $reg_form_content);
        }else{
            redirect('i_cn/coono_list', 'refresh');
        }


    }

    public function check_user($password){
        $this->load->model('sync_usr');
        $email = $this->input->post('txtEmail');
        $result = $this->sync_usr->signin_to_get_user($email, $password);

        if($result){

            $sess_array = array();

            foreach($result as $row)
            {
                print_r($row);
                $sess_array = array(
                'id' => $row->id,
                'username' => $row->sync_usr_login);

                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        }else{
            $this->form_validation->set_message('check_user', 'Invalid email or password');
            return false;

        }
    }

    public function coono_list(){
        $this->load->library('session');
        $sess_array = $this->session->userdata('logged_in');
        echo 'xxx'.$sess_array['username'];
    }
}

?>