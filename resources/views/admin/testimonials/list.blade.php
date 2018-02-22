@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <div class="row">
            <div class="col-xs-10">
                <h1 class="page-header">Testimonials</h1>
            </div>
            <div class="col-xs-2">
                <a href="{{route('testimonials.new')}}"><button style ="" class="btn btn-success">New Testimonial</button></a>
            </div>
        </div>
    </section>
@endsection

@section('content-main')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                @if(session('flash'))
                    @include('partials.notif', ['flash' => session('flash')])
                @endif
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Organization</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($testimonials as $testimonial)
                        <tr>
                            <td>
                                {{ sprintf('%s %s', $testimonial->first_name, $testimonial->last_name) }}
                            </td>
                            <td>
                                {{ $testimonial->organization }}
                            </td>
                            <td>
                                <a
                                        href="{{ route('testimonials.view', $testimonial->id) }}"
                                        class="btn btn-info">
                                    View
                                </a>
                                <a
                                        href="{{ route('testimonials.edit', $testimonial->id) }}"
                                        class="btn btn-warning">
                                    Edit
                                </a>
                                <a
                                        href="{{ route('testimonials.delete', $testimonial->id) }}"
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
                {{ $pagination->links() }}
            </div>
        </div>
    </section>
@endsection