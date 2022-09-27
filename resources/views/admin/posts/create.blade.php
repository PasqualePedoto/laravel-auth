@extends('layouts.app')

@section('content')
    <div class="container">
        @if($post->exists())
            <h1 class="text-center mb-5">Edit post: {{ $post->title }}</h1>
            <form action="{{ route('admin.posts.update',$post) }}" method="POST" class="d-flex flex-wrap">
                @method('PUT')
        @else
            <h1 class="text-center mb-5">Create new post</h1>
            <form action="{{ route('admin.posts.store') }}" method="POST" class="d-flex flex-wrap">
        @endif
            @csrf
                {{-- Title --}}
                <div class="form-group col-6">
                    <label for="title">Title</label>
                    <input name="title" type="text" class="form-control" id="title" value="{{ old('title',$post->title) }}">
                </div>
                
                {{-- Image --}}
                <div class="form-group col-6">
                    <label for="image">Image</label>
                    <input name="image" type="text" class="form-control" id="image" value="{{ old('image',$post->image) }}">
                </div>

                {{-- Content --}}
                <div class="form-group col-6">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" rows="3" name="content">{{ old('content',$post->content) }}</textarea>
                </div>

                {{-- Button --}}
                <div class="form-group col-6 d-flex align-items-end justify-content-end">
                    <button class="btn btn-success" type="submit">
                        Submit
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
          </form>
    </div>
@endsection