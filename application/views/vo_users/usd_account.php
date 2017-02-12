<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    
<div class="main">
    <div class="container-full" style="margin-left:40px; margin-right:40px;">
      	<div class="row">
      	
      		<div class="col-md-12 col-xs-12">

                <a href="<?=base_url($init['langu'].'/vo/users/list')?>" class="btn btn-primary">Back</a>
      		
      			<div class="widget stacked">
				
					<div class="widget-header">
						<i class="icon-star"></i>
						<h3>User <?=$user_details['name']?> USD account (<?=$user_details['usd_account_no']?>) log</h3>
					</div> <!-- /widget-header -->
				
					<div class="widget-content">
                    	
                        <div align="right">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#Modal" >Deposit / Withdrawal</a>
                        </div>

                    	<table class="table table-bordered">
                    		<thead>
                    			<tr><th width="20%">Created Date</th><th width="35%">Action / Remarks</th><th width="15%">+</th><th width="15%">-</tH><th width="15%">Balance</th></tr>
                    		</thead>
                    		<tbody>
                    	<?php
                    	if(!empty($log)) {
                            $balance = 0;
                    		foreach($log as $v) {

                                $balance += $v['amount'];

                    	?>
                    		<tr><td><?=$v['created_date']?></td><td><?=$v['action'].' '.$v['remarks']?></td><td><?=$v['amount']>0?$v['amount']:''?></td><td><?=$v['amount']<0?$v['amount']:''?></td><td><?=$balance?></td></tr>

                    	<?php		
                    		}
                    	} else {
                    	?>
                    		<tr><td colspan=5""> Currently no record</td></tr>
                    	<?php	
                    	}
                    	?>
                    		<tbody>
                    	</table>

                	</div> <!-- /widget-content -->
               
					
				</div> <!-- /widget -->	
			</div>
		</div>
	</div>		
</div>	


<div class="modal fade" id="Modal" role="dialog">
                        <div class="modal-dialog modal-admin">
                            <form id="usd-form" role="form">
                      <!-- Get DO Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title text-center">Deposit / Withdrawal of this account</h4>
                            </div>

                            <div class="modal-body">
                                <input type="hidden" name="token" value="<?=$init['token']?>" />
                                <input type="hidden" name="user_id" value="<?=$user_id?>" />
                                <div class="form-group">
                                    <label for="action">Action</label>
                                    <select name="action" class="form-control">
                                        <option value="DEPOSIT">DEPOSIT</option>
                                        <option value="WITHDRAW">WITHDRAW</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter the amount, e.g. 100.20">
                                </div>

                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <input type="text" class="form-control" name="remarks" id="remarks" placeholder="Remarks (user can see this)">
                                </div>


                            </div>

                            <div class="modal-footer">
                                    <center>
                                        <button type="submit" class="btn btn-primary">Confirm Add</button>

                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></center>
                            </div>
                            </div>
                            </form>
                        </div>
                    </div>



<script>

$('#usd-form').on('submit', function(e) { //use on if jQuery 1.7+
                e.preventDefault();  //prevent form from submitting             

                var token = "<?=$init['token']?>";
                
                var formData = $("#usd-form :input").serializeArray();              
                var obj = {};
                if(formData.length > 0) {
                    for(var i=0; i < formData.length; i++) {
                        //console.log(formData);                        
                        obj[formData[i].name] = formData[i].value;                      
                    }
                }       
                obj["token"] = token;   

                $('input[type="submit"]').prop('disabled', true);
                $('#submit_btn').html("Loading...");

                $.ajax({
                  type: "POST",
                  url: "<?=base_url($init['langu'].'/api/insertUserCredit')?>",
                  data: JSON.stringify(obj),
                  success: function(json){
                        if(json.status == "OK") {
                            alert(json.result.success_text);
                            location.href="<?=base_url($init['langu'].'/vo/users/usd_account/'.$user_id)?>"                                                      
                        } else {
                            alert(json.result);
                            $('input[type="submit"]').prop('disabled', false);
                            $('#submit_btn').html("<?=$init['lang']['submit']?>");
                            if(json.error_code == "401") {
                                logout();
                            }
                        }


                  },
                  dataType: "json",
                  contentType : "application/json"
                });


            });
</script>



