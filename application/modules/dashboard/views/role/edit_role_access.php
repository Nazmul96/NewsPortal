


<div class="card mb-4">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['edit','user','access','role'])?></h6>
            </div>
            <div class="text-right">
                <div class="actions">
                    <a href="<?php echo base_url('dashboard/role/user_access_role')?>" type="button" class="btn btn-primary my-modal " >
                      <i class="fa fa-plus"></i><?=display('add')?>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">

                <!-- <form method="POST" id="dataform">  -->
                <?php echo form_open("dashboard/role/update_access_role", array('name'=>'role_acc')); ?>

                                <div class="form-body">
                                    

                                    <div class="col-md-12 pr-md-1">
                                        <div class="form-group pr-md-1">
                                            <label class="font-weight-600"><?php echo display('user')?><span class="text-danger">*</span></label>
                                               <select class="form-control" name="user_id" id="user_id" required="">
                                                    <option value="">--<?= makeString(['select'])?>--</option>
                                                    <?php 
                                                       foreach($user as $val){
                                                        echo '<option value="'.$val->id.'">'.$val->name.'.</option>';
                                                    }
                                                    ?>
                                                </select>

                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12 pr-md-1">
                                        <div class="form-group pr-md-1">
                                            <label class="font-weight-600"><?php echo display('role')?><span class="text-danger">*</span> : </label>

                                            <?php foreach($role as $val){ 
                                                $ck = $this->db->where('fk_user_id',$info->fk_user_id)->where('fk_role_id',$val->role_id)->get('sec_user_access_tbl')->num_rows();
                                            ?>
                                                <label class="radio-inline">
                                                    <input type="checkbox" name="role[]" <?php echo ($ck?'checked':'')?> value="<?php echo $val->role_id;?>"> <?php echo $val->role_name;?>
                                                </label> 
                                            <?php } ?>
                                            
                                            <span class="help-block"></span>
                                        </div>
                                    </div>


                                </div>




                            <div class="float-right">
                                <button type="submit" class="btn btn-primary save_btn save"><?=display('update')?></button>
                            </div>


                <!-- </form>  -->
                <?php echo form_close(); ?>
                

    </div>
</div>





<script type="text/javascript">
    document.forms['role_acc'].elements['user_id'].value="<?php echo $info->fk_user_id;?>";
    document.forms['role_acc'].elements['role_id'].value="<?php echo $info->fk_role_id?>";
</script>
 


 