@extends('layouts.main')
@section('title', 'Categories')
@section('content')
    <a href="{{route('category.create')}}" class="btn btn-warning create-category-btn"><span>Add new category</span></a>
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
        @foreach($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td>
                    <div class="actions">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="actions-button" data-bs-toggle="dropdown" aria-expanded="false">
                            Select
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="actions-button">
                            <li><a class="dropdown-item" href="{{route('category.edit', $category->id)}}">Edit</a></li>
                            <li>
                                <form action="{{route('category.destroy', $category->id)}}" method="POST">
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
        {{$categories->withQueryString()->links()}}
    </div>
@endsection
