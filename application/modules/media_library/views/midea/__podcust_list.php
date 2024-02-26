<?php
    $user_type = $this->session->userdata('user_type');
?>    




                <div class="card mb-4">

                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['podcust','list'])?></h6>
                        </div>
                    </div>

                    <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover medias-top">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Title</th>
                                        <th>File Name</th>
                                        <th><?php echo makeString(['file','url'])?></th>
                                    </tr>

                                    <?php
                                        $sl = 1;
                                        foreach ($lists as $row) {
                                            $imgurl = ($row->podcust_url?$row->podcust_url:base_url());
                                    ?>
                                        <tr>
                                            <th><?php echo $sl; ?></th>
                                            <td><?php echo $row->title?></td>
                                            <td><?php echo html_escape($row->file_name); ?></td>
                                            <td>
                                                <input type="text" value="<?php echo $imgurl . 'uploads/' . html_escape(@$row->file_name); ?>" onClick="this.setSelectionRange(0, this.value.length)" class='form-control'/></td>
                                        </tr>
                                    <?php
                                        $sl++;
                                    }
                                    ?>
                                </table>    
                            </div>

                    </div>
                </div>
            