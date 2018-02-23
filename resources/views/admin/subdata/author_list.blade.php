@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <h1 class="page-header">
        Author
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
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($author_table as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                            <td>
                                <img height="200px" width "200px" src="{{URL::asset('storage/upload_author_image')}}/{{$author->image}}"
                                    alt="Image Error" />
                            </td>
                        <td>{{ (strip_tags($author->description)) }}</td>
                        <td>


                            <a href="{{ route('author.save', $author->author_id) }}" class="btn btn-warning">
                                Edit
                            </a>



                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-xs-12 text-center">
            {{ $author_table->links() }}
        </div>
    </div>
</section>
@endsection