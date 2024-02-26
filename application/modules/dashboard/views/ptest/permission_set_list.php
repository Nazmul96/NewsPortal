<div class="card mb-4">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="fs-17 font-weight-600 mb-0"><?php echo (!empty($title)?$title:null) ?></h6>
            </div>
            <div class="text-right">
                <div class="actions">
                    <a href="<?php echo base_url()?>dashboard/permission_setup" class="btn btn-sm btn-info pull-right "> Add Menu Item</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">

        <div class="">
            <table class=" table table-bordered table-hover">
                <thead>
                    <tr>
                        <th><?php echo display('sl_no') ?></th>
                        <th>Menu title</th>
                        <th>Page_url</th>
                        <th>Module</th>
                        <th>Parent menu</th>
                        <th><?php echo display('status') ?></th>
                        <th ><?php echo display('action') ?></th> 
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($menu_item_list)) ?>
                    <?php $sl = 1; ?>
                    <?php foreach ($menu_item_list as $value) { 
                        $parent = $this->db->select('menu_title')->where('menu_id',$value->parent_menu)->get('sec_menu_item')->row();
                    ?>
                    <tr>
                        <td><?php echo $sl++; ?></td>
                       <td><?php echo $value->menu_title; ?></td>
                        <td><?php echo $value->page_url; ?></td>
                        <td><?php echo $value->module; ?></td>
                        <td><?php echo @$parent->menu_title; ?></td>
                        <td><?php echo (($value->is_report==1)?'Is Report':'Not Report'); ?></td>
                        <td>
                            <a href="<?php echo base_url("dashboard/permission_setup/edit/$value->menu_id") ?>" class="btn btn-info btn-xs"><i class="fas fa-edit" aria-hidden="true"></i></a>
                            <a href="<?php echo base_url("dashboard/permission_setup/delete/$value->menu_id") ?>" onclick="return confirm('<?php echo display("are_you_sure") ?>')" class="btn btn-danger btn-xs"><i class="fas fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php } ?> 
                </tbody>
            </table>
            <?php echo @$links;?>
        </div>
    </div>
</div>



 