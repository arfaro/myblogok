@extends('template_admin.header')
@section('sub-judul','Tag')
@section('content')

@if(Session::has('update'))
<div class="alert alert-success" role="alert">
    {{Session('update')}}
</div>
@endif
<a href="{{route('tag.create')}}" class="btn btn-info btn-sm">Add New Tag</a>
<br><br>
<table class="table table-bordered table-sm">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name Tag</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tag as $result=>$hasil)
        <tr>
            <td>{{$result+$tag->firstitem()}}</td>
            <td>{{$hasil->name}}</td>
            <td>
                <form action="{{route('tag.destroy',$hasil->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <a href="{{route('tag.edit',$hasil->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    <button type="submit" href="" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$tag->links()}}
@endsection