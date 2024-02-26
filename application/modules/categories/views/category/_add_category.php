
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('add_category');?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                           <?php echo form_open_multipart('categories/category/save_category');?>

                            <div class="col-md-4 ">
                                <div class="form-group">
                                       <label><?php echo display('category_name');?> <span class="text-danger">*</span></label>
                                       <input type="text" class="form-control " name="cat_name" required="">
                                 </div>
                            </div>

                            <div class="col-md-4 ">
                                <div class="form-group">
                                       <label><?php echo display('slug');?></label>
                                       <input type="text" class="form-control " name="slug">
                                 </div>
                            </div>

                            
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <div class="form-group">
                                    <label><?php echo display('category_image');?>(1350*350 & max size 1MB)  </label>
                                    <input type="file" name="cate_pic" id="file_select_machin" class="form-control input-sm" accept="image/*"/> 
                                </div>
                                </div>
                            </div>

                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-md btn-success" value="<?php echo display('save');?>">
                                </div> 
                            </div>
                                              
                        <?php echo form_close();?>

                     </div>
                </div>
           