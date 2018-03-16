@extends('layouts.admin')

@section('content-header')
    <section class="content-header">
        <h1 class="page-header">
            Event
        </h1>
    </section>
@endsection

@section('content-main')
    <section class="content page-news">
        <div class="row">
            <div class="col-xs-12">
                @if(session('flash'))
                    @include('partials.notif', ['flash' => session('flash')])
                @endif

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Event Name</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($event as $single_event)
                            <tr>
                                <td>{{ $single_event->event_name }}</td>
                                
                                <td>
                                    <a
                                        href="{{ route('event.view', $single_event->fbevent_id) }}"
                                        class="btn btn-success">
                                        Manage Category
                                    </a>
                                </td>
                                @if($single_event->fbevent_id == 1)
                                <td>
                                    <a
                                        href="{{ route('event.adminEdit', $single_event->fbevent_id) }}"
                                        class="btn btn-info">
                                        Edit
                                    </a>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-xs-12 text-center">
               
            </div>
        </div>
    </section>
@endsection
