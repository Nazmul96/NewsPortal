<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<link href="<?php echo base_url('application/modules/addon/assets/css/style.css'); ?>" rel="stylesheet" type="text/css"/>

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo html_escape(!empty($title) ? $title : null) ?></h6>
                            </div>

                            <a href="<?php echo base_url('addon/module')?>" class="btn btn-success float-right"><i class="ti-align-justify"> </i> <?php echo display('modules')?></a> 
                        </div>
                    </div>

                    <input type="hidden" id="base_url" value="<?php echo base_url();?>">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <br>
                                <?php echo form_open('#', array('id' => 'purchase')); ?>
                                <div id="purchase_key_box" class="form-group has-success">
                                    <label class="form-control-label" for="purchase_key">Purchase Key</label>
                                    <input type="text" class="form-control form-control-success" id="purchase_key" placeholder="Enter your purchase key">
                                    <div class="form-feedback">Success! Almost done it.</div>
                                    <small class="text-muted">You got a purchase key after purchasing this item</small>
                                    <br>
                                    <input type="hidden" name="itemtype" id="itemtype" value="module">
                                </div>
                                <div class="form-group">
                                    <a href="<?php echo base_url('addon/module/add_module'); ?>" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                                    <button type="submit" class="btn btn-success" id="download_now">Download Now</button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>

                         <div id="loading" class="text-center none">
                            <img id="loading-image" src="<?php echo base_url('application/modules/addon/assets/img/load.gif')?>" alt="Loading..." width="100"  />
                        </div>
                        <div class="row waitmsg none">
                            <div class="col-md-12">
                                <h3 class="text-center">Downloading... Please wait for <span id="wait"> 20</span> Seconds.</h3>
                            </div> 
                        </div>

                        
                    </div>
                </div>
            


<script src="<?php echo base_url().'application/modules/addon/assets/ajaxs/addons/download.js' ?>"></script>

