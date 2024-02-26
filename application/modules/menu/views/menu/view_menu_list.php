

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['menu','list'])?></h6>

                            </div>
                                <button class="btn btn-success float-right" onclick="addNewmenu()"><i class="fa fa-plus"></i><?php echo display('add_menu')?></button>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                        <table id="table" class="table table-bordered">
                            <tr class="t_bg">
                                <th align="center"><?php echo display('sl')?></th>
                                <th align="center"><?php echo display('menu')?></th>
                                <th align="center"><?php echo display('position')?></th>
                                <th align="center"><?php echo display('status')?></th>
                                <th align="center"><?php echo display('setup')?></th>
                                <th><?php echo makeString(['mobile'])?></th>
                                <th colspan="2"><?php echo display('action')?></th>
                            </tr>


                                <?php
                                    $sl = 1;
                                    foreach ($menu as $value) {             
                                ?>
                                    <tr>
                                        <th align="center"><?php echo $sl; ?></th>
                                        <th align="center"><?php echo html_escape($value->menu_name);?></th>
                                        <td align="center"><?php echo html_escape($value->menu_position);?></td>
                                
                                        <td align="center">
                                         <a class="btn btn-labeled btn-success mb-2 mr-1" href="<?php echo base_url(); ?>menu/menu/udate_status/<?php echo html_escape($value->menu_id) . '/' . html_escape($value->status); ?>">
                                         <?php echo ($value->status == 0) ? "Unpublish" : "Publish";?>
                                         </a>
                                        </td>

                                        <td align="center">
                                            <?php if($this->permission->check_label('menu_setup')->update()->access()):?>
                                            <a class="btn btn-primary" href="<?php echo base_url();?>menu/menu/setup_menu_content/<?php echo html_escape($value->menu_id)?>" > Setup</a>
                                            <?php endif?>
                                        </td>

                                        <td>
                                            <?php if($this->permission->check_label('menu_setup')->update()->access()):?>
                                            <a class="btn btn-sm btn-<?php echo ($value->mobile_status==0?'danger':'success');?>" href="<?php echo base_url();?>menu/menu/setup_mobile_menu/<?php echo html_escape($value->menu_id) . '/' . html_escape($value->mobile_status)?>"><?php echo ($value->mobile_status=='0'?'OFF':'ON');?></a>
                                        <?php endif?>
                                        </td>
                                        <?php if($this->permission->check_label('menu_setup')->update()->access()):?>
                                        <th width="70"><a onclick="editMainMenu(<?php echo $value->menu_id?>)" href="javascript:void(0)" ><i class="fa fa-edit fa-2x"></i></a></th>
                                         <?php endif?>
                                        <?php if($this->permission->check_label('menu_setup')->delete()->access()):?>
                                        <th width="70"><a onclick="deleteMainMenu(<?php echo $value->menu_id?>)" href="javascript:void(0)" ><i class="fa fa-trash fa-2x text-danger"></i></a></th>
                                        <?php endif?>
                                    </tr>
                                    <?php
                                    $sl++;
                                }
                                ?>
                            </table>
                        </div>


                     </div>
                </div>
            


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
                                $attributes = array('id'=>'menuForm');
                                echo form_open_multipart('#', $attributes);
                            ?>
                            <div class="modal-body">

                                <input type="hidden" value="" id='id' name="id"/> 
                                <input type="hidden" value="" id="actionurl"/> 

                                <div class="form-body">
                                    <div class="col-md-12 pr-md-1">
                                        <div class="form-group pr-md-1">
                                            <label class="font-weight-600"><?php echo display('menu_name')?><span class="text-danger">*</span></label>
                                            <input name="menu_name" id="menu_name" placeholder="<?php echo display('menu_name')?>" class="form-control" type="text" required="">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12 pr-md-1">
                                        <div class="form-group pr-md-1">
                                            <label class="font-weight-600"><?php echo display('menu_position')?><span class="text-danger">*</span></label>
                                            <select class="form-control" name="position" id="position" required="">
                                                <option value="">--<?php echo display('select')?>--</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" id="btnSave" onclick="saveMainMenu()" class="btn btn-primary"><?php echo display('save')?></button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo display('close')?></button>
                            </div>

                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>


                <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">

                <script src="<?php echo base_url()?>assets/dist/js/menu_setup.js"></script>

