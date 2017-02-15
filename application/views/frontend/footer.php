

<div class="footer">
		<div class="container">
			<div class="col-md-4 footer-left wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
				<h4>免责声明</h4>
				<p>本站所有文章由会员即时发表，本站对所有文章的真实性、完整性及立场等，不负任何法律责任。所有文章内容只代表发文者个人意见，并非本网站之立场，用户不应信赖内容，并应自行判断内容之真实性。</p>
				<!--
				<img src="images/t4.jpg" class="img-responsive" alt="">
					<div class="bht1">
						<a href="singlepage.html">Read More</a>
					</div>
				-->
			</div>
			<!--
			<div class="col-md-4 footer-middle wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
			<h4>Latest Tweet</h4>
			<div class="mid-btm">
				<p>Sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod .</p>
				<a href="https://w3layouts.com/">https://w3layouts.com/</a>
			</div>
			
				<p>Consectetur adipisicing Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod .</p>
				<a href="https://w3layouts.com/">https://w3layouts.com/</a>
		
			</div>
			
			<div class="col-md-4 footer-right wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
				<h4>Newsletter</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
						<div class="name">
							<form action="#" method="post">
								<input type="text" placeholder="Your Name" required="">
								<input type="text" placeholder="Your Email" required="">
								<input type="submit" value="Subscribed Now">
							</form>
						
						</div>	
						
							<div class="clearfix"> </div>
					
			</div>
			-->
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="copyright wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
		<div class="container">
			<p>© 2017 BaNaNa866. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
		</div>
	</div>
</body>

<!-- Go to www.addthis.com/dashboard to customize your tools --> 
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58a1b9c2c43d4305"></script> 

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=161000307737943";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>
/*
	//Disable cut copy paste
    $('body').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
   
    //Disable mouse right click
    $("body").on("contextmenu",function(e){
        return false;
    });
*/

    function toSearch(){
      event.preventDefault();
      var search = $("input[type='Search']").val();
      if(search != '' && search != 'Search'){
        location.href='<?=base_url($init['langu'].'/search/')?>'+search;
      }

    }
</script>
</html>