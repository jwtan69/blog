<div class="main">

    <div class="container">

      <div class="row">
      	
      	<div class="col-md-12 col-xs-12">
      		
      		<div class="widget stacked">
					
				<div class="widget-header">
                    
                        <i class="glyphicon glyphicon-star"></i>
                        <h3><?=$mode=='Edit'?$init['lang']['Edit']:$init['lang']['Add New']?> <?=$display_name?></h3>
                   
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
					<form action="<?=  base_url($init['langu'].'/vo/'.$pathname.'/Submit')?>" method="post" id="validation-form" role="form" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="mode" id="mode" value="<?=$mode?>">
                    <input type="hidden" name="id" id="id" value="<?=($mode=='Edit')?$results[$id_column]:''?>">
                    <fieldset>
                    
                    
                    
                    <div class="form-group">
                      <label for="variable" class="col-lg-2">Variable</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="variable" id="variable" value="<?=($mode=='Edit')?$results['variable']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="intro" class="col-lg-2">Introduction</label>
                        <div class="col-lg-10">
                        <textarea class="form-control" name="intro" id="intro"><?=($mode=='Edit')?$results['intro']:''?></textarea>

                        </div>
                    </div>

                    <!-- Your code here -->
                    <div class="form-group">
                      <label for="value" class="col-lg-2">Value</label>
                        <div class="col-lg-10">
                        <textarea class="form-control" name="value" id="value"><?=($mode=='Edit')?$results['value']:''?></textarea>

                        </div>
                    </div>
                        
                    
                    
                    <div class="form-group">
                        <div class="col-lg-2"></div>

                        <div class="col-lg-10">
                        <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> <?=$init['lang']['Save']?></button>
                        </div>
                    </div>
                    
                  </fieldset>
                </form>
                    
                    
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->	
		</div>							
      	
      </div> <!-- /row -->

    </div> <!-- /container -->
    
</div> <!-- /main -->   
<script>
    
var mode = '<?=$mode?>';

</script>