                
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-warning card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-tasks"></i>
                                        </div>
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"><?php echo makeString(['total','posts'])?></p>
                                        <h3 class="card-title fs-18 font-weight-bold"><?php echo @$total_post?>
                                            <small><?php echo makeString(['posts'])?></small>
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
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"><?php echo makeString(['total','users'])?></p>
                                        <h3 class="card-title fs-21 font-weight-bold"><?php echo @$user->total_users?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats">
                                            <a href="<?php echo base_url('reporter/subscriber_manage/index')?>"><i class="typcn typcn-upload mr-2"></i><?php echo makeString(['total','users'])?></a> 
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
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"><?php echo makeString(['todays','posts'])?></p>
                                        <h3 class="card-title fs-18 font-weight-bold"><?php echo @$today_post?>
                                            <small><?php echo makeString(['posts'])?></small>
                                        </h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats">
                                            <i class="typcn typcn-calendar-outline mr-2"></i><?php echo makeString(['todays','posts'])?>
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
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"><?php echo makeString(['total','reporters'])?></p>
                                        <h3 class="card-title fs-21 font-weight-bold"><?php echo @$user->total_reporter?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats">
                                            <i class="typcn typcn-calendar-outline mr-2"></i><?php echo makeString(['total','reporters'])?>
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
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"><?php echo makeString(['todays','subscribers'])?></p>
                                        <h3 class="card-title fs-21 font-weight-bold"><?php echo @$today_subscribers?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats">
                                            <i class="typcn typcn-calendar-outline mr-2"></i><?php echo makeString(['todays','subscribers'])?>
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
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"><?php echo makeString(['todays','comments'])?></p>
                                        <h3 class="card-title fs-21 font-weight-bold"><?php echo @$today_comments?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats">
                                            <i class="typcn typcn-calendar-outline mr-2"></i><?php echo makeString(['todays','comments'])?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                <div class="row">


                    <div class="col-lg-4">


                       <div class="card mb-4 mb-lg-0">
                        
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fs-17 font-weight-600 mb-0"><?php echo display('pie_chart')?></h6>
                                    </div>
                                    <div class="text-right">
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="chart mb-3">
                                    <canvas id="doughutChart" height="170"></canvas>
                                </div>

                                <div class="chart-legend">
                                  
                                    <div class="chart-legend-item">
                                        <div class="chart-legend-color kelly-green2"></div>
                                        <p><?php echo makeString(['posts'])?></p>
                                        <p class="percentage text-muted"><?php  echo $lastWeekPost->total_post;?></p>
                                    </div>                                    

                                    <div class="chart-legend-item">
                                        <div class="chart-legend-color kelly-green2"></div>
                                        <p><?php echo makeString(['read','hit'])?></p>
                                        <p class="percentage text-muted"><?php  echo $lastWeekPost->read_hit;?></p>
                                    </div>

                                    <div class="chart-legend-item">
                                        <div class="chart-legend-color whisper"></div>
                                        <p><?php echo makeString(['comments'])?></p>
                                        <p class="percentage text-muted"><?php echo $lastWeekComments;?></p>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>


                    <div class="col-lg-8">

                        <div class="card-body">
                            <div class="header bg-white pb-4">
                                <!-- Body -->
                                <div class="header-body mb-4">
                                    <div class="row align-items-end">
                                        <div class="col">

                                            <!-- Pretitle -->
                                            <h6 class="header-pretitle text-muted fs-11 font-weight-bold text-uppercase mb-1">
                                                <?php echo display('overview')?>
                                            </h6>

                                            <!-- Title -->
                                            <h1 class="header-title fs-21 font-weight-bold">
                                                <?php echo display('performance');?>
                                            </h1>

                                        </div>
                                        <div class="col-auto">
                                            <!-- Nav -->
                                            <ul class="nav nav-tabs header-tabs">
                                                <li class="nav-item">
                                                    <a href="#" id="0" class="nav-link text-center active" data-toggle="tab">
                                                        <h6 class="header-pretitle text-muted fs-11 font-weight-bold text-uppercase mb-1">
                                                            <?php echo display('posts')?>
                                                        </h6>
                                                        <h3 class="mb-0 fs-16 font-weight-bold">
                                                            <?php echo html_escape($yearly_total_post->total_post)?>
                                                        </h3>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" id="1" class="nav-link text-center" data-toggle="tab">
                                                        <h6 class="header-pretitle text-muted fs-11 font-weight-bold text-uppercase mb-1">
                                                            <?php echo makeString(['Read','Hit'])?>
                                                        </h6>
                                                        <h3 class="mb-0 fs-16 font-weight-bold">
                                                             <?php echo html_escape($yearly_total_post->read_hit)?>
                                                        </h3>
                                                    </a>
                                                </li>
                                               
                                            </ul>
                                        </div>
                                    </div> <!-- / .row -->
                                </div> <!-- / .header-body -->
                                <!-- Footer -->
                                <div class="header-footer">
                                    <div class="chart">
                                        <canvas id="forecast" width="300" height="100"></canvas>
                                    </div>
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
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo makeString(['todays','latest','posts'])?></h6>
                                </div>
                                <div class="text-right">
                                    <div class="actions">
                                        <a href="#" class="action-item"><i class="ti-reload"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">


                            <div class="table-responsive">
                            <table class="table table-striped dt-responsive example" >
                                

                                 <thead>
                                    <tr>
                                        <th><?php echo display('image')?></th>
                                        <th><?php echo display('title')?></th>
                                        <th><?php echo display('category')?></th>
                                        <th><?php echo display('reporter')?></th>
                                        <th><?php echo display('read_hit')?></th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php foreach($latest_post as $latest){?>
                                        <tr>
                                            <td><img src="<?php echo base_url('uploads/thumb/').$latest->image?>" width='60'></td>
                                            <td><a target="__blank" href="<?php echo base_url().@$latest->encode_title?>" ><?php echo html_escape($latest->title)?></a></td>
                                            <td><?php echo html_escape($latest->category_name)?></td>
                                            <td><?php echo html_escape($latest->name)?></td>
                                             <td><?php echo html_escape($latest->reader_hit)?></td>
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
                                        <?php echo makeString(['todays','popular','posts'])?>
                                    </h6>
                                </div>
                                <div class="text-right">
                                    <div class="actions">
                                        <a href="#" class="action-item"><i class="ti-reload"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped dt-responsive  example " >
                                    
                                    <thead>
                                        <tr>
                                            <th><?php echo display('image')?></th>
                                            <th><?php echo display('title')?></th>
                                            <th><?php echo display('category')?></th>
                                            <th><?php echo display('reporter')?></th>
                                            <th><?php echo display('read_hit')?></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach($latest_post as $latest){?>
                                            
                                            <tr>
                                                <td>
                                                    <div class="avatar-group">
                                                        <img src="<?php echo base_url('uploads/thumb/').$latest->image?>" width='60'>
                                                    </div>
                                                </td>
                                                <td><a target="__blank" href="<?php echo base_url().@$latest->encode_title?>"><?php echo html_escape($latest->title)?></a></td>
                                                <td><?php echo html_escape($latest->category_name)?></td>
                                                <td><?php echo html_escape($latest->name)?></td>
                                                <td><?php echo html_escape($latest->reader_hit)?></td>
                                            </tr>

                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>

            <?php echo $this->load->view('../../assets/js/chart.php');?>


        <script type="text/javascript" src="<?php echo base_url(); ?>application/modules/dashboard/assets/js/script.js?v=2.1"></script>