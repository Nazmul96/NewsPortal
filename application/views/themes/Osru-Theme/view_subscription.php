
        <!-- /.Start of news masonry -->
        <div class="page-outer-wrap">
            <!-- /.End of navigation -->
            <div class="page-content">
                <div class="container">

                    <div class="row mt-5">

                        <div class="col-sm-12">

                            <?php if(!empty(validation_errors())){?>
                               <div class="alert alert-danger ">
                                    <a href="" class="text-center close" data-dismiss="alert" aria-label="close">&times;</a> <strong><?php  echo validation_errors(); ?></strong>
                               </div>
                            <?php } ?>  
                            <?php 
                                if($this->session->flashdata('message')){
                                    echo '<div class="alert alert-success ">
                                   <a href="#" class="text-center close" data-dismiss="alert" aria-label="close">&times;</a> <strong>'.$this->session->flashdata('message').'</strong>
                                   </div>';
                                }
                                if($this->session->flashdata('exception')){
                                    echo '<div class="alert alert-danger ">
                                   <a href="#" class="text-center close" data-dismiss="alert" aria-label="close">&times;</a> <strong>'.$this->session->flashdata('exception').'</strong>
                                   </div>';
                                }
                            ?>
                        </div>

                        <div class="col-lg-6 p_r_40 offset-lg-3">

                                <?php echo form_open('Subscription/save')?>

                                    <div class="row form-group">
                                        <div class="form-label"><strong><?php echo display('name')?> <span class="text-danger">*</span> </strong></div>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo display('name')?>">
                                    </div>

                                    <div class="row form-group">
                                        <div class="form-label"><strong><?php echo display('email')?> <span class="text-danger">*</span></strong></div>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo display('email')?>">
                                    </div>

                                    <div class="row form-group">
                                        <div class="form-label"><strong><?php echo display('phone')?> <span class="text-danger">*</span></strong></div>
                                        <input type="number" class="form-control" id="phone" name="phone" placeholder="<?php echo display('phone')?>">
                                    </div>

                                    <div class="row form-group">
                                        <?php foreach ($cata as $value) { ?>  
                                        <label class="checkbox-inline">
                                            <input type="checkbox"  name="category[]" value="<?php echo html_escape($value->slug);?>" value=""> <?php echo html_escape($value->category_name);?>
                                        </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php } ?>
                                    </div>

                                    <div class="row form-group">
                                        <div class="form-label"><strong><?php echo display('frequency')?> <span class="text-danger">*</span></strong></div>
                                        <select name="frequency" class="form-control">
                                              <option value="1"><?php echo display('daily')?></option>
                                              <option value="7"><?php echo display('weekly')?></option>
                                              <option value="30"><?php echo display('monthly')?></option>
                                        </select>
                                    </div>

                                    <div class="row form-group">
                                        <div class="form-label"><strong><?php echo display('number_of_news')?> <span class="text-danger">*</span></strong></div>
                                        <input type="number" class="form-control" name="news_number" placeholder="<?php echo display('number_of_news')?>" >
                                        <span class="text-danger">Post limit maximum 10</span>
                                    </div>

                                    <div class="row form-group">
                                        <button type="submit" class="btn link-btn"><?php echo display('submit')?> ⇾</button>
                                    </div>
                                    
                                <?php echo form_close();?>
                        </div>

                    </div>
                <div class="height_30"></div>
            </div>
        </div>  





