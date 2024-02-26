
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-warning card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-tasks"></i>
                                        </div>
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"><?php echo makeString(['total','post'])?></p>
                                        <h3 class="card-title fs-18 font-weight-bold"><?php echo @$total_post?>
                                            <small><?php echo makeString(['post'])?></small>
                                        </h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats">
                                            <a href="<?php echo base_url('news/news_list/newses')?>"><i class="typcn typcn-calendar-outline mr-2"></i><?php echo makeString(['total','post'])?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-success card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-comments"></i>
                                        </div>
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"><?php echo makeString(['total','comments'])?></p>
                                        <h3 class="card-title fs-21 font-weight-bold"><?php echo $total_comments?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats">
                                            <a href="<?php echo base_url('comments/comments_manage/index')?>"><i class="typcn typcn-calendar-outline mr-2"></i><?php echo makeString(['total','comments'])?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-danger card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"><?php echo makeString(['total','subscribers'])?></p>
                                        <h3 class="card-title fs-21 font-weight-bold"><?php echo @$total_subscribers?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats">
                                            <a href="<?php echo base_url('comments/comments_manage/index')?>"><i class="typcn typcn-calendar-outline mr-2"></i><?php echo makeString(['total','subscribers'])?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-info card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"><?php echo makeString(['total','user'])?></p>
                                        <h3 class="card-title fs-21 font-weight-bold"><?php echo @$user->total_users?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats">
                                            <a href="<?php echo base_url('reporter/subscriber_manage/index')?>"><i class="typcn typcn-upload mr-2"></i><?php echo makeString(['total','user'])?></a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="row">
                            
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-warning card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-tasks"></i>
                                        </div>
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"><?php echo makeString(['today','post'])?></p>
                                        <h3 class="card-title fs-18 font-weight-bold"><?php echo @$today_post?>
                                            <small><?php echo makeString(['post'])?></small>
                                        </h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats">
                                            <i class="typcn typcn-calendar-outline mr-2"></i><?php echo makeString(['today','post'])?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-success card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-user-tie"></i>
                                        </div>
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"><?php echo makeString(['total','reporter'])?></p>
                                        <h3 class="card-title fs-21 font-weight-bold"><?php echo @$user->total_reporter?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats">
                                            <i class="typcn typcn-calendar-outline mr-2"></i><?php echo makeString(['total','reporter'])?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-danger card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"><?php echo makeString(['today','subscribers'])?></p>
                                        <h3 class="card-title fs-21 font-weight-bold"><?php echo @$today_subscribers?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats">
                                            <i class="typcn typcn-calendar-outline mr-2"></i><?php echo makeString(['today','subscribers'])?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-success card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-comments"></i>
                                        </div>
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"><?php echo makeString(['today','comments'])?></p>
                                        <h3 class="card-title fs-21 font-weight-bold"><?php echo @$today_comments?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats">
                                            <i class="typcn typcn-calendar-outline mr-2"></i><?php echo makeString(['today','comments'])?>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>





            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0">Today latest 5  Post</h6>
                                </div>
                                <div class="text-right">
                                    <div class="actions">
                                        <a href="#" class="action-item"><i class="ti-reload"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                                <div class=table-responsive>
                                    <!--<table class="table table-sm table-nowrap card-table">-->
                                    <table class="table display table-bordered table-striped table-hover bg-white m-0 card-table">
                                        
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Reporter</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach($latest_post as $latest){?>
                                                <tr>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <img src="<?php echo base_url('uploads/thumb/').$latest->image?>" class="avatar-img" alt="...">
                                                        </div>
                                                    </td>
                                                    <td><?php echo html_escape($latest->title)?></td>
                                                    <td><?php echo html_escape($latest->category_name)?></td>
                                                    <td><?php echo html_escape($latest->name)?></td>
                                                    <td><a target="__blank" href="<?php echo base_url().@$latest->encode_title?>" class="btn btn-success-soft btn-sm"><i class="far fa-eye"></i></a></td>
                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                   
                        </div>
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0">
                                    Today Populer 5 Post</h6>
                                </div>
                                <div class="text-right">
                                    <div class="actions">
                                        <a href="#" class="action-item"><i class="ti-reload"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                                <div class=table-responsive>
                                    <!--<table class="table table-sm table-nowrap card-table">-->
                                    <table class="table display table-bordered table-striped table-hover bg-white m-0 card-table">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Reporter</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach($latest_post as $latest){?>
                                                <tr>
                                                    <td>
                                                        <div class="avatar-group">
                                                            <img src="<?php echo base_url('uploads/thumb/').$latest->image?>" class="avatar-img" alt="...">
                                                        </div>
                                                    </td>
                                                    <td><?php echo html_escape($latest->title)?></td>
                                                    <td><?php echo html_escape($latest->category_name)?></td>
                                                    <td><?php echo html_escape($latest->name)?></td>
                                                    <td><a target="__blank" href="<?php echo base_url().@$latest->encode_title?>" class="btn btn-success-soft btn-sm"><i class="far fa-eye"></i></a></td>
                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                   
                        </div>
                    </div>
                </div>

            </div>