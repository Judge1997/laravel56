@extends('layouts.master')

@section('content')
<div style="width:70%;display: block;margin-left: auto;margin-right: auto;">
  <h2>All Users</h2>

  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Username</th>
      <th scope="col">Name</th>
      <th scope="col">Access Level</th>
      <th scope="col">Enabled?</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr class="table-active">
      <th scope="row">{{ $loop->iteration }}</th>
      <td>
        <a href="{{ url('/users/' . $user->id) }}">
          {{ $user->username }}
        </a>
      </td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->access_level }}</td>
      <td>{!! $user->is_enabled ?'<i class="fa fa-check-circle"></i>': '<i class="fa fa-times-circle"></i>' !!}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<a class="btn btn-success" href="{{ url('/users/create') }}">Create User</a>

</div>
@endsection
