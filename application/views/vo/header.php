<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?=isset($webpage['backend_title'])&&!empty($webpage['backend_title'])?$webpage['backend_title']:''?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link href="<?=base_url('assets/vo/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/vo/css/bootstrap-responsive.min.css')?>" rel="stylesheet">

    <!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">-->
    <link href="<?=base_url('assets/vo/css/font-awesome.min.css')?>" rel="stylesheet">

    <link href="<?=base_url('assets/vo/css/ui-lightness/jquery-ui-1.10.0.custom.min.css')?>" rel="stylesheet">

    <link href="<?=base_url('assets/vo/css/base-admin-3.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/vo/css/base-admin-3-responsive.css')?>" rel="stylesheet">

    <link href="<?=base_url('assets/vo/css/pages/dashboard.css')?>" rel="stylesheet">

    <link href="<?=base_url('assets/vo/css/sticky-footer.css')?>?v=0.01" rel="stylesheet">  
    <link href="<?=base_url('assets/vo/css/custom.css')?>?v=0.01" rel="stylesheet">    

    <link href="<?=  base_url('assets/vo/js/plugins/msgbox/jquery.msgbox.css')?>" rel="stylesheet">
    <link href="<?=  base_url('assets/vo/js/plugins/msgGrowl/css/msgGrowl.css')?>" rel="stylesheet">

    <link rel="shortcut icon" href="" type="image/x-icon">
	<link rel="icon" href="" type="image/x-icon">
    <!--<script src="<?=base_url('assets/vo/js/jquery-1.11.0.js')?>"></script>-->
    <script src="<?=base_url('assets/vo/js/libs/jquery-1.9.1.min.js')?>"></script>
    <!--full calendar-->
    <link href="<?=base_url('assets/vo/css/fullcalendar.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/vo/css/jquery.qtip.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/vo/css/calendar.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/vo/css/jquery.auto-complete.css')?>" rel="stylesheet">

    <script src="<?=base_url('assets/vo/js/libs/moment.min.js')?>"></script>
    <script src="<?=base_url('assets/vo/js/fullcalendar.min.js')?>"></script>
    <script src="<?=base_url('assets/vo/js/jquery.qtip.min.js')?>"></script>

    <script src="<?=base_url('assets/vo/js/fullcalendar_lang-all.js')?>"></script>
    <script src="<?=base_url('assets/vo/js/fullcalendar_lang-all.js')?>"></script>
    <script src="<?=base_url('assets/vo/js/bootstrap-datepicker.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/vo/ckeditor/ckeditor.js?t='.rand(1000,9999))?>"></script>
    <script src="<?=base_url('assets/vo/js/jquery.auto-complete.js')?>"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet">


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

<body>

<nav class="navbar navbar-inverse no-print" role="navigation">

	<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <i class="glyphicon glyphicon-cog"></i>
    </button>
    <a class="navbar-brand" href="<?=  base_url('vo/profile')?>"><?=isset($webpage['backend_title'])&&!empty($webpage['backend_title'])?$webpage['backend_title']:''?></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav navbar-right">

		<?php
		if($islogin) {

            $token = $this->cookie->get("token");

		?>

		<li class="dropdown">

			<a href="javscript:;" class="dropdown-toggle" data-toggle="dropdown">
				<i class="glyphicon glyphicon-user"></i>
				<?=$userdata['name']?>
				<b class="caret"></b>
			</a>

			<ul class="dropdown-menu">                
				<li><a href="javascript:logout();">Log Out</a></li>
			</ul>

		</li>
        <?php
		}
		?>        
    </ul>


  </div><!-- /.navbar-collapse -->
</div> <!-- /.container -->
</nav>



<?php
if($islogin) {
?>

<div class="subnavbar no-print">

	<div class="subnavbar-inner">

		<div class="container">

			<a href="javascript:;" class="subnav-toggle" data-toggle="collapse" data-target=".subnav-collapse">
		      <span class="sr-only">Toggle navigation</span>
		      <i class="icon-reorder"></i>

		    </a>

			<div class="subnav-collapse">
				<ul class="mainnav">

                    <li <?=($this->Function_model->get_current_page())=='profile'?'class="active"':''?>>
                        <a href="<?=  base_url($init['langu'].'/vo/profile')?>">
							<i class="glyphicon glyphicon-home"></i>
							<span><?=$init['lang']['Control Panel']?></span>
						</a>
					</li>

                    

                    <?php //if(in_array("使用者", $init["admin_control"])){?>
                    <li class="dropdown <?=($this->Function_model->get_current_page())=='users'?'active':''?>">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" title="">
							<i class="glyphicon glyphicon-user"></i>
							<span><?=$init['lang']['Users']?></span>
							<b class="caret"></b>
						</a>

						<ul class="dropdown-menu">
							<li><a href="<?=base_url($init['langu'].'/vo/users/add')?>"><?=$init['lang']['Add New']?> <?=$init['lang']['Users']?></a></li>
                            <li><a href="<?=base_url($init['langu'].'/vo/users/list')?>"> <?=$init['lang']['Users']?>  <?=$init['lang']['Management']?></a></li>
                            <!--<li class="divider"></li>                            
                            <li><a href="<?=base_url($init['langu'].'/vo/default/list')?>">Default management</a></li>-->
                                            
						</ul>
                    </li>


                    <li class="dropdown <?=($this->Function_model->get_current_page())=='banner'?'active':''?>">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" title="">
                            <i class="glyphicon glyphicon-file"></i>
                            <span>Pages</span>
                            <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="<?=base_url($init['langu'].'/vo/article/add')?>"><?=$init['lang']['Add New']?> <?=$init['lang']['Article']?></a></li> 
                            <li><a href="<?=base_url($init['langu'].'/vo/article/list')?>"><?=$init['lang']['Article']?> <?=$init['lang']['Management']?></a></li>
                        </ul>
                    </li>

                    
                    <li class="dropdown <?=($this->Function_model->get_current_page())=='settings'?'active':''?>">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" title="">
                            <i class="glyphicon glyphicon-cog"></i>
                            <span><?=$init['lang']['Settings']?></span>
                            <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu">                            
                            <li><a href="<?=base_url($init['langu'].'/vo/settings/list')?>"><?=$init['lang']['Settings']?></a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="<?=base_url($init['langu'])?>">
                            <i class="glyphicon glyphicon-home"></i>
                            <span><?=$init['lang']['Front End']?></span>
                        </a>
                    </li>




                    

                     
				</ul>
 

			</div> <!-- /.subnav-collapse -->

		</div> <!-- /container -->

	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
<?php
}
?>