
                <?php
                    $this->load->view('__filter'); 
                ?>

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('news_list')?></h6>
                            </div>
                            <form method="post" action="#" class="float-right">
                                <button  type="button" class="btn btn-success btn-md"  id="filter"  name="filter" data-toggle="toggle" data-style="ios" data-onstyle="success"><i class="fa fa-filter"></i> <?php echo makeString(['filter'])?></button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            
                            <table class="table table-bordered table-striped table-hover bg-white m-0 card-table">
                                
                                <thead>
                                    <tr>
                                        <th>#sl </th>
                                        <th><?php echo makeString(['image'])?> </th>
                                        <th><?php echo display('title');?></th>
                                        <th><?php echo display('category');?></th>
                                        <th><?php echo display('hit');?></th>
                                        <th><?php echo display('post_by');?></th>
                                        <th><?php echo display('publish_date');?></th>
                                        <th><?php echo makeString(['post','date']) ?></th>
                                        <th><?php echo display('preview')?></th>
                                        <th><?php echo display('status');?></th>
                                        <th width="100"><?php echo display('action');?></th>
                                    </tr>
                                </thead>


                                <tbody>

                                    <?php

                                    if(!empty($newslists)){
                                        $sl = 1;
                                        foreach ($newslists as $row) {
                                            $imgurl = ($row['image_base_url']?$row['image_base_url']:base_url());
                                            if($row['image']){
                                                $imageLink = $imgurl.'uploads/thumb/'.$row['image'];
                                            }else{
                                                $imageLink = base_url().$settings->logo;
                                            }
                                    ?>

                                        <tr>

                                            <td><?php echo $sl++; ?></td>
                                            <td><img src="<?php echo @$imageLink?>" width="60"></td>

                                            <td><?php echo htmlspecialchars_decode(@$row['title']); ?></td>
                                            <td>
                                                <span class="badge badge-success mr-1">
                                                    <?php echo html_escape(ucwords($row['category_name'])); ?> 
                                                </span>
                                            </td>
                                            <td><?php echo html_escape($row['reader_hit']); ?></td>
                                            <td><?php echo html_escape($row['name']); ?></td>
                                            
                                            <td><?php echo html_escape(@$row['publish_date']); ?></td>
                                            <td><?php echo html_escape(@$row['post_date']); ?></td>

                                            <td>
                                                <a class="btn btn-labeled btn-warning mb-2 mr-1" target="__blank" href="<?php echo base_url().@$row['encode_title']?>"> <?php echo display('preview')?></a>
                                            </td>
                                            
                                            <td>
                                                <?php if($this->permission->check_label('news_list')->update()->access()):?>
                                                <?php if ($row['status'] == 0) { ?>
                                                    <a class="btn btn-labeled btn-success mb-2 mr-1" title="Publish" href="<?php echo base_url(); ?>news/news_edit/unpublishd/<?php echo html_escape($row['news_id']); ?>"><?php echo display('publish');?></a>
                                                <?php } else { ?>
                                                    <a class="btn btn-labeled btn-warning mb-2 mr-1" title="Publishd" href="<?php echo base_url(); ?>news/news_edit/publishd/<?php echo html_escape($row['news_id']); ?>"><?php echo display('unpublish');?></a>
                                                <?php } ?>
                                                <?php endif?>
                                            </td>

                                            <td>
                                                <?php if($this->permission->check_label('news_list')->update()->access()):?>
                                                <a href="<?php echo base_url(); ?>news/news_edit/index/<?php echo html_escape($row['news_id']); ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                                <?php endif?>
                                                <?php if($this->permission->check_label('news_list')->delete()->access()):?>
                                                <a onclick="delete_cnf('<?php echo base_url(); ?>news/news_list/singal/<?php echo html_escape($row['news_id']); ?>')" href="javascript:void(0)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                <?php endif?>
                                            </td>
                                        </tr>

                                    <?php }?>

                                    <?php } else{?>
                                        <div class="alert alert-danger" role="alert">
                                            <span class="close" data-dismiss="alert">×</span>
                                            <h4 class="alert-heading">Post not found</h4>
                                        </div> 
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <?php echo htmlspecialchars_decode($links); ?>
                    </div>
                </div>
            