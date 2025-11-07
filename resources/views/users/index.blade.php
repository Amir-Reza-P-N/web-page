@extends('master')

@section('content')
    <h2>Users List</h2>
    <a class="btn btn-primary float-right" href="{{route('users.create')}}"> Create User</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\User::all() as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <form method="post" action="{{route('users.destroy', [$user->id])}}" id="delete-user-{{$user->id}}">
                                @csrf
                                @method('DELETE')
                                <a class="btn-sm btn-secondary" href="{{route('users.edit', [$user->id])}}">Edit</a>
                                <a class="btn-sm btn-danger" href="javascript:void(0)" onclick="document.getElementById('delete-user-{{$user->id}}').submit();">Delete</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
