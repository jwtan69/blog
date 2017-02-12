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
                        <input type="text" class="form-control" name="variable" id="variable" value="<?=($mode=='Edit')?$results['variable']:''?>" readonly="readonly">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="intro" class="col-lg-2">Introduction</label>
                        <div class="col-lg-10">
                        <textarea class="form-control" name="intro" id="intro" readonly="readonly"><?=($mode=='Edit')?$results['intro']:''?></textarea>

                        </div>
                    </div>

                    <!-- Your code here -->
                    <div class="form-group">
                      <label for="value" class="col-lg-2">Method</label>
                        <div class="col-lg-10">
                        <select name="method" class="form-control">
                          <option value="FIX" <?=$struc['METHOD']=='FIX'?'selected="selected"':''?>>固定運費</option>
                          <option value="PERCENTAGE" <?=$struc['METHOD']=='PERCENTAGE'?'selected="selected"':''?>>百分比</option>                          
                        </select>

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="variable" class="col-lg-2">Value (如果使用固定運費,請填寫美金運費；如果使用百分比，請填寫0.01代表1%）</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="value" id="value" value="<?=$struc['VALUE']?>">
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="variable" class="col-lg-2">Minimum (最低運費，低於這個費用則使用這個運費）</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="min" id="min" value="<?=$struc['MIN']?>">
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