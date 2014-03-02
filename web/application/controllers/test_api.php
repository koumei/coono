<?php
/**
 * Created by JetBrains PhpStorm.
 * User: koumei
 * Date: 2/03/14
 * Time: 11:40 AM
 * To change this template use File | Settings | File Templates.
 */

class Test_api extends CI_Controller{
    function test_put(){
        $this->load->library('curl');
        $this->curl->create('http://localhost/coono/web/coonoapi/user/format/json');

        $this->curl->put(array(
            'email' => 'xxx@xxx.com',
            'password'=>'password'
        ));

        $result = json_decode($this->curl->execute());

        print_r($result);


        //$this->curl->debug();

        //print_r($this->curl);
    }
}