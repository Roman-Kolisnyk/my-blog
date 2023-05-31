@extends('layouts.main')
@section('title', 'Articles')
@section('content')
    <a href="{{route('article.create')}}" class="btn btn-warning create-article-btn"><span>Add new article</span></a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Content</th>
            <th scope="col">Tags</th>
            <th scope="col">Image</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <th scope="row">{{$article->id}}</th>
                <td>{{$article->title}}</td>
                <td>{{$article->category->name}}</td>
                <td><a class="article-content" href="#">Show content</a></td>
                <td>{{implode(', ', $article->tags->pluck('name')->toArray())}}</td>
                <td>{{$article->image}}</td>
                <td>{{$article->created_at}}</td>
                <td>{{$article->updated_at}}</td>
                <td>
                    <div class="actions">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="actions-button" data-bs-toggle="dropdown" aria-expanded="false">
                            Select
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="actions-button">
                            <li><a class="dropdown-item" href="{{route('article.edit', $article->id)}}">Edit</a></li>
                            <li>
                                <form action="{{route('article.destroy', $article->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item">Remove</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="paginator">
        {{$articles->withQueryString()->links()}}
    </div>
@endsection
