@extends('layouts.main')
@section('title', "Edit {$category->name}")
@section('content')
    <div class="form bg-success bg-gradient category-form">
        <div class="form-title">
            <h1>Edit the category</h1>
        </div>
        <form action="{{route('category.update', $category->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="action-buttons">
                <button class="btn btn-warning">
                    <a href="{{route('category.index')}}">
                        Back
                    </a>
                </button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
@include('home.background')
