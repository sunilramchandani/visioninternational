@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/application-form.css') }}">
@stop

@include('layouts.navbar')

@section('content')

<div class="container">

<hr style="padding-bottom: 20%"></hr>
<div class = "row">
<div class ="col-md-10 col-md-offset-2"
<center><h3 style="color: blue; font-size: 100px; ">Link Not found</h3></center>
</div>
<div class ="col-md-4 col-md-offset-8">
        <a href="/" class="back">
            <h3> Return to Home</h3>
        </a>
</div>
</div>
</div>
@stop
