            <div class="card mb-4 display_none" id="schemabody">
                <div class="card-body">

                            <div class="row">
                                <div class="col-md-5 pr-md-1">
                                    <div class="form-group">
                                        <label class="font-weight-600">Type</label>
                                        <input type="text" class="form-control" placeholder="Type"  id="type" name="type" value="<?php echo html_escape(@$schema->type); ?>" >
                                    </div>
                                </div>
                                
                                <div class="col-md-7 pl-md-1">
                                    <div class="form-group">
                                        <label class="font-weight-600"><?php echo display('url')?></label>
                                        <input type="text" class="form-control" name="url" id="url"  readonly value="<?php echo base_url().@$row['encode_title']?>" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 pr-md-1">
                                    <div class="form-group">
                                        <label class="font-weight-600"><?php echo display('headline')?></label>
                                        <input type="text" class="form-control" name="headline" id="sheadline" value="<?php echo html_escape(@$schema->headline); ?>">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12 pr-md-1">
                                    <div class="form-group">
                                        <label class="font-weight-600"><?php echo makeString(['image','url'])?></label>
                                        <input type="text" class="form-control" name="image_url" id="simage_url" readonly="" autocomplete="off" value="<?php echo base_url('uploads/').html_escape(@$row['image']); ?>">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12 pr-md-1">
                                    <div class="form-group">
                                        <label class="font-weight-600"><?php echo makeString(['description'])?></label>
                                        <textarea class="form-control" id="sdescription" name="description"><?php echo html_escape(@$schema->description); ?></textarea>
                                    </div>
                                </div>
                            </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-600">Author Type</label>
                                    <input type="text" class="form-control" name="author_type" id="author_type" value="<?php echo html_escape(@$schema->author_type); ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-600">Author Name</label>
                                    <input type="text" class="form-control" name="author_name" id="author_name" value="<?php echo html_escape(@$schema->author_name); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600">Publisher</label>
                                    <input type="text" class="form-control" name="spublisher" id="spublisher" value="<?php echo html_escape(@$schema->publisher); ?>">
                                </div>
                            </div>

                            <div class="col-md-6 px-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600">Publisher <?php echo makeString(['logo','url'])?></label>
                                    <input type="text" class="form-control" name="spublisher_logo" readonly  value="<?php echo base_url().@$settings->logo?>">
                                </div>
                            </div>
                           
                        </div>


                        <div class="row">
                            
                            <div class="col-md-6 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo makeString(['publish','date'])?></label>
                                    <input type="text" class="form-control datepicker1" name="spublishdate" id="spublishdate" value="<?php echo date("Y-m-d")?>">
                                </div>
                            </div>

                            <div class="col-md-6 px-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo makeString(['modifi','date'])?></label>
                                    <input type="text" class="form-control datepicker1" name="smodifidate" value="<?php echo date("Y-m-d")?>">
                                </div>
                            </div>


                            <div class="col-md-12 px-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"></label>
                                    <div class="checkbox checkbox-success checkbox-inline">
                                        <input type="checkbox" value="1" name="sactive_status" <?php echo (@$schema->active_status=='1'?'checked':'')?> id="active_status" >
                                        <label for="active_status">  <?php echo makeString(['active','status'])?></label>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                </div>
            </div>

