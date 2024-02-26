

                 <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['social','page'])?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">



                            <?php echo form_open('seo/seo_controller/update_social_pages');?>

                                    <div class="form-group row">
                                        <div class="col-sm-3"><label><?php echo makeString(['facebook','page','url'])?></label></div>
                                        <div class="col-sm-7">
                                            <input type="text" name="fb" class="form-control" value="<?php echo html_escape(@$social_page->fb); ?>">
                                        </div>                                        
                                    </div>   

                                    <!--twitter-->
                                    <div class="form-group row">
                                        <div class="col-sm-3"><label><?php echo makeString(['twitter','page','url'])?></label></div>
                                        <div class="col-sm-7">
                                            <input type="text" name="tw" class="form-control" value="<?php echo html_escape(@$social_page->tw); ?>"/>
                                        </div>                                     
                                    </div>  


                                    <div class="form-group row">
                                        <div class="col-sm-3"><label></label></div>
                                        <div class="col-sm-7">
                                            <div class="checkbox checkbox-success checkbox-inline">
                                                <input type="checkbox" value="1" name="status" id="status" <?php echo ($social_page->status=='1'?'checked':'')?> >
                                                <label for="status">   Status </label>
                                            </div>
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
            