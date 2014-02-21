<?if($this->session->flashdata('flashSuccess')):?>
<div class="alert alert-info"> <?=$this->session->flashdata('flashSuccess')?> </div>
<?endif?>
<?if($this->session->flashdata('flashError')):?>
<div class="alert alert-warning"> <?=$this->session->flashdata('flashError')?> </div>
<?endif?>
<?php echo validation_errors('<div class="alert alert-warning">', '</div>'); ?>