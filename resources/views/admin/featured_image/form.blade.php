@extends('layouts.admin') @section('content-header')
<section class="content-header">
    <h1 class="page-header">
        {{$featuredimage->page_name}}
    </h1>
</section>
<style>
    .border-bot {
        border-bottom: 1px solid black !important;
    }
</style>
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

                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="main_image">
                                        Header Image
                                    </label>
                                    <input type="file" class="form-control" name="main_image" id="main_image" value="{{ isset($featuredimage) ? $featuredimage->main_image : '' }}">
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">

                                    <img height="100px" width="200px" src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featuredimage->main_image}}" class="img-preview"
                                        alt="Company Banner">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="main_image_description">
                                        Header Description
                                    </label>
                                    <textarea type="longtext" class="form-control" id="main_image_description" name="main_image_description" required rows="10">{{ isset($featuredimage) ? $featuredimage->main_image_description : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="border-bot"></div>
                        <Br> @if(isset($featuredimage->sub_image1))


                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="sub_image1">
                                        Sub Image 1
                                    </label>
                                    <input type="file" class="form-control" name="sub_image1" id="sub_image1" value="{{ isset($featuredimage) ? $featuredimage->sub_image1 : '' }}">
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">

                                    <img height="100px" width="200px" src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featuredimage->sub_image1}}" class="img-preview"
                                        alt="Company Banner">
                                </div>
                            </div>


                        </div>

                        <div class="border-bot"></div>
                        <br> @endif @if(isset($featuredimage->sub_image2))

                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="sub_image2">
                                        Sub Image 2
                                    </label>
                                    <input type="file" class="form-control" name="sub_image2" id="sub_image2" value="{{ isset($featuredimage) ? $featuredimage->sub_image2 : '' }}">
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group">

                                    <img height="100px" width="200px" src="{{ URL::asset('image/uploaded_featured_image')}}/{{$featuredimage->sub_image2}}" class="img-preview"
                                        alt="Company Banner">
                                </div>
                            </div>


                        </div>


                        <div class="border-bot"></div>
                        <br> @endif @if(isset($featuredimage->promo_id))

                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="promo">
                                        Promo
                                    </label>
                                    <select class="form-control" name="promo_id" id="promo_id" required>
                                        <option value="" disabled selected>Select Promo</option>
                                        @foreach($promo_table as $promo )
                                        <option value="{{ $promo->id }}">{{ $promo->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">


                            <div class="border-bot"></div>
                            <br> @endif @if(isset($featuredimage->testimony_id))

                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="author">
                                        Author
                                    </label>
                                    <select class="form-control" name="testimonial_id" id="testimonial_id" required>
                                        <option value="" disabled selected>Select Author</option>
                                        @foreach($testimonial_table as $testimonial )
                                        <option value="{{ $testimonial->id }}">{{ $testimonial->first_name }}, {{$testimonial->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="border-bot"></div>
                        <br> @endif @if($featuredimage->page_name == "home") @if(isset($featuredimage->sub_image3))
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="sub_image3">
                                        Promo Image
                                    </label>
                                    <input type="file" class="form-control" name="sub_image3" id="sub_image3" value="{{ isset($featuredimage) ? $featuredimage->sub_image3 : '' }}">
                                </div>
                            </div>
                            @endif @if(isset($featuredimage->sub_image3_description))

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="sub_image3_description">
                                        Promo Description
                                    </label>
                                    <input type="text" class="form-control" name="sub_image3_description" id="sub_image3_description" value="{{ isset($featuredimage) ? $featuredimage->sub_image3_description : '' }}">
                                </div>
                            </div>
                        </div>

                        @endif @if(isset($featuredimage->sub_image3_title))
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="sub_image3_title">
                                        Promo Title
                                    </label>
                                    <input type="text" class="form-control" name="sub_image3_title" id="sub_image3_title" value="{{ isset($featuredimage) ? $featuredimage->sub_image3_title : '' }}">
                                </div>
                            </div>
                            @endif @if(isset($featuredimage->sub_image3_validity))
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="sub_image3_validity">
                                        Promo Validity
                                    </label>
                                    <input type="text" class="form-control" name="sub_image3_validity" id="sub_image3_validity" value="{{ isset($featuredimage) ? $featuredimage->sub_image3_validity : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="border-bot"></div>
                        <br> @endif @endif @if($featuredimage->page_name == "home") @if(isset($featuredimage->sub_image4))
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="sub_image4">
                                        Testimony Image
                                    </label>
                                    <input type="file" class="form-control" name="sub_image4" id="sub_image4" value="{{ isset($featuredimage) ? $featuredimage->sub_image4 : '' }}">
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="sub_image4_description">
                                        Testimony Description
                                    </label>
                                    <input type="text" class="form-control" name="sub_image4_description" id="sub_image4_description" value="{{ isset($featuredimage) ? $featuredimage->sub_image4_description : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="border-bot"></div>
                        <br> @endif @if(isset($featuredimage->sub_image4_sender_title))
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="sub_image4_sender_title">
                                        Promo Title
                                    </label>
                                    <input type="text" class="form-control" name="sub_image4_sender_title" id="sub_image4_sender_title" value="{{ isset($featuredimage) ? $featuredimage->sub_image4_sender_title : '' }}">
                                </div>
                            </div>

                            @endif @if(isset($featuredimage->sub_image4_sender))
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="sub_image4_sender">
                                        Promo Validity
                                    </label>
                                    <input type="text" class="form-control" name="sub_image4_sender" id="sub_image4_sender" value="{{ isset($featuredimage) ? $featuredimage->sub_image4_sender : '' }}">
                                </div>
                            </div>
                        </div>
                        @endif @endif
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </form>
                </td>
            </tbody>
            </table>
        </div>

    </div>
</section>
@endsection