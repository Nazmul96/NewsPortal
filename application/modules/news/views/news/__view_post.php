<script src="<?php echo base_url()?>assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script> 
<!-- <script src="<?php echo base_url()?>assets/ck/ckeditor5/ckeditor.js" type="text/javascript"></script>  -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/plugins/Bootstrap-4-Tag-Input/tagsinput.css">
<script src="<?php echo base_url()?>assets/plugins/Bootstrap-4-Tag-Input/tagsinput.js" type="text/javascript"></script> 


                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['news','post'])?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php
                            include('common_file/array_file.php');
                            $home_page = (isset($home_page)) ? $home_page : 0;
                            $other_position = (isset($other_position)) ? $other_position : 1;
                            $attributes = array('class' => 'myform', 'name' => 'myform', 'id' => 'myform', 'onSubmit' => 'return FormValidation()');
                            echo form_open_multipart('news/news_post/post', $attributes);
                        ?>

                        <div class="row">
                            
                            <div class="col-md-3 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('category');?> <span class="text-danger">*</span></label>
                                    <select name="other_page" class="other_page form-control" id="other_page" required >
                                        <option value="">--<?php echo display('select')?>--</option>
                                        <?php 
                                            foreach (@$cat as $key => $value) {
                                                echo '<option value="'.html_escape(@$value->slug).'">'.html_escape(@$value->category_name).'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('category');?>  <?php echo display('position');?></label>
                                    <?php echo form_dropdown('other_position', @$other_positions, @$other_position, 'class="other_position form-control"', 'id="other_position"'); ?>
                                </div>
                            </div>


                            <div class="col-md-3 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo makeString(['home_position']) ?> </label>
                                    <?php echo form_dropdown('home_page', @$home_position, @$home_page, 'class="form-control"','id="home_page"'); ?>
                                </div>
                            </div>

                            <div class="col-md-3 pl-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('publish_date');?></label>
                                    <input type="text" class="form-control datepicker1" name="publish_date"  id="publish_date" value="<?php echo date("Y-m-d")?>" >
                                </div>
                            </div>


                        </div>


                        <div class="row"> 
                              
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('short');?> <?php echo display('head_line');?></label>
                                    <input type="text" class="form-control" placeholder="<?php echo display('short');?> <?php echo display('head_line');?>" name="short_head" id="short_head">
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('head_line');?><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="<?php echo display('head_line');?>" id="head_line" name="head_line" required="" >
                                </div>
                            </div>

                        </div>


                        <div class="form-group">
                            <label class="font-weight-600"> <?php echo display('details');?> </label>
                            <textarea class="form-control" id="details" placeholder="Details" name="details_news" rows="10" cols="80"></textarea>
                            <legend><a href="javascript:void(0)" class="btn btn-sm btn-success" onclick="tablContent()"><?php echo display('add_table_of_content')?><i class="fas fa-plus"></i></a></legend>
                        </div>

                       
                        <div class="add_input">
                        </div>

                        <div class="row">
                            
                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('photo');?></label>
                                    <div class="btn-select-image">
                                        <div id="priview"></div>
                                        <input type="hidden" readonly="" readonly="readonly" name="lib_file_selected" id="lib_file_selected" class="form-control" />
                                        <?php echo anchor_popup('news/news_post/my_window/', '<i class="fas fa-cloud-upload-alt"></i> [ jpg,png,jpeg,gif]', $nw_img_search); ?>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('image_alt')?></label>
                                    <input type='text' placeholder="Image alt" name="image_alt" class="form-control" id="image_alt">
                                </div>
                            </div>

                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('image_title')?> </label>
                                    <input type='text' name="image_title" placeholder="Image title" class="form-control" id="image_title">
                                </div>
                            </div>

                           
                        </div>


                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> <?php echo display('custom_url')?></label>
                                    <input type="text" class="form-control" placeholder="There-are-many-variations-of-passages-of-Lorem-Ipsum" id="customurl" name="customurl">
                                    <span class="text-danger">Special character(e.g .,@$) not allowed in this field</span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?php echo display('seo_title')?></label>
                                    <input type="text" class="form-control" placeholder="Enter your SEO title" id="customurl" name="seo_title">
                                </div>
                            </div>


                            <div class="col-md-3 pl-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('reporter');?></label>
                                    <input type="text" class="form-control" name="reporter" placeholder="Reporter" id="reporter">
                                </div>
                            </div>


                            <div class="col-md-3 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600">Podcust/Video Upload</label>
                                    <div class="btn-select-image">
                                        <div id="podcustPriview"></div>
                                        <input type="hidden" readonly="" readonly="readonly" name="lib_podcust_selected" id="lib_podcust_selected" class="form-control" />
                                        <?php echo anchor_popup('news/news_post/my_protcust/', '<i class="fas fa-cloud-upload-alt"></i> [ mp3,mp4]', $nw_img_search); ?>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('video_url');?></label>
                                    <input type="text" class="form-control" placeholder="https://www.youtube.com/watch?v=PzmNssVLcLQ"  name="videos" id="videos">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('reference');?></label>
                                    <input type="text" class="form-control" placeholder="Reference"  name="reference" id="reference">
                                </div>
                                <input type="hidden" class="form-control datepicker1" name="ref_date" id="ref_date" value="<?php echo date("d-m-Y", time() + 6 * 60 * 60); ?>" >
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> <?php echo display('post_tag')?> </label>
                                    <input name="post_tag" data-role="tagsinput" placeholder="Tag1,Tag2" id="post_tag" class="form-control" />
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo makeString(['meta','keyword']);?> </label>
                                    <input name="meta_keyword" data-role="tagsinput" id="meta_keyword" placeholder="keyword1,keyword2" class="form-control" />
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label><?php echo makeString(['meta','description']);?> </label>
                            <textarea class="form-control" placeholder="meta description" name="meta_description" id="meta_description"><?php echo html_escape(@$seo_info['meta_description']); ?></textarea>
                        </div>

                        <input type="hidden" value="0" name="confirm_dynamic_static" id="confirm_dynamic_static" >


                        <div class="form-group">
                            
                            <div class="checkbox checkbox-success checkbox-inline">
                                <input type="checkbox" value="1" name="latest_confirmed" id="latest_confirmed" checked="">
                                <label for="latest_confirmed"><?php echo display('latest_news');?> </label>
                            </div>

                            <div class="checkbox checkbox-success checkbox-inline">
                                <input type="checkbox" value="1" name="breaking_confirmed" id="breaking_confirmed" >
                                <label for="breaking_confirmed">  <?php echo display('breaking_news');?> </label>
                            </div>

                            <div class="checkbox checkbox-success checkbox-inline">
                                <?php if($this->session->userdata('user_type')!=1){ ?>
                                    <input type="checkbox" value="1" name="status_confirmed" id="status_confirmed" checked="checked" />
                                <?php }?> 
                                <label for="status_confirmed"> <?php echo display('status')?> </label>
                            </div>

                            <div class="checkbox checkbox-success checkbox-inline">
                                <input type="checkbox" value="1" name="schemasetup" id="schemasetup" >
                                <label for="schemasetup">  Schema setup <span class="text-warning">(After post publish, Schema will be editable from post update)</span></label>
                            </div>

                        </div>     
                            
                        <input type="hidden" id="base_url" name="base_url" value="<?php echo base_url()?>">
                        <input type="hidden" id="savestatus" name="savestatus" value="">

 

                        <div class="row"> 
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-md btn-success float-right"><?php echo display('post')?> <?php echo display('news')?></button>
                            </div>
                        </div>

                    <?php echo form_close();?> 

                    </div>
                </div>
            

    <script src="<?php echo base_url()?>assets/dist/js/ck.js"></script>


