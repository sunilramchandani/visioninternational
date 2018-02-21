@extends('layouts.admin') @section('content-header')
<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="content-header">
    <h1 class="page-header">
        Qualification
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
            
            <form action="{{ route('qualification.store') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" name="qualification_name" id="qualification_name" required placeholder="Qualification Name . . .">
            <button type="submit">+</button>        
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Qualification Name</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($qualification_table as $qualification)
                    <tr>
                        <td>{{ $qualification->qualification_name }}</td>
                        <td>
                            <a href="{{ route('qualification.delete', $qualification->id) }}" class="btn btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-xs-12 text-center">
            {{ $qualification_table->links() }}
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
