@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-5">Create new post</h1>
        <form action="{{ route('admin.posts.store') }}" method="POST" class="d-flex flex-wrap">
            @csrf
                {{-- Title --}}
                <div class="form-group col-6">
                    <label for="title">Title</label>
                    <input name="title" type="text" class="form-control" id="title">
                </div>
                
                {{-- Image --}}
                <div class="form-group col-6">
                    <label for="image">Image</label>
                    <input name="image" type="text" class="form-control" id="image">
                </div>

                {{-- Content --}}
                <div class="form-group col-6">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                </div>

                {{-- Button --}}
                <div class="form-group col-6 d-flex align-items-end justify-content-end">
                    <button class="btn btn-success" type="submit">
                        <i class="fa-solid fa-plus"></i>
                        Add new post!
                    </button>
                </div>
          </form>
    </div>
@endsection