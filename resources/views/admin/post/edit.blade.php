@extends('template_admin.header')
@section('sub-judul','Edit Post')
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
    <a href="{{route('post.index')}}" class="btn btn-info btn-sm">Back</a>
    <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="name" class="form-control" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <label for="name">Category</label>
            <select name="category_id" class="form-control">
                <option holder>--Choose Category--</option>
                @foreach ($category as $result)
                <option value="{{$result->id}}"
                @if($post->category_id == $result->id)
                selected
                @endif    
                >{{$result->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Choose Tags</label>
            <select class="form-control select2" multiple="" name="tags[]">
                @foreach($tags as $tag)
                <option value="{{$tag->id}}"
                @foreach($post->tags as $value)
                @if($value->id == $tag->id )
                selected
                @endif
                @endforeach
                >{{$tag->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="50">{{$post->content}}</textarea>
        </div>
        <div class="form-group">
            <label for="name">Thumbnails</label>
            <input type="file" class="form-control" name="picture">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-sm btn-block">Update</button>
        </div>
    </form>
@endsection