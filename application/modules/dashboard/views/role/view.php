

<div class="card mb-4">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="fs-17 font-weight-600 mb-0"><?php echo (!empty($title)?$title:null) ?></h6>
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

                    <div class="form-group row">
                        <label for="blood" class="col-sm-2"><?php echo display('role_name') ?> : </label>
                        <div class="col-sm-10">
                            <?php echo $role->role_name ?> 
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="blood" class="col-sm-2"><?php echo display('description') ?> : </label>
                        <div class="col-sm-10">
                            <?php echo $role->role_description ?> 
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo display('sl_no') ?></th>
                                <th><?php echo display('module_name') ?></th>
                                <th><?php echo display('create') ?></th>
                                <th><?php echo display('read') ?></th>
                                <th><?php echo display('update') ?></th>
                                <th><?php echo display('delete') ?></th> 
                            </tr>
                        </thead>
                        <?php $sl = 1 ?>
                        <?php if (!empty($permission)) ?>
                        <?php foreach ($permission as $value) { ?> 
                        <tbody>
                            <tr>
                                <td><?php echo ($sl++) ?></td>
                                <td><?php echo $value->module_name ?></td>
                                <td class="text-center"><?php echo (($value->create_permission==1)?"<i class='fa fa-check text-success'></i>":"<i class='fa fa-times text-danger'></i>") ?></td> 
                                <td class="text-center"><?php echo (($value->view_permission==1)?"<i class='fa fa-check text-success'></i>":"<i class='fa fa-times text-danger'></i>") ?></td> 
                                <td class="text-center"><?php echo (($value->update_permission==1)?"<i class='fa fa-check text-success'></i>":"<i class='fa fa-times text-danger'></i>") ?></td> 
                                <td class="text-center"><?php echo (($value->delete_permission==1)?"<i class='fa fa-check text-success'></i>":"<i class='fa fa-times text-danger'></i>") ?></td> 
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>


    </div>
</div>


