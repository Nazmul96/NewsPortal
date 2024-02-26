
                 <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['contact','settings'])?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">



                        <?php echo form_open('settings/view_setup/save_contact_page')?>
                            
                       
                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label class="font-weight-600"><?php echo display('content')?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea name="content" class="form-control" ><?php echo  html_escape(@$contact_setting->content)?></textarea>
                                    </div>
                                </div> 

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label class="font-weight-600"><?php echo display('address')?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea name="address" class="form-control" ><?php echo html_escape(@$contact_setting->address)?></textarea>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label class="font-weight-600"><?php echo display('phone_one')?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="number" name="phone" class="form-control" value="<?php echo html_escape(@$contact_setting->phone)?>">
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label class="font-weight-600"><?php echo display('phone_two')?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="number" name="phone_two" class="form-control" id="" value="<?php echo html_escape(@$contact_setting->phone_two)?>">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                         <label class="font-weight-600"><?php echo display('email')?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control"  value="<?php echo html_escape(@$contact_setting->email)?>">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label class="font-weight-600"><?php echo display('website')?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="website" class="form-control"  value="<?php echo html_escape(@$contact_setting->website)?>">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label class="font-weight-600">LatLng</label>
                                    </div>

                                    <div class="col-sm-5">
                                        <input type="text" name="latitude" class="form-control" placeholder="Latitude" value="<?php echo html_escape(@$contact_setting->latitude)?>">
                                    </div>

                                    <div class="col-sm-4">
                                        <input type="text" name="longitude" class="form-control" placeholder="Longitude" value="<?php echo html_escape(@$contact_setting->longitude)?>">
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
            