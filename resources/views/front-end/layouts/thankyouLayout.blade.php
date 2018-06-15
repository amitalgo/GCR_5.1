<!DOCTYPE html>
<html lang="en">
<head>
    @include('front-end.include.head')
    <style>
	.one-page-header { margin: 25px auto;}
	section#page-not-found {text-align: center; height:100vh;}
	section#page-not-found h2, section#page-not-found2 h2 { font-size: 120px;}
	h3{ font-size: 26px;}
	.mt40 {margin-top: 40px;}
	.btn-blue { background: #009bdf; margin-top:15px;}
	.btn-blue:hover{ background:#0eaaef;}
	.btn {
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    outline: 0;
    padding: 0 15px;
    position: relative;
    line-height: 35px;
    font-size: 14px;
    font-weight: 600;
    color: #f6f6f6 !important;
    -webkit-transition: all .5s ease;
    -moz-transition: all .5s ease;
    -ms-transition: all .5s ease;
    -o-transition: all .5s ease;
    transition: all .5s ease;
}
.midlCenter{ margin-top:5%;}

</style>
</head>
<body>
 <header>
        @include('front-end.include.header')
    </header>
<div class="clearfix"></div>
<section>
        @yield('content')
</section>
<footer>
    @include('front-end.include.footer')
</footer>
<!-- Modal -->
@include('front-end.include.jsLib')
</body>
</html>
