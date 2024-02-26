
        <link href="<?php echo base_url('assets/dist/css/media.css')?>" rel="stylesheet" type="text/css"/>

                <div class="card mb-4">

                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['image','upload'])?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">



                    <!-- Checkboxes & Radios -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                
                                <div class="panel-body">
                                    <?php echo form_open_multipart('media_library/media_controller/upload');?>
                                        <input type="hidden" id="base_url" value="<?php echo base_url()?>">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <fieldset>
                                                    <legend>Thumb Image Size</legend><hr>
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label>Height(Y)</label>
                                                            <input type="number" name="thumb_h_y" value="280" class="form-control"/>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                           <label>Width(X):</label>
                                                            <input type="number" name="thumb_w_x" value="400" class="form-control"/>     
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>


                                            <div class="col-md-4">
                                                <fieldset>
                                                    <legend>Large Image Size</legend>
                                                    <hr>

                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label>Height(Y):</label>
                                                           <input type="number" name="larg_h_y" value="451" class="form-control"/>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                           <label>Width(X):</label>
                                                             <input type="number" name="larg_w_x" value="643" class="form-control" />
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>


                                            <div class="col-md-4">
                                                <fieldset>
                                                    <legend>Upload Image</legend><hr>
                                                    <div class="form-group">
                                                        <label><?php echo display('image')?><span class="text-danger">*</span></label>
                                                        <input type="file" accept="image/*" onchange="loadFile(event)" name="image" id="upimg" class="form-control"  required />
                                                        <img id="output" class="img-responsive img-thumbnail" width="257" height="100">
                                                    </div>
                                                </fieldset>
                                            </div>

                                            <div class="col-md-12">
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label><?php echo display('title')?></label>
                                                        <input type="text" name="title" required  class="form-control"/>
                                                    </div>
                                                </fieldset>
                                            </div>


                                            <div class="col-md-12">
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label></label>
                                                        <button type="submit"  class="btn btn-success btn-s"> <?php echo makeString(['add','image'])?></button>
                                                    </div>
                                                </fieldset>
                                            </div>

                                        </div>

                                    <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>



                    </div>
                </div>
           
