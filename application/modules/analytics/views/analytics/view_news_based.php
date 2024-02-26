

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['news','based','user','analytics'])?> </h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr role="row">
                                    <th class="sorting_asc"><?php echo display('news')?></th>
                                    <th class="sorting"><?php echo display('country')?></th>
                                    <th class="sorting"><?php echo display('ip')?></th>
                                    <th class="sorting"><?php echo display('user')?></th>
                                </thead>

                                <tbody>
                                <?php foreach($url as $info){?>
                                  <tr role="row" class="odd">
                                    
                                    <td ><?php echo html_escape($info->link);?></td>
                                    <td><?php echo html_escape($info->country);?></td>
                                    <td><?php echo html_escape($info->ip);?></td>
                                    <td><?php echo html_escape($info->total_link_user);?></td>
                                  </tr>
                                  <?php }?>
                                </tbody>
                                <?php echo htmlspecialchars_decode(@$links);?>
                            </table>
                        </div>
                    </div>
                </div>
            