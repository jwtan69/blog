<html>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/renodo/css/custom.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/bootstrap-responsive.min.css')?>" rel="stylesheet">
    <title>IMAGE TAGGING</title>
    <body>
    <center>
      <h2>Tag some products or material on your idea photo</h2>
      <p>Click any position in the photo to start:</p>

        <div id="container" style="margin:10px;">
            

            <div id="content" style="background-color:#EEEEEE;width:100%; float:left;">
                <div style="color:gray">
                    <center>
                        <div id="pointer_div" class="pointer_div" onclick="myFunction(event)" style = "width:700px;">
                        <img src="<?=$datainfo['mainpic']?>" style="width:700px;">
                        </div>
                    </center>
                </div>
            </div>
            <div id="planetmap">
      </div>
            <div id='form_panel'>
          <div class='row' style="margin:5px;" align="center">
            <form  id ="saveform">
              <div class='field' id='field'>
                <label><input type="radio" name="radiotype" id="product" value="product" onclick="javascript:changeType(this.value,'1');" checked> Product </label>
                <label><input type="radio" name="radiotype" id="material" value="material" onclick="javascript:changeType(this.value,'1');"> Material </label>
              </div>
              <div id="product_area_1">
                <select name="product_id" id="product_id" class="form-control">
                  <option value="">-- Please select --</option>
              <?php
              if(!empty($product_select)){
                 foreach ($product_select as $key => $value) {
               ?>
                    <option value="<?=$value['product_id']?>"><?=$value['title']?></option>
               <?php
                 }
              }
              ?>
              </select>
              </div>
              <div id="material_area_1" style="display:none;">
              <select name="material_id" id="material_id" class="form-control">
                <option value="">-- Please select --</option>
              <?php
              if(!empty($material_select)){
                 foreach ($material_select as $key => $value) {
               ?>
                    <option value="<?=$value['material_id']?>"><?=$value['title']?></option>
               <?php
                 }
              }
              ?>
              </select>
              </div>
              <input class="btn" type='button' value='Add Tag' id='addTag'/> <input type='button' value='Cancel' id='cancel'/>
              </form>
            </div>
      </div>

      <div class = "overshow" id = "overshow" style="color:red;margin-top:50px;"></div>
        <div id="footer" style="clear:both; text-align:center;" >
            <h3>Manage your tags Here: </h3>
            <div id="tagToolbar"></div>
            <div id="demo" style="width: 400px; margin:0 auto;"></div>
            <div style="clear:both;"></div>
        </div>
      </div>


    </center>
    <!-- TO DO -->
    <div align="center"><a href="javascript:reloadPage();" class="btn btn-primary">Close and refresh</a></div>


