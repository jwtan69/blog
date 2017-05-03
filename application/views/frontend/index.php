<!-- banner -->

<div class="banner">
  <div class="container"> 
    <h2>一天一香蕉，生活更愉快！</h2>
  </div>
</div>

<!--
<div class="services w3l wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
    <div class="container">
      <div class="grid_3 grid_5">
        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
          <ul id="myTab" class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">FASHION</a></li>
            <li role="presentation" class=""><a href="#safari" role="tab" id="safari-tab" data-toggle="tab" aria-controls="safari">TRAVEL</a></li>
            <li role="presentation" class=""><a href="#trekking" role="tab" id="trekking-tab" data-toggle="tab" aria-controls="trekking">MUSIC</a></li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade" id="expeditions" aria-labelledby="expeditions-tab">
              
              <div class="col-md-4 col-sm-5 tab-image">
                <img src="<?=base_url('assets/images/f2.jpg')?>" class="img-responsive" alt="Wanderer">
              </div>
              <div class="col-md-4 col-sm-5 tab-image">
                <img src="<?=base_url('assets/images/f4.jpg')?>" class="img-responsive" alt="Wanderer">
              </div>
              <div class="col-md-4 col-sm-5 tab-image">
                <img src="<?=base_url('assets/images/f3.jpg')?>" class="img-responsive" alt="Wanderer">
              </div>
              <div class="clearfix"></div>
            </div>
            
            
            <div role="tabpanel" class="tab-pane fade" id="safari" aria-labelledby="safari-tab">
              <div class="col-md-4 col-sm-5 tab-image">
                <img src="<?=base_url('assets/images/t1.jpg')?>" class="img-responsive" alt="Wanderer">
              </div>
              <div class="col-md-4 col-sm-5 tab-image">
                <img src="<?=base_url('assets/images/t2.jpg')?>" class="img-responsive" alt="Wanderer">
              </div>
              <div class="col-md-4 col-sm-5 tab-image">
                <img src="<?=base_url('assets/images/t3.jpg')?>" class="img-responsive" alt="Wanderer">
              </div>
              <div class="clearfix"></div>
            </div>
            <div role="tabpanel" class="tab-pane fade active in" id="trekking" aria-labelledby="trekking-tab">

              <div class="col-md-4 col-sm-5 tab-image">
                <img src="<?=base_url('assets/images/m2.jpg')?>" class="img-responsive" alt="Wanderer">
              </div>
              <div class="col-md-4 col-sm-5 tab-image">
                <img src="<?=base_url('assets/images/m1.jpg')?>" class="img-responsive" alt="Wanderer">
              </div>
              <div class="col-md-4 col-sm-5 tab-image">
                <img src="<?=base_url('assets/images/m3.jpg')?>" class="img-responsive" alt="Wanderer">
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  -->

  <!-- technology-left -->
  <div class="technology">
  <div class="container">
    <div class="col-md-9 technology-left">
    <div class="tech-no">

      <!-- technology-top -->
      <?php if(isset($artResult1)){?>
       <div class="tc-ch wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
        
          <div class="tch-img">
            <a href="<?=base_url($init['langu'].'/details/'.$artResult1[0]['article_id'].'/'.$artResult1[0]['article_variable'])?>"><img src="<?=$artResult1[0]['main_img']?>" class="img-responsive" alt=""></a>
          </div>
          
          <h3>
          <a href="<?=base_url($init['langu'].'/details/'.$artResult1[0]['article_id'].'/'.$artResult1[0]['article_variable'])?>"><?=$artResult1[0]['article_variable']?></a>
          </h3>
          <h6><?=date('d-m-Y',strtotime($artResult1[0]['created_date']))?></h6>
            <p><?=mb_substr($artResult1[0]['page_desc'],0,100)?>...</p>
            <!--
            <div class="bht1">
              <a href="singlepage.html">Continue Reading</a>
            </div>
            <div class="soci">
              <ul>
                <li class="hvr-rectangle-out"><a class="fb" href="#"></a></li>
                <li class="hvr-rectangle-out"><a class="twit" href="#"></a></li>
                <li class="hvr-rectangle-out"><a class="goog" href="#"></a></li>
                <li class="hvr-rectangle-out"><a class="pin" href="#"></a></li>
                <li class="hvr-rectangle-out"><a class="drib" href="#"></a></li>
              </ul>
            </div>
            -->
            <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
      <?php }?>
      <!-- technology-top -->


      <!-- technology-top -->
      <?php if(isset($artResult2)){?>
      <div class="w3ls">
        <?php foreach($artResult2 as $k => $v){?>
        <div class="col-md-6 w3ls-left wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
           <div class="tc-ch">
            <div class="tch-img">
              <a href="<?=base_url($init['langu'].'/details/'.$v['article_id'].'/'.$v['article_variable'])?>">
              <img src="<?=$v['main_img']?>" class="img-responsive" alt=""></a>
            </div>
          
            <h3><a href="<?=base_url($init['langu'].'/details/'.$v['article_id'].'/'.$v['article_variable'])?>"><?=$v['article_variable']?></a></h3>
            <h6><?=date('d-m-Y',strtotime($v['created_date']))?></h6>
              <p><?=mb_substr($v['page_desc'],0,100)?>...</p>
              <!--
              <div class="bht1">
                <a href="singlepage.html">Read More</a>
              </div>
              <div class="soci">
                <ul>
                  <li class="hvr-rectangle-out"><a class="fb" href="#"></a></li>
                  <li class="hvr-rectangle-out"><a class="pin" href="#"></a></li>
                </ul>
              </div>
              -->
              <div class="clearfix"></div>
          </div>
        </div>
        <?php }?>
        <div class="clearfix"></div>
      </div>
      <?php }?>
      <!-- technology-top -->

      <?php if(isset($artResult3)){?>
      <?php foreach($artResult3 as $k => $v){?>
      <div class="wthree">
         <div class="col-md-6 wthree-left wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
          <div class="tch-img">
              <a href="<?=base_url($init['langu'].'/details/'.$v['article_id'].'/'.$v['article_variable'])?>"><img src="<?=$v['main_img']?>" class="img-responsive" alt=""></a>
            </div>
         </div>
         <div class="col-md-6 wthree-right wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
            <h3><a href="<?=base_url($init['langu'].'/details/'.$v['article_id'].'/'.$v['article_variable'])?>"><?=$v['article_variable']?></a></h3>
            <h6><?=date('d-m-Y',strtotime($v['created_date']))?></h6>
              <p><?=mb_substr($v['page_desc'],0,100)?>...</p>
              
              <!--
              <div class="bht1">
                <a href="singlepage.html">Read More</a>
              </div>
              <div class="soci">
                <ul>
                  
                  <li class="hvr-rectangle-out"><a class="twit" href="#"></a></li>
                  <li class="hvr-rectangle-out"><a class="pin" href="#"></a></li>
                </ul>
              </div>
              -->
              <div class="clearfix"></div>
          
         </div>
         <div class="clearfix"></div>
      </div>
      <?php }?>
      <?php }?>
      
      
      </div>
    </div>
    <!-- technology-right -->
    <div class="col-md-3 technology-right">
        
        
        <div class="blo-top1">
              
          <div class="tech-btm">
          
          <?=//$fbSharePageCode?>
          
          <div class="search-1 wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
              <form action="" method="" onsubmit="toSearch();">
                <input type="search" name="Search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
                <input type="submit" value=" ">
              </form>
            </div>

          <h4>熱門文章 </h4>

            <?php foreach($popularArticle as $k => $v){?>
            <div class="blog-grids wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
              <div class="blog-grid-left">
                <a href="<?=base_url($init['langu'].'/details/'.$v['article_id'])?>"><img src="<?=$v['main_img']?>" class="img-responsive" alt=""></a>
              </div>
              <div class="blog-grid-right">
                
                <h5><a href="<?=base_url($init['langu'].'/details/'.$v['article_id'])?>"><?=$v['article_variable']?></a> </h5>
              </div>
              <div class="clearfix"> </div>
            </div>
            <?php }?>

           
           
          <div class="insta wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
          <h4>Ad</h4>
            
          </div>
          </div>
          
          
          
        </div>
        
      
    </div>
    <div class="clearfix"></div>
    <!-- technology-right -->
  </div>
</div>

