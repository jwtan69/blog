$(document).ready(function(e) {

	
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
				$(".map_place img").removeClass();
				$("#areaMap_01").toggleClass("on");
				$("#window_01").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(/assets/images/map/01.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});
	$("#map_02").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place img").removeClass();
				$("#areaMap_02").toggleClass("on");
				$("#window_02").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(/assets/images/map/02.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});
	$("#map_03").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place img").removeClass();
				$("#areaMap_03").toggleClass("on");
				$("#window_03").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(/assets/images/map/03.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});
	$("#map_04").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place img").removeClass();
				$("#areaMap_04").toggleClass("on");
				$("#window_04").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(/assets/images/map/04.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});
	$("#map_05").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place img").removeClass();
				$("#areaMap_05").toggleClass("on");
				$("#window_05").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(/assets/images/map/05.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});
	$("#map_06").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place img").removeClass();
				$("#areaMap_06").toggleClass("on");
				$("#window_06").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(/assets/images/map/06.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});
	/*$("#map_07").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place img").removeClass();
				$("#areaMap_07").toggleClass("on");
				$("#window_07").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(images/map/07.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});*/
	$("#map_08").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place img").removeClass();
				$("#areaMap_08").toggleClass("on");
				$("#window_08").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(/assets/images/map/08.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});
	$("#map_09").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place img").removeClass();
				$("#areaMap_09").toggleClass("on");
				$("#window_09").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(/assets/images/map/09.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});
	$("#map_10").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place img").removeClass();
				$("#areaMap_10").toggleClass("on");
				$("#window_10").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(/assets/images/map/10.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});
	$("#map_11").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place img").removeClass();
				$("#areaMap_11").toggleClass("on");
				$("#window_11").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(/assets/images/map/11.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});
	/*$("#map_12").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place img").removeClass();
				$("#areaMap_12").toggleClass("on");
				$("#window_12").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(images/map/12.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});*/
	$("#map_13").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place img").removeClass();
				$("#areaMap_13").toggleClass("on");
				$("#window_13").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(/assets/images/map/13.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});
	$("#map_14").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place img").removeClass();
				$("#areaMap_14").toggleClass("on");
				$("#window_14").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(/assets/images/map/14.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});
	$("#map_15").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place img").removeClass();
				$("#areaMap_15").toggleClass("on");
				$("#window_15").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(/assets/images/map/15.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});
	$("#map_16").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place img").removeClass();
				$("#areaMap_16").toggleClass("on");
				$("#window_16").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(/assets/images/map/16.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});
	$("#map_17").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place img").removeClass();
				$("#areaMap_17").toggleClass("on");
				$("#window_17").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(/assets/images/map/17.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});
	$("#map_18").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place img").removeClass();
				$("#areaMap_18").toggleClass("on");
				$("#window_18").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(/assets/images/map/18.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});
	$("#map_19").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place img").removeClass();
				$("#areaMap_19").toggleClass("on");
				$("#window_19").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(/assets/images/map/19.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});
	$("#map_20").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place img").removeClass();
				$("#areaMap_20").toggleClass("on");
				$("#window_20").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(/assets/images/map/20.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});
	$("#map_21").bind({
		'click' : function(){
				$(".place_tour").hide();
				$(".map_place img").removeClass();
				$("#areaMap_21").toggleClass("on");
				$("#window_21").toggle();
			},
		'mouseover' : function(){
    		$(".map_place").css("background-image","url(/assets/images/map/21.png)");
    	},
		'mouseout' : function(){
    		$(".map_place").css("background-image","none");
			}
	});
		
});