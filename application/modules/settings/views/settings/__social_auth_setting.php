
        <div class="row">
            
            <div class="col-md-6">

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['facebook','login','settings'])?> </h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php  echo form_open('settings/view_setup/social_auth_update');?> 

                        <input type="hidden" name="id" value="<?php echo html_escape($facebook->id)?>">
                        <div class="row form-group">
                            <label class="font-weight-600">  <?php echo makeString(['app','id'])?>  </label>
                            <input type="text" name="app_id" class="form-control" value="<?php echo html_escape($facebook->app_id); ?>">
                        </div> 

                        <div class="row form-group">
                            <label class="font-weight-600">  <?php echo makeString(['app','secret'])?></label>
                            <input type="text" name="app_secret" class="form-control" value="<?php echo html_escape($facebook->app_secret); ?>">
                        </div>

                        <div class="row form-group">
                            <label class="font-weight-600">  <?php echo makeString(['active','status'])?></label>
                            <select class="form-control" name="status">
                                <option value="1" <?php echo ($facebook->status=='1'?'selected':'')?>><?php echo display('active');?></option>
                                <option value="0" <?php echo ($facebook->status=='0'?'selected':'')?>>Inactive</option>
                            </select>
                        </div>

                        <div class="row form-group">
                            <label class="font-weight-600">  </label>
                            <button type="submit" class="btn btn-md btn-success"> <?php echo display('update')?></button>
                        </div>

                        <?php echo form_close()?>
                        <div class="social_auth_set">
                        <div class=""><a href="https://developers.facebook.com/apps/" target="__blank">Click To Create Facebook app </a> </div><br>
                        <p><?php echo makeString(['facebook','redirect','url'])?>  :  </p>
                        <input type="text" class="form-control" value="<?php echo base_url();?>Registration/facebook_login" onClick="this.setSelectionRange(0, this.value.length)" />
                        </div>         

                    </div>

                </div>
            </div>



            <div class="col-md-6">

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['google','login','settings'])?> </h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php  echo form_open('settings/view_setup/social_auth_update');?> 

                            <input type="hidden" name="id" value="<?php echo html_escape($google->id)?>">
                            <div class="row form-group">
                                <label class="font-weight-600">  <?php echo display('client_id')?> </label>
                                <input type="text" name="app_id" class="form-control" value="<?php echo html_escape($google->app_id)?>">
                            </div> 

                            <div class="row form-group">
                                <label class="font-weight-600">  <?php echo display('client_secret')?></label>
                                <input type="text" name="app_secret" class="form-control" value="<?php echo html_escape($google->app_secret)?>">
                            </div>

                            <div class="row form-group">
                                <label class="font-weight-600">  <?php echo makeString(['active','status'])?> </label>
                                <select class="form-control" name="status">
                                    <option value="1" <?php echo ($google->status=='1'?'selected':'')?>><?php echo display('active');?></option>
                                    <option value="0" <?php echo ($google->status=='0'?'selected':'')?>>Inactive</option>
                                </select>
                            </div>

                            <div class="row form-group">
                                <label class="font-weight-600"><?php echo display('api_key')?></label>
                                <input type="text" name="api_key" class="form-control" value="<?php echo html_escape($google->api_key)?>">
                            </div>

                            <div class="row form-group">
                                <label class="font-weight-600">  </label>
                                <button type="submit" class="btn btn-md btn-success"> <?php echo display('update')?></button>
                            </div>
                            
                        <?php echo form_close()?>



                            <div class=""><a href="https://console.developers.google.com/apis" target="__blank">Click To Create Google app</a> </div><br>

                            <div class="social_auth_set">
                                <p><?php echo makeString(['google','redirect','url'])?>  :  </p>
                                <input type="text" class="form-control" value="<?php echo base_url();?>Registration/googl_login/" onClick="this.setSelectionRange(0, this.value.length)" />
                            </div>
                                
                    </div>
                </div>
            </div>



        </div>
   
