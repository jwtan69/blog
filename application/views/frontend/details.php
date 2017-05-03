<!-- banner -->

<div class="banner-1">

</div>

	<!-- technology-left -->
	<div class="technology">
	<div class="container">
		<div class="col-md-9 technology-left">
			<div class="agileinfo">

		  <h2 class="w3"><?=$articleData['article_variable']?></h2>
			
			  
				
				<div class="clearfix"></div>
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