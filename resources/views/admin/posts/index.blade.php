@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- Title --}}
    <h1 class="mb-5 text-center">Lista dei posts</h1>

    {{-- Table --}}
    <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">content</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
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