@extends('layouts.main')
@section('title', "Edit {$article->title}")
@section('content')
    <div class="form bg-success bg-gradient create-article-form">
        <div class="form-title">
            <h1>Update the article</h1>
        </div>
        <form action="{{route('article.update', $article->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{$article->title}}">
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{$category->id !== $article->category->id ?: ' selected'}}
                        >{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content">Content</label>
                <textarea class="form-control content-textarea" id="content" name="content">{{$article->content}}</textarea>
                @error('content')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tags">Tags</label>
                <select class="form-select" name="tags[]" id="tags" multiple>
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}" {{!in_array($tag->id, $article->tags->pluck('id')->toArray()) ?: ' selected'}}
                        >{{$tag->name}}</option>
                    @endforeach
                </select>
                @error('tags')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="avatar">Choose the article image:</label>
                <p><input type="file" id="image" name="image" accept="image/png, image/jpeg, image/webp"
                          value="{{public_path('storage/images/article_images/'.$article->image)}}">
                </p>
                @error('image')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="action-buttons">
                <button class="btn btn-warning back-btn">
                    <a href="{{route('article.index')}}">Back</a>
                </button>
                <button type="submit" class="btn btn-primary submit-btn">Update</button>
            </div>
        </form>
    </div>
@endsection
@include('home.background')
