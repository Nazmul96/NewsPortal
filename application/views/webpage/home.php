
<section class="latest_score container-fluid mt-2 p-4">
        <h2>All Latest Score</h2>
        <div class="row">
              <div class="col-md-4">
                  <div class="latest_score_grid">
                    <p class="col-md-5">Zimbabwe Tour of Sri Lanka, 2024
                      2nd ODi |  08 Jan 2024</p>
                    <p class="col-md-5 text-right text-warning">Live</p>
                  </div>
              </div>
              <div class="col-md-4">
                <div class="latest_score_grid">
                  <p class="col-md-5">Zimbabwe Tour of Sri Lanka, 2024
                    2nd ODi |  08 Jan 2024</p>
                  <p class="col-md-5 text-right text-warning">Live</p>
                </div>
             </div>
             <div class="col-md-4">
              <div class="latest_score_grid">
                <p class="col-md-5">Zimbabwe Tour of Sri Lanka, 2024
                  2nd ODi |  08 Jan 2024</p>
                <p class="col-md-5 text-right text-warning">Live</p>
              </div>
          </div>
        </div>
</section>
    <section class="container first_ads">Advertisement</section>
    <section class="container-fluid mt-1 p-4">
      <div class="row p-1">
        <div class="col-xl-6 p-1">
            <img src="<?php echo base_url()?>uploads/<?php echo $latest_random_news[0]->image;?>" class="card-img-top large-content-img" alt="Left Image" style="height: 415px;"/>
            
            <div class="large-content">
              <div class="row small-content-card">
                  <div class="col-md-12">
                    <h5 style="color:#fff;"><?php echo $latest_random_news[0]->title?></h5>
                    
                    <div class="large-content-news">news</div>
                    <div style="position: relative;">
                      <i style="color:yellow" class="fa fa-share-alt share_icon"></i>
                    </div>
                  </div>
                  
              </div>
            </div>
            
        </div>
        <div class="col-xl-4 p-1">
          <?php foreach($latest_random_news as $key=>$latest_random_new){?>
             <?php 
                  if($key==0){
                    continue;
                  }
              ?>
              <div class="small-content <?php if($key > 1) {
                echo 'mt-3';
                }?>">
                <div class="row small-content-card">
                    <div class="col-md-3">
                      <img class="small-content-card-img" src="<?php echo base_url()?>uploads/<?php echo $latest_random_new->image;?>" class="card-img-top"alt="Left Image"/>
                    </div>
                    <div class="col-md-9"  style="position:relative;">
                     <h5 class="small-content-card-text">
                     <?php echo $latest_random_new->title;?>
                     </h5>
                        

                        <div class="small-content-card-news-text">news</div>

                        <div>
                          <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                        </div>
                    </div>
                </div>
              </div>
            <?php }?>
          </div> 
          <div class="col-xl-2 second_ads">
                <span class="text-white">Ads</span>
        </div> 
      </div>
    </section>
    <section class="container-fluid p-4 cricket_section">
      <h3>Cricket</h3>
      <div class="row p-1">
        <div class="col-xl-4 p-1">
            <img src="https://raudexpress.com/newspaper/assets/newDesign/img/image-4-7.png" class="card-img-top large-content-img" style="height: 415px;" alt="Left Image"/>
            
            <div class="large-content">
              <div class="row small-content-card">
                  <div class="col-md-12">
                    <h5 style="color:#fff;">Fastest century in ranji trophy Rayan parg, Rishab pant</h5>
                    <h5 style="color:#fff;">Headline list</h5>
                    
                    <div class="large-content-news">news</div>
                    <div style="position: relative;">
                      <i style="color:yellow" class="fa fa-share-alt share_icon"></i>
                    </div>
                  </div>
                  
              </div>
            </div>
            
        </div>
        <div class="col-xl-4 p-1">
          <div class="small-content">
            <div class="row small-content-card">
                <div class="col-md-3">
                  <img class="small-content-card-img" src="https://raudexpress.com/newspaper/assets/newDesign/img/image-4-7.png" class="card-img-top"alt="Left Image"/>
                </div>
                <div class="col-md-9">
                     <p class="small-content-card-text">
                      <span>This is p tag one</span>
                      <br>
                      <span>This is p tag Two</span>
                     </p>
                     <div class="small-content-card-news-text">news</div>

                     <div>
                      <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                     </div>
                </div>
            </div>
          </div>
    
          <div class="small-content small-content-next">
            <div class="row small-content-card">
                <div class="col-md-3">
                  <img class="small-content-card-img" src="https://raudexpress.com/newspaper/assets/newDesign/img/image-4-7.png" class="card-img-top"alt="Left Image"/>
                </div>
                <div class="col-md-9"  style="position:relative;">
                     <p class="small-content-card-text">
                      <span>This is p tag one</span>
                      <br>
                      <span>This is p tag Two</span>
                     </p>
                     <div class="small-content-card-news-text">news</div>

                     <div>
                      <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                     </div>
                </div>
            </div>
          </div>
         
          <div class="small-content small-content-next">
            <div class="row small-content-card">
                <div class="col-md-3">
                  <img class="small-content-card-img" src="https://raudexpress.com/newspaper/assets/newDesign/img/image-4-7.png" class="card-img-top"alt="Left Image"/>
                </div>
                <div class="col-md-9"  style="position:relative;">
                     <p class="small-content-card-text">
                      <span>This is p tag one</span>
                      <br>
                      <span>This is p tag Two</span>
                     </p>
                     <div class="small-content-card-news-text">news</div>

                     <div>
                      <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                     </div>
                </div>
            </div>
          </div>
       
          <div class="small-content small-content-next">
            <div class="row small-content-card">
                <div class="col-md-3">
                  <img class="small-content-card-img" src="https://raudexpress.com/newspaper/assets/newDesign/img/image-4-7.png" class="card-img-top"alt="Left Image"/>
                </div>
                <div class="col-md-9"  style="position:relative;">
                     <p class="small-content-card-text">
                      <span>This is p tag one</span>
                      <br>
                      <span>This is p tag Two</span>
                     </p>
                     <div class="small-content-card-news-text">news</div>

                     <div>
                      <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                     </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 p-1">
          <div class="small-content">
            <div class="row small-content-card">
                <div class="col-md-3">
                  <img class="small-content-card-img" src="https://raudexpress.com/newspaper/assets/newDesign/img/image-4-7.png" class="card-img-top"alt="Left Image"/>
                </div>
                <div class="col-md-9"  style="position:relative;">
                     <p class="small-content-card-text">
                      <span>This is p tag one</span>
                      <br>
                      <span>This is p tag Two</span>
                     </p>
                     <div class="small-content-card-news-text">news</div>

                     <div>
                      <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                     </div>
                </div>
            </div>
          </div>
    
          <div class="small-content small-content-next">
            <div class="row small-content-card">
                <div class="col-md-3">
                  <img class="small-content-card-img" src="https://i.ytimg.com/vi/7ZwCzKMqPrY/maxresdefault.jpg" class="card-img-top"alt="Left Image"/>
                </div>
                <div class="col-md-9"  style="position:relative;">
                     <p class="small-content-card-text">
                      <span>This is p tag one</span>
                      <br>
                      <span>This is p tag Two</span>
                     </p>
                     <div class="small-content-card-news-text">news</div>

                     <div>
                      <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                     </div>
                </div>
            </div>
          </div>
         
          <div class="small-content small-content-next">
            <div class="row small-content-card">
                <div class="col-md-3">
                  <img class="small-content-card-img" src="https://i.ytimg.com/vi/7ZwCzKMqPrY/maxresdefault.jpg" class="card-img-top"alt="Left Image"/>
                </div>
                <div class="col-md-9"  style="position:relative;">
                     <p class="small-content-card-text">
                      <span>This is p tag one</span>
                      <br>
                      <span>This is p tag Two</span>
                     </p>
                     <div class="small-content-card-news-text">news</div>

                     <div>
                      <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                     </div>
                </div>
            </div>
          </div>
       
          <div class="small-content small-content-next">
            <div class="row small-content-card">
                <div class="col-md-3">
                  <img class="small-content-card-img" src="https://i.ytimg.com/vi/7ZwCzKMqPrY/maxresdefault.jpg" class="card-img-top"alt="Left Image"/>
                </div>
                <div class="col-md-9"  style="position:relative;">
                     <p class="small-content-card-text">
                      <span>This is p tag one</span>
                      <br>
                      <span>This is p tag Two</span>
                     </p>
                     <div class="small-content-card-news-text">news</div>

                     <div>
                      <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                     </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="container first_ads">Advertisement</section>
    <section class="container-fluid p-4 football_section">
      <h3>Cricket</h3>
      <div class="row p-1">
        <div class="col-xl-4 p-1">
            <img src="https://raudexpress.com/newspaper/assets/newDesign/img/image-5.png" class="card-img-top large-content-img" style="height: 415px;" alt="Left Image"/>
            
            <div class="large-content">
              <div class="row small-content-card">
                  <div class="col-md-12">
                    <h5 style="color:#fff;">Fastest century in ranji trophy Rayan parg, Rishab pant</h5>
                    <h5 style="color:#fff;">Headline list</h5>
                    
                    <div class="large-content-news">news</div>
                    <div style="position: relative;">
                      <i style="color:yellow" class="fa fa-share-alt share_icon"></i>
                    </div>
                  </div>
                  
              </div>
            </div>
            
        </div>
        <div class="col-xl-4 p-1">
          <div class="small-content">
            <div class="row small-content-card">
                <div class="col-md-3">
                  <img class="small-content-card-img" src="https://raudexpress.com/newspaper/assets/newDesign/img/image-5.png" class="card-img-top"alt="Left Image"/>
                </div>
                <div class="col-md-9">
                     <p class="small-content-card-text">
                      <span>This is p tag one</span>
                      <br>
                      <span>This is p tag Two</span>
                     </p>
                     <div class="small-content-card-news-text">news</div>

                     <div>
                      <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                     </div>
                </div>
            </div>
          </div>
    
          <div class="small-content small-content-next">
            <div class="row small-content-card">
                <div class="col-md-3">
                  <img class="small-content-card-img" src="https://raudexpress.com/newspaper/assets/newDesign/img/image-5.png" class="card-img-top"alt="Left Image"/>
                </div>
                <div class="col-md-9"  style="position:relative;">
                     <p class="small-content-card-text">
                      <span>This is p tag one</span>
                      <br>
                      <span>This is p tag Two</span>
                     </p>
                     <div class="small-content-card-news-text">news</div>

                     <div>
                      <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                     </div>
                </div>
            </div>
          </div>
         
          <div class="small-content small-content-next">
            <div class="row small-content-card">
                <div class="col-md-3">
                  <img class="small-content-card-img" src="https://raudexpress.com/newspaper/assets/newDesign/img/image-5.png" class="card-img-top"alt="Left Image"/>
                </div>
                <div class="col-md-9"  style="position:relative;">
                     <p class="small-content-card-text">
                      <span>This is p tag one</span>
                      <br>
                      <span>This is p tag Two</span>
                     </p>
                     <div class="small-content-card-news-text">news</div>

                     <div>
                      <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                     </div>
                </div>
            </div>
          </div>
       
          <div class="small-content small-content-next">
            <div class="row small-content-card">
                <div class="col-md-3">
                  <img class="small-content-card-img" src="https://raudexpress.com/newspaper/assets/newDesign/img/image-5.png" class="card-img-top"alt="Left Image"/>
                </div>
                <div class="col-md-9"  style="position:relative;">
                     <p class="small-content-card-text">
                      <span>This is p tag one</span>
                      <br>
                      <span>This is p tag Two</span>
                     </p>
                     <div class="small-content-card-news-text">news</div>

                     <div>
                      <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                     </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 p-1">
          <div class="small-content">
            <div class="row small-content-card">
                <div class="col-md-3">
                  <img class="small-content-card-img" src="https://raudexpress.com/newspaper/assets/newDesign/img/image-5.png" class="card-img-top"alt="Left Image"/>
                </div>
                <div class="col-md-9"  style="position:relative;">
                     <p class="small-content-card-text">
                      <span>This is p tag one</span>
                      <br>
                      <span>This is p tag Two</span>
                     </p>
                     <div class="small-content-card-news-text">news</div>

                     <div>
                      <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                     </div>
                </div>
            </div>
          </div>
    
          <div class="small-content small-content-next">
            <div class="row small-content-card">
                <div class="col-md-3">
                  <img class="small-content-card-img" src="https://raudexpress.com/newspaper/assets/newDesign/img/image-5.png" class="card-img-top"alt="Left Image"/>
                </div>
                <div class="col-md-9"  style="position:relative;">
                     <p class="small-content-card-text">
                      <span>This is p tag one</span>
                      <br>
                      <span>This is p tag Two</span>
                     </p>
                     <div class="small-content-card-news-text">news</div>

                     <div>
                      <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                     </div>
                </div>
            </div>
          </div>
         
          <div class="small-content small-content-next">
            <div class="row small-content-card">
                <div class="col-md-3">
                  <img class="small-content-card-img" src="https://raudexpress.com/newspaper/assets/newDesign/img/image-5.png" class="card-img-top"alt="Left Image"/>
                </div>
                <div class="col-md-9"  style="position:relative;">
                     <p class="small-content-card-text">
                      <span>This is p tag one</span>
                      <br>
                      <span>This is p tag Two</span>
                     </p>
                     <div class="small-content-card-news-text">news</div>

                     <div>
                      <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                     </div>
                </div>
            </div>
          </div>
       
          <div class="small-content small-content-next">
            <div class="row small-content-card">
                <div class="col-md-3">
                  <img class="small-content-card-img" src="https://raudexpress.com/newspaper/assets/newDesign/img/image-5.png" class="card-img-top"alt="Left Image"/>
                </div>
                <div class="col-md-9"  style="position:relative;">
                     <p class="small-content-card-text">
                      <span>This is p tag one</span>
                      <br>
                      <span>This is p tag Two</span>
                     </p>
                     <div class="small-content-card-news-text">news</div>

                     <div>
                      <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                     </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="container-fluid mt-1 p-4 premier_league">
      <h3>Premier League</h3>
      <div class="row p-1">
        <div class="col-xl-6 p-1">
            <img src="https://st.depositphotos.com/43708092/60447/i/600/depositphotos_604478050-stock-photo-harry-kane-tottenham-hotspur-looks.jpg" class="card-img-top large-content-img" style="height: 415px;" alt="Left Image"/>
            
            <div class="large-content">
              <div class="row small-content-card">
                  <div class="col-md-12">
                    <h5 style="color:#fff;">Fastest century in ranji trophy Rayan parg, Rishab pant</h5>
                    <h5 style="color:#fff;">Headline list</h5>
                    
                    <div class="large-content-news">news</div>
                    <div style="position: relative;">
                      <i style="color:yellow" class="fa fa-share-alt share_icon"></i>
                    </div>
                  </div>
                  
              </div>
            </div>
            
        </div>
        <div class="col-xl-6 p-1">
          <div class="small-content">
            <div class="row small-content-card">
                <div class="col-md-3">
                  <img class="small-content-card-img" src="https://st.depositphotos.com/43708092/60447/i/600/depositphotos_604478050-stock-photo-harry-kane-tottenham-hotspur-looks.jpg" class="card-img-top"alt="Left Image"/>
                </div>
                <div class="col-md-9"  style="position:relative;">
                     <p class="small-content-card-text">
                      <span>This is p tag one</span>
                      <br>
                      <span>This is p tag Two</span>
                     </p>
                     <div class="small-content-card-news-text">news</div>

                     <div>
                      <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                     </div>
                </div>
            </div>
          </div>
    
          <div class="small-content small-content-next">
            <div class="row small-content-card">
                <div class="col-md-3">
                  <img class="small-content-card-img" src="https://st.depositphotos.com/43708092/60447/i/600/depositphotos_604478050-stock-photo-harry-kane-tottenham-hotspur-looks.jpg" class="card-img-top"alt="Left Image"/>
                </div>
                <div class="col-md-9"  style="position:relative;">
                     <p class="small-content-card-text">
                      <span>This is p tag one</span>
                      <br>
                      <span>This is p tag Two</span>
                     </p>
                     <div class="small-content-card-news-text">news</div>

                     <div>
                      <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                     </div>
                </div>
            </div>
          </div>
         
          <div class="small-content small-content-next">
            <div class="row small-content-card">
                <div class="col-md-3">
                  <img class="small-content-card-img" src="https://st.depositphotos.com/43708092/60447/i/600/depositphotos_604478050-stock-photo-harry-kane-tottenham-hotspur-looks.jpg" class="card-img-top"alt="Left Image"/>
                </div>
                <div class="col-md-9"  style="position:relative;">
                     <p class="small-content-card-text">
                      <span>This is p tag one</span>
                      <br>
                      <span>This is p tag Two</span>
                     </p>
                     <div class="small-content-card-news-text">news</div>

                     <div>
                      <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                     </div>
                </div>
            </div>
          </div>
       
          <div class="small-content small-content-next">
            <div class="row small-content-card">
                <div class="col-md-3">
                  <img class="small-content-card-img" src="https://st.depositphotos.com/43708092/60447/i/600/depositphotos_604478050-stock-photo-harry-kane-tottenham-hotspur-looks.jpg" class="card-img-top"alt="Left Image"/>
                </div>
                <div class="col-md-9"  style="position:relative;">
                     <p class="small-content-card-text">
                      <span>This is p tag one</span>
                      <br>
                      <span>This is p tag Two</span>
                     </p>
                     <div class="small-content-card-news-text">news</div>

                     <div>
                      <i style="color:yellow" class="fa fa-share-alt small-content-icon"></i>
                     </div>
                </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <section class="container first_ads">Advertisement</section>