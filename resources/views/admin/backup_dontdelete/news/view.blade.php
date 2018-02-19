@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <h1 class="page-header">
            News
        </h1>
    </section>
@endsection

@section('content-main')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <h2>{{ $news->title }}</h2>

                {{ $news->article }}
            </div>
        </div>
    </section>
@endsection