<div class="card mb-4">


    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('autoupdate')?></h6>
            </div>
        </div>
    </div>

    <div class="card-body">

                <?php  if ($latest_version!=$current_version) { ?>

                <?php echo form_open_multipart("dashboard/autoupdate/update") ?>

                    <div class="row">
                        <div class="form-group col-lg-8 offset-md-2">
                            <blink class="text-success text-center" style="font-size: 32px;margin-bottom: 36px;display: block;"><?php echo @$message_txt ?></blink>
                            <blink class="text-waring text-center" style="font-size: 32px;margin-bottom: 36px;display: block;"><?php echo @$exception_txt ?></blink> 
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="alert alert-success text-center" style="font-size:18px;    line-height: 28px;"><?php echo display('latest_version')?> <br>V-<?php echo $latest_version ?></div>
                                </div> 
                                <div class="col-lg-6">
                                    <span style="position: absolute;background: #000;color: #fff;width: 91%;"><?php echo display('after19')?></span>
                                    <div class="alert alert-danger text-center" style="font-size:18px;    line-height: 28px;"><?php echo display('current_version')?> <br>V-<?php echo $current_version ?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div id="checkserver">
                        <div class="row">
                            <div class="form-group col-lg-6 offset-md-3">
                                <p class="alert" id="errormsg" style="color:#8a4246;background-color:#ffedb6;border: 2px dotted #ffd479;;border-radius:5px;padding:15px;margin-bottom:20px;"><?php echo "Before Update Check Your Server requiremnt for Update script.Check Your server php allow_url_fopen is enable,memory Limit More than 100M and max execution time is 300 or more";?></p>
                            </div>
                        </div>
                        <div class="offset-md-5">
                            <a href="<?php echo base_url('dashboard/autoupdate/cancel_update/').@$latest_version?>" class="btn btn-danger" ><i class="fa fa-wrench" aria-hidden="true"></i> Cancel update notification</a>

                            <button type="button" class="btn btn-success " onclick="checkserver()"><i class="fa fa-wrench" aria-hidden="true"></i> <?php echo "Check server";?></button>
                        </div>
                    </div>

                    <div id="serverok" style="display:none;">

                        <div class="row">
                            
                            <div class="form-group col-lg-6 offset-md-3">
                                <p class="alert" style="color:#8a4246;background-color:#ffedb6;border: 2px dotted #ffd479;;border-radius:5px;padding:15px;margin-bottom:20px;">Note: If you want to update software,you Must have immediate previous version.</p>
                                <p class="alert" style="color:#8a4246;background-color:#ffedb6;border: 2px dotted #ffd479;;border-radius:5px;padding:15px;margin-bottom:20px;"><?php echo display('notesupdate')?></p>
                                <p class="alert" style="color:#8a4246;background-color:#ffedb6;border: 2px dotted #ffd479;;border-radius:5px;padding:15px;margin-bottom:20px;">note: strongly recomanded to backup your <b>SOURCE FILE</b> and <b>DATABASE</b> before update. <a href="<?php echo base_url('dashboard/autoupdate/download_backup')?>" class="btn btn-primary">Download Database</a></p>
                                
                                <label><?php echo display('purchase_key')?><span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="purchase_key">
                            </div>


                            <div class="form-group col-lg-6 offset-md-3">                           
                                <label><?php echo "Select Version";?><span class="text-danger">*</span></label>
                                <select name="version"  class="form-control">
                                <option value="" selected="selected"><?php echo display('select') ?></option>
                                    <?php $start=$latest_version-0.3;
                                    for($i=$current_version+0.1;$i<=$latest_version;$i+=0.1){
                                    ?>
                                    <option value="<?php echo number_format((float)$i, 1, '.', '');?>"><?php echo "news365-v".number_format((float)$i, 1, '.', '');?></option>
                                    <?php } ?>
                                   
                                  </select>
                                  <p><a href="https://forum.bdtask.com" target="_blank">Do you Need support?</a> </p>
                            </div>

                        </div> 


                        <div>
                            <button type="submit" class="btn btn-success offset-md-3" onclick="return confirm('are you sure want to update?')"><i class="fa fa-wrench" aria-hidden="true"></i> <?php echo display('update')?></button>
                        </div>

                    </div>

                <?php echo form_close() ?>

                <?php } else{  ?>
                    <div class="row">
                        <div class="form-group col-md-4 offset-md-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert alert-success text-center" style="font-size:18px;line-height: 28px;"><?php echo display('current_version')?> <br>V-<?php echo $current_version ?></div>
                                    <h2 class="text-center"><?php echo display('noupdates')?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
         
    </div>
</div>


<script type="text/javascript">
    
"use strict";

function checkserver(){
    var datavalue = 'check=0';
    $.ajax({
            type: "POST",
            url: "<?php echo base_url()?>dashboard/autoupdate/checkserver",
            data: datavalue,
            success: function(data){
                if(data==0){
                swal("Warming", "Your php allow_url_fopen is currently Disable.Check Your server php allow_url_fopen is enable,memory Limit More than 100M and max execution time is 300 or more", "warning");  
                }
                else{
                    $("#checkserver").hide();
                    $("#serverok").show();
                    }
            }
        });
}


</script>

