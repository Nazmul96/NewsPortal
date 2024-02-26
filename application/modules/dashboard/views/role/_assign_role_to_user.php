<div class="card mb-4">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="fs-17 font-weight-600 mb-0"><?php echo (!empty($title)?$title:null) ?></h6>
            </div>
            <div class="text-right">
                <div class="actions">
                    <a href="<?php echo base_url('dashboard/role/user_access_role')?>" type="button" class="btn btn-primary my-modal float-right" >
                      <i class="fas fa-plus"></i> <?php echo display('user_access_role')?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">

        <?php echo form_open("dashboard/role/save_role_access") ?>


                <div class="form-body">
                    <div class="col-md-12 pr-md-1">
                        <div class="form-group pr-md-1">
                            <label class="font-weight-600"><?php echo display('user')?><span class="text-danger">*</span></label>
                            <select class="form-control" name="user_id" id="user_id" required="">
                                <option value="">--<?= makeString(['select'])?>--</option>
                                <?php 
                                   foreach($user as $val){
                                    echo '<option value="'.$val->id.'">'.$val->name.'</option>';
                                }
                                ?>
                            </select>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="col-md-12 pr-md-1">
                        <div class="form-group pr-md-1">
                            <label class="font-weight-600"><?php echo display('role')?><span class="text-danger">*</span></label><br>
                            
                            <?php foreach($role as $val){ ?>
                                <label class="radio-inline">
                                    <input type="checkbox" name="role[]" value="<?php echo $val->role_id;?>"> <?php echo $val->role_name;?>
                                </label> 
                            <?php } ?>

                        </div>
                    </div>
                </div>

                <div class="form-group text-right">
                   <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                </div>


        <?php echo form_close();?>

    </div>
</div>









 
 