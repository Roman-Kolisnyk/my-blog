@extends('layouts.main')
@section('title', 'Tags')
@section('content')
    <a href="{{route('tag.create')}}" class="btn btn-warning create-tag-btn"><span>Add new tag</span></a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <th scope="row">{{$tag->id}}</th>
                <td>{{$tag->name}}</td>
                <td>{{$tag->created_at}}</td>
                <td>{{$tag->updated_at}}</td>
                <td>
                    <div class="actions">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="actions-button" data-bs-toggle="dropdown" aria-expanded="false">
                            Select
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="actions-button">
                            <li><a class="dropdown-item" href="{{route('tag.edit', $tag->id)}}">Edit</a></li>
                            <li>
                                <form action="{{route('tag.destroy', $tag->id)}}" method="POST">
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
        {{$tags->withQueryString()->links()}}
    </div>
@endsection
