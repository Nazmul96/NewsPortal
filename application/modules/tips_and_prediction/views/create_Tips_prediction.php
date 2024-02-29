
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
                                    <?php echo form_open_multipart('tips_and_prediction/TipsPrediction/saveTipsPrediction');?>
                                    
                                    <input type="hidden" id="base_url" value="<?php echo base_url()?>">
                                    
                                    <div class="form-group">
                                        <label>Logo *</span></label>
                                        <input type="file" accept="image/*" onchange="loadFile(event)" name="image" id="upimg" class="form-control"  required />
                                        <!-- <img id="output" class="img-responsive img-thumbnail" width="257" height="100"> -->
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-600">Welcome Bonus</label>
                                        <input type="text" name="welcome_bonus" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-600">Win Rate</label>
                                        <input type="text" name="win_rate" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-600">Payout</label>
                                        <input type="text" name="payout" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-600">Rating</label>
                                        <input type="text" name="rating" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-600">Website Url</label>
                                        <input type="text" name="website_url" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-600">Color</label>
                                        <input type="color" name="color" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-md btn-success" value="<?php echo display('save');?>">
                                    </div>

                                    <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>



                    </div>
                </div>
           
