
    
    
<div class="main">

    <div class="container">

      <div class="row">
      	
      	<div class="col-md-12 col-xs-12">
      		
      		<div class="widget stacked widget-table action-table">
					
				<div class="widget-header">
                        <i class="glyphicon glyphicon-th-list"></i>
                        <h3>Users List</h3>
                    
				</div> <!-- /widget-header -->
				
				<div class="widget-content">
                    
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td>
                                
                                
                                    <div class="col-md-4 col-xs-5">
                                    <select name="role_id" id="role_id" class="form-control">
                                        <option value="">ALL</option>
                                        <?php
                                        if(!empty($rolelist)) {
                                          foreach($rolelist as $k=>$v) {
                                            ?>
                                            <option value="<?=$k?>" <?=isset($role_id)&&$role_id==$k?'selected="selected"':''?>><?=$v?></option>
                                            <?php
                                          }
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="col-md-5 col-xs-5">
                                    <input class="form-control"  type="text" name="keywords" id="keywords" value="<?=isset($keywords)?$keywords:''?>" placeholder="Search by Email">
                                    </div>
                                    <div class="col-md-2 col-xs-2">
                                    <button class="btn btn-default" type="button" onclick="toSearch()"><?=$init['lang']['Search']?></button>
                                    </div>
                                    
                                
                            </td>
                            <td width="20%">
                                
                                <div align="right"><a href="<?=base_url($init['langu'].'/vo/users/add')?>" class="btn btn-primary">Add New User</a></div>
                                
                            </td>
                        </tr>
                    </table>
					
					<?php
                    if(!empty($results)){
                    ?>
                       <table class="table table-striped table-bordered">
                           <tr>
                           	   <th><?=$init['lang']['Created Date']?> / <?=$init['lang']['Modified Date']?></th>	                               
                               <th>Role</th>                               
                               <th>Name</th>
                               <th>Email</th>
                               <th>Tel</th>
                               <th></th>
                           </tr>
                        <?php
                            foreach($results as $v) {
                        ?>
                           <tr>
                           		<td><?=$v['created_date']?><br/><?=$v['modified_date']?></td>
                                <td><?=isset($rolelist[$v['role_id']])?$rolelist[$v['role_id']]:'Normal User'?></td>
                                <td><?=$v['name']?></td>
                                <td><?=$v['email']?></td>
                                <td><?=$v['mobile']?></td>                                
                                <td>
                                                                    
                                    
                                    <a href="<?=  base_url($init['langu']."/vo/users/edit/".$v['user_id'])?>" class="btn btn-info" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>

                                    <a href="javascript:Delete('<?=$v['user_id']?>')" class="btn btn-danger" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>
                                    
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
                location.href = '<?=  base_url($init['langu'].'/vo/users/delete')?>/'+id;
            }
		});
    }


    function toSearch(){

      var role_id = $("#role_id").val();
      var keywords = $("#keywords").val();

      if(role_id == '') {
        role_id = 'ALL';
      }

      if(keywords == '') {
        keywords = 'ALL';
      }

      location.href="<?=base_url($init['langu'].'/vo/users/list')?>/"+role_id+'/'+keywords;

    }
</script>