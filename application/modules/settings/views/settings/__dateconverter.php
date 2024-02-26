


                 <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Setup</h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php echo form_open('settings/others_settings/dateconverter_save')?>

                        <div class="row">

                            <div class="col-sm-3">

                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label for="Protocol">Zero<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="zero" value="<?php echo  html_escape(@$cdate->zero)?>" required>
                                    </div>
                                
                                    <div class="col-sm-6">
                                        <label for="Protocol">One<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="one" value="<?php echo  html_escape(@$cdate->one)?>" required>
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label for="Protocol">Two<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="two" value="<?php echo  html_escape(@$cdate->two)?>" required>
                                    </div>
                                
                                    <div class="col-sm-6">
                                        <label for="Protocol">Three<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="three" value="<?php echo  html_escape(@$cdate->three)?>" required>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label for="Protocol">Four<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="four" value="<?php echo  html_escape(@$cdate->four)?>" required>
                                    </div>
                                
                                    <div class="col-sm-6">
                                        <label for="Protocol">Five<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="five" value="<?php echo  html_escape(@$cdate->five)?>" required>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label for="Protocol">Six<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="six" value="<?php echo  html_escape(@$cdate->six)?>" required>
                                    </div>
                                
                                    <div class="col-sm-6">
                                        <label for="Protocol">Seven<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="seven" value="<?php echo  html_escape(@$cdate->seven)?>" required>
                                    </div>
                                </div>
                                
                                <div class="row form-group">

                                    <div class="col-sm-6">
                                        <label for="Protocol">Eight<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="eight" value="<?php echo  html_escape(@$cdate->eight)?>" required>
                                    </div>
                                
                                    <div class="col-sm-6">
                                        <label for="Protocol">Nine<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="nine" value="<?php echo  html_escape(@$cdate->nine)?>" required>
                                    </div>

                                </div>

                            </div>




                            <div class="col-sm-3">

                                <div class="row form-group">
                                    
                                    <div class="col-sm-6">
                                        <label for="Protocol">Sat<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="sat" value="<?php echo  html_escape(@$cdate->sat)?>" required>
                                    </div>
                                
                                    <div class="col-sm-6">
                                        <label for="Protocol">Sun<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="sun" value="<?php echo  html_escape(@$cdate->sun)?>" required>
                                    </div>

                                </div>


                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label for="Protocol">Mon<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="mon" value="<?php echo  html_escape(@$cdate->mon)?>" required>
                                    </div>
                                
                                    <div class="col-sm-6">
                                        <label for="Protocol">Tue<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="tue" value="<?php echo  html_escape(@$cdate->tue)?>" required>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label for="Protocol">Wed<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="wed" value="<?php echo  html_escape(@$cdate->wed)?>" required>
                                    </div>
                                
                                    <div class="col-sm-6">
                                        <label for="Protocol">Thu<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="thu" value="<?php echo  html_escape(@$cdate->thu)?>" required>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label for="Protocol">Fri<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="fri" value="<?php echo  html_escape(@$cdate->fri)?>" required>
                                    </div>
                                </div>

                            </div>



                            <div class="col-sm-6">

                                <div class="row form-group">
                                    <div class="col-sm-4">
                                        <label for="Protocol">Jan<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="jan" value="<?php echo  html_escape(@$cdate->jan)?>" required>
                                    </div>
                                
                                    <div class="col-sm-4">
                                        <label for="Protocol">Feb<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="feb" value="<?php echo  html_escape(@$cdate->feb)?>" required>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-4">
                                        <label for="Protocol">Mar<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="mar" value="<?php echo  html_escape(@$cdate->mar)?>" required>
                                    </div>
                                
                                    <div class="col-sm-4">
                                        <label for="Protocol">Apr<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="app" value="<?php echo  html_escape(@$cdate->app)?>" required>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-4">
                                        <label for="Protocol">May<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="may" value="<?php echo  html_escape(@$cdate->may)?>" required>
                                    </div>
                                
                                    <div class="col-sm-4">
                                        <label for="Protocol">June<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="june" value="<?php echo  html_escape(@$cdate->june)?>" required>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-4">
                                        <label for="Protocol">July<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="july" value="<?php echo  html_escape(@$cdate->july)?>" required>
                                    </div>
                                
                                    <div class="col-sm-4">
                                        <label for="Protocol">Aug<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="aug" value="<?php echo  html_escape(@$cdate->aug)?>" required>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-sm-4">
                                        <label for="Protocol">Sep<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="sep" value="<?php echo  html_escape(@$cdate->sep)?>" required>
                                    </div>
                                
                                    <div class="col-sm-4">
                                        <label for="Protocol">Oct<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="oct" value="<?php echo  html_escape(@$cdate->oct)?>" required>
                                    </div>
                                </div>

                                <div class="row form-group">

                                    <div class="col-sm-4">
                                        <label for="Protocol">Nov<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="nov" value="<?php echo  html_escape(@$cdate->nov)?>" required>
                                    </div>
                                
                                    <div class="col-sm-4">
                                        <label for="Protocol">Dec<span class='text-danger'>*</span></label>
                                        <input type="text" class="form-control" name="dec" value="<?php echo  html_escape(@$cdate->dec)?>" required>
                                    </div>
                                </div>

                            </div>


                        </div>


                            
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <div class="checkbox checkbox-success checkbox-inline">
                                    <input type="checkbox" value="1" <?php echo  html_escape(@$cdate->status==1?'checked':'')?> name="status" id="status" >
                                    <label for="status"> Active <span class="text-warning">(If this checked, then it will be work.)</span></label>
                                </div>
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-sm-9">
                                <button type="submit"  class="btn btn-sm btn-success"> <?php echo display('update')?></button>
                            </div>
                        </div> 

                                              
                        <?php echo form_close();?>

                    </div>
                </div>
            


