$(document).ready(function(e) {

	/*
	//選擇出發日期
	$(function() {
    $( "#datepicker" ).datepicker({
      showOn: "button",
      buttonImage: "images/icon_01.png",
      buttonImageOnly: true,
      buttonText: "Select date",
			dateFormat: "yy-mm-dd",
			showOtherMonths: true,
			minDate: 0,
    });
  });
	*/
	//tab切換
	$(".myBooking_cnt").hide();
	$("#tab_cnt_1").show();
	$("#tab_1").addClass("on");
	
	$("#tab_1").click(function(){
		$("ul.tab>li").removeClass();
		$(this).addClass("on");
		$(".myBooking_cnt").hide();
		$("#tab_cnt_1").show();
	}); 
	
	$("#tab_2").click(function(){
		$("ul.tab>li").removeClass();
		$(this).addClass("on");
		$(".myBooking_cnt").hide();
		$("#tab_cnt_2").show();
	}); 
	
	$("#tab_3").click(function(){
		$("ul.tab>li").removeClass();
		$(this).addClass("on");
		$(".myBooking_cnt").hide();
		$("#tab_cnt_3").show();
	}); 
	
	$(".tab>li>ul>li a").click(function(){
		$(".tab>li>ul>li a").removeClass();
		$(this).addClass("on");
	});
	
	//選擇景點面版
	$(".tour_menu .select").click(function(){
		$(".tour_menu ul").slideToggle();
		$(".tour_menu .select i").toggleClass("on");
	});
	
	//地圖
	$("#map_01").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place_sb img").removeClass();
				$("#areaMap_01").toggleClass("on");
				$("#tn_window_01").toggle();
			},
		'mouseover' : function(){
    		$(".map_place_sb").css("background-image","url(/assets/images/sb_map/01.png)");
    	},
		'mouseout' : function(){
    		$(".map_place_sb").css("background-image","none");
			}
	});
	$("#map_02").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place_sb img").removeClass();
				$("#areaMap_02").toggleClass("on");
				$("#tn_window_02").toggle();
			},
		'mouseover' : function(){
    		$(".map_place_sb").css("background-image","url(/assets/images/sb_map/02.png)");
    	},
		'mouseout' : function(){
    		$(".map_place_sb").css("background-image","none");
			}
	});
	$("#map_03").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place_sb img").removeClass();
				$("#areaMap_03").toggleClass("on");
				$("#tn_window_03").toggle();
			},
		'mouseover' : function(){
    		$(".map_place_sb").css("background-image","url(/assets/images/sb_map/03.png)");
    	},
		'mouseout' : function(){
    		$(".map_place_sb").css("background-image","none");
			}
	});
	$("#map_04").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place_sb img").removeClass();
				$("#areaMap_04").toggleClass("on");
				$("#tn_window_04").toggle();
			},
		'mouseover' : function(){
    		$(".map_place_sb").css("background-image","url(/assets/images/sb_map/04.png)");
    	},
		'mouseout' : function(){
    		$(".map_place_sb").css("background-image","none");
			}
	});
	$("#map_05").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place_sb img").removeClass();
				$("#areaMap_05").toggleClass("on");
				$("#tn_window_05").toggle();
			},
		'mouseover' : function(){
    		$(".map_place_sb").css("background-image","url(/assets/images/sb_map/05.png)");
    	},
		'mouseout' : function(){
    		$(".map_place_sb").css("background-image","none");
			}
	});
	$("#map_06").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place_sb img").removeClass();
				$("#areaMap_06").toggleClass("on");
				$("#tn_window_06").toggle();
			},
		'mouseover' : function(){
    		$(".map_place_sb").css("background-image","url(/assets/images/sb_map/06.png)");
    	},
		'mouseout' : function(){
    		$(".map_place_sb").css("background-image","none");
			}
	});
		
});