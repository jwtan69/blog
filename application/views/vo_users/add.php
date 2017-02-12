
    
    
<div class="main">

    <div class="container">

      <div class="row">
      	
      	<div class="col-md-12 col-xs-12">
      		
      		<div class="widget stacked">
					
				<div class="widget-header">
                    
                        <i class="glyphicon glyphicon-star"></i>
                        <h3><?=$mode=='Edit'?'Edit':'Add new'?> user</h3>
                   
				</div> <!-- /widget-header -->
				
				<div class="widget-content">

                    <div style="display:none">
                        <iframe id="uploadtarget" name="uploadtarget" height="0" width="0" frameborder="0" scrolling="yes"></iframe>
                        <form id="myForm" method="post" enctype="multipart/form-data" action="<?=base_url($init['langu'].'/vo/upload_handler');?>" target="uploadtarget">
                            <input type="file" id="files1" name="files1" onchange="submitImg()" />
                            <input type="hidden" id="element" name="element" value=""/>
                            <input type="hidden" id="picarea" name="picarea" value=""/>
                            <input type="hidden" id="width" name="width" value=""/>
                            <input type="hidden" id="height" name="height" value=""/>
                        </form>
                    </div>

					<form action="<?=  base_url($init['langu'].'/vo/users/submit')?>" method="post" id="validation-form" role="form" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="mode" id="mode" value="<?=$mode?>">
                    <input type="hidden" name="id" id="id" value="<?=($mode=='Edit')?$results['user_id']:''?>">
                    <fieldset>
                                        
                    
                    <div class="form-group">
                      <label for="department_id" class="col-lg-2">Role</label>

                            <div class="col-lg-10">
                                <select name="role_id" id="rolelist" class="form-control" onchange="auth_default(this.value)">      
                                        <option value="">Normal User</option>                              
                                    <?php
                                        if(!empty($rolelist)){
                                            foreach($rolelist as $k=>$v): 
                                    ?>
                                        <option value="<?=$k?>" <?=($mode == 'Edit')&&($results['role_id']==$k)?'selected="selected"':''?>><?=$v?></option>
                                    <?php
                                            endforeach;
                                        }
                                       
                                    ?>
                                </select>
                            </div>
                    </div>

                    

                    <div class="form-group">
                      <label for="name" class="col-lg-2">Name</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="name" id="name" value="<?=($mode=='Edit')?$results['name']:''?>">

                        </div>
                    </div>
                       
                    
                    
                    <div class="form-group">
                      <label for="password" class="col-lg-2">Password</label>
                        <div class="col-lg-10">
                        <?php
						$default_password = rand(100000,999999);
						?>
                        <?=($mode=='Edit')?'':'<span style="color:red;">Default password : '.$default_password.'</span><br>'?>
                        <input type="password" class="form-control" name="password" id="password" value="<?=($mode=='Edit')?'':$default_password?>" placeholder="Please leave blank if password unchange">

                        </div>
                    </div>
                        
                    <div class="form-group">
                      <label for="repassword" class="col-lg-2">Confirm Password</label>
                        <div class="col-lg-10">
                        <input type="password" class="form-control" name="repassword" id="repassword" value="<?=($mode=='Edit')?'':$default_password?>" placeholder="Please leave blank if password unchange">

                        </div>
                    </div>
                        
                    <div class="form-group">
                      <label for="gender" class="col-lg-2">Gender</label>
                        <div class="col-lg-10">
                            <label><input type="radio" name="gender" id="gender-m" value="M" <?=($mode == 'Edit')?($results['gender']=='M')?'checked="checked"':'':''?>> Male</label>&nbsp;&nbsp;
                            <label><input type="radio" name="gender" id="gender-f" value="F" <?=($mode == 'Edit')?($results['gender']=='F')?'checked="checked"':'':''?>> Female</label>

                        </div>
                    </div>


                     
                        
                    <div class="form-group">
                      <label for="email" class="col-lg-2">Email</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="email" id="email" value="<?=($mode=='Edit')?$results['email']:''?>">

                        </div>
                    </div>
                    
                
                    <div class="form-group">
                      <label for="mobile" class="col-lg-2">Mobile</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="mobile" id="mobile" value="<?=($mode=='Edit')?$results['mobile']:''?>">

                        </div>
                    </div>                    


                    <div class="form-group">
                      <label for="name" class="col-lg-2">Avatar</label>
                        <div class="col-lg-10">

                        <div id="avatar_uploaded">
                          <?php 
                          if($mode == "Edit"){
                            if($results['avatar'] != ""){
                            ?>
                              <img class="img-responsive" src="<?=$results['avatar']?>" style="width:150px;">
                            <?php 
                            }
                          }
                          
                          ?>
                        </div>
                        
                        <input type="button" name="picUpload" onclick="triggerUpload('avatar', 'avatar_uploaded', 480, 480)" class="btn btn-primary" value="Upload Picture" />
                        <input type="hidden" class="form-control" name="avatar" id="avatar" value="<?=($mode=='Edit')?$results['avatar']:''?>">
                        <span class="label label-danger">recommended resolution: <span id="avatar_size">480x480</span></span>

                        </div>
                    </div>
                    
                    
                    <div class="form-group">

                      <label class="col-lg-2">Activated</label>

                        <div class="col-lg-10">
                          <div class="checkbox">
                                  <label>
                                    <input  type="checkbox" name="activated" id="activated" <?=($mode == 'Edit')?($results['activated']==1)?'checked="checked"':'':''?>>
                                  </label>
                                </div>
                        </div>
                    </div> <!-- /.form-group -->
                    
                    
                    
                    <div class="form-group">
                        <div class="col-lg-2"></div>

                        <div class="col-lg-10">
                        <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i>Save</button>
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
var row_pc = 0;




</script>