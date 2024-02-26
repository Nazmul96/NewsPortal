

                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">News Post</h6>
                            </div>
                                <a href="<?php echo  base_url('settings/language/index') ?>" class="btn btn-success btn-md float-right text-white">Language Home</a>
                        </div>
                    </div>

                    <div class="card-body">


                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td colspan="2">

                                        <?php echo  form_open('settings/language/addPhrase', ' class="form-inline" ') ?> 

                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="phrase[]" placeholder=" Phrase Name">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-success" type="submit"><?php echo display('add')?></button>
                                                </div>
                                            </div>
                                        </div>

                                          
                                        <?php echo  form_close(); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th><i class="fa fa-th-list"></i></th>
                                    <th>Phrase</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($phrases)) {?>
                                    <?php $sl = 1 ?>
                                    <?php foreach ($phrases as $value) {?>
                                    <tr>
                                        <td><?php echo  $sl++ ?></td>
                                        <td><?php echo  html_escape($value->phrase) ?></td>
                                    </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>

                          </table>

                          <?php echo htmlspecialchars_decode(@$links)?>

                    </div>
                </div>
           