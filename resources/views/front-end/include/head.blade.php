
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@yield('title')</title>
    <meta name="description" content="@yield('des')">
    <!-- Bootstrap -->
    <link href="{{asset('css/css/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/css/front-css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/css/front-css/animate.css')}}">
    <link href="{{asset('css/css/front-css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('css/css/front-css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/css/front-css/set1.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/css/front-css/video-slide.css')}}">
	<link rel="stylesheet" href="{{asset('css/css/front-css/slick.css')}}">
	<link rel="stylesheet" href="{{asset('css/css/front-css/slick-theme.css')}}">
	<link rel="stylesheet" href="{{asset('css/css/front-css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('css/css/front-css/demo.css')}}">
	<link rel="stylesheet" href="{{asset('css/css/front-css/jquery-scrollify-style.css')}}">
	<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-117512950-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-117512950-1');
      $(document).ready(function(){
              if($(".filter-checkbox:checked").length<1){
                $(".filter-search").prop("disabled",true)
                }else{
                    $(".filter-search").prop("disabled",false) 
                }
            $("body").on("click",".filter-checkbox-all",function(){
                if($(this).is(":checked")){
                    console.log(1);
                    $(".checkbox").find(".filter-checkbox").prop("checked",true);
                     $(".filter-search").prop("disabled",false)
                }else{
                  console.log(12);  
                   $(".checkbox").find(".filter-checkbox").prop("checked",false);
                    $(".filter-search").prop("disabled",true)
                }
                
            });
            // check length 
            $("body").on("click",".filter-checkbox",function(){
            if($(".filter-checkbox:checked").length<1){
                $(".filter-search").prop("disabled",true)
                }else{
                    $(".filter-search").prop("disabled",false) 
                }
            });
            
        });
     
      
    </script>

    <style>
              .mrg{
            margin-bottom: 5px;
        }
        .alertifyshaz{
            position: fixed;
            z-index: 99999;
            right: 22px;
            top: 62px;
            min-width: 200px;
            text-align: center;
            color:#fee;
        }
        .r{
            background-color: #f05050 !important;
            border: 1px solid #f05050 !important;
        }
        .s{
            background-color: #5fbeaa !important;
            border: 1px solid #5fbeaa !important;
        }
        
    .search-bottom{
        border-bottom: 0.3px solid #9fdaf5;
        margin-bottom: 25px;
        padding: 0px;
        line-height: 20px;
    }
		
    </style>

