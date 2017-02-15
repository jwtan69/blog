<div class="main">

    <div class="container">

      <div class="row">
      	
      	<div class="col-md-12 col-xs-12">
      		
      		<div class="widget stacked">
					
				<div class="widget-header">
                    
                        <i class="glyphicon glyphicon-star"></i>
                        <h3><?=$mode=='Edit'?$init['lang']['Edit']:$init['lang']['Add New']?> <?=$display_name?></h3>
                   
				</div> <!-- /widget-header -->

        <div style="display:none;">
                        <iframe id="uploadtarget" name="uploadtarget" height="0" width="0" frameborder="0" scrolling="yes"></iframe>
                        <form id="myForm" method="post" enctype="multipart/form-data" action="<?=base_url($init['langu'].'/vo/upload_handler');?>" target="uploadtarget">
                            <input type="file" id="files1" name="files1" onchange="submitImg()" />
                            <input type="hidden" id="element" name="element" value=""/>
                            <input type="hidden" id="picarea" name="picarea" value=""/>
                            <input type="hidden" id="width" name="width" value=""/>
                            <input type="hidden" id="height" name="height" value=""/>
                        </form>
                    </div>
				
				<div class="widget-content">
					<form action="<?=  base_url($init['langu'].'/vo/'.$pathname.'/submit')?>" method="post" id="validation-form" role="form" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="mode" id="mode" value="<?=$mode?>">
                    <input type="hidden" name="id" id="id" value="<?=($mode=='Edit')?$results[$id_column]:''?>">
                    <fieldset>
                    
                    <!-- Your code here -->
                    <div class="form-group">
                      <label for="article_variable" class="col-lg-2">文章分類</label>
                        <div class="col-lg-10">
                        <select class="form-control" id="category_id" name="category_id">
                        <?php foreach($categoryList as $k => $v){?>
                            <option value="<?=$k?>" <?=($mode=='Edit')?($k==$results['category_id']?'selected':''):''?> ><?=$v?></option>
                        <?php }?>
                        </select>
                        </div>
                    </div>


                    <div class="form-group">
                      <label for="article_variable" class="col-lg-2">文章標題</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="article_variable" id="article_variable" value="<?=($mode=='Edit')?$results['article_variable']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="article_variable" class="col-lg-2">作者</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="author" id="author" value="<?=($mode=='Edit')?$results['author']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="article_variable" class="col-lg-2">頁面關鍵字</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="page_keyword" id="page_keyword" value="<?=($mode=='Edit')?$results['page_keyword']:''?>">

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="article_variable" class="col-lg-2">主圖</label>
                        <div class="col-lg-10">
                        
                        <div id="" class="well">
                        <div id="main_img_uploaded">
                          
                        <?php 
                          if($mode=='Edit'){
                            if($results['main_img'] != ''){
                        ?>
                          <div>
                          <a href="<?=$results['main_img']?>" target="_blank"><img class="img-responsive" width="100px" src="<?=$results['main_img']?>"/></a>
                          <a class="btn btn-primary" href="javascript:deleteImgOne('main_img');">X</a>
                          </div>

                        <?php }}?>

                        </div>
                        <input type="button" name="picUpload" onclick="triggerUpload('main_img', 'main_img_uploaded', 736, 356)" class="btn btn-primary" value="Upload Photo">
                        <input type="hidden" class="form-control" id="main_img" name="main_img" value="<?=($mode=='Edit')?$results['main_img']:''?>"><span class="label label-danger">recommended resolution: <span id="avatar_size">736*356</span></span>
                        </div>

                        </div>
                    </div>

                    <!--
                    <div class="form-group">
                      <label for="article_variable" class="col-lg-2">FB圖片</label>
                        <div class="col-lg-10">

                        <div id="" class="well">
                        <div id="fb_img_uploaded">
                          
                          <?php 
                          if($mode=='Edit'){
                            if($results['fb_img'] != ''){
                        ?>
                          <div>
                          <a href="<?=$results['fb_img']?>" target="_blank"><img class="img-responsive" width="100px" src="<?=$results['fb_img']?>"/></a>
                          <a class="btn btn-primary" href="javascript:deleteImgOne('fb_img');">X</a>
                          </div>

                        <?php }}?>


                        </div>
                        <input type="button" name="picUpload" onclick="triggerUpload('fb_img', 'fb_img_uploaded', 736, 356)" class="btn btn-primary" value="Upload Photo">
                        <input type="hidden" class="form-control" id="fb_img" name="fb_img" value="<?=($mode=='Edit')?$results['fb_img']:''?>"><span class="label label-danger">recommended resolution: <span id="avatar_size">736*356</span></span>
                        </div>

                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="article_variable" class="col-lg-2">頁面標題</label>
                        <div class="col-lg-10">
                        <input type="text" class="form-control" name="page_title" id="page_title" value="<?=($mode=='Edit')?$results['page_title']:''?>">

                        </div>
                    </div>
                    -->

                    <div class="form-group">
                      <label for="article_variable" class="col-lg-2">頁面簡介</label>
                        <div class="col-lg-10">
                        <textarea type="text" class="form-control" name="page_desc" id="page_desc"><?=($mode=='Edit')?$results['page_desc']:''?></textarea>

                        </div>
                    </div>

                    <div class="form-group">
                      <label for="content_en" class="col-lg-2">内容</label>
                        <div class="col-lg-10">
                        <textarea class="form-control" name="content_cn" id="content_cn" style="height:200px;"><?=($mode=='Edit')?$results['content_cn']:''?></textarea>
                        <?php echo $this->ckeditor->replace("content_cn"); ?>

                        </div>
                    </div>

                    <!--
                    <div class="form-group">
                      <label for="photo" class="col-lg-2">照片</label>
                        <div class="col-lg-10">

                          <div id="photo_uploaded">
                            
                          </div>
                          <a href="javascript:addPhoto();" class="btn btn-primary">+</a>                                            

                        </div>
                    </div>
                    -->
                    

                    

                     
                    
                        
                    
                    
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

