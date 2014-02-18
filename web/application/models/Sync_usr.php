<?php
/**
 * Created by JetBrains PhpStorm.
 * User: koumei
 * Date: 10/02/14
 * Time: 10:37 PM
 * To change this template use File | Settings | File Templates.
 */
class Sync_usr extends CI_Model
{
    var $id;
    var $sync_usr_login;
    var $sync_password;


    public function __construct(){
        parent::__construct();
    }

    public function save($data) {
        $this->db->insert('sync_usr', $data);
        $this->db->insert_id();
    }

    public function signin_to_get_user($username, $password){
        $this -> db -> select('id, sync_usr_login, sync_password');
        $this -> db -> from('sync_usr');
        $this -> db -> where('sync_usr_login', $username);
        $this -> db -> where('sync_password', MD5($password));
        $this -> db -> limit(1);
        $query = $this -> db -> get();
        print_r($this -> db);
        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }


}
