@extends('layouts.main')
@section('title', $article->title)
@section('content')
    <div class="show-article">
        <div class="title">
            <h1>{{$article->title}}</h1>
        </div>
        <div class="article-content">
            <img class="image" src="{{asset('storage/images/article_images/' . $article->image)}}">
            <div class="article-text">
                {{$article->content}}
            </div>
        </div>
        @if($article->tags->count())
            <div class="tags">
                <span><b>Tags: </b>{{implode(', ', $article->tags->pluck('name')->toArray())}}</span>
            </div>
        @endif
        <div class="action-buttons">
            <div class="back-button">
                <button class="btn btn-warning">
                    <a href="{{route('home.index')}}">
                        Back
                    </a>
                </button>
            </div>
            @can('delete', $article)
                <div class="delete-button">
                    <form action="{{route('article.destroy', $article)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Remove</button>
                    </form>
                </div>
            @endcan
            @can('update', $article)
                <div class="edit-button">
                    <button class="btn btn-info">
                        <a href="{{route('article.edit', $article->id)}}">
                            Edit
                        </a>
                    </button>
                </div>
            @endcan
        </div>
    </div>
@endsection
@include('home.background')
