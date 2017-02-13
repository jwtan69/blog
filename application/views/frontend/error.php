<!-- banner -->

<div class="banner-1">

</div>

	<!-- technology-left -->
	<div class="technology">
	<div class="container">
		<div class="col-md-9 technology-left">
			<div class="agileinfo">

		  <h2 class="w3">抱歉，頁面不存在！</h2>
			<div class="single">
			   <img src="images/sing-1.jpg" class="img-responsive" alt="">
			    <div class="b-bottom"> 
			      <h5 class="top">What turn out consetetur sadipscing elit</h5>
				   <p class="sub">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever since,Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industryLorem Ipsum has been the industry's standard dummy text ever since Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
				 
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
			            <div class="blog-grids">
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