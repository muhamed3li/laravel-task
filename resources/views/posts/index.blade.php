@extends('layouts.app')

@section('content')
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
    @endif
    <div class="clearfix">
        <a href="{{ route('posts.create') }}" class="btn btn-success mb-2 float-end">Create Post</a>
    </div>
    <div class="card card-default">
        <div class="card-header">All Posts</div>
        @if ($posts->count() > 0)
            <table class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td class="px-3">
                                <img src="{{asset('storage/' . $post->img)}} "width="70px height="50px"">
                            </td>
                            <td class="px-3">
                                {{ $post->name }}
                            </td>

                            <td class="d-flex float-right">
                                <a href="{{ route('posts.edit', $post->id) }} "
                                   class="btn btn-primary btn-sm">Edit
                                </a>
                                <form class=" ml-2 form-group" action="{{ route('posts.destroy', $post->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </table>
        @else
            <div class="text-center py-3">
                <h1>No Categories Yet.</h1>
            </div>
        @endif
    </div>

@endsection
