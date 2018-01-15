@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">
                    {{ ucwords(request()->route()->getActionMethod()) }} Program
                </h1>
            </div>
        </div>
    </section>
@endsection


@section('content-main')
    <section class="content">
        <form action="{{ $action }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-xs-12">
                    @if($error)
                        @include('partials.notif', ['flash' => $error])
                    @endif

                    <div class="form-group">
                        <label for="title">
                            Title
                        </label>

                        <input
                                type="text"
                                name="title"
                                id="title"
                                value="{{ (isset($program['title'])) ? $program['title'] : '' }}"
                                class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">
                            Description
                        </label>

                        <textarea
                                name="description"
                                id="description"
                                class="form-control"
                                rows="10">{{ (isset($program['description'])) ? $program['description'] : '' }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 btn-container">
                    <a href="{{ route('programs.list') }}" class="btn btn-danger pull-right">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                </div>
            </div>
        </form>
    </section>
@endsection