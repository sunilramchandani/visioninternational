@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/internship-company.css') }}">
@stop

@include('layouts.navbar')
@section('content')
@foreach ($blog_table as $blog)
{!!$blog->body!!}
@endforeach
@endsection
