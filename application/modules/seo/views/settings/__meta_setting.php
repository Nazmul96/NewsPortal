

                 <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['meta','settings'])?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php echo form_open('seo/seo_controller/meta_update')?>
                            
                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label><?php echo makeString(['fixt','meta','keyword'])?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea name="meta_tag" class="form-control" ><?php echo html_escape(@$meta->meta_tag)?></textarea>
                                    </div>
                                </div> 

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label><?php echo makeString(['meta','description'])?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea name="meta_description" class="form-control" ><?php echo html_escape(@$meta->meta_description)?></textarea>
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label><?php echo makeString(['google','analytics','id'])?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="google_analytics" value="<?php echo html_escape(@$meta->google_analytics);?>" class="form-control">
                                    </div>
                                </div>

                               
                                <div class="row form-group">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <button type="submit"  class="btn btn-sm btn-success"> <?php echo display('update')?></button>
                                    </div>
                                    
                                </div> 
                                              
                            <?php echo form_close();?>

                    </div>
                </div>
          