


                <div class="card mb-4">

                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['app','settings'])?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php echo form_open_multipart('settings/view_setup/app_settings_save');?>

                            <div class="row ">
                                <div class="col-sm-3"><label class="font-weight-600"><?php echo display('website_title')?></label></div>
                                <div class="col-sm-9">
                                    <input type="text" name="website_title" class="form-control" required="1" value="<?php echo html_escape(@$settings->website_title); ?>">
                                </div>
                            </div> 

                            <input type="hidden" name="id" value="<?php echo html_escape($settings->id)?>">

                            <div class="row form-group">
                                <div class="col-sm-3"><label class="font-weight-600"><?php echo makeString(['logo','preview'])?></label></div>
                                <div class="col-sm-9">
                                    <?php
                                        echo '<img src="' . base_url() . html_escape(@$settings->logo) . '" width="200" >';
                                    ?>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-3"><label class="font-weight-600"><?php echo makeString(['website','logo'])?></label></div>
                                <div class="col-sm-9">
                                    <input type="file" name="website_logo" class="form-control" accept="image/*" >
                                    <input type="hidden" name="website_logo_old" value="<?php echo html_escape(@$settings->logo)?>" >
                                    <span>[gif,jpg,png,jpeg,webp and max size is 1MB]</span>
                                </div> 
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-3"><label class="font-weight-600"><?php echo makeString(['preview'])?></label></div>
                                <div class="col-sm-9">
                                    <?php echo '<img src="' . base_url() . html_escape(@$settings->footer_logo) . '" width="200">';?>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-3"><label class="font-weight-600"><?php echo display('footer_logo')?></label></div>
                                <div class="col-sm-9">
                                    <input type="file" name="footer_logo" class="form-control" accept="image/*">
                                    <input type="hidden" name="footer_logo_old" value="<?php echo html_escape(@$settings->footer_logo)?>" >
                                    <span>[gif,jpg,png,jpeg,webp and max size is 1MB]</span>
                                </div>              
                            </div>
                            
                            <div class="row form-group">
                                <div class="col-sm-3"><label class="font-weight-600"><?php echo display('favicon')?> <?php echo display('preview')?></label></div>
                                <div class="col-sm-2">
                                    <?php echo '<img src="' . base_url() . html_escape(@$settings->favicon) . '" width="32">'; ?>
                                </div>
                            </div>



                            <div class="row form-group">
                                <div class="col-sm-3"><label class="font-weight-600"><?php echo display('favicon')?></label></div>
                                <div class="col-sm-9">
                                    <input type="file" name="favicon" class="form-control" accept="image/*">
                                    <input type="hidden" name="favicon_old" value="<?php echo html_escape(@$settings->favicon)?>" >
                                    <span>[gif,jpg,png,jpeg,webp and max size is 1MB]</span>
                                </div>
                            </div>

                            

                            <div class="row form-group">
                                <div class="col-sm-3"><label class="font-weight-600"><?php echo makeString(['preview'])?></label></div>
                                <div class="col-sm-9">
                                    <?php echo '<img src="' . base_url() . html_escape(@$settings->app_logo) . '">'; ?>
                                </div>
                            </div>

                            

                            <div class="row form-group">
                                <div class="col-sm-3"><label class="font-weight-600"><?php echo makeString(['app','logo'])?></label></div>
                                <div class="col-sm-9">
                                    <input type="file" name="app_logo" class="form-control" accept="image/*">
                                    <input type="hidden" name="app_logo_old" value="<?php echo html_escape(@$settings->app_logo)?>" >
                                    <span>[gif,jpg,png,jpeg,webp and max size is 1MB]</span>
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col-sm-3"><label class="font-weight-600"><?php echo makeString(['preview'])?></label></div>
                                <div class="col-sm-9">
                                    <?php echo '<img width="100" src="' . base_url() . html_escape(@$settings->mobile_menu_image) . '">'; ?>
                                </div>
                            </div>

                            

                            <div class="row form-group">
                                <div class="col-sm-3"><label class="font-weight-600"><?php echo makeString(['mobile','menu','image'])?></label></div>
                                <div class="col-sm-9">
                                    <input type="file" name="mobile_menu_image" class="form-control" accept="image/*">
                                    <input type="hidden" name="mobile_menu_image_old" value="<?php echo html_escape(@$settings->mobile_menu_image)?>" >
                                    <span>[jpg,png,jpeg,webp and max size is 1MB]</span>
                                </div>
                            </div>




                            <div class="row form-group">
                                <div class="col-sm-3"><label class="font-weight-600"><?php echo display('website_footer')?></label></div>
                                <div class="col-sm-9">
                                    <textarea name="footer_text" class="form-control"><?php echo  html_escape(@$settings->footer_text); ?></textarea>
                                </div>
                            </div> 


                            <div class="row form-group">
                                <div class="col-sm-3"><label class="font-weight-600"><?php echo display('copy_right')?></label></div>
                                <div class="col-sm-9">
                                    <textarea name="copy_right" class="form-control"><?php echo  html_escape(@$settings->copy_right); ?></textarea>
                                </div>
                            </div> 



                            <div class="row form-group">
                                <div class="col-sm-3"><label class="font-weight-600"><?php echo display('website_time_zone')?></label></div>
                                <div class="col-sm-9">
                                    <select name="time_zone" class="form-control" required="1" >
                                        <option value=""><?php echo display('select')?></option>
                                        <?php foreach (timezone_identifiers_list() as $value) { ?>
                                            <option value="<?php echo html_escape($value) ?>" <?php echo ((html_escape(@$settings->time_zone)==html_escape($value))?'selected':null) ?>><?php echo  html_escape($value) ?></option>";
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col-sm-3"><label class="font-weight-600">News ticker Status</label></div>
                                <div class="col-sm-9">
                                    <select name="newstriker_status" class="form-control" required="1" >
                                        <option value=""><?php echo display('select')?></option>
                                        <option value="1" <?php echo ($settings->newstriker_status=='1'?'selected':'');?>><?php echo makeString(['enable'])?></option>
                                        <option value="0" <?php echo ($settings->newstriker_status=='0'?'selected':'');?>><?php echo makeString(['disable'])?></option>
                                    </select>
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col-sm-3"><label class="font-weight-600"><?php echo makeString(['preloader','status'])?></label></div>
                                <div class="col-sm-9">
                                    <select name="preloader_status" class="form-control" required="1" >
                                        <option value=""><?php echo display('select')?></option>
                                        <option value="1" <?php echo ($settings->preloader_status=='1'?'selected':'');?>><?php echo makeString(['enable'])?></option>
                                        <option value="0" <?php echo ($settings->preloader_status=='0'?'selected':'');?>><?php echo makeString(['disable'])?></option>
                                    </select>
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col-sm-3"><label class="font-weight-600"><?php echo makeString(['ltl','rtl','status'])?></label></div>
                                <div class="col-sm-9">
                                    <select name="ltl_rtl" class="form-control" required="1" >
                                        <option value=""><?php echo display('select')?></option>
                                        <option value="1" <?php echo ($settings->ltl_rtl=='1'?'selected':'');?>><?php echo makeString(['rtl'])?></option>
                                        <option value="0" <?php echo ($settings->ltl_rtl=='0'?'selected':'');?>><?php echo makeString(['ltl'])?></option>
                                    </select>
                                    <div class="alert alert-warning"><i class="fas fa-info-circle"></i> Notes : Rtl version will be worked only for the Osru-Rtl-Theme.</div>
                                </div>
                            </div>

                            
                            <div class="row form-group">
                                <div class="col-sm-3">
                                    <label class="font-weight-600"><?php echo display('speed_optimization')?></label>
                                </div>
                                <div class="col-sm-2">
                                    <div class="radio radio-success radio-inline">
                                        <input type="radio" id="inlineRadio1" value="1" <?php echo (@$settings->speed_optimization=='1'?'checked':'')?> name="speed_optimization" >
                                        <label for="inlineRadio1"> <?php echo display('yes')?> </label>
                                    </div>
                                    <div class="radio radio-inline radio-warning">
                                        <input type="radio" id="inlineRadio2" value="0" <?php echo (@$settings->speed_optimization=='0'?'checked':'')?> name="speed_optimization">
                                        <label for="inlineRadio2"> <?php echo display('no')?> </label>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="alert alert-warning"><i class="fas fa-info-circle"></i> Notes : if you enable speed optimization, it will compress all your css & js into one folder and website will be 80% faster.</div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-sm-3">
                                    <label class="font-weight-600"><?php echo display('captcha')?></label>
                                </div>
                                <div class="col-sm-2">
                                    <div class="radio radio-success radio-inline">
                                        <input type="radio" id="captcha1" value="1" <?php echo (@$settings->captcha=='1'?'checked':'')?> name="captcha" >
                                        <label for="captcha1"> <?php echo display('enable')?> </label>
                                    </div>
                                    <div class="radio radio-inline radio-warning">
                                        <input type="radio" id="captcha2" value="0" <?php echo (@$settings->captcha=='0'?'checked':'')?> name="captcha">
                                        <label for="captcha2"> <?php echo display('disable')?> </label>
                                    </div>
                                </div>
                                
                            </div>
                            



                            <div class="row form-group">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button class="btn btn-md btn-success"  type="submit" ><?php echo display('update')?></button>
                                </div>
                            </div> 
                                              
                        <?php echo form_close();?>
                            
                        
                    </div>
                </div>


