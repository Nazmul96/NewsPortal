<?php
    $news_id = $this->uri->segment(4);
    @$home_row = $this->db->select('position')->from('news_position')->where('news_id',$news_id)->where('page','home')->get()->row_array();
    @$other_row = $this->db->select('page,position')->from('news_position')->where('news_id',$news_id)->where('page !=','home')->get()->row_array();


?>

<?php 
    $ext = explode(".", @$row['file_name']);
    $ext = end($ext);
?>


    <script src="<?php echo base_url()?>assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/plugins/Bootstrap-4-Tag-Input/tagsinput.css">
    <script src="<?php echo base_url()?>assets/plugins/Bootstrap-4-Tag-Input/tagsinput.js" type="text/javascript"></script> 
    <!--/.Content Header (Page header)--> 
    


                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['news','edit']) ?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">


                        <?php
                            include('common_file/array_file.php');
                            $home_page = (isset($home_row['position'])) ? $home_row['position'] : 0;
                            $other_position = (isset($other_row['position'])) ? $other_row['position'] : 0;
                            $reference = (isset($row['reference'])) ? $row['reference'] : '0';
                            $attributes = array('class' => 'myform', 'name' => 'f_name', 'id' => 'myform', 'onsubmit' => 'return FormValidation()');
                            echo form_open_multipart('news/news_edit/update/' . $news_id, $attributes);
                        ?>

                        <input type="hidden" name="home_page_old" value="<?php echo @($home_row['position'] != '') ? $home_row['position'] : 0; ?>" />
                        <input type="hidden" name="other_page_old" value="<?php echo @($other_row['page'] != '') ? $other_row['page'] : 0; ?>" />
                        <input type="hidden" name="other_position_old" value="<?php echo @($other_row['position'] != '') ? $other_row['position'] : 0; ?>" />
                        <input type="hidden" name="image_old" value="<?php echo html_escape(@$row['image']); ?>" />
                        <input type="hidden" name="news_id" value="<?php echo html_escape(@$news_id); ?>" />
                        <input type="hidden" name="post_by" value="<?php echo html_escape(@$row['post_by']); ?>" />
                        <input type="hidden" name="status" value="<?php echo html_escape(@$this->session->flashdata('status')); ?>"/>



                        <div class="row">

                            <div class="col-md-3 pr-md-1">
                                <div class="form-group" >
                                    <label class="font-weight-600"><?php echo display('category');?> <span class="text-danger">*</span></label>
                                    <select name="other_page" class="other_page form-control" required >
                                        <option value="">--<?php echo display('select')?>--</option>
                                        <?php 
                                            foreach (@$categories as $key => $value) {
                                                echo '<option value="'.@$value->slug.'" '.($value->slug==$row['page']?'selected':'').'>'.@$value->category_name.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('category');?>  <?php echo display('position');?></label>
                                    <?php echo form_dropdown('other_position', @$other_positions, @$other_position, 'class="other_position form-control"'); ?>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo makeString(['home_position']) ?> </label>
                                   <?php echo form_dropdown('home_page', $home_position, $home_page, 'class="form-control"'); ?>
                                </div>
                            </div>

                            <div class="col-md-3 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('publish_date');?></label>
                                    <input type="text" class="form-control datepicker1 hasDatepicker " name="publish_date" value="<?php echo html_escape($row['publish_date'])?>" >
                                </div>
                            </div>

                        </div>


                        <div class="row">       
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('short');?> <?php echo display('head_line');?></label>
                                    <input type="text" class="form-control" name="short_head" value="<?php echo html_escape($row['stitle']); ?>" >
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('head_line');?></label>
                                    <input type="text" class="form-control" id="head_line" name="head_line" value="<?php echo html_escape($row['title']); ?>"  >
                                </div>
                            </div>
                        </div>


                        <div class="row">       
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-600">
                                        <?php echo display('details');?>
                                    </label>
                                    <textarea class="form-control" id="details" name="details_news" rows="10" cols="80"> <?php echo html_escape($row['news']); ?></textarea>
                                    <legend><a href="javascript:void(0)" class="btn btn-sm btn-success" onclick="tablContent()">Add Table Of Content <i class="fas fa-plus"></i></a></legend>
                                </div>
                            </div>
                        </div>

                        <?php if(!empty($post_table_of_content)){?>

                        <?php foreach($post_table_of_content as $val){?>

                            <div class="row">

                                <div class="col-md-6 pr-md-1">
                                    <div class="form-group">
                                        <label class="font-weight-600">Section Name</label>
                                        <input type="text" class="form-control" value="<?php echo $val->section_name?>" name="section_name[]" placeholder="Section name">
                                    </div>
                                </div>

                                <div class="col-md-4 pr-md-1">
                                    <div class="form-group">
                                        <label class="font-weight-600">Section Id</label>
                                        <input type="text" class="form-control" value="<?php echo $val->section_id?>" name="section_id[]" placeholder="Section Id">
                                    </div>
                                </div>

                                <div class="col-md-2 pr-md-1" style="margin-top:30px;">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-md btn-danger remove_button1"> <?php echo display('delete')?></button>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php }?>

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
                                    <input type='text' name="image_alt" value="<?php echo html_escape(@$row['image_alt']); ?>"  id="image_alt"  class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('image_title')?> </label>
                                    <input type='text' name="image_title" value="<?php echo html_escape(@$row['image_title']); ?>" id="image_title" class="form-control">
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            
                            <div class="col-md-3">

                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('custom_url')?></label>
                                    <input type="text" class="form-control" value="<?php echo html_escape($row['encode_title'])?>" id="customurl" name="customurl">
                                    <span class="text-danger">Special character(e.g .,@$) not allowed in this field</span>
                                </div>

                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><?php echo display('seo_title')?></label>
                                    <input type="text" class="form-control" placeholder="Enter your SEO title" id="customurl" name="seo_title" value="<?php echo html_escape($row['seo_title'])?>">
                                </div>
                            </div>



                            <div class="col-md-3 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('reporter');?></label>
                                    <input type="text" class="form-control" name="reporter" value="<?php echo html_escape($row['name']); ?>">
                                </div>
                            </div>
                            
                            

                            <div class="col-md-3 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600">Podcust/Video Upload</label>
                                    <div class="btn-select-image">
                                        <div id="podcustPriview">                       
                                            <?php if($ext=='mp3'){?>
                                                <i class="fas fa-trash float-left text-danger deleteId" onClick="deletePodcust()"></i>
                                                <audio width="220" class="deleteId" controls>
                                                    <source src="<?php echo $row['podcust_url'].'uploads/podcasts/'.$row['file_name']?>" >
                                                </audio>
                                            <?php } ?>

                                            <?php if($ext=='mp4'){?>
                                                <i class="fas fa-trash float-left text-danger deleteId" onClick="deletePodcust()"></i>
                                                <video width="220" class="deleteId" controls>
                                                    <source src="<?php echo $row['podcust_url'].'uploads/podcasts/'.$row['file_name']?>" type="video/mp4">
                                                    <source src="example.webm" type="video/webm">
                                                </video>
                                            <?php } ?>
                                        </div>
                                        <input type="hidden" value="<?php echo $row['podcust_id']?>" readonly="readonly" name="lib_podcust_selected" id="lib_podcust_selected" class="form-control" />
                                        <?php echo anchor_popup('news/news_post/my_protcust/', '<i class="fas fa-cloud-upload-alt"></i> [ mp3,mp4]', $nw_img_search); ?>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function deletePodcust(){
                                    $('#lib_podcust_selected').attr('value', '');  
                                    $(".deleteId").remove();
                                }
                            </script>
                            
                            
                            <div class="col-md-6 pr-md-1">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('video_url')?></label>
                                    <input type="text" class="form-control" name="videos" placeholder="https://www.youtube.com/watch?v=PzmNssVLcLQ" value="<?php echo html_escape($row['videos']); ?>">
                                </div>
                            </div>
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('reference');?></label>
                                    <input type="text" class="form-control"  name="reference" value="<?php echo html_escape($row['reference']); ?>">
                                </div>

                                <input type="hidden" class="form-control " name="ref_date" value="<?php echo html_escape($row['post_date']); ?>" >
                            </div>

                        </div>


                        <div class="row"> 

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo display('post_tag')?> </label>
                                    <input name="post_tag" data-role="tagsinput" value="<?php echo $tag?>" class="form-control" />
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo makeString(['meta','keyword']);?> </label>
                                    <input name="meta_keyword" value="<?php echo html_escape(@$seo_info['meta_keyword']); ?>" id="tags" class="form-control"  data-role="tagsinput" />
                                </div>

                            </div>
                        </div>

                        <div class="row">       
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-weight-600"><?php echo makeString(['meta','description']);?> </label>
                                    <textarea class="form-control" name="meta_description"><?php echo html_escape(@$seo_info['meta_description']); ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="checkbox checkbox-success checkbox-inline">
                            <input type="checkbox" value="1" name="schemasetup" id="schemasetup" >
                            <label for="schemasetup">  Auto Schema setup </label>
                            <legend><a href="javascript:void(0)" class="btn btn-sm btn-success" onclick="customSchema()">Add Custom Schema setup <i class="fas fa-plus"></i></a></legend>
                        </div>

                        <?php
                            $this->load->view('__schema_form'); 
                        ?>

                        <?php if(!empty($cschema)){?>
                        <?php foreach ($cschema as $key => $sval) {?>

                            <div class="row">
                                <div class="col-md-12 pr-md-1">
                                    <div class="form-group">
                                        <label class="font-weight-600">Enter your schema</label>
                                        <textarea name="custom_schema[]" class="form-control" cols="12" rows="10"><?php echo @$sval->schema?></textarea>
                                    </div>
                                    <span class="btn btn-sm btn-danger removeSchema1">Delete</span>
                                </div>
                            </div>
                        <?php }?>
                        <?php }?>

                        <div class="schema_wrapper">
                    
                        </div>

        
                        <button type="submit" class="btn btn-md btn-success float-right"><?php echo display('update')?> <?php echo display('news')?></button>

                        <input type="hidden" id="base_url" name="base_url" value="<?php echo base_url()?>">
                        

                    <?php echo form_close();?> 


                    </div>
                </div>
            

     
<script src="<?php echo base_url()?>assets/dist/js/ck.js"></script>

