@extends('template_admin.header')
@section('sub-judul','Add New Category')
@section('content')
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
        {{$error}}
        </div>
        @endforeach
    @endif
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session('success')}}
    </div>
    @endif
    <a href="{{route('category.index')}}" class="btn btn-info btn-sm">Back</a>
    <form action="{{route('category.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name Category</label>
            <input type="text" name="name" id="name" class="form-control" autofocus>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-sm btn-block">Save</button>
        </div>
    </form>
@endsection