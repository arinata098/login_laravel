@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-5">
                <h2>{{ $post->title }}</h2>
                <p>By. {{ $post->author->name }} in <a href="/posts?category={{ $post->category->slug }}"> {{ $post->category->name }} </a> </p>

                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mb-3" alt="{{ $post->category->name }}">

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

                  <a href="/posts">Back to Posts</a>

            </div>
        </div>
    </div>

    <article>
        
    </article>

    
@endsection