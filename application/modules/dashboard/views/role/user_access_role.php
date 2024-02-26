
<div class="card mb-4">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="fs-17 font-weight-600 mb-0"><?php echo (!empty($title)?$title:null) ?></h6>
            </div>
            <div class="text-right">
                <div class="actions">
                    <a href="<?php echo base_url('dashboard/role/assign_role_to_user');?>" class="btn btn-primary my-modal pull-right" >
                      <i class="fas fa-plus"></i> <?php echo display('add')?>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-hover">

            <thead>
                <tr>
                    <th><?php echo display('name') ?></th>
                    <th><?php echo display('role_name') ?></th>
                    <th><?php echo display('action') ?></th>
                </tr>
            </thead>
            
            <tbody>
                <?php  foreach($acc as $val){
                    ?>
                    <tr>
                        <td><?php echo $val->name?></td>
                        <td><?php echo @$val->role_name?></td>
                        <td>  
                            <a href="<?php echo base_url("dashboard/role/edit_access_role/$val->role_acc_id")?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <a href="<?php echo base_url("dashboard/role/delete_access_role/$val->role_acc_id")?>" class="btn btn-danger btn-sm"><i class="fas fa-trash "></i> Delete</a>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table> 
    </div>
</div>


<?php $this->load->view('dashboard/model_script/role_access_script');?>



 