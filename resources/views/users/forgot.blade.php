@extends('frontend.layouts.master')
@section('title','Forgot Password')
@section('slider')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">

            <div class="signup-form" style="text-align: center">
                <h3>Password Assistance</h3>
                <form action="{{route('password_reset')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <p>
                        Please enter the e-mail address associated with your destiny account.<br />
                        We will send you a link to this e-mail address to reset your password.
                    </p>
                    <input type="email" name="email" placeholder="Your Email Address" class="form-control">
                    <button type="submit" class="btn btn-default">RESET PASSWORD</button>
                </form>
            </div>

        </div>
        <div class="col-sm-3">

        </div>
    </div>
    <div class="signup-form">
        <a href="{{url('/login_page')}}"><button type="button">RETURN TO LOGIN</button></a>
    </div>
</div>
<div style="margin-bottom: 20px;"></div>
@endsection