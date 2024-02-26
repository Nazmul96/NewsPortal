
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('positioning')?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php 
                            echo form_open('news/positioning/position');
                        ?>
                           <div class="form-group">
                                <select name="category" class="form-control" required="1">
                                    <option value=""><?php echo makeString(['select','category'])?></option>   
                                    <option <?php echo $selected_category == 'home' ? 'selected' : ''; ?>><?php echo display('home')?></option>
                                    <?php
                                    if (isset($categories) && is_array($categories)) {
                                        foreach ($categories as $key => $value) {
                                            echo '<option value="' . $value->slug . '" ' . ($selected_category == $value->slug ? 'selected' : '') . '>' . html_escape($value->category_name) . '</option>';
                                        }
                                        unset($selected_category);
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="<?php echo display('search')?>" class="btn btn-success" name="search">
                            </div>
                       <?php echo form_close();?>



                        <?php  echo form_open('news/positioning/update_positioning'); ?>
                         
                            <div class="float-right margin-buttom15">
                                <input type="hidden" value="<?php echo html_escape(@$s_c); ?>" name="category">
                                <input type="submit" value="<?php echo display('update')?>" class="btn btn-success btn-sm social_auth">
                            </div>
                           
                            <table class="table table-bordered table-hover ">
                                <thead>
                                    <tr>
                                        <th><?php echo display('title')?></th>
                                        <th width="3%"><?php echo display('position')?></th>
                                        <th width="2%"><?php echo display('action')?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php                                                                           
                                    if (isset($newses) && is_array($newses)) {
                                        foreach ($newses as $key => $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo html_escape($value->title); ?></td>
                                                
                                                <td><input type="numver"  name="position[<?php echo html_escape($value->id); ?>]" value="<?php echo html_escape($value->p_position); ?>" class="form-control"></td>
                                                <?php if($this->permission->check_label('positioning')->delete()->access()):?>
                                                <td><a href="<?php echo base_url(); ?>news/positioning/delete_positionbyid/<?php echo html_escape($value->id); ?>" onclick="return confirm('Do you want to delete this ?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                                                <?php endif?>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                            
                        <?php echo form_close();?>


                    </div>
                </div>
           