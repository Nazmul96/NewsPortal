

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['edit']); ?> <?php echo makeString(['category']); ?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                            <?php echo form_open_multipart('categories/category/update_category/'.$cate_info->category_id);?>
                            <div class="col-md-4 ">
                                <div class="form-group">
                                       <label><?php echo display('category_name');?><span class="text-danger">*</span></label>
                                       <input type="text" class="form-control" name="category_name" value="<?php echo html_escape($cate_info->category_name)?>" required>
                                </div>
                            </div>

                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <label><?php echo display('slug');?></label>
                                    <input type="text" class="form-control " name="slug" value="<?php echo html_escape($cate_info->slug)?>">
                                </div>
                            </div>
                           

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo display('category_image');?>(1350*350 & max size 1MB)  </label>
                                    <?php if(!empty($cate_info->category_image)){?>
                                        <img src="<?php echo base_url($cate_info->category_imgae);?>" width="100%">
                                    <?php }?>
                                    <input type="file" name="cate_pic" id="file_select_machin" class="form-control input-sm" accept="image/*" /> 
                                    <input type="hidden" name="pic" value="<?php echo html_escape($cate_info->category_imgae);?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-md btn-success" name="" value="<?php echo display('update');?>">
                                </div> 
                            </div>
                                              
                        <?php echo form_close();?>
                     </div>
                </div>
           