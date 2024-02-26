

                <div class="card mb-4">

                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="fs-17 font-weight-600 mb-0">Subscribers cron jobs url</h6>
                        </div>
                    </div>

                    <div class="card-body">
                        <div  style="margin: 0px 0px 10px 0px; background: #997300;padding: 10px;color: #fff;border: 3px dashed #1c506c;">
                            <input type="text" class="form-control" value="curl --request GET <?php echo base_url();?>Sender/index" onClick="this.setSelectionRange(0, this.value.length)" />
                            <p>curl --request GET <?php echo base_url();?>Sender/index
                            <br> <strong> <i class="fas fa-exclamation-triangle"></i></strong>
                               Copy url and set cron jobs in your cPanel </p>
                        </div>
                        
                    </div>
                </div>



                <div class="card mb-4">
                    
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('subscribers');?> <?php echo display('list');?></h6>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="subscribers" class="table table-bordered table-hover">
                                
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc"><?php echo display('name')?></th>
                                        <th class="sorting"><?php echo display('email')?></th>
                                        <th class="sorting"><?php echo display('phone')?></th>
                                        <th class="sorting"><?php echo display('category')?></th>
                                        <th class="sorting"><?php echo display('frequency')?></th>
                                        <th class="sorting"><?php echo display('subscription_date')?></th>
                                        <th class="sorting"><?php echo display('action')?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach($subscription as $info){?>
                                        <tr role="row" class="odd">
                                            <td ><?php echo html_escape($info->name);?></td>
                                            <td><?php echo html_escape($info->email);?></td>
                                            <td><?php echo html_escape($info->phone);?></td>
                                            <td><?php 
                                                $cat = json_decode($info->category);
                                                foreach ($cat as $key => $v) {
                                                   echo '<span class="badge badge-success">'.$v.'</span> ';
                                                }
                                            ?></td>

                                            <td><?php 
                                                if ($info->frequency==1) {
                                                   echo '<span class="badge badge-success">'.display('daily').'</span>';
                                                }
                                                if ($info->frequency==7) {
                                                   echo '<span class="badge badge-success">'.display('weekly').'</span>';
                                                }
                                                if ($info->frequency==30) {
                                                   echo '<span class="badge badge-success">'.display('monthly').'</span>';
                                                }
                                            ?></td>

                                            <td><?php echo html_escape($info->subscription_date);?></td>

                                            <td>  
                                                <?php if($this->permission->check_label('subscribers')->update()->access()):?>
                                                <a href="<?php echo base_url()?>newsletter/subscriber_manage/delete/<?php echo  html_escape($info->subs_id);?>" onclick="return confirm('<?php echo display('do_you_want_to_delete_this')?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            <?php endif ?>
                                            </td>
                                        </tr>
                                      <?php }?>
                                </tbody>
                            </table>
                            <?php echo htmlspecialchars_decode(@$links);?>
                        </div>
                    </div>
                </div>
    