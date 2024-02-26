

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['reporter','list'])?></h6>
                            </div>
                            <div class="form-group">
                                  
                              <a href="<?php echo base_url('reporter/reporters/registration')?>" class="btn btn-md btn-success  float-right"><?php echo makeString(['add','new','reporter'])?></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                      <div class="table-responsive">

                        <table class="table table-bordered table-striped table-hover bg-white m-0 card-table">

                         
                          <thead>
                               <tr>
                                    <th><?php echo display('sl')?></th>
                                    <th><?php echo display('picture')?></th>
                                    <th><?php echo display('full_name')?></th>
                                    <th><?php echo display('mobile')?></th>
                                    <th><?php echo display('email')?></th>
                                    <th><?php echo display('address')?></th>
                                    <th><?php echo display('status')?></th>
                                    <th width="120"><?php echo display('action')?></th>
                                </tr>
                          </thead>
                         <tbody>
                           <?php
                           $s=1;
                           foreach ($query as  $repoter_list) { 

                            if($repoter_list['photo']){
                                  $image = "<img src='".base_url(). html_escape($repoter_list['photo'])."' width='50'>";
                                }else{
                                  $image = "<img src='".base_url('uploads/user/demo-pic.png')."' width='50'>";
                            }


                            ?>
                            <tr>
                              <td><?php echo $s++;?></td>
                              <td> <?php echo @$image;?>  </td>
                              <td><?php echo html_escape($repoter_list['name']);?></td> 
                              <td><?php echo html_escape($repoter_list['mobile']);?></td> 
                              <td><?php echo html_escape($repoter_list['email']);?></td> 
                              <td><?php echo html_escape($repoter_list['address_one']);?></td>
                              
                                <td>
                                  <?php if($this->permission->check_label('repoter_list')->update()->access()):?>

                                  <a href="<?php echo base_url(); ?>reporter/reporters/repoter_status_edit/<?php echo html_escape($repoter_list['id']) . '/' . $repoter_list['status']; ?>" class="btn btn-sm btn-success">
                                      <?php echo (html_escape($repoter_list['status']) == 1) ? "Active" : "InActive";?>
                                  </a>
                                <?php endif?>
                                </td> 

                              <td>
                                <?php if($this->permission->check_label('repoter_list')->update()->access()):?>
                                <a href="<?php echo base_url(); ?>reporter/reporters/repoter_edit/<?php echo html_escape($repoter_list['id']); ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                <?php endif;?>
                                <?php if($this->permission->check_label('repoter_list')->delete()->access()):?>
                                <a  onclick="return confirm('<?php echo display('do_you_want_to_delete_this')?>')"  href="<?php echo base_url(); ?>reporter/reporters/repoter_delete/<?php echo html_escape($repoter_list['id']); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                <?php endif;?>
                              </td> 
                             
                            </tr>
                           <?php }?>
                         </tbody>
                        </table>
                       </div>
                     </div>
                </div>
            