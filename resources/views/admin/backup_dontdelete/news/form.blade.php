@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <h1>
            {{ ucwords(request()->route()->getActionMethod()) }} News
        </h1>
    </section>
@endsection

@section('content-main')
    <section class="content page-news">
        <div class="row">
            <div class="col-xs-12">
                @if($error == true)
                    @include('partials.notif', ['type' => 'danger', 'message' => 'Something went wrong.']);
                @endif
                <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label
                                for="title">
                            Title
                        </label>
                        <input
                                type="text"
                                class="form-control"
                                id="title"
                                name="title"
                                value="{{ isset($news) ? $news->title : '' }}"
                                placeholder="Some Title">
                    </div>
                    <div class="form-group">
                        <label
                                for="article">
                            Article
                        </label>
                        <textarea
                                class="form-control"
                                id="article"
                                name="article"
                                rows="8">{{ isset($news) ? trim($news->article) : '' }}</textarea>
                    </div>

                    <div class="btn-container">
                        <a href="#" class="btn btn-danger pull-right">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
