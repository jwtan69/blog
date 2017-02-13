<!-- banner -->

<div class="banner-1">

</div>

	<!-- technology-left -->
	<div class="technology">
	<div class="container">
		<div class="col-md-9 technology-left">
			<div class="agileinfo">

		  <h2 class="w3"><?=$articleData['article_variable']?></h2>
			<div class="single">
			   <img src="<?=$articleData['main_img']?>" class="img-responsive" alt="">
			    <div class="b-bottom"> 
			      
			      <!-- Go to www.addthis.com/dashboard to customize your tools --> 
			      <div style="margin:20px 0px;" class="addthis_inline_share_toolbox"></div>

			      <div style="margin:30px 0px;">
			      <?=$articleData['content_cn']?>
				  </div> 

				  <p><?=date('d-m-Y',strtotime($articleData['created_date']))?> <a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span><?=$articleData['view_count']?></a></p>
				</div>
			 </div>
			  
				
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- technology-right -->
		<div class="col-md-3 technology-right">
				
				
				<div class="blo-top1">
							
					<div class="tech-btm">
					<div class="search-1">
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

						
						
					<div class="insta">
					<h4>Ad</h4>
						
					</div>
					</div>
					
					
				</div>
				
			
		</div>
		<div class="clearfix"></div>
		<!-- technology-right -->
	</div>
</div>