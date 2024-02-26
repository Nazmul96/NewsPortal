

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Live Now! User Analytics</h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">



                        <div class="row">
                            <div class="col-md-3 border p-2 bg-light">
                                <h3>Right Now Users</h3>
                                <?php echo html_escape($total_user);?>

                            </div>
                            <div class="col-md-3 border p-2 bg-light">
                                <h3>URL</h3>

                                <table class="table table-condensed">
                                    <tbody>
                                        <tr>
                                          <th>Url Link</th>
                                          <th>User</th>
                                        </tr>
                                        <?php foreach($url as $info){?>
                                        <tr>
                                          <td><?php echo html_escape($info->link); ?></td>
                                          <td><?php echo html_escape($info->total_link_user); ?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-3 border p-2 bg-light">
                                <h3 >User Location</h3>
                                <table class="table table-condensed">
                                    <tbody>
                                    <tr>
                                      <th><?php echo display('location');?></th>
                                      <th>Max user</th>
                                    </tr>
                                    <?php foreach($user_country as $info){?>
                                    <tr>
                                      <td><?php echo html_escape($info->country); ?></td>
                                      <td><?php echo html_escape($info->total_country_user); ?></td>
                                    </tr>
                                    <?php }?>
                                  </tbody>
                                </table>
                            </div>

                            <div class="col-md-3 border p-2 bg-light">
                                <h3 >User Agent</h3>
                                <table class="table table-condensed">
                                    <tbody>
                                    <tr>
                                      <th>Browser</th>
                                      <th><?php echo display('user')?></th>
                                    </tr>
                                    <?php foreach($browser as $info){?>
                                    <tr>
                                      <td><?php echo html_escape($info->browser); ?></td>
                                      <td><?php echo html_escape($info->total_browser_user); ?></td>
                                    </tr>
                                    <?php }?>
                                  </tbody>
                                  </table>
                            </div>


                        </div>

                    </div>
                </div>
           








