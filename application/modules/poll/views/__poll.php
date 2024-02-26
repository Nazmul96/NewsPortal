                <script>
                    function polljs_value(str)
                    {
                        var text = $("#td_" + str).text();
                        var base_url = '<?php echo base_url()?>';
                        $("#id").val(str);
                        $("#pulling").val(text);
                        $(".legend").text('Update Question');
                        $("#MyForm").attr("action", base_url+'poll/polling/edit')
                        $(".button").attr("value", 'Update')
                    }
                </script>

                <div class="card mb-4">
                
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('entry_question')?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                            <?php 
                                $attributes = array('id' => 'MyForm', 'onsubmit' => 'return FormValidation()');
                                echo form_open('poll/polling/save_poll', $attributes);
                            ?>     

                                <input type="hidden" id="base_url" value="<?php echo base_url()?>"> 

                                <div class="form-group">
                                    <label><?php echo makeString(['question'])?></label>
                                    <input type="hidden" name="id" id="id" value=""/>
                                    <textarea name="pulling" id="pulling" class="form-control" cols="45"></textarea>
                                </div>

                                <div class="form-group">
                                    <div class="voffset1"></div>
                                    <button type="submit" class="btn btn-success btn-ms button"><?php echo display('save')?></button>
                                </div>

                            <?php form_close();?>




                        <?php  echo form_open('poll/polling/update_poll');?>
                            <div class="table-responsive">
                                    
                              <table class="table table-bordered table-hover">
                                <tr class="t_bg">
                                    <th width="30">Sl</th>
                                    <th><?php echo display('question_list')?></th>
                                    <th width="35"><?php echo display('yes')?></th>
                                    <th width="35"><?php echo display('no')?></th>
                                    <th width="35"><?php echo display('nc')?></th>
                                    <th width="90"><?php echo display('post_time')?></th>
                                    <th colspan="3"><?php echo display('action')?></th>
                                </tr>

                                <?php
                                    $sl = 1;
                                    foreach ($query as $row) {

                                ?>
                                        <tr  id="tr_<?php echo $sl; ?>">
                                            <th><?php echo $sl; ?></th>
                                            <td id="td_<?php echo $row['id']; ?>" onclick="polljs_value(<?php echo $row['id']; ?>)"><?php echo $row['question']; ?></td>
                                            <td align="center" bgcolor="#00CC66"><?php echo $row['yes']; ?></td>
                                            <td align="center" bgcolor="#3399FF"><?php echo $row['no']; ?></td>
                                            <td align="center" bgcolor="#FF0055"><?php echo $row['on_comment']; ?></td>
                                            <td align="center"><?php echo date("d M Y", $row['time_stamp']); ?></td>
                                            <th width="50" onclick="polljs_value(<?php echo $row['id']; ?>)"><a href="javascript:void(0)" class='btn btn-ms btn-success btn-circle'><i class="fas fa-edit"></i></a></th>
                                            <th width="50">
                                                <a onclick="delete_cnf('<?php echo base_url(); ?>poll/polling/delete/<?php echo $row['id']; ?>');" href="javascript:void(0)" class='btn btn-ms btn-danger btn-circle'><i class="fas fa-trash"></i></a>
                                            </th>
                                            <th width="50">
                                                <a class="btn btn-ms btn-<?php echo ($row['status'] == 1 ? "danger" : "info") ;?> btn-circle" href="<?php echo base_url(); ?>poll/polling/status_edit/<?php echo $row['id'] . '/' . $row['status']; ?>">
                                                    <?php echo ($row['status'] == 1 ? "<i class='fas fa-times'></i>" : "<i class='fas fa-check'></i>") ;?>  
                                                </a>
                                            </th>
                                        </tr>
                                        
                                <?php
                                        $sl++;
                                    }
                                ?>
                                </table>

                            </div>

                        <?php echo form_close()?>


                    </div>
                </div>
           