<script src="<?=base_url('assets/js/libs/jquery-ui-1.10.0.custom.min.js')?>"></script>
<script src="<?=base_url('assets/js/libs/bootstrap.min.js')?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
});
</script>

    <script>
    var productList = <?=!empty($product_select)?json_encode($product_select):'[]'?>;
    var materialList = <?=!empty($material_select)?json_encode($material_select):'[]'?>;




    //Observer Pattern
    var tags_collection = [];
    function ob_addTag(tag_id){
      if(tags_collection.indexOf(tag_id) == -1) {
        tags_collection.push(tag_id);
        ob_renewDisplay();
      }      
    }
    function ob_removeTag(tag_id){
      var tmp = [];
      for(var i=0; i<tags_collection.length; i++) {
        if(tags_collection[i]!=tag_id) {
          tmp.push(tags_collection[i]);
        }
      }
      tags_collection = tmp;
      ob_renewDisplay();
    }
    function ob_renewDisplay(){
      if(tags_collection.length == 0) {
        $("#tagToolbar").html('No tags have been added yet');
      } else {
        $("#tagToolbar").html('');
      }
    }




    function changeType(value,index)
    {
       if(value=="product"){
          $("#product_area_"+index).fadeIn("fast");
          $("#material_area_"+index).fadeOut("fast");
       }else{
          $("#material_area_"+index).fadeIn("fast");
          $("#product_area_"+index).fadeOut("fast");
       }
    }

    var x_pos;
    var y_pos;
        function myFunction(e)  // called when click on image to create span and textbox
        {
            $("#product_id").val("");
            $("#material_id").val("");
            pos_x = event.offsetX?(event.offsetX):event.pageX-document.getElementById("pointer_div").offsetLeft;
            pos_y = event.offsetY?(event.offsetY):event.pageY-document.getElementById("pointer_div").offsetTop;
            x_pos = event.pageX;
            y_pos = event.pageY;
            x_pos = x_pos - 50;
            y_pos = y_pos - 50;
            var element = document.createElement('div');
            element.id = "someID";
            document.body.appendChild(element);
            document.getElementById('someID').style.width='100px';
            document.getElementById('someID').style.height='100px';
            document.getElementById('someID').style.background='transparent';
            document.getElementById('someID').style.border='1px solid blue';
            document.getElementById('someID').style.position = "absolute";
            x = document.getElementById('someID').style.left=x_pos+'px';
            y = document.getElementById('someID').style.top=y_pos+'px';
            form(x_pos,y_pos);
        }
    </script>

    <script>
  var ids;
  var idss;
  var clas;

        $(window).load(function(){
            $("#form_panel").hide();
            $(".store").hide();
            var del_div = '<span class="del" id="del">DEL &nbsp</span>'
            var close_div = '<span class="cls" id="cls"> CLOSE</span>'
            $(".overshow").hide();
            console.log("form panel");

            ob_renewDisplay();


            $('#addTag').on('click',function (e) {  //creates span dynamically,called when clicked on addtag button



                var radionVal = "";
                var selected = $("input[type='radio'][name='radiotype']:checked");
                if (selected.length > 0) {
                    radionVal = selected.val();
                }

                //console.log(radionVal);
                //return false;                

                  var selected_text = $("#"+radionVal+"_id option:selected").text();
                  var selected_id = $("#"+radionVal+"_id").val();

                  if(selected_id == "") {
                    alert('Please select one option');
                    return false;
                  }

              

                  
                  var text = $('#title').val();
                  var data_y = y_pos;
                  var data_x = x_pos;
                  console.log("ajax is ahead");

                  $.ajax({                      // passing data to save in textfile
                       type: "POST", // post or get
                       url: '<?=base_url("vo/".$table."/add_tag")?>',
                       data: {"table_id" : "<?=$table_id?>","photo_id" : "<?=$photo_id?>", "type" : radionVal, "text" : selected_text, "id" : selected_id, "pos_x" : data_x, "pos_y" : data_y},
                       dataType: "json",
                       success: function(data)
                       { 
                          if(data.status == "OK") {
                         
                            ob_addTag(data.result.tag_id);
                            var append_string = '<div class="eachtag" id="tag'+data.result.tag_id+'"><span class="tags" data-y="'+data.result.pos_y+'" data-x="'+data.result.pos_x+'">'+data.result.title+' <span class="del" data-table_id="'+data.result.tag_id+'" style="color:red">X</span></span></div>'
                            $('#demo').append(append_string);
                            var store_div = '<div class="store" id="store'+data.result.tag_id+'" data-y="'+data.result.pos_y+'" data-x="'+data.result.pos_x+'" style="top:'+data.result.pos_y+'px; left:'+data.result.pos_x+'px; position:absolute; width:100px; height:100px; border:1px solid"data-toggle="tooltip" data-placement="bottom" title="'+data.result.title+'"></div>'
                            $('#pointer_div').append(store_div);

                            $('.store').hide('fast');
                            console.log("store_div");
                            $("#form_panel").hide('fast');
                            $("#someID").hide('fast');

                          }

                       }
                  });

                

            });

            $("#cancel").on('click', function(e){
                $("#form_panel").hide('fast');
                $("#someID").hide('fast');
            });


      function add_tag(table_id,title,x_pos,y_pos){
          var append_string = '<div class="eachtag" id="tag'+table_id+'"><span class="tags" data-y="'+y_pos+'" data-x="'+x_pos+'">'+title+' <span class="del" data-table_id="'+table_id+'" style="color:red">X</span></span></div>'
                $('#demo').append(append_string);
          var store_div = '<div class="store" id="store'+table_id+'" data-y="'+y_pos+'" data-x="'+x_pos+'" style="top:'+y_pos+'px; left:'+x_pos+'px;border:1px solid;; position:absolute; width:100px; height:100px;" data-toggle="tooltip" data-placement="bottom" title="'+title+'"></div>'
          $('#pointer_div').append(store_div);

          $('.store').hide('fast');
          console.log("store_div");
          $("#form_panel").hide('fast');
          $("#someID").hide('fast');

          ob_addTag(table_id);

      }

      var mainpic = <?=$mainpic?>;
      for(var i=0; i< mainpic.length;i++)
      {
         add_tag(mainpic[i]['idea_tag_id'],mainpic[i]['position']['title'],mainpic[i]['position']['pos_x'],mainpic[i]['position']['pos_y']);
      }

      jQuery(".tags").live('click',function(){ //to show a tagged pose

        ids = $(this).attr('id');
        idss=ids;
        console.log(ids);
        var x_cord = $(this).attr('data-x');
        var y_cord = $(this).attr('data-y');

        $('#overshow').show('fast'); //.delay(1000).hide('slow');
      });

      jQuery(".tags").live('mouseenter',function(){ //tag name mouseenter
          var idss = $(this).attr('id');
          ids=idss;
          console.log(idss);
          var x_cord = $(this).attr('data-x');
          var y_cord = $(this).attr('data-y');
              $("#overshow").css({top: y_cord, left: x_cord, width:'100px', height:'100px', position:'absolute',border:'1px solid'});
              $('#overshow').show(); //.delay(1000).hide('slow');

        }); 
        jQuery(".tags").live('mouseleave',function(){
          $('#overshow').hide();
          // $('#overshow').show('slow').delay(1000).hide('slow');
        });

      jQuery(".cls").live('click',function(){ //to close a overshow of tag
        //alert("close");
        $('.overshow').hide();
      });

      jQuery(".del").live('click',function(){ //to delete a tag
              
        var table_id = $(this).data("table_id");
        
        //deleted_array(data_y, data_x);
        $.ajax({ // passing data to delete from textfile
          type: "POST", // post or get
               url: '<?=base_url("vo/".$table."/delete_tag")?>',
               data: {"table_id" : table_id},
               dataType: "json",
               success: function(data)
               { 
                  if(data.status == "OK") {

                    //delete tag
                    $("#tag"+data.tag_id).remove();
                    //delete the square on img
                    $("#store"+data.tag_id).remove();
                    //preview
                    $('#overshow').hide();     

                    ob_removeTag(data.tag_id);               

                  }
                 // alert(e);
               }
        });

      });

      function deleted_array(data_y,data_x)
      {
         for(var i=0;i<saveData.length;i++)
         {
            //console.log(saveData[i]['pos_x'] +'=='+ data_x +'&&'+ saveData[i]['pos_y'] +'=='+ data_y);
            if(saveData[i]['pos_x'] == data_x && saveData[i]['pos_y'] == data_y){
                saveData.splice(i,1);
            }
         }

         //console.log(saveData);
      }


      jQuery(".pointer_div").live('mouseenter',function(){ //image mouseenter
        console.log("mouseenter on image");
        $('.store').show();

      }); 

      jQuery(".pointer_div").live('mouseleave',function(){
        // console.log("mouseleave");
        $('.store').hide();
        $('.overshow').hide();

      });

      })

        function over(){

            console.log("demo over");

        }

        function form(x_pos,y_pos){   // to create textbox, call from myFunction()
            jQuery("#someID").show('slow');
        var ele = document.getElementById('form_panel');
            x_pos = x_pos - 25;
            y_pos = y_pos - 80;
            document.body.appendChild(form_panel);
            document.getElementById('form_panel').style.width='180px';
            document.getElementById('form_panel').style.height='100px';
            document.getElementById('form_panel').style.background='#eee';
            document.getElementById('form_panel').style.position = "absolute";
            document.getElementById('form_panel').style.left=x_pos+'px';
            document.getElementById('form_panel').style.top=y_pos+'px';
            //console.log("form is showing in form()");
            jQuery("#form_panel").show('slow');
        }

    function addTag(){

            var text = document.getElementById('title').value; //value of text box 
            console.log(text);
            var demoid = document.getElementById('demo'); //html of #demo
            //console.log(demoid);
            jQuery("#form_panel").hide('slow');
            jQuery("#someID").hide('slow');
    }

    function cancel(){

        $("#form_panel").hide('slow');
        $("#someID").hide('slow');
    }

    function reloadPage()
    {
      parent.location.reload(true);
    }


    </script>

    </body>
</html>