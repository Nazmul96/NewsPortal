
<div class="card mb-4">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['role','list'])?></h6>
            </div>
            <div class="text-right">
                <div class="actions">
                    <a  class="btn btn-primary my-modal float-right"  href="<?php echo base_url()?>dashboard/role/create_system_role" >
                      <?php echo makeString(['add','role'])?>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-hover" id="RoleTbl">
            <thead>
                <tr>
                    <th><?php echo display('sl_no') ?></th>
                    <th><?php echo display('role_name') ?></th>
                    <th><?php echo display('description') ?></th>
                    <th><?php echo display('action') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($role_list)) ?>
                <?php $sl = 1; ?>
                <?php foreach ($role_list as $value) { ?>
                <tr>
                    <td><?php echo $sl++; ?></td>
                    <td><?php echo $value->role_name; ?></td>
                    <td><?php echo $value->role_description; ?></td>
                    <td>
                        <a href="<?php echo base_url("dashboard/role/edit_role/$value->role_id") ?>"  data-toggle="tooltip" data-placement="left" title="Update" class="btn btn-success btn-sm"><i class="fas fa-edit" aria-hidden="true"></i></a>
                        <a href="<?php echo base_url("dashboard/role/delete_role/$value->role_id") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="fas fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
                <?php } ?>
                
            </tbody>
        </table>

    </div>
</div>






 