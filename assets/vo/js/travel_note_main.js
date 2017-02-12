$(document).ready(function(e) {
	$("[id^='map_']").bind({
		'click': function(){
			var map_id = $(this).attr('id').substring(4,6);
			if( $('#travel_window_'+map_id+':visible').length){
				$(".map_place img").removeClass();
				$("[id^='travel_window_']").hide();

			}else{
				$(".place_travel_note").hide();
				$(".map_place img").removeClass();
				$("#areaMap_"+map_id).toggleClass("on");
				$("#travel_window_"+map_id).toggle();
			}
		},
		'mouseover' : function(){
			var map_id = $(this).attr('id').substring(4,6);
    		$(".map_place").css("background-image","url(/assets/images/map/"+map_id+".png)");
    	},
		'mouseout' : function(){
			var map_id = $(this).attr('id').substring(4,6);
    		$(".map_place").css("background-image","none");
			}
	});
});