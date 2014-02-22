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
        $this->load->library('session');

        $loginbar = '';
        $logged_in = false;

        $sess_array = $this->session->userdata('logged_in');
        if($sess_array){
            $loginbar = $this->load->view('login_bar', array('userArr'=>$sess_array), true);
            $logged_in = true;
        }

        $this->load->view('master_view', array('my_content' => $content, 'my_title' => $title, 'loginbar'=>$loginbar, 'logged_in'=>$logged_in));
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

    public function signout(){
        $this->load->library('session');
        $this->load->helper('url');

        $this->session->unset_userdata('logged_in');
        //session_destroy();
        redirect('i_cn/signin', 'refresh');
    }

    public function check_user($password){
        $this->load->model('sync_usr');
        $email = $this->input->post('txtEmail');
        $result = $this->sync_usr->signin_to_get_user($email, $password);

        if($result){

            $sess_array = array();

            foreach($result as $row)
            {
                //print_r($row);
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
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('coono_item');

        $sess_array = $this->session->userdata('logged_in');
        //echo 'xxx'.$sess_array['username'];

        if($sess_array == null){
            $this->session->set_flashdata('flashError', 'Please login first.');
            redirect('i_cn/signin', 'refresh');
        }

        $user_id = $sess_array['id'];

        $data = $this->coono_item->get_items($user_id);



        $reg_form_content = $this->load->view('dashboard/coono_list', array('data'=>$data), true);
        $this->show_page('My Coono', $reg_form_content);


    }

    public function add_coono(){
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $sess_array = $this->session->userdata('logged_in');
        //echo 'xxx'.$sess_array['username'];

        if($sess_array == null){
            $this->session->set_flashdata('flashError', 'Please login first.');
            redirect('i_cn/signin', 'refresh');
        }

        $user_id = $sess_array['id'];

        $this->form_validation->set_rules('txtSubject', 'Title', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $reg_form_content = $this->load->view('dashboard/add_coono', array(), true);
            $this->show_page('My Coono', $reg_form_content);
        }else{
            $data = array(
                'title' => $this->input->post('txtSubject'),
                'coono_content' => $this->input->post('txtNotes'),
                'created_date' => time(),
                'user_id' => $user_id
            );
            $this->load->model('coono_item');

            $this->coono_item->save($data);

            $this->session->set_flashdata('flashSuccess', 'Coono saved successfully.');
            redirect('i_cn/coono_list', 'refresh');
        }
    }
}

?>