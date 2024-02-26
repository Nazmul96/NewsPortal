
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="fs-17 font-weight-600 mb-0">Newsletter cron jobs url</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div  style="margin: 0px 0px 10px 0px; background: #997300;padding: 10px;color: #fff;border: 3px dashed #1c506c;">
                            <p>curl --request GET <?php echo base_url();?>news/rssdataimporter/getDataSaver/ 
                            <br> <strong> <i class="fas fa-exclamation-triangle"></i></strong>
                               Copy url and set cron jobs in your cPanel </p>
                        </div>
                    </div>
                </div>




                <div class="card mb-4">

                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['rss_setup'])?></h6>
                            </div>
                            <button class="btn btn-success float-right" onclick="addNew()"><i class="fa fa-plus"></i> <?php echo display('add_new_link')?></button>
                        </div>
                    </div>

                    <div class="card-body">


                        <div class="table-responsive">
                            <table id="table" class="table table-bordered">

                                <tr class="t_bg">
                                    <th align="center"><?php echo display('sl')?></th>
                                    <th align="center"><?php echo display('rss_feed_title')?></th>
                                    <th align="center"><?php echo display('rss_feed_link')?></th>
                                    <th align="center"><?php echo display('post_number')?></th>
                                    <th align="center"><?php echo display('post_category')?></th>
                                    <th align="center"><?php echo display('status')?></th>
                                    <th colspan="2"><?php echo display('action')?></th>
                                </tr>


                                <?php
                                    $sl = 1;
                                    foreach ($links as $value) {             
                                ?>
                                    <tr>
                                        <th align="center"><?php echo $sl; ?></th>
                                        <th align="center"><?php echo html_escape($value->feed_name);?></th>
                                        <th align="center"><?php echo html_escape($value->rss_link);?></th>
                                        <td align="center"><?php echo html_escape($value->post_number);?></td>
                                        <td align="center"><?php echo html_escape($value->category_name);?></td>
                                
                                        <td align="center">
                                            <a class="btn btn-labeled btn-<?php echo ($value->status == 0) ? "danger" : "success";?> mb-2 mr-1 text-white"> <?php echo ($value->status == 0) ? "Inactive" : "Active";?></a>
                                        </td>
                                        <th width="70"><a onclick="editLink(<?php echo $value->id?>)" href="javascript:void(0)" ><i class="fa fa-edit fa-2x"></i></a></th>
                                        <th width="70"><a onclick="deleteLink(<?php echo $value->id?>)" href="javascript:void(0)" ><i class="fa fa-trash fa-2x text-danger"></i></a></th>
                                       
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
                                $attributes = array('id'=>'linkForm');
                                echo form_open_multipart('#', $attributes);
                            ?>
                            <div class="modal-body">

                                <input type="hidden" value="" id='id' name="id"/> 
                                <input type="hidden" value="" id="actionurl"/> 

                                <div class="form-body">

                                    <div class="col-md-12 pr-md-1">
                                        <div class="form-group pr-md-1">
                                            <label class="font-weight-600"><?php echo display('rss_feed_title')?><span class="text-danger">*</span></label>
                                            <input type="text" name="feed_name" placeholder="<?php echo display('rss_feed_title')?>" class="form-control" required="1" >
                                            <span class="help-block"></span>
                                        </div>
                                    </div>


                                    <div class="col-md-12 pr-md-1">
                                        <div class="form-group pr-md-1">
                                            <label class="font-weight-600"><?php echo display('rss_feed_link')?><span class="text-danger">*</span></label>
                                            <input name="rss_link" id="rss_link" placeholder="<?php echo display('rss_feed_link')?>" class="form-control" type="text" required="">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>


                                    <div class="col-md-12 pr-md-1">
                                        <div class="form-group pr-md-1">
                                            <label class="font-weight-600"><?php echo display('post_number')?><span class="text-danger">*</span></label>
                                            <input name="post_number" id="post_number" placeholder="<?php echo display('post_number')?>" class="form-control" type="text" required="">
                                            <span>How many posts geting this link</span>
                                        </div>
                                    </div>


                                    <div class="col-md-12 pr-md-1">
                                        <div class="form-group pr-md-1">
                                            <label class="font-weight-600"><?php echo display('post_category')?><span class="text-danger">*</span></label>
                                            <select name="category_slug" class="form-control">
                                                <option value="">--<?php echo display('select')?>--</option>
                                                <?php foreach($categories as $cata){?>
                                                    <option value="<?php echo $cata->slug?>"><?php echo html_escape($cata->category_name)?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>




                                    <div class="col-md-12 pr-md-1">
                                        <div class="form-group pr-md-1">
                                            <label class="font-weight-600"><?php echo display('status')?><span class="text-danger">*</span></label>
                                            
                                            <select name="status" id="status" class="form-control">
                                                <option value="1"><?php echo display('active')?></option>
                                                <option value="0"><?php echo display('inactive')?></option>
                                            </select>

                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" id="btnSave" onclick="saveRssLink()" class="btn btn-primary"><?php echo display('save')?></button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo display('close')?></button>
                            </div>

                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="" id="base_url" value="<?php echo base_url();?>">

<script src="<?php echo base_url(); ?>application/modules/RSS_Feed/assets/js/rssjs.js"></script>
