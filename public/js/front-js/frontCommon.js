$(window).load(function() {
    $(".loader").fadeOut("slow");
});

   $(document).ready(function() {
	

var owl = $('.owl-carousel');
        owl.owlCarousel({
        items: 6,
        loop: true,
        margin: 5,
        autoplay: true,
        autoplayTimeout: 2500,
		autoplaySpeed: 1500,
		smartSpeed: 1000,
		fluidSpeed: 1000,
		autoplayHoverPause: true,
		
		responsive:{
	        0:{
	            items:2,
	            loop:true
	        },
			
			 414:{
	            items:3,
	            loop:true
	        },
			
	        480:{
				items:3,
				loop:true
			},
			684:{
	            items:4,
	            loop:true
	        },
			
			667:{
	            items:4,
	            loop:true
	        },
			
			736:{
	            items:5,
	            loop:true
	        },
			
	        768:{
	            items:5,
	            loop:true
	        },
	        1200:{
	            items:6,
	            loop:true
	        }
	    }
		
  });
				
  $('body').on('click','.more-btn', function(){
    if($(this).hasClass('m')){
      $(this).parent(".PDesc").children("p").html($(this).attr('data-attr'));
      $(this).removeClass("m").addClass('l');
      $(this).html("... less");
    }
	else{

       $(this).parent(".PDesc").children("p").html($(this).attr('data-attrshort'));
       $(this).removeClass("l").addClass('m');
       $(this).html("... more");
    }
	
    // $('#popup .modal-title').html($(this).parent().parent().find('h1').html());
    // $('#popup .modal-body').html($(this).attr('data-attr'));
    // $('#popup').modal('show');
  });


   $('body').on('click','.inquire-btn', function(){
       var pid = $(this).data('pid');
       $("#pid").val(pid);
       $('#inquiry-form').modal('show');
   });


 })
$(document).ready(function(){
$("")
 $('.left-scroll,.vc_list').slick({
    vertical: true,
    autoplay: true,
    autoplaySpeed: 500,
    speed: 1500
  });
});


    $(window).load(function() {
       // if(sessionStorage.getItem('dropnav')==1){
            $(".DropNav").show();
           // sessionStorage.setItem('dropnav',0);
        //}
        $("#flexiselDemo1").flexisel();
        $("#flexiselDemo2").flexisel({
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 3
                }
            }
        });

        $("#flexiselDemo3").flexisel({
            visibleItems: 5,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 3
                }
            }
        });

        $("#flexiselDemo4").flexisel({
            clone:false
        });

        $(".secon").click(function(){
            $("#show").show();

        });
		
	
		
	$("#flexiselDemo7").flexisel({
            visibleItems: 5,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 3
                }
            }
        });
	$(function(){
			$(".leftSlider").scrollText({
				'duration': 2000
  });


 });	
		
});


$( document ).ready(function() {
$(".alertifyshaz").delay(3000).fadeOut(1000);
    	 new Vue({
  el: '#example',
  data: {
    slides: 5
  },
  components: {
    'carousel-3d': Carousel3d.Carousel3d,
    'slide': Carousel3d.Slide
  }
});
    	 $("body").on("submit","form",function(){
    	     var $flag = true;
    	     var $required = $(this).find(".required");
    
    	     $required.each(function(){
    	         if($.trim($(this).val())==''){
    	             $(this).addClass('error');
    	             $(this).siblings(".red").children("small").html("Field is mendatory.")

    	             $flag =  false;
                 }else{
                     $(this).siblings(".red").children("small").html("")
    	             $(this).removeClass('error');
                 }

             });
    	     if(!$flag){
                 $('html, body').animate({
                     scrollTop: $(".error").first().offset().top - 250
                 }, 1000);
    	         return $flag;
             }


         });

           $('form > .required').keyup(function() {
                var empty = false;
                $('form > .required').each(function() {
                    if ($(this).val() == '') {
                        empty = true;
                    }
                });

                if (empty) {
                    $('input[type=submit]').attr('disabled', 'disabled');
                } else {
                    $('input[type=submit]').removeAttr('disabled');
                }
          });
});

    $(document).on('ready', function() {
		$(".center").slick({
        dots: true,
		autoPlay: true,
        infinite: true,
        centerMode: true,
        slidesToShow: 5,
        slidesToScroll: 3
      });
      $(".variable").slick({
        dots: true,
        infinite: true,
		autoPlay: true,
        variableWidth: true
      });
      $(".lazy").slick({
        lazyLoad: 'ondemand', // ondemand progressive anticipated
        infinite: true,
		autoPlay: true,
      });
	  
	  //DropMenu
	  
$('#main-nav ul li a').click(function(){
	$("#main-nav ul li a").removeClass("active-4");
    $(this).addClass("active-4");
});

//Solution
$('.bxslider').bxSlider({
		minSlides: 1,
		maxSlides: 8,
		slideWidth: 157,
		slideMargin: 0,
		ticker: true,
		speed: 15000,
	});
	  
	  
});
     $(function(){

         $("body").on("click",".closePopUp",function(){
            $(".popupcontact").hide();
             });
      setTimeout(function(){
                var key = sessionStorage.getItem('popupKey');

                if(key!=1){
                    $.ajax({
                        url:'/GCR29-5/contact-popup-form',
                        dataType:'html',
                        cache:false,
                        success:function(html){
                           $("#popTemp").modal("hide");
                            $("#popup-form").find(".modal-body").html(html);
                            $("#popup-form").modal("show");
                        }
                    })
                }
            },30000);


        setTimeout(function() {
            
             $("#popTemp").modal("hide");
         },5000);

         setTimeout(function() {
             $("#popTemp").modal("show");
         },100);
         $("body").on("click",".close-btn",function(){

             $("#popTemp").modal("hide");
         })

         $("body").on("click",".partnerspop",function(){
            var route = $(this).data('route');
            var id = $(this).data('id');

             $.ajax({
                        url:route+'/'+id,
                        type:'get',
                        dataType:'html',
                        cache:false,
                        success:function(html){
                  
                          $("#myModal-partner").find(".modal-body").html(html);
                          $("#myModal-partner").modal("show");
                        }
                    });
         });


     });


$(function () {
  $('#demo5').scrollbox({
    direction: 'h',
    distance: 134
  });
  $('#demo5-backward').click(function () {
    $('#demo5').trigger('backward');
  });
  $('#demo5-forward').click(function () {
    $('#demo5').trigger('forward');
  });
});

$(function(){
	$('#news-container').vTicker({ 
		speed: 500,
		pause: 3000,
		animation: 'fade',
		mousePause: true,
		showItems: 5,
	});
	
	
});

$(document).ready(function(){
    $(".collapsed").click(function(){
       $('.navbar-collapse').slideToggle(1500);
    });
});

// $(document).ready(function() {
  
// 	var nice = $("html").niceScroll();  // The document page (body)
	
// 	$("#div1").html($("#div1").html()+' '+nice.version);
    
//     $("#boxscroll").niceScroll({cursorborder:"",cursorcolor:"#be0807",boxzoom:true}); // First scrollable DIV
// });

$(document).ready(function() {
  
  //var nice = $("html").niceScroll();  // The document page (body)
  
  //$("#div1").html($("#div1").html()+' '+nice.version);
    
 //$("#boxscroll").niceScroll({cursorborder:"",cursorcolor:"#fff"}); // First scrollable DIV
  
 $('.scroller').scrollify();
});


function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}


