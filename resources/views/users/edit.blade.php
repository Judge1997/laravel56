@extends('layouts.master')

@section('content')
    <div style="width:70%;display: block;margin-left: auto;margin-right: auto;">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2>Edit User</h2><br>

        <form class="" action="/users/{{ $user->id }}" method="post">

            <!-- CSRF:Cross-Site Request Forgery -->

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Enter username" name="username" value="{{ old('username') ?? $user->username }}" style="width:30%">
                {{ $errors->first('username') }}
            </div><br>

            <div class="form-group">
                <label>Password</label>
                <br>
                <input type="password" name="password" class="form-control" placeholder="Enter password" style="width:30%">
                {{ $errors->first('password') }}
            </div><br>

            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ old('name') ?? $user->name }}" style="width:30%">
                {{ $errors->first('name') }}
            </div><br>

            <div class="form-group">
                <label>E-mail</label>
                <input type="email" class="form-control" placeholder="Enter e-mail" name="email" value="{{ old('email') ?? $user->email }}" style="width:30%">
                {{ $errors->first('email') }}
            </div><br>

            <div class="form-group">
                <label>Access Level</label>
                <select class="form-control" name="access_level" style="width:15%">
                    @foreach($access_level as $key => $value)
                      @if((old('access_level') ?? $user->access_level) == $key)
                          <option selected value="{{ $key }}">{{ $value }}</option>
                      @else
                          <option value="{{ $key }}">{{ $value }}</option>
                      @endif
                    @endforeach
                </select>
                {{ $errors->first('access_level') }}
            </div><br>

            <br>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection
