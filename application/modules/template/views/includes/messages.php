<?php if ($this->session->flashdata('message')) { ?>
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php echo $this->session->flashdata('message') ?>
    <?php $this->session->unset_userdata( 'message' );?>
</div>
<?php } ?>

<?php if ($this->session->flashdata('exception')) { ?>
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php echo $this->session->flashdata('exception') ?>
</div>
<?php $this->session->unset_userdata( 'exception' );?>
<?php } ?>

<?php if (validation_errors()) { ?>
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php echo validation_errors() ?>
</div>
<?php } ?>

<?php if($this->session->flashdata('error')){ ?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="alert-heading"><?php echo $this->session->flashdata('error'); ?></h4>
    </div>
    <?php $this->session->unset_userdata( 'error' );?>
<?php } ?>


