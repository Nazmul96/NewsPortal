<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<link href="<?php echo base_url('application/modules/addon/assets/css/style.css'); ?>" rel="stylesheet" type="text/css"/>





                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['upload','theme'])?></h6>
                            </div>
                            <a href="<?php echo base_url('addon/theme/download_theme')?>" class="btn btn-success"><i class="fas fa-download"> </i> <?php echo display('download')?></a>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php echo form_open_multipart('addon/theme/upload_new_theme'); ?>

                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-md-4 pr-md-1">
                                            <div class="form-group">
                                                <label class="font-weight-600"><?php echo display('purchase_key') ?> <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="bottom" title="Enter Envato purchase key or Bdtask purchase key"></span></label>
                                                <span class="font-weight-600 text-danger">*</span>
                                                <input type="text" name="purchase_key"   placeholder="<?php echo display('purchase_key') ?>" class="form-control" required/>
                                            </div>
                                        </div>


                                        <div class="col-md-4 pr-md-1">
                                            <div class="form-group">
                                                <label class="font-weight-600"><?php echo display('theme_name') ?></label>
                                                <span class="text-danger">*</span>
                                                <input type="text" name="theme_name"   placeholder="<?php echo display('theme_name') ?>" class="form-control" required/>
                                            </div>
                                        </div>

                                        <div class="col-md-4 px-md-1">
                                            <div class="form-group">
                                                <label class="font-weight-600"><?php echo display('upload') ?> (.zip)</label>
                                                <span class="text-danger">*</span>
                                                <input type="file" name="new_theme" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-footer">
                                      <div class=" form-group">
                                        <div class="col-md-12 ">
                                            <button  class="btn btn-md btn-success float-right"><i class="fas fa-upload"></i> <?php echo display('upload');?></button>
                                        </div> 
                                     </div>
                                </div>

                            <?php echo form_close();?>
                     </div>
                </div>
           

           

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['theme','settings'])?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="row">

                                    <!-- New Themes -->
                                    <?php
                                        $i=0;
                                    if(!empty($new_items)){
                                        foreach ($new_items as $theme) {

                                            if(!in_array($theme->identity, $installed)){
                                                $i++;

                                        $theme_img = (!empty($theme->banner)?$theme->banner:NO_IMAGE);
                                    ?>

                                        <div class="col-md-4">
                                            <div class="card_item">
                                                <div class="border-box pnav" id="pnav">
                                                    <div class="img_part">
                                                        <img src="<?php echo $theme_img; ?>">
                                                    </div>
                                                    <a href="<?php echo $theme->payment_url; ?>" target="_blank" role="button"  class="btn btn-dtls" ><?php echo display('buy_now') ?></a>

                                                </div>

                                                <div class="caption_part" ><h4><?php echo html_escape($theme->theme_name);?></h4>
                                                    
                                                    <div class="caption_btn activated">
                                                        <p class="price">$<?php echo number_format($theme->price,2); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } } }  ?>



                                      <!-- Downloaded Themes -->
                                      <?php foreach ($themes as $single_theme) {
                                      $i++; ?>



                                        <div class="col-md-4">
                                            <div class="card_item">
                                                <div class="border-box pnav" id="pnav">
                                                    <div class="img_part">
                                                        <img src="<?php echo base_url() . 'application/views/themes/' . html_escape($single_theme->name) . '/preview.jpg'; ?>">
                                                    </div>
                                                     <?php if (@$active_theme == $single_theme->name) { ?>
                                                                <a href="<?php echo base_url()?>" target='__blank' class="btn btn-dtls">Theme Details</a>
                                                    <?php } else{ ?>
                                                        <a href="<?php echo base_url('addon/theme/active_theme/' . html_escape($single_theme->name))?>" target='__blank' class="btn btn-dtls"><?php echo display('active')?></a>
                                                    <?php } ?>
                                                </div>

                                                <div class="caption_part">
                                                    <h4><?php echo str_replace('-', ' ', $single_theme->name); ?> </h4>

                                                    <div class="caption_btn <?php echo ((@$active_theme == $single_theme->name)?'activated':''); ?>">
                                                        <?php if (@$active_theme !== $single_theme->name) { ?>
                                                        <a href="<?php echo base_url('addon/theme/active_theme/' . html_escape($single_theme->name))?>" class="btn btn-success"><?php echo display('active')?></a>
                                                        <button data_id="<?php echo $single_theme->name; ?>"  class="btn btn-danger delete_item"><?php echo display("delete") ?></button>

                                                        <?php } else{ ?>
                                                        <a href="<?php echo base_url()?>" target='__blank' class="btn btn-success">Activated</a>
                                                    <?php } ?>


                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>



                                    <div class="col-md-4">
                                               
                                            <div class="card_item active">

                                                <div class="img_part">
                                                    <img class="img-fluid img-thumbnail" src="<?php echo base_url() . 'application/views/UpComing-Theme/preview.jpg'; ?>">
                                                    <a href="#" target='__blank' class="btn btn-dtls">UpComing Theme</a>
                                                </div>
                                            
                                                <div class="caption_part" >
                                                    <h4>UpComing Theme</h4>
                                                </div>
                                            </div>

                                    </div>


                                  <?php if($i==0){ ?>
                                        <div class="col-md-12">
                                           <h3> <?php echo display('no_theme_available') ?></h3>
                                        </div>
                                    <?php } ?>
                                
                                
                        </div>  
                                
                    </div>
                </div>
            






<script src="<?php echo base_url().'application/modules/addon/assets/ajaxs/addons/theme.js' ?>"></script>
