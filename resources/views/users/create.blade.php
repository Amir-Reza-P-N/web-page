@extends('master')

@section('content')
    <h2>User Create</h2>

    <form method="post" action="{{ route('users.store') }}">
        @csrf
        <div class="col-md-6">
            <label>Name</label>
            <input type="text" name="name" class="form-control @error('name') border border-danger @enderror" value="{{old('name')}}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <br/>
            <label>Email</label>
            <input type="text" name="email" class="form-control @error('email') border border-danger @enderror" value="{{old('email')}}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <br/>
            <label>Password</label>
            <input type="text" name="password" class="form-control @error('password') border border-danger @enderror" value="{{old('password')}}">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <br/>
            <button type="submit" class="btn btn-primary mt-1">Save</button>
        </div>
    </form>
@endsection
