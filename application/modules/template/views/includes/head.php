
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
        <meta name="author" content="Bdtask">
        <title><?php echo (!empty($settings->website_title)?$settings->website_title:null) ?> :: <?php echo (!empty($title)?$title:null) ?></title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url().@$settings->favicon;?>">

        <link href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <?php if($settings->ltl_rtl==1){?>
        <link href="<?php echo base_url()?>assets/dist/css/app-rtl.css?<?php echo version()?>" rel="stylesheet">
        <?php }?>

        <?php if($settings->ltl_rtl==0){?>
        <link href="<?php echo base_url()?>assets/dist/css/app.css?<?php echo version()?>" rel="stylesheet">
        <?php }?>

        <link href="<?php echo base_url()?>assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/plugins/typicons/src/typicons.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/plugins/bootstrap4-toggle/css/bootstrap4-toggle.min.css" rel="stylesheet">
        <?php if($panelset->active_status==1){?>
                <?php $this->load->view('customstyle') ?>
        <?php }?>

        <!--Third party Styles(used by this page)--> 
        <script src="<?php echo base_url()?>assets/plugins/jQuery/jquery-3-6-4.min.js"></script>

