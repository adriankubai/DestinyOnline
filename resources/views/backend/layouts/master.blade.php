<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title','Master Page')</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{url('css/colorpicker.css')}}" />
    <link rel="stylesheet" href="{{ url('css/uniform.css') }}" />
    <link rel="stylesheet" href="{{ url('css/select2.css') }}" />
    <link rel="stylesheet" href="{{url('css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{url('css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{url('css/matrix-media.css')}}" />
    <link rel="stylesheet" href="{{url('css/bootstrap-wysihtml5.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link href="{{url('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/jquery.gritter.css')}}" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    @yield('cssblock')



    {{--online resource links--}}
{{--    <link href="https://myecommproject.herokuapp.com/css/bootstrap.min.css" rel="stylesheet">--}}
{{--    <link href="https://myecommproject.herokuapp.com/css/bootstrap-responsive.min.css" rel="stylesheet">--}}
{{--    <link href="https://myecommproject.herokuapp.com/css/colorpicker.css" rel="stylesheet">--}}
{{--    <link href="https://myecommproject.herokuapp.com/css/uniform.css" rel="stylesheet">--}}
{{--    <link href="https://myecommproject.herokuapp.com/css/select2.css" rel="stylesheet">--}}
{{--    <link href="https://myecommproject.herokuapp.com/css/fullcalendar.css" rel="stylesheet">--}}
{{--    <link href="https://myecommproject.herokuapp.com/css/matrix-style.css" rel="stylesheet">--}}
{{--    <link href="https://myecommproject.herokuapp.com/css/matrix-media.css" rel="stylesheet">--}}
{{--    <link href="https://myecommproject.herokuapp.com/css/bootstrap-wysihtml5.css" rel="stylesheet">--}}
{{--    <link href="https://myecommproject.herokuapp.com/font-awesome/css/font-awesome.css" rel="stylesheet">--}}
</head>
<body>

@include('backend.layouts.header')
@include('backend.layouts.nav')

<!--main-container-part-->
<div id="content">
    @yield('content')
</div>
{{--@include('backEnd.layouts.footer')--}}
@yield('jsblock')
</body>
</html>
