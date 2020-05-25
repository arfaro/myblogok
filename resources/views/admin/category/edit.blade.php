@extends('template_admin.header')
@section('sub-judul','Edit Category')
@section('content')
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
        {{$error}}
        </div>
        @endforeach
    @endif
    <a href="{{route('category.index')}}" class="btn btn-info btn-sm">Back</a>
    <form action="{{route('category.update',$category->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name">Name Category</label>
            <input type="text" name="name" id="name" value="{{$category->name}}" class="form-control" autofocus>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-sm btn-block">Update</button>
        </div>
    </form>
@endsection