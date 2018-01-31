@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <h1 class="page-header">
            News
        </h1>
    </section>
@endsection
@section('content-main')
    <section class="content page-news">
        <div class="row">
            <div class="col-xs-12">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif @if(Session::has('ok'))
            <div class="alert alert-info">
                {{Session::get('ok')}}
            </div>
            @endif
                    <tbody>
                    <td><form action="{{route('featuredimage.update', $featuredimage->id)}}" method="post" role="form"  enctype="multipart/form-data" >
                        {{method_field('PATCH')}}
                        {{csrf_field()}}

                        <div class = "col-lg-7">
                        <input type = "file" class = "form-control"  name="featured_image" id="featured_image">
                        </div>
                        <div class="form-group">
                    <label for="stipend">
                        Stipend
                    </label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ isset($featuredimage) ? $featuredimage->description : '' }}" placeholder="Some Title">
                </div>


                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </form>
             </td>
                    </tbody>
                </table>
            </div>

        </div>
    </section>
@endsection
