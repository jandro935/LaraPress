@extends('home')

@section('content')

    {{--<p>{{ $data }}</p>--}}

    @foreach($data as $post)
        <h1>
            <a href="{{ route('posts.show', $post->slug) }}">{!! $post->post_title !!}</a>
        </h1>
        <p>{!! $post->post_content !!}</p>
        <p>{!! $post->post_date !!}</p>
        <p>Comentarios: {!! $post->comment_count !!}</p>
        <p>Autor: {!! $post->post_author !!}</p>
        <p>Slug: {!! $post->slug !!}</p>
    @endforeach

    {!! $data->render() !!}

@endsection
