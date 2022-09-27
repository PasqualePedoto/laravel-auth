@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- Title --}}
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1>Lista dei posts</h1>
        <div>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-success">
                <i class="fa-solid fa-square-plus mr-2"></i>
                <strong>Add new post</strong>
            </a>
        </div>
    </div>

    {{-- Table --}}
    <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">content</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td class="d-flex align-items-center justify-content-center">
                        {{-- View post --}}
                        <div class="mr-3">
                            <a href="{{ route('admin.posts.show',$post) }}" class="btn btn-success btn-small">
                                <i class="fa-solid fa-eye"></i>
                                {{-- <strong>View post</strong> --}}
                            </a>
                        </div>

                        {{-- Update post --}}
                        <div class="mr-3">
                            <a href="{{ route('admin.posts.edit',$post) }}" class="btn btn-warning btn-small">
                                <i class="fa-solid fa-pencil"></i>
                                {{-- <strong>Update post</strong> --}}
                            </a>
                        </div>

                        {{-- Delete post --}}
                        <div class="mr-3">
                            <form action="{{ route('admin.posts.destroy',$post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
            <tr>
                <th scope="row">Non ci sono posts</th>
            </tr>
            @endempty
        </tbody>
      </table>
    </div>
@endsection