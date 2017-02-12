
    
    
<div class="main">

    <div class="container">

      <div class="row">
      	
      	<div class="col-md-12 col-xs-12">
      		
      		<div class="widget stacked widget-table action-table">
					
				<div class="widget-header">
                        <i class="glyphicon glyphicon-th-list"></i>
                        <h3><?=$display_name?> <?=$init['lang']['Management']?></h3>
                    
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
                    
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td width="80%">
                                
                                  <div class="col-xs-4">
                                    <select id="search_column" name="search_column" class="form-control">
                                      <?php
                                      if(!empty($search_columns)) {
                                        foreach($search_columns as $k=>$v) {
                                       ?>
                                       <option value="<?=$k?>" <?=isset($search_column)&&$search_column==$k?'selected="selected"':''?>><?=$v?></option>
                                       <?php   
                                        }
                                      }
                                      ?>
                                    </select>
                                  </div>
                                  <div class="col-xs-4">
                                    <input type="text" id="q" name="q" class="form-control" value="<?=isset($q)&&$q!="ALL"?$q:''?>" placeholder="<?=$init['lang']['Enter your keywords here']?>" />
                                  </div>
                                  <div class="col-xs-4">
                                    <a href="javascript:toSearch()" class="btn btn-primary"><?=$init['lang']['Search']?></a>
                                  </div>                                  
                                
                                <script>
                                  function toSearch(){

                                    var search_column = $("#search_column").val();
                                    var q = $("#q").val();

                                    if(q != "") {

                                      location.href="<?=base_url($init['langu']."/vo/".$pathname."/list")?>/"+search_column+"/"+q;

                                    } else {
                                      location.href="<?=base_url($init['langu']."/vo/".$pathname."/list")?>/";
                                    }


                                  }
                                </script>

                            </td>
                            <td width="20%">
                                
                                <div align="right"><a href="<?=base_url($init['langu'].'/vo/'.$pathname.'/add')?>" class="btn btn-primary"><?=$init['lang']['Add New']?> <?=$display_name?></a></div>
                                
                            </td>
                        </tr>
                    </table>
					
					<?php
                    if(!empty($results)){
                    ?>
                       <table class="table table-striped table-bordered">
                           <tr>
                           	   <th width="15%"><?=$init['lang']['Created Date']?> / <?=$init['lang']['Modified Date']?></th>	
                               <th>Title</th>
                               <th width="10%"></th>
                           </tr>
                        <?php
                            foreach($results as $v) {
                        ?>
                           <tr>
                           		<td><?=$v['created_date']?><br/><?=$v['modified_date']?></td>
                                <td><?=$v['article_variable']?></td>
                                <td>
                                    <a href="<?=  base_url($init['langu']."/vo/".$pathname."/edit/".$v[$id_column])?>" class="btn btn-info" title="<?=$init['lang']['Edit']?>"><i class="glyphicon glyphicon-edit"></i></a>
                                    
                                    <a href="javascript:Delete('<?=$v[$id_column]?>')" class="btn btn-danger" title="<?=$init['lang']['Delete']?>"><i class="glyphicon glyphicon-trash"></i></a>
                                    
                                    
                                </td>
                           </tr>
                        <?php
                            }
                        ?>
                        
                       </table>   
                    
                       <div><?=$paging?></div>
                       
                    <?php
                    }else{
                        echo $init['lang']['The List is empty'];
                    }
					?>
					
				</div> <!-- /widget-content -->
					
			</div> <!-- /widget -->	
		</div>							
      	
      </div> <!-- /row -->

    </div> <!-- /container -->
    
</div> <!-- /main -->   

<script>
    function Delete(id)
    {
        $.msgbox("<?=$init['lang']['Are you sure you want to delete this data']?>", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"}
		  ]
		}, function(result) {
		  	if(result == 'Yes'){
                location.href = '<?=  base_url($init['langu'].'/vo/'.$pathname.'/delete')?>/'+id;
            }
		});
    }
</script>