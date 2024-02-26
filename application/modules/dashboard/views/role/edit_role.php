
<div class="card mb-4">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="fs-17 font-weight-600 mb-0"><?php echo (!empty($title)?$title:null) ?></h6>
            </div>
            <div class="text-right">
                <div class="actions">
                    <a href="#" class="action-item"><i class="ti-reload"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">

        <?php echo form_open("dashboard/role/save_update") ?>
            <div class="panel-body">

                    <div class="form-group row">
                        <label for="role_name" class="col-md-3 col-form-label"><?php echo display('role_name') ?> <i class="text-danger">*</i></label>
                        <div class="col-md-9">
                            <input name="role_name" type="text" class="form-control" id="role_name" value="<?php echo $roleData->role_name?>"  >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role_description" class="col-md-3 col-form-label"><?php echo display('description') ?> <i class="text-danger">*</i></label>
                        <div class="col-md-9">
                            <textarea class="form-control" rows="2" name="role_description" id="role_description"><?php echo $roleData->role_description?></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="role_id" value="<?php echo $roleData->role_id?>">
                    <?php $m = 0; ?>                  
                    <?php foreach ($modules as $value) { 


                        
                    $menu_item = $this->db->select('*')->from('sec_menu_item')->where('module',$value->module)->where('page_url !=','')->get()->result();
                        ?>
                                    <input type="hidden" name="module[]" value="<?php echo $value->module;?>">
                    <table class="table table-bordered table-hover" id="RoleTbl">
                        <h2><?php echo display($value->module)?></h2>
                        <thead>
                            <tr>
                                <th><?php echo display('sl_no') ?></th>
                                <th>Menue Title</th>
                                <th>
                                    Can Create
                                    <label for="<?php echo $value->module; ?>_can_create_all" class="float-right">
                                        <span class="select_cls"><strong>All</strong></span>
                                        <input type="checkbox" id="<?php echo $value->module; ?>_can_create_all" class="can_create_all" value="<?php echo $value->module; ?>">
                                    </label>
                                </th>
                                <th>Can read
                                    <label for="<?php echo $value->module; ?>_can_read_all" class="float-right">
                                        <span class="select_cls"><strong>All</strong></span>
                                        <input type="checkbox" id="<?php echo $value->module; ?>_can_read_all" class="can_read_all" value="<?php echo $value->module; ?>">
                                    </label>
                                </th>
                                <th>Can Edit
                                    <label for="<?php echo $value->module; ?>_can_edit_all" class="float-right">
                                        <span class="select_cls"><strong>All</strong></span>
                                        <input type="checkbox" id="<?php echo $value->module; ?>_can_edit_all" class="can_edit_all" value="<?php echo $value->module; ?>">
                                    </label>
                                </th>
                                <th>Can Delete
                                    <label for="<?php echo $value->module; ?>_can_delete_all" class="float-right">
                                        <span class="select_cls"><strong>All</strong></span>
                                        <input type="checkbox" id="<?php echo $value->module; ?>_can_delete_all" class="can_delete_all" value="<?php echo $value->module; ?>">
                                    </label>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($menu_item)) ?>
                            <?php $sl = 0; ?>
                            <?php foreach ($menu_item as $menu) { 

                              
                                $ck_data = $this->db->select('*')
                                ->where('menu_id',$menu->menu_id)
                                ->where('role_id',$roleData->role_id)->get('sec_role_permission')->row();
                            ?>
                            <tr>
                                <td><?php echo $sl+1; ?></td>
                                <td class="text-<?php echo ($menu->parent_menu?'right':'')?>"><?php echo display($menu->menu_title); ?></td>
                                <td>
                                    <div class="checkbox checkbox-success text-center">
                                        <input type="checkbox" name="create[<?php echo $m?>][<?php echo $sl ?>][]" value="1" <?php echo ((@$ck_data->can_create==1)?"checked":null) ?> id="create[<?php echo $m?>]<?php echo $sl?>" class="sameChecked <?php echo $menu->module; ?>_can_create">
                                        <label for="create[<?php echo $m?>]<?php echo $sl ?>"></label>
                                    </div>
                                </td>
                                
                                <td>
                                    <div class="checkbox checkbox-success text-center">
                                        <input type="checkbox" name="read[<?php echo $m?>][<?php echo $sl ?>][]" value="1" <?php echo ((@$ck_data->can_access==1)?"checked":null) ?> id="read[<?php echo $m?>]<?php echo $sl?>" class="sameChecked <?php echo $menu->module; ?>_can_read">
                                        <label for="read[<?php echo $m?>]<?php echo $sl ?>"></label>
                                    </div>
                                </td> 
                                <td>
                                    <div class="checkbox checkbox-success text-center">
                                       <input type="checkbox" name="edit[<?php echo $m?>][<?php echo $sl ?>][]" value="1" <?php echo ((@$ck_data->can_edit==1)?"checked":null) ?> id="edit[<?php echo $m?>]<?php echo $sl?>" class="sameChecked <?php echo $menu->module; ?>_can_edit">
                                        <label for="edit[<?php echo $m?>]<?php echo $sl ?>"></label>
                                    </div>
                                </td> 
                                <td>
                                    <div class="checkbox checkbox-success text-center">
                                        <input type="checkbox" name="delete[<?php echo $m?>][<?php echo $sl ?>][]" value="1" <?php echo ((@$ck_data->can_delete==1)?"checked":null) ?> id="delete[<?php echo $m?>]<?php echo $sl?>" class="sameChecked <?php echo $menu->module; ?>_can_delete">
                                        <label for="delete[<?php echo $m?>]<?php echo $sl ?>"></label>
                                    </div>
                                </td>

                                <input type="hidden" name="menu_id[<?php echo $m?>][<?php echo $sl ?>][]" value="<?php echo $menu->menu_id?>">
                               
                            </tr>
                            <?php $sl++ ?>
                            <?php } ?>
                            
                        </tbody>
                    </table>
                    <?php $m++ ?>
                    <?php } ?>

                    <div class="form-group text-right">
                       <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                    </div>


            </div>
            <?php echo form_close();?>
            
    </div>
</div>



<script type="text/javascript" src="<?php echo base_url(); ?>application/modules/dashboard/assets/js/script.js"></script>