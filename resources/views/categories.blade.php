@extends('layouts.main')

@section('container')
    <h1>Post Category</h1>

    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-md-4">
                <a href="/posts?category={{ $category->slug }}">
                    <div class="card bg-dark text-white">
                        <img src="https://source.unsplash.com/500x500?{{ $category->name}}" class="card-img" alt="{{ $category->name}}">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            {{-- flex fill biar 1 row full biar bisa pake text-center --}}
                            <h5 class="card-title text-center flex-fill fs-3 p-4" style="background-color: rgba(0, 0, 0, 0.15)">{{ $category->name }}</h5>
                        </div>
                  </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection

