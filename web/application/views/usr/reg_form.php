<?php
/**
 * Created by JetBrains PhpStorm.
 * User: koumei
 * Date: 13/02/14
 * Time: 8:56 PM
 * To change this template use File | Settings | File Templates.
 */

?>

            <h1 class="text-center">Register Coono</h1>
            <?php
            echo form_open_multipart();
            ?>

            <div class="reg_form">

                <div class="container">
                    <div class="row" id="reg_form_msg">
                        <div class="col-sm-4 col-sm-offset-4">
                            <?php echo validation_errors('<div class="alert alert-warning">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 col-sm-offset-4"><?php echo form_label('Email');?></div>
                        <div class="col-sm-2"><?php echo form_input('txtEmail', '');?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 col-sm-offset-4"><?php echo form_label('Password');?></div>
                        <div class="col-sm-2"><?php echo form_password('txtPassword', '');?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 col-sm-offset-4"><?php echo form_label('Confirm Password');?></div>
                        <div class="col-sm-2"><?php echo form_password('txtConfirmPassword', '');?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 col-sm-offset-4"></div>
                        <div class="col-sm-2"><?php echo form_submit('btnRegister', 'Register', 'class = "btn btn-primary"');?> <a href="<?php echo site_url('i_cn/signin');?>">sign in</a></div>
                    </div>
                </div>

            </div>
            <?php
            echo form_close();
            ?>
        </div>
