@extends('template_admin.header')
@section('sub-judul','User')
@section('content')

    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session('success')}}
    </div>
    @endif
    <a href="{{route('user.create')}}" class="btn btn-info btn-sm">Add New User</a>
    <br><br>
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name User</th>
                <th>Email</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $result=>$hasil)
            <tr>
                <td>{{$result+$user->firstitem()}}</td>
                <td>{{$hasil->name}}</td>
                <td>{{$hasil->email}}</td>
                <td>
                    @if($hasil->type)
                    <span class="badge badge-primary">Administrator</span>
                    @else
                    <span class="badge badge-success">Author</span>
                    @endif
                </td>
                <td>
                    <form action="{{route('user.destroy',$hasil->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <a href="{{route('user.edit',$hasil->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    <button type="submit" href="" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$user->links()}}
@endsection