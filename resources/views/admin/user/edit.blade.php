@extends('template_admin.header')
@section('sub-judul','Edit User')
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
    <a href="{{route('user.index')}}" class="btn btn-info btn-sm">Back</a>
    <form action="{{route('user.update',$user->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="name">Name User</label>
            <input type="text" name="name" id="name" class="form-control" autofocus value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}"readonly>
        </div>
        <div class="form-group">
            <label for="type">Type User</label>
            <select name="type" class="form-control">
                <option value="" holder>--Choose Type</option>
                <option value="1" 
                @if($user->type == 1)
                selected
                @endif
                >Administrator</option>
                <option value="0"
                @if($user->type == 0)
                selected
                @endif
                >Author</option>
            </select>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Tidak di isi jika tidak mengubah password">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-sm btn-block">Update</button>
        </div>
    </form>
@endsection