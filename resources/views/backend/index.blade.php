@extends('backend.layouts.master')
@section('title','Dashboard')
@section('cssblock')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
@endsection

@section('content')
    <div class="all-content-wrapper">

        <canvas id="myChart" width="50%" height="20%"></canvas>

    </div>

@endsection
@section('jsblock')

@include('backend.layouts.charts')


@endsection
