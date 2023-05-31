@extends('layouts.main')
@section('title', "Edit {$tag->name}")
@section('content')
    <div class="form bg-success bg-gradient create-tag-form">
        <div class="form-title">
            <h1>Edit the tag</h1>
        </div>
        <form action="{{route('tag.update', $tag->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$tag->name}}">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="action-buttons">
                <button class="btn btn-warning back-btn">
                    <a href="{{route('tag.index')}}">Back</a>
                </button>
                <button type="submit" class="btn btn-primary submit-btn">Update</button>
            </div>
        </form>
    </div>
@endsection
@include('home.background')
