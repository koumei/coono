<?php
/**
 * Created by JetBrains PhpStorm.
 * User: koumei
 * Date: 14/02/14
 * Time: 3:07 PM
 * To change this template use File | Settings | File Templates.
 */
class I_dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){

    }

    public function add_coono(){
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

        $add_coono = $this->load->view('/dashboard/add_coono', array(), true);
        $this->show_page('Add Coono', $add_coono);
    }

    public function show_page($title='Coono Dashboard', $content){
        $this->load->helper('url');
        $this->load->view('master_view', array('my_content' => $content, 'my_title' => $title));
    }
}
?>