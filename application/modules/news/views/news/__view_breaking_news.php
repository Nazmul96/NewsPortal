

                <div class="card mb-4">
                    
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('breaking_news')?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                            <?php 
                                $attributes = array('id' => 'MyForm', 'onsubmit' => 'return FormValidation()');
                                echo form_open('news/breacking/breaking_save', $attributes);
                            ?>     

                                <input type="hidden" id="base_url" value="<?php echo base_url()?>"> 

                                <div class="form-group">
                                    <label><?php echo makeString(['enter_your_post'])?></label>
                                    <input type="hidden" name="id" id="id" value=""/>
                                    <textarea name="breaking_news" id="breaking_news" class="form-control" cols="50" placeholder="<?php echo makeString(['enter_your_post'])?>" required=""></textarea> 
                                </div>

                                <div class="form-group">

                                    <div class="voffset1"></div>
                                    <button type="submit" class="btn btn-success btn-ms button" > <?php echo display('save')?> </button>
                                    
                                </div>

                            <?php form_close();?>




                        <?php  echo form_open('news/common/breaking_delete_selected');?>
                           
                              
                            <div class="table-responsive">
                                    
                                <table class="table table-bordered table-striped table-hover">

                                    <tr class="t_bg">
                                        <th ><?php echo display('sl')?></th>
                                        <th><?php echo display('breaking_news')?></th>
                                        <th><?php echo display('post_time')?></th>
                                        <th ><?php echo display('action')?></th>
                                    </tr>

                                    <?php
                                    $sl = 1;

                                    foreach ($query as $row) {
                                        $json_decode = json_decode($row['title']);
                                    ?>
                                            <tr>
                                                <th><?php echo $sl; ?></th>
                                                <td id="td_<?php echo $row['id']; ?>"><?php echo html_escape($json_decode->news_title); ?></td>
                                                <td><?php echo date("d M Y", html_escape($row['time_stamp'])); ?></td>
                                                
                                                <td>
                                                    <?php if($this->permission->check_label('breaking_news')->update()->access()):?>
                                                    <span onclick="breakingNews(<?php echo html_escape($row['id']); ?>)" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></span>
                                                    <?php endif?>
                                                    <?php if($this->permission->check_label('breaking_news')->delete()->access()):?>
                                                    <a  href="<?php echo base_url(); ?>news/breacking/breaking_delete/<?php echo html_escape($row['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Do you want to delete this?')"><i class="fas fa-trash"></i></a>
                                                    <?php endif?>
                                                    <?php if($this->permission->check_label('breaking_news')->update()->access()):?>
                                                    <a  href="<?php echo base_url(); ?>news/breacking/breaking_status_edit/<?php echo html_escape($row['id']) . '/' . $row['status']; ?>" class="btn btn-primary btn-xs" title="Note: Click On for Slider start, Off for slider stop." ><?php echo ($row['status'] == 0) ? "On" : "Off";?></a>
                                                    <?php endif?>
                                                </td>
                                            </tr>

                                        <?php
                                        $sl++;
                                    }
                                    ?>
                                </table>
                            </div>
                            <?php echo form_close()?>

                            <div class="text-center">
                                <?php echo htmlspecialchars_decode($links); ?> 
                            </div>

                    </div>
                </div>
           