
@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{isset($post) ? 'Update Post' : 'Add New Post'}}
        </div>
        <div class="card-body">
            <form action="{{ isset($post) ? route('posts.update' , $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="Post">Name : </label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Post Name" value="{{isset($post) ? $post->name : '' }}">
                </div>
                @error('name')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
                <div class="form-group">
                    <label for="Post">Description : </label>
                    <textarea class="form-control" name="description" placeholder="Enter Post Description" rows="2">{{ isset($post) ? $post->description : '' }}</textarea>
                </div>
                @error('description')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
                @if (isset($post))
                    <div class="form-group">
                        <img src="{{ asset('storage/' . $post->img) }}" style="width: 100%" />
                    </div>
                @endif
                <div class="form-group">
                    <label for="Post">Image : </label>
                    <input type="file" name="img" class="form-control " value="">
                </div>
                @error('description')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
                <div class="form-group">
                    <label for="selectCategory">Select Category : </label>
                    <select class="form-select" name="category_id">
                        <option selected>Open this select menu</option>
                        @foreach ($categories as $category)
                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success mt-2">
                        {{ isset($post) ? 'Update' : 'Add' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
