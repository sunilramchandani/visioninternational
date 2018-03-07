@extends('layouts.admin')

@section('content-header')
<section class="content-header">
    <h1 class="page-header">
        <div class="row">
            <div class="col-xs-10">
                FAQ
            </div>
            <div class="col-xs-2">
            <a href="{{route('faq.trash')}}"><button class="btn"><i class="fa fa-trash" style="color:black;"> &nbsp; View Trash</i></button></a>
            </div>
        </div>
    </h1>
</section>
@endsection

@section('content-main')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif @if(Session::has('ok'))
<div class="alert alert-success">
   <a href="{{route('faq.adminIndex')}}"> {{Session::get('ok')}}</a>
</div>
@endif

    <section class="content page-news">
        <div class="row">
            <div class="col-xs-12">

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th colspan="2">Action</th>
                        </tr> 
                    </thead>

                    <tbody>
                        @foreach($faq_table as $faq)
                            <tr>
                                <td>{{ $faq->faq_type }}</td>
                                <td>{{ strip_tags($faq->question) }}</td>
                                <td>{{ strip_tags($faq->answer) }}</td>
                                <td>
                                    <a
                                        href="{{ route('faq.adminEdit', $faq->faq_id) }}"
                                        class="btn btn-info">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    
                                    
                                    <a
                                        href="{{ route('faq.adminDelete', $faq->faq_id) }}"
                                        class="btn btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-xs-12 text-center">
                {{ $faq_table->links() }}
            </div>
        </div>
    </section>
@endsection
