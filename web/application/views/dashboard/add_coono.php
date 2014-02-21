<?php
/**
 * Created by JetBrains PhpStorm.
 * User: koumei
 * Date: 14/02/14
 * Time: 3:19 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<h1 class="text-center">Add Coono</h1>
<?php
echo form_open_multipart();
?>
<div class="coono_form">
    <div class="container">
        <div class="row" id="reg_form_msg">
            <div class="col-sm-4 col-sm-offset-4">
                <?php $this->load->view('info_msg_view');?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-sm-offset-4"><?php echo form_label('Title/Subject');?></div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4"><?php echo form_input('txtSubject', '');?></div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-sm-offset-4"><?php echo form_label('Notes');?></div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4"><?php echo form_textarea('txtNotes', '');?></div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-sm-offset-4"></div>
            <div class="col-sm-4 col-sm-offset-4"><?php echo form_submit('btnSave', 'Save', 'class = "btn btn-primary"');?> <a href="<?php echo site_url('i_cn/coono_list');?>">Coono List</a></div>
        </div>
    </div>

</div>
<?php
echo form_close();
?>
</div>
