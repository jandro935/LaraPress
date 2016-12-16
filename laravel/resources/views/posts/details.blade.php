@extends('home')

@section('content')

    {{--<p>{{ $data }}</p>--}}

    <h1>{!! $data->post_title !!}</h1>
    <p>{!! $data->post_content !!}</p>
    <p>{!! $data->post_date !!}</p>
    <p>Comentarios: {!! $data->comment_count !!}</p>
    <p>Autor: {!! $data->post_author !!}</p>

@endsection
