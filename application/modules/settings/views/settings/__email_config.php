


                 <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['email','settings'])?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php echo form_open('settings/view_setup/email_config');?>
                            

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label for="Protocol"><?php echo display('smtp_protocol')?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="protocol" id="Protocol" value="<?php echo  html_escape(@$email_config->smtp_protocol)?>" placeholder="Smtp Protocol">
                                    </div>
                                </div>

                              

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label for="host"><?php echo display('smtp_host')?></label>
                                    </div>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="host" id="host" value="<?php echo html_escape(@$email_config->smtp_host)?>" placeholder="Smtp Host">
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label for="port"><?php echo display('smtp_port')?></label>
                                    </div>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="port" id="port" value="<?php echo html_escape(@$email_config->smtp_port);?>" placeholder="Smtp Port">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label for="username"><?php echo display('smtp_username')?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="username" id="username" value="<?php echo html_escape(@$email_config->smtp_username);?>" placeholder="Smtp Username">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label for="password"><?php echo display('smtp_password')?></label>
                                    </div>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password" value="<?php echo html_escape(@$email_config->smtp_password);?>" id="password" placeholder="Smtp Password">
                                    </div>

                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label for="mailtype"><?php echo display('smtp_mailtype')?></label>
                                    </div>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="mailtype" id="mailtype" value="<?php echo html_escape(@$email_config->smtp_mailtype)?>" placeholder="Smtp Mailtype">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label for="charset"><?php echo display('smtp_charset')?></label>
                                    </div>
                                    <div class="col-sm-9">
                                  
                                        <input type="text" class="form-control" name="charset" id="charset" value="<?php echo html_escape(@$email_config->smtp_charset)?>" placeholder="Smtp charset">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <label for="charset"><?php echo display('status')?></label>
                                        <input name="status" type="checkbox" <?php echo (@$email_config->status=1?'checked':'');?> > 
                                    </div>
                                </div>

                                <input type="hidden" name="id" value="<?php echo html_escape(@$email_config->id);?>">
                                


                                <div class="row form-group">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <button type="submit"  class="btn btn-sm btn-success"> <?php echo display('update')?></button>
                                    </div>
                                </div> 
          
                        <?php echo form_close();?>

                    </div>
                </div>
            


