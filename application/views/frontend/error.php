<!-- banner -->

<div class="banner-1">

</div>

	<!-- technology-left -->
	<div class="technology">
	<div class="container">
		<div class="col-md-9 technology-left">
			<div class="agileinfo">

		  	<h2 class="w3">抱歉，頁面不存在！</h2>
			<?php 
				foreach($results as $k => $v){
					if($k%2 == 0){
						echo '<div class="blog-grids1">';
					}
			?>
				<div class="col-md-6 blog-grid">
					<div class="blog-grid-left1">
						<a href="<?=base_url($init['langu'].'/details/'.$v['article_id'])?>"><img src="<?=$v['main_img']?>" alt=" " class="img-responsive"></a>
					</div> 
					<div class="blog-grid-right1">
						<a href="<?=base_url($init['langu'].'/details/'.$v['article_id'])?>"><?=$v['article_variable']?></a>
						<h4><?=date('d-m-Y',strtotime($v['created_date']))?></h4>
						<p><?=$v['page_desc']?></p>
					</div>
					<div class="clearfix"> </div>
				</div>

			<?php 

					if($k%2 == 1 || $k==count($results)-1){
						echo '<div class="clearfix"> </div>';
						echo '</div>';
					}

				}
			?>


			</div>
		</div>
		<!-- technology-right -->
		<div class="col-md-3 technology-right">
				
				
				<div class="blo-top1">
							
					<div class="tech-btm">

					<?=$fbSharePageCode?>

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