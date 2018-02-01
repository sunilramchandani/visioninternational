@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <h1 class="page-header">
        News
    </h1>
</section>
@endsection @section('content-main')
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
                <td>
                    <form action="{{route('featuredimage.update', $featuredimage->id)}}" method="post" role="form" enctype="multipart/form-data">
                        {{method_field('PATCH')}} {{csrf_field()}}

                        <div class="col-lg-7">
                            <input type="file" class="form-control" name="main_image" id="main_image"   value="{{ isset($featuredimage) ? $featuredimage->main_image : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="stipend">
                                Featured Image Description
                            </label>
                            <input type="text" class="form-control" id="main_image_description" name="main_image_description" value="{{ isset($featuredimage) ? $featuredimage->main_image_description : '' }}"
                                placeholder="Some Title">
                        </div>
                    @if(isset($featuredimage->sub_image1))  

                        Sub Image 1
                        <div class = "col-lg-7">
                        <input type = "file" class = "form-control"  name="sub_image1" id="sub_image1" value="{{ isset($featuredimage) ? $featuredimage->sub_image1 : '' }}">
                        </div>
                        <div class="form-group">
                    <label for="stipend">
                        Sub Image 1 Description
                    </label>
                    <input type="text" class="form-control" id="sub_image1_description" name="sub_image1_description" value="{{ isset($featuredimage) ? $featuredimage->sub_image1_description : '' }}" placeholder="Some Title">
                </div>
                    @endif

                    @if(isset($featuredimage->sub_image2))  

                        Sub Image 1
                        <div class = "col-lg-7">
                        <input type = "file" class = "form-control"  name="sub_image2" id="sub_image2" value="{{ isset($featuredimage) ? $featuredimage->sub_image2 : '' }}">
                        </div>
                        <div class="form-group">
                    <label for="stipend">
                        Sub Image 1 Description
                    </label>
                    <input type="text" class="form-control" id="sub_image2_description" name="sub_image2_description" value="{{ isset($featuredimage) ? $featuredimage->sub_image2_description : '' }}" placeholder="Some Title">
                </div>
                    @endif

                    @if(isset($featuredimage->sub_image3))  

                        Sub Image 1
                        <div class = "col-lg-7">
                        <input type = "file" class = "form-control"  name="sub_image3" id="sub_image3" value="{{ isset($featuredimage) ? $featuredimage->sub_image3 : '' }}">
                        </div>
                        <div class="form-group">
                    <label for="stipend">
                        Sub Image 1 Description
                    </label>
                    <input type="text" class="form-control" id="sub_image3_description" name="sub_image3_description" value="{{ isset($featuredimage) ? $featuredimage->sub_image3_description : '' }}" placeholder="Some Title">
                </div>
                @if(isset($featuredimage->sub_image3_title)) 
                <div class="form-group">
                    <label for="stipend">
                        Sub Image 3 Title
                    </label>
                    <input type="text" class="form-control" id="sub_image3_title" name="sub_image3_title" value="{{ isset($featuredimage) ? $featuredimage->sub_image3_title : '' }}" placeholder="Some Title">
                </div>
                @endif 

                @if(isset($featuredimage->sub_image3_validity)) 
                <div class="form-group">
                    <label for="stipend">
                        Sub Image 3 Title
                    </label>
                    <input type="text" class="form-control" id="sub_image3_validity" name="sub_image3_validity" value="{{ isset($featuredimage) ? $featuredimage->sub_image3_validity : '' }}" placeholder="Some Title">
                </div>
                @endif 

                    @endif

                    @if(isset($featuredimage->sub_image4))  

                        Sub Image 1
                        <div class = "col-lg-7">
                        <input type = "file" class = "form-control"  name="sub_image4" id="sub_image4" value="{{ isset($featuredimage) ? $featuredimage->sub_image4 : '' }}">
                        </div>
                        <div class="form-group">
                    <label for="stipend">
                        Sub Image 1 Description
                    </label>
                    <input type="text" class="form-control" id="sub_image4_description" name="sub_image4_description" value="{{ isset($featuredimage) ? $featuredimage->sub_image4_description : '' }}" placeholder="Some Title">
                </div>
                    @endif

                    @if(isset($featuredimage->sub_image5))  

                        Sub Image 1
                        <div class = "col-lg-7">
                        <input type = "file" class = "form-control"  name="sub_image5" id="sub_image5" value="{{ isset($featuredimage) ? $featuredimage->sub_image5 : '' }}">
                        </div>
                        <div class="form-group">
                    <label for="stipend">
                        Sub Image 1 Description
                    </label>
                    <input type="text" class="form-control" id="sub_image5_description" name="sub_image5_description" value="{{ isset($featuredimage) ? $featuredimage->sub_image5_description : '' }}" placeholder="Some Title">
                </div>
                    @endif
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </form>
                </td>
            </tbody>
            </table>
        </div>

    </div>
</section>
@endsection