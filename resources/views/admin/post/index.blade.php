@extends('template_admin.header')
@section('sub-judul','Post')
@section('content')

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session('success')}}
</div>
@endif
<a href="{{route('post.create')}}" class="btn btn-info btn-sm">Add New Post</a>
<br><br>
<table class="table table-bordered table-sm">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name Post</th>
            <th>Category</th>
            <th>Tag</th>
            <th>Author</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($post as $result=>$hasil)
        <tr>
            <td>{{$result+$post->firstitem()}}</td>
            <td>{{$hasil->title}}</td>
            <td>{{$hasil->category->name}}</td>
            <td>
                @foreach ($hasil->tags as $tag)
                <span class="badge badge-info">{{$tag->name}}</span>
                @endforeach
            </td>
            <td>{{$hasil->users->name}}</td>
            <td><img src="{{asset($hasil->picture)}}" class="img-fluid" style="width:100px;" alt=""></td>
            <td>
                <form action="{{route('post.destroy',$hasil->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <a href="{{route('post.edit',$hasil->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    <button type="submit" href="" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$post->links()}}
@endsection