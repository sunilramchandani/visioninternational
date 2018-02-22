@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">
                    Testimonial
                </h1>
            </div>
        </div>
    </section>
@endsection

@section('content-main')
    <section class="content page-testimonial">
        <div class="row">
            <div class="col-xs-12">
            <p class="testimony">
            <img height="200px" width="200px" src="{{ URL::asset('image/uploaded_testimony_image')}}/{{$testimonial->image_testimony}}"
                        class="img-preview" alt="Company Banner">
            </p>
                <p class="testimony">
                    "{{ $testimonial->testimony }}"
                </p>

                <div class="testimony-author">
                    <p class="author">
                        {{ sprintf('%s %s', $testimonial->first_name, $testimonial->last_name) }}
                    </p>
                    <p class="organization">
                        {{ $testimonial->organization }}
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection