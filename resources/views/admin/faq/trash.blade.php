@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <h1 class="page-header">
        <div class="row">
            <div class="col-xs-10">
                FAQ ( Trash )
            </div>
            <div class="col-xs-2">
            <a href="{{route('faq.adminIndex')}}"><button class="btn"><i class="fa fa-arrow-left" style="color:black"> &nbsp; Go Back</i></button></a>
            </div>
        </div>
    </h1>
</section>
@endsection @section('content-main')
<section class="content page-news">
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
       {{Session::get('ok')}} 
    </div>
    @endif
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
                                <td>{{ $faq->question }}</td>
                                <td>{{ $faq->answer }}</td>
                            
                        <td>
                            
                            <a href="{{ route('faq.restoretrash', $faq->faq_id) }}" class="btn btn-info">
                                Restore
                            </a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    </div>
</section>
@endsection