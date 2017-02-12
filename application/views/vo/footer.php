
    
    
<div class="footer" style="margin-top:100px;">
		
	<div class="container">
		
		<div class="row">
			
			<div id="footer-copyright" class="col-md-6">
				&copy; <?=date("Y")?> 
			</div> <!-- /span6 -->
			
			<div id="footer-terms" class="col-md-6">
				
			</div> <!-- /.span6 -->
			
		</div> <!-- /row -->
		
	</div> <!-- /container -->
	
</div> <!-- /footer -->



    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?=base_url('assets/vo/js/libs/jquery-ui-1.10.0.custom.min.js')?>"></script>
<script src="<?=base_url('assets/vo/js/libs/bootstrap.min.js')?>"></script>

<script src="<?=  base_url('assets/vo/js/plugins/msgbox/jquery.msgbox.min.js')?>"></script>
<script src="<?=  base_url('assets/vo/js/plugins/msgGrowl/js/msgGrowl.js')?>"></script>
<script src="<?=  base_url('assets/vo/js/plugins/validate/jquery.validate.js')?>"></script>

<script src="<?=base_url('assets/vo/js/Application.js')?>"></script>
<script>

// UPLOADFILE: STEP 3 
        function triggerUpload(element, picarea, width, height) {

            //不同的照片對應不同的大小            
            $("#element").val(element);
            $("#picarea").val(picarea);
            $("#width").val(width);
            $("#height").val(height);
            $("#files1").trigger("click");

        }



        // UPLOADFILE: STEP 4
        function submitImg() {
            
            if ($("#files1").val() !== "") {
                $("#"+$("#picarea").val()).html('<img src="/assets/vo/img/ajax-loader.gif" /> Uploading,Please dont submit...');
                $("#myForm").submit();
            }
        }
        
        function deleteAttachment(id, element, picarea) {

            var tid = id.replace("file", "");

            $("#" + picarea).html("");
                    $("#" + element).val("");
        }
                

    $(document).ready(function(){
      $('.selectpicker').selectpicker();
    });


var langu = '<?=$init['langu']?>';

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}


function logout(){
    setCookie("token", "", -1);     
    location.href="/"+langu;
}

if($("#login-form").length>0) {
            $('#login-form').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();  //prevent form from submitting             
                
                var formData = $("#login-form :input").serializeArray();                
                var obj = {};
                if(formData.length > 0) {
                    for(var i=0; i < formData.length; i++) {
                        //console.log(formData);                        
                        obj[formData[i].name] = formData[i].value;                      
                    }
                }               

                $.ajax({
                  type: "POST",
                  url: "/"+langu+"/api/login",
                  data: JSON.stringify(obj),
                  success: function(json){
                        if(json.status == "OK") {
                            setCookie("token", json.result.token, 30);  
                            location.href="/en/vo/profile";                 
                        } else {
                            alert(json.result);
                        }

                  },
                  dataType: "json",
                  contentType : "application/json"
                });


            });
        };


</script>

  </body>
</html>