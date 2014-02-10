<?php
/**
 * Created by JetBrains PhpStorm.
 * User: koumei
 * Date: 10/02/14
 * Time: 10:49 PM
 * To change this template use File | Settings | File Templates.
 */
class Sync_dev extends CI_Model
{
    var $id;
    var $sync_dev_name;
    var $sync_content;
    var $created_date;
    var $updated_date;
    var $disabled;
    var $sync_usr_id;

    public function __construct(){
        parent::__construct();
    }
}
