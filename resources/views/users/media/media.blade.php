@extends('layouts.master')

@section('page-css')
<link rel="stylesheet" href="{{ asset('css/media.css') }}">
@stop

@include('layouts.navbar')
@section('content')
<!--Header Text -->
<div class = "container text-center">
	<div class = "col-xs-12 ">
		<h4>Media</h4>
	</div>
	<div class = "col-xs-4 col-xs-offset-4 header-desc">
		<p>Curabitor blandit tempus portitor. Vivamus sagtiis lacus vel augue laoreet</p>
	</div>
</div>

<!--media -->
<div class = "container">
	@foreach ($media_table as $media)
	<div class = "col-xs-10 col-xs-offset-1 media-container">
			@if($media->media_type == "Video")
			<div class = "col-xs-4 media-video">
				<iframe class = "video-class" src="{{$media->media_link}}" frameborder="0" allowfullscreen>
				</iframe>
			</div>
			@else
			<div class = "col-xs-4 photo-container">
				<img src="https://scontent.fmnl13-1.fna.fbcdn.net/v/t1.0-9/23755155_1551868068238281_4354170624360768396_n.jpg?oh=f7223d0cdf4a3783ecc86610d8fa3181&oe=5B4A18A0" class = "img img-responsive media-photo">
			</div>
			@endif
		<div class = "col-xs-7 media-description">
			<div class = "col-xs-12">
				@if($media->media_type == "Video")
				<p class = "gray">Video</p>
				@else
				<p class = "gray">Photo</p>
				@endif
				<h4 class = "title"> {{$media->media_title}} </h4>
				<p> {{$media->media_description}} </p>
				<div class = "row bottom-media">
					<div class = "col-xs-2" style="padding: 0;">
						<p>BY: <strong> {{$media->media_author}} </strong></p>
					</div>
					<div class = "col-xs-6">
						<p> {{Carbon\Carbon::parse($media->created_at)->toFormattedDateString()}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
<div class = "row" style = "padding-bottom: 5%;"></div>