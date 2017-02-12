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
                    <table class="table table-bordered">
                      <thead>
                        <tr><th>Index</th><th>From >=</th><th>To <=</th><th>Method</th><th>Value (如果使用固定運費,請填寫美金運費；如果使用百分比，請填寫0.01代表1%）</th><th>Minimum (最低運費，低於這個費用則使用這個運費）</th></tr>
                      </thead>
                      <tbody id="settinglist">
                      </tbody>
                      <tfoot>
                        <tr><td colspan="5"><a href="javascript:addRow()" class="btn btn-primary">+</a></td></tr>
                      </tfoot>
                    </table>
                                            
                    
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
var settinglist = <?=$struc?>;
var index = 1;

function addTDs(index, from, to, method, value, min){

  var content = '';

    content += '<td>'+index+'</td>';

    content += '<td><input type="text" class="form-control" name="from[]"  value="'+from+'"></td>';

    content += '<td><input type="text" class="form-control" name="to[]" value="'+to+'"></td>';

    content += '<td><select name="method[]" class="form-control"><option value="FIX" '+(method=='FIX'?'selected="selected"':'')+'>固定運費</option><option value="PERCENTAGE" '+(method=='PERCENTAGE'?'selected="selected"':'')+'>百分比</option></select></td>';

    content += '<td><input type="text" class="form-control" name="value[]" value="'+value+'"></td>';

    content += '<td><input type="text" class="form-control" name="min[]" value="'+min+'"></td>';

    content += '<td><a href="javascript:deleteRow('+index+')" class="btn btn-primary">X</a></td>';

    return content;

}

function addRow(){

  var content = addTDs(index, "","","","","");
  var tr = $("<tr>").attr({"class":"row"+index}).html(content);
  $("#settinglist").append(tr);
  index++;
}

function deleteRow(index) {  
  $(".row"+index).remove();
}

function updateTable(){

  
  $("#settinglist").html("");

  for(var i=0; i<settinglist.length; i++) {

    var content = addTDs(index, settinglist[i]['FROM'], settinglist[i]['TO'], settinglist[i]['METHOD'], settinglist[i]['VALUE'], settinglist[i]['MIN']);

    var tr = $("<tr>").attr({"class":"row"+index}).html(content);
    $("#settinglist").append(tr);
    index++;



  }
  


}

$(document).ready(function(){

  updateTable();

});

</script>