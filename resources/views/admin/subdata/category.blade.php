@extends('layouts.admin') @section('content-header')
<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="content-header">
    <h1 class="page-header">
        Category
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
            
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" name="category_name" id="category_name" required placeholder="Category Name . . .">
            <button type="submit">+</button>        
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-5">

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($category_table as $category)
                    <form action="{{ route('category.edit', $category->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <tr>
                        <td><input type="text" id="category_name" name="category_name" value ="{{ $category->category_name }}"></td>
                        <td>
                            <button class="btn btn-warning" type="submit">
                            Edit
                            </button>
                        </td>
                    </tr>
                    
                </form>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-xs-12 text-center">
            {{ $category_table->links() }}
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
