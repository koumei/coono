<?php
/**
 * Created by JetBrains PhpStorm.
 * User: koumei
 * Date: 21/02/14
 * Time: 7:12 PM
 * To change this template use File | Settings | File Templates.
 */
?>

<div class="coono_list">
    <h2 class="text-center">Coono List</h2>
    <div class="container">
        <div class="row" id="reg_form_msg">
            <div class="col-sm-4 col-sm-offset-4">
                <?php $this->load->view('info_msg_view');?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-2 col-sm-offset-4"><a href="<?php echo base_url();?>i_cn/add_coono" class="btn btn-primary">Add new</a></div>
            <div class="col-sm-2"></div>
        </div>

        <div class="row page-header">
            <div class="col-sm-2 col-sm-offset-4">ID</div>
            <div class="col-sm-2">Title</div>
        </div>
        <?php
        echo form_open_multipart();
        ?>

        <?php foreach($data as $dt):?>
        <div class="row">
            <div class="col-sm-2 col-sm-offset-4"><?php echo $dt['id'];?></div>
            <div class="col-sm-2"><?php echo $dt['title'];?></div>
        </div>
        <?php endforeach?>


<?php
        echo form_close();
        ?>
    </div>
</div>