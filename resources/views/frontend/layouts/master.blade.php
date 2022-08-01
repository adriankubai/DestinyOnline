<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title','Master Page')</title>
    <link href="{{url('frontEnd/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('frontEnd/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('frontEnd/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{url('frontEnd/css/price-range.css')}}" rel="stylesheet">
    <link href="{{url('frontEnd/css/animate.css')}}" rel="stylesheet">
    <link href="{{url('frontEnd/css/main.css')}}" rel="stylesheet">
    <link href="{{url('frontEnd/css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('easyzoom/css/easyzoom.css')}}" />






    {{--online resources--}}
    <link href="https://myecommproject.herokuapp.com/frontEnd/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://myecommproject.herokuapp.com/frontEnd/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://myecommproject.herokuapp.com/frontEnd/css/prettyPhoto.css" rel="stylesheet">
    <link href="https://myecommproject.herokuapp.com/frontEnd/css/price-range.css" rel="stylesheet">
    <link href="https://myecommproject.herokuapp.com/frontEnd/css/animate.css" rel="stylesheet">
    <link href="https://myecommproject.herokuapp.com/frontEnd/css/main.css" rel="stylesheet">
    <link href="https://myecommproject.herokuapp.com/frontEnd/css/responsive.css" rel="stylesheet">
    <link href="https://myecommproject.herokuapp.com/easyzoom/css/easyzoom.css" rel="stylesheet">


<!--[if lt IE 9]>

    <![endif]-->


</head><!--/head-->

<body>
<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

$session  = session::get('frontSession');
$count = DB::table('carts')->where('session_id',$session)->count();
?>
@include('frontend.layouts.header')
@yield('slider')
{{--@section('slider')--}}
{{--@include('layouts.slider')--}}
{{--@show--}}
@yield('content')
@include('frontend.layouts.footer')
<script src="{{url('frontEnd/js/jquery.js')}}"></script>
<script src="{{url('frontEnd/js/bootstrap.min.js')}}"></script>
<script src="{{url('frontEnd/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{url('frontEnd/js/price-range.js')}}"></script>
<script src="{{url('frontEnd/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{url('frontEnd/js/main.js')}}"></script>
<script src="{{url('js/font-awesome.js')}}"></script>
<script src="{{url('easyzoom/dist/easyzoom.js')}}"></script>


{{--online resources--}}
<script src="https://myecommproject.herokuapp.com/frontEnd/js/jquery.js"></script>
<script src="https://myecommproject.herokuapp.com/frontEnd/js/bootstrap.min.js"></script>
<script src="https://myecommproject.herokuapp.com/frontEnd/js/jquery.scrollUp.min.js"></script>
<script src="https://myecommproject.herokuapp.com/frontEnd/js/price-range.js"></script>
<script src="https://myecommproject.herokuapp.com/frontEnd/js/jquery.prettyPhoto.js"></script>
<script src="https://myecommproject.herokuapp.com/frontEnd/js/main.js"></script>
<script src="https://myecommproject.herokuapp.com/js/font-awesome.js"></script>
<script src="https://myecommproject.herokuapp.com/easyzoom/dist/easyzoom.js"></script>
<script>
    // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();

    // Setup thumbnails example
    var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

    $('.thumbnails').on('click', 'a', function(e) {
        var $this = $(this);

        e.preventDefault();

        // Use EasyZoom's `swap` method
        api1.swap($this.data('standard'), $this.attr('href'));
    });

    // Setup toggles example
    var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

    $('.toggle').on('click', function() {
        var $this = $(this);

        if ($this.data("active") === true) {
            $this.text("Switch on").data("active", false);
            api2.teardown();
        } else {
            $this.text("Switch off").data("active", true);
            api2._init();
        }
    });
</script>
</body>
</html>
