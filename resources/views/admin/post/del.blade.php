@extends('template_admin.header')
@section('sub-judul','Deleted Post')
@section('content')

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session('success')}}
</div>
@endif
<br><br>
<table class="table table-bordered table-sm">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name Post</th>
            <th>Category</th>
            <th>Tag</th>
            <th>Content</th>
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
                <ul>
                    @foreach ($hasil->tags as $tag)
                    <li>{{$tag->name}}</li>
                    @endforeach
                </ul>
            </td>
            <td>{{$hasil->content}}</td>
            <td><img src="{{asset($hasil->picture)}}" class="img-fluid" style="width:100px;" alt=""></td>
            <td>
                <form action="{{route('post.kill',$hasil->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <a href="{{route('post.restore',$hasil->id)}}" class="btn btn-success btn-sm">Restore</a>
                    <button type="submit" href="" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$post->links()}}
@endsection