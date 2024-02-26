

                 <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('404_page_setting')?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">



                        <?php echo form_open_multipart('settings/view_setup/save_page_setup_404')?>
                            
                       

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label><?php echo display('heading')?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="heading" class="form-control" value="<?php echo (@$setting404->heading)?>">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label><?php echo display('details')?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea name="details" class="form-control" ><?php echo html_escape(@$setting404->details)?></textarea>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label><?php echo makeString(['404','image'])?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="file" name="upimg" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-3"><label><?php echo makeString(['preview'])?></label></div>
                                    <div class="col-sm-9">
                                        <?php
                                            echo '<img src="' . base_url() . html_escape(@$setting404->img404) . '" width="200" >';
                                        ?>
                                    </div>
                                </div>


                                <input type="hidden" name="img404_old" value="<?php echo html_escape(@$setting404->img404)?>">

                                 
                                <div class="row form-group">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <button type="submit"  class="btn btn-sm btn-success"> <?php echo display('update')?></button>
                                    </div>
                                </div> 

                                              
                        <?php echo form_close();?>

                    </div>
                </div>
            