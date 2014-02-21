<?php
/**
 * Created by JetBrains PhpStorm.
 * User: koumei
 * Date: 10/02/14
 * Time: 10:49 PM
 * To change this template use File | Settings | File Templates.
 */
class Coono_item extends CI_Model
{
    var $id;
    var $title;
    var $coono_content;
    var $created_date;
    var $usr_id;

    public function __construct(){
        parent::__construct();
    }

    public function get_items($user_id = null){
        if($user_id == null){
            $query = $this->db->get('coono_item');
            return $query->result_array();
        }else{
            $query = $this->db->get_where('coono_item', array('user_id'=>$user_id));
            return $query->row_array();
        }
    }

    public function save($data) {
        $this->db->insert('coono_item', $data);
        $this->db->insert_id();
    }
}
