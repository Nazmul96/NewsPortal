

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('ad_list')?></h6>
                            </div>

                            <a href="<?php echo base_url(); ?>advertisement/ad" class='btn btn-success btn-rounded w-md m-b-5 float-right text-white' > <i class="fa fa-backward"></i> <?php echo makeString(['add','new','ad'])?></a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <?php if (isset($ads) && is_array($ads)) { ?>

                                <table class="table table-bordered">
                                    <tr>
                                        <th>#SL</th>
                                        <th><?php echo display('ad_position')?></th>
                                        <th><?php echo display('embed_code')?></th>
                                        <th><?php echo makeString(['desktop'])?>/<?php echo display('tablet')?></th>
                                        <th><?php echo makeString(['mobile'])?></th>
                                        <th><?php echo display('action')?></th>
                                    </tr>

                                    <?php
                                    $i = 0;
                                    foreach ($ads as $key => $value) {

                                        echo '<tr>';
                                        echo '<td>' . ++$i . '</td>';
                                        echo '<td>';
                                            if($value->page==1){echo "Home Page $value->ad_position";}
                                            elseif($value->page==2){echo "Cetagory Page $value->ad_position";}
                                            else{echo "View Page $value->ad_position";}

                                        echo '</td>';
                                        echo '<td width="150">' . $value->embed_code . '</td>';

                                        echo "<td>";
                                        if($this->permission->check_label('update_advertise')->update()->access()){
                                            echo "<a class='btn btn-sm btn-".($value->large_status==0?'danger':'success')."' href=" . base_url() . "advertisement/ad/update_lg_status/" . $value->id . "/".$value->large_status.">".($value->large_status==0?'OFF':'ON')."</a>";
                                        }
                                        echo "</td>";
                                        echo "<td>";
                                        if($this->permission->check_label('update_advertise')->update()->access()){
                                        echo "<a class='btn btn-sm btn-".($value->mobile_status==0?'danger':'success')."' href=" . base_url() . "advertisement/ad/update_sm_status/" . $value->id . "/".$value->mobile_status.">".($value->mobile_status==0?'OFF':'ON')."</a>";
                                        }
                                        "</td>";
                                        echo "<td>";
                                        
                                            if($this->permission->check_label('update_advertise')->update()->access()){
                                                echo "<a href='" . base_url() . "advertisement/ad/edit_view/" . $value->id . "' class='btn btn-sm btn-success'><i class='fa fa-edit'></i></a>&nbsp";
                                            }
                                            if($this->permission->check_label('update_advertise')->delete()->access()){
                                                echo  "<a href='" . base_url() . "advertisement/ad/delete/" . $value->id . "' onclick='return delete_confirm()' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i></a>";
                                            }

                                        echo "</td>";
                                        echo '</tr>';
                                    }
                                    ?>

                                </table>
                            <?php } ?>


                        </div>


                    </div>
                </div>
            