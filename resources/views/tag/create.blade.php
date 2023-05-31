@extends('layouts.main')
@section('title', 'Create tag')
@section('content')
    <div class="form bg-success bg-gradient create-tag-form">
        <div class="form-title">
            <h1>Create a new tag</h1>
        </div>
        <form action="{{route('tag.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="action-buttons">
                <button class="btn btn-warning back-btn">
                    <a href="{{route('tag.index')}}">Back</a>
                </button>
                <button type="submit" class="btn btn-primary submit-btn">Create</button>
            </div>
        </form>
    </div>
@endsection
@include('home.background')
