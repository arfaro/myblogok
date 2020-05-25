@extends('template_admin.header')
@section('sub-judul','Category')
@section('content')

    @if(Session::has('update'))
    <div class="alert alert-success" role="alert">
        {{Session('update')}}
    </div>
    @endif
    <a href="{{route('category.create')}}" class="btn btn-info btn-sm">Add New Category</a>
    <br><br>
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $result=>$hasil)
            <tr>
                <td>{{$result+$category->firstitem()}}</td>
                <td>{{$hasil->name}}</td>
                <td>
                    <form action="{{route('category.destroy',$hasil->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <a href="{{route('category.edit',$hasil->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    <button type="submit" href="" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$category->links()}}
@endsection