@extends('home')

@section('content')

    @foreach($data as $post)
        {{--<h1>{{ $data->post_title }}</h1>--}}
        {{--<p>{!! $data->post_content !!}</p>--}}
        <h1>{{ $post->post_title }}</h1>
        <p>{!! $post->post_content !!}</p>
    @endforeach

@endsection
