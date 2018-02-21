@extends('layouts.admin') @section('content-header')
<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="content-header">
    <h1 class="page-header">
        Opportunity
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
            
            <form action="{{ route('opportunity.store') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" name="opportunity_name" id="opportunity_name" required placeholder="Opportunity Name . . .">
            <button type="submit">+</button>        
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Opportunity Name</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($opportunity_table as $opportunity)
                    <tr>
                        <td>{{ $opportunity->opportunity_name }}</td>
                        <td>
                            <a href="{{ route('opportunity.delete', $opportunity->id) }}" class="btn btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-xs-12 text-center">
            {{ $opportunity_table->links() }}
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 250
        });
    });


</script>
@endsection
