@extends('template_admin.header')
@section('sub-judul','Edit Tag')
@section('content')
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
        {{$error}}
        </div>
        @endforeach
    @endif
    <a href="{{route('tag.index')}}" class="btn btn-info btn-sm">Back</a>
    <form action="{{route('tag.update',$tag->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name">Name Tag</label>
            <input type="text" name="name" id="name" value="{{$tag->name}}" class="form-control" autofocus>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-sm btn-block">Update</button>
        </div>
    </form>
@endsection