@extends('layouts.main')
@section('title', "Create article")
@section('content')
    <div class="form bg-success bg-gradient create-article-form">
        <div class="form-title">
            <h1>Create a new article</h1>
        </div>
        <form action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" name="category_id" id="category_id">
                    <option selected>Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{$category->id != old('category_id') ?: ' selected'}}
                        >{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">The category field should be selected</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content">Content</label>
                <textarea class="form-control content-textarea" id="content" name="content" placeholder="Enter a content">{{old('content')}}</textarea>
                @error('content')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tags">Tags</label>
                <select class="form-select" name="tags[]" id="tags" multiple>
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}"
                            @if(old('tags'))
                                {{!in_array($tag->id, old('tags')) ?: ' selected'}}
                            @endif
                        >{{$tag->name}}</option>
                    @endforeach
                </select>
                @error('tags')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="avatar">Choose the article image:</label>
                <p><input type="file"
                       id="image" name="image"
                       accept="image/png, image/jpeg, image/webp">
                </p>
                @error('image')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="action-buttons">
                <button class="btn btn-warning back-btn">
                    <a href="{{route('article.index')}}">Back</a>
                </button>
                <button type="submit" class="btn btn-primary submit-btn">Create</button>
            </div>
        </form>
    </div>
@endsection
@include('home.background')
