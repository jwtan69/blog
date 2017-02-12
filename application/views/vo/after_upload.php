<script src="<?php echo base_url('assets/vo/js/libs/jquery-1.9.1.min.js') ?>"></script>
<script>
$(document).ready(function(e) {
	var parentBody = window.parent.document.body
	console.log("Upload complete");
	var r = <?=!empty($filelist)?json_encode($filelist):'[]'?>;
	var html = '';
	
	if(typeof r.pu == "undefined" | r.status == "ERROR") {
		
		alert("對不起, 上傳系統出了一點問題, 目前無法上傳圖片, 請洽詢網站管理員: service@i-tea.com.tw");
		
	} else {
		html += '<div id="file' + r.id + '"><a href="' + r.pu + '" target="_blank"><img src="' + r.pu + '" alt="' + r.filename + '" class="img-responsive" style="width:150px;"/></a> <a href="javascript: deleteAttachment(\'file' + r.id + '\',\'' + r.element + '\',\'' + r.picarea + '\');" class="btn"><span class="glyphicon glyphicon-trash"></span></a></div>';
		$("#" + r.element, parentBody).val(r.pu);
		$("#" + r.picarea, parentBody).html(html);
	}
	
	$("#myForm", parentBody).attr("action", "<?=base_url($init['langu'].'/vo/upload_handler');?>");
    $("#files1", parentBody).val("");
});
</script>