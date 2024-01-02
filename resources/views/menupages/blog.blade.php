@extends('layouts.home')

@section('head')

@endsection

@section('content')
@auth

<link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    {{-- post form --}}
    <div class="post-container mt-5">
        <form action="{{ route('blog.makePost') }}" method="POST">
            @csrf
            <input name="title" type="text" placeholder="Title..">
            <input name="content" type="textarea" placeholder="What's on your mind?...">
            <button>Post</button>
        </form>
    </div>  

    {{-- iterate through posts and display them --}}
    @foreach ($posts as $post)
    <div class="post">
        <p class="author-info">{{ $post->user->name }}</p>
        <h2 id="title_{{ $post->id }}">{{ $post->title }}</h2>
        <p id="content_{{ $post->id }}">{{ $post->content }}</p>
        

        @if (auth()->check() && $post->user->id === auth()->user()->id)
            <div class="post-actions">
                <div class="editting-tools">
                        <form action="{{ route('blog.deletePost', ['post' => $post->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <i class="material-icons delete-icon" onclick="this.parentNode.submit()">delete</i>
                            </form>
                            <i class="material-icons update-button edit-icon" data-post-id="{{ $post->id }}">edit</i>
                </div>
                <form action="{{ route('blog.updatePost', ['post' => $post->id]) }}" method="POST"
                    class="update-form" data-post-id="{{ $post->id }}" style="display: none;">
                    @csrf
                    @method('PUT')

                    <input type="text" name="title" value="{{ $post->title }}">
                    <textarea name="content">{{ $post->content }}</textarea>

                    {{-- <button class="save-changes" type="submit">Save Changes</button> --}}
                    <div class="update-buttons">
                            <button class="save-changes" type="submit">Save Changes</button>
                            <a href="#" class="cancel-button">Cancel</a>
                        </div>
                </form>
            </div>
        @endif
    </div>
@endforeach

@endauth
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src={{asset('assets/js/blog.js')}}></script>

@endsection
