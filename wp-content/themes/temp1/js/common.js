(function($){

	$.extend({wn:{}});

	$.wn.getVendorPrefix=function(){

		var body, i, style, transition, vendor;

		body = document.body || document.documentElement;

		style = body.style;

		transition = "transition";

		vendor = ["Moz", "Webkit", "Khtml", "O", "ms"];

		transition = transition.charAt(0).toUpperCase() + transition.substr(1);

		i = 0;

		while (i < vendor.length) {

			if (typeof style[vendor[i] + transition] === "string") {

			  return vendor[i];

			}

			i++;

		}

		return false;

	};

	$.wn.throttle={

		timeoutId:null,

        performProcessing:function(funcname){

        	funcname();	

        },

        process:function(funcname){

           clearTimeout(this.timeoutId);    

           var that=this;//为什么要设置这个，亲，setTimeout可是会改变this的指针指向window哦

           this.timeoutId=setTimeout(function(){that.performProcessing(funcname)},50)

        }     

	}

	$.wn.isSupportCss3=!!$.wn.getVendorPrefix();

})(jQuery);

//百度统计
// var _hmt = _hmt || [];
// (function() {
//   var hm = document.createElement("script");
//   hm.src = "//hm.baidu.com/hm.js?4f4490eb054e88d08944f12852b589d2";
//   var s = document.getElementsByTagName("script")[0]; 
//   s.parentNode.insertBefore(hm, s);
// })();

/**

 * 返回顶部

 */



$(function(){

	function scrolling(){

		if($(window).scrollTop() > 200){

     		$("#J_gotop").css("display","block");

     	}else{

     		$("#J_gotop").css("display","none");

     	}

     };

	$(window).on("scroll",function(){
		$.wn.throttle.process(scrolling);

	});

	$("#J_gotop").on("click",function(){	
		$("body,html").animate({scrollTop:"0px"},500);
		return false;
	});



	$("#J_screenzoom").on("click",function(){

		var $i=$(this).children('i');

		if($i.hasClass('icon-quanping')){

			$(this).attr("title","窄屏");

			$(".wn-container").addClass('wn-container-full');

			$i.addClass('icon-feiquanping').removeClass('icon-quanping');

		}else if($i.hasClass('icon-feiquanping')){

			$(this).attr("title","宽屏");

			$(".wn-container").removeClass('wn-container-full');

			$i.removeClass('icon-feiquanping').addClass('icon-quanping')

		}

		return false;

	});





	$("#main-navlist").children('.menu-item-has-children').each(function(index,elem){

		var $this=$(this);

		$this.hover(function(){

			// $this.children("ul").addClass("fadeInUp");

			$this.addClass('menu-item-hover');

		},function(){

			// $this.children("ul").removeClass("fadeInUp");

			$this.removeClass('menu-item-hover')

		})

	});





	$("#J_main-navbar-toggle").on("click",function(){

		if($(".main-nav").is(":visible")){

			$(".main-nav").slideUp();

		}else{

			$(".main-nav").slideDown();

		}

	});

	$(document).on("click","[data-roler='runcode']",function(e){
		var $btn = $(e.target),textarea;
		if (!$btn.hasClass('wn-btn')) $btn = $btn.closest('.wn-btn');

		textarea=document.getElementById($btn.attr("data-textareaid"));
		var newwin = window.open('', "_blank", '');
	        newwin.document.open('text/html', 'replace');
	        newwin.opener = null;
	        newwin.document.write(textarea.value);
	        newwin.document.close();
	});



})



