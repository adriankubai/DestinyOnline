@extends('frontend.layouts.master')
@section('title','Login Page')
@section('slider')
@endsection
@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form action="{{url('/logingin')}}" method="post" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="item" value="{{$item}}">
                            <input type="email" placeholder="Email" name="email"/>
                            <input type="password" placeholder="Password" name="password"/>
                            <span>
                                        <input type="checkbox" class="checkbox">
                                        Keep me signed in
                                    </span> <a class="pull-right" href="{{route('forgot')}}">Forgot Password</a>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-3"></div>

            </div>
    </div>
@endsection