var product_images = <?=$mode=="Edit"&&!empty($results['struct_en'])?$results['struct_en']:"[]"?>;


function deleteImg(index){
  var tmp = [];
  for(var i=0; i<product_images.length;i++) {
    if(i!=index) {
      tmp.push(product_images[i]);
    }
  }
  product_images = tmp;
  displayImage();

}


function displayImage(){
  $("#photo_uploaded").html("");
  for(var i=0; i<product_images.length;i++) {
    addOnePhoto(i, product_images[i].img);
  }
  total_images_slot = product_images.length;
}


function addPhoto(){
  addOnePhoto(total_images_slot, '');
  total_images_slot++;
}


function addOnePhoto(i, img){

  var photo_uploaded = $("<div>").attr({"id":"photo_uploaded"+i});

  if(img != ""){
      var images = $("<img>").attr({"src":img,"class":"img-responsive"});
      var div = $("<div>").html('<a class="btn btn-primary" href="javascript:deleteImg('+i+');">X</a>').append(images);
      
      photo_uploaded.append(div);
  }


  var input = $("<input>").attr({"type":"button","name":"picUpload","onclick":"triggerUpload('photo"+i+"', 'photo_uploaded"+i+"', 1920, 700)","class":"btn btn-primary"}).val("Upload Photo");

  var hidden = $("<input>").attr({"type":"hidden","class":"form-control","id":"photo"+i,"name":"photo[]","value":img});
  var span = $("<span>").attr({"class":"label label-danger"}).html('recommended resolution: <span id="avatar_size">1920*700</span>');

  var container = $("<div>").attr({"id":"container"+i,"class":"well"}).append(photo_uploaded).append(input).append(hidden).append(span);

    
  $("#photo_uploaded").append(container);

}

$(document).ready(function(){

  displayImage();
  

});

function deleteImgOne($id){
  $('#'+$id+'_uploaded').html('');
  $('#'+$id).val('');
}


</script>