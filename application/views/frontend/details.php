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
			   
			    <div class="b-bottom"> 
			      
			    
			      

				  <div style="margin:30px 0px;">
			      <span style="font-size:14px;color:red;">如转载涉及版权等问题请原作者与我们联系(668ananab@gmail.com)我们将在第一时间处理，谢谢！</span>
				  </div> 


				  
				</div>
			 </div>
			  
				
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
			            <div class="blog-grids wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
			              <div class="blog-grid-left">
			                
			              </div>
			              <div class="blog-grid-right">
			                
			                
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