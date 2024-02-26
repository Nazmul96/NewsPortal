
                <div class="card mb-4">
                    
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('maximum_archive_settings')?></h6>
                            </div>
                            <button class="btn btn-success float-right" onclick="addNew()"><i class="fa fa-plus"></i>Add New Category</button>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php
                            echo form_open('archive/archive/save_max_archive_settings');
                        ?>

                        <div class="table-responsive">
                        
                            <table class="table table-bordered table-striped table-hover" id="table">
                                <tr>
                                    <th>#</th>
                                    <th><?php echo display('category');?></th>
                                    <th ><?php echo display('maximum_news');?></th>
                                    <th ><?php echo display('available_for_archive');?></th>
                                    <th ><?php echo display('action');?></th>
                                </tr>

                                <?php
                                $i = 0;
                                if (isset($categories) && is_array($categories)) {
                                    foreach ($categories as $key => $value) {
                                ?>
                                        <tr>
                                            <td><?php echo ++$i; ?></td>
                                            <td><?php echo html_escape($value->category_name); ?></td>
                                            <td><input type="number" class="form-control" name="<?php echo html_escape($value->category_id); ?>" value="<?php echo ($value->max_archive == '') ? 0 : $value->max_archive; ?>"></td>
                                            <td><h4><div class="btn btn-<?php echo html_escape($value->available_for_archive) > 0 ? "success" : "warning"; ?>"><?php echo html_escape($value->available_for_archive) <= 0 ? 0 : $value->available_for_archive; ?></div></h4></td>
                                            <td>
                                                <button type="button" class="btn btn-primary archive_modal <?php echo html_escape($value->available_for_archive) <= 0 ? "disabled" : ""; ?>" id="<?php echo html_escape($value->category_id) . '~' . $value->available_for_archive; ?>"
                                                 data-toggle="modal" data-target="<?php echo html_escape($value->available_for_archive) <= 0 ? "disabled" : "#myModal"; ?>">
                                                    <?php echo display('archive');?>
                                                </button>
                                                <button type="button" class="btn btn-danger" onclick="deleteCat('<?php echo  $value->category_id?>')"><?php echo display('delete');?></button>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="4" class="text-right"><input type="submit" value="<?php echo display('update');?>" class="btn btn-success btn-lg" name="update"></td>
                                </tr>
                            </table>
                        </div>
                        <?php echo form_close();?>
                    </div>

                </div>

                
            <!-- Modal -->
            <div class="modal fade" id="myModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-600" id="myModalLabel"><?php echo display('archive_news')?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                      
                        <div class="modal-body">
                            <span id="processing"></span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success progress-bar-striped archive_process" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-lg a margin-top10" id="start_archive"><?php echo display('start_archive')?></button>
                            <br>

                            <div class="archive_status d-none">
                                <div class="alert alert-success">
                                    <button class="close" data-dismiss="alert">&times;</button>
                                    <i class="fa fa-check fa-2x text-left" ></i>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo display('close')?></button>
                        </div>
                    </div>
                </div>
            </div>


            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
            <script src="<?php echo base_url()?>assets/dist/js/menu_setup.js"></script>


                <!-- Modal -->
                <div class="modal fade" id="modal_form"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-600" id="myModalLabel">model title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <?php 
                                $attributes = array('id'=>'addForm');
                                echo form_open_multipart('#', $attributes);
                            ?>

                            <div class="modal-body">

                                <input type="hidden" value="" id='id' name="id"/> 
                                <input type="hidden" value="" id="actionurl"/> 

                                <div class="form-body">

                                    <div class="col-md-12 pr-md-1">
                                        <div class="form-group pr-md-1">
                                            <label class="font-weight-600">Post Category<span class="text-danger">*</span></label>
                                            <select name="category_id" class="form-control">
                                                <option value="">--<?php echo display('select')?>--</option>
                                                <?php foreach($categorys as $cata){?>
                                                    <option value="<?php echo $cata->category_id?>"><?php echo html_escape($cata->category_name)?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" id="btnSave" onclick="saveCategory()" class="btn btn-primary"><?php echo display('save')?></button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo display('close')?></button>
                            </div>

                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="" id="base_url" value="<?php echo base_url();?>">


            <script src="<?php echo base_url(); ?>application/modules/archive/assets/js/archivejs.js"></script>
    


