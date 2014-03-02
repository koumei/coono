<?php
/**
 * Created by JetBrains PhpStorm.
 * User: koumei
 * Date: 2/03/14
 * Time: 12:08 AM
 * To change this template use File | Settings | File Templates.
 */
require(APPPATH.'libraries/REST_Controller.php');

class CoonoAPI extends REST_Controller
{
    function user_get(){
        $data = array('returned: '. $this->get('id'));
        $this->response($data);
    }

    function user_put(){


        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();

        $_POST['txtEmail'] = $this->put('email');
        $_POST['txtPassword'] = $this->put('password');

        $this->form_validation->set_rules('txtEmail', 'Email', 'required|valid_email|is_unique[sync_usr.sync_usr_login]');
        $this->form_validation->set_rules('txtPassword', 'Password', 'trim|required|md5');

        $this->form_validation->set_message('is_unique', '%s has already signed up with Coono, please login or register using another email.');

        if ($this->form_validation->run() == FALSE)
        {
            //print_r($this->form_validation);
            $this->response(array('status' => 'false', 'error' => $this->form_validation->error_string()));
        }else{
            $data = array(
                'sync_usr_login' => $this->input->post('txtEmail'),
                'sync_password' => $this->input->post('txtPassword'),
                'created_date' => time(),
                'updated_date' => time(),
                'logged_in_count' => 0,
                'disabled' => 0
            );
            $this->load->model('sync_usr');

            $this->sync_usr->save($data);

            $this->response(array('status' => 'true', 'msg' => $this->put('email') . ' has been created successfully.'));
        }


    }
}