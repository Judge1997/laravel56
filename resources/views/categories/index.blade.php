@extends('layouts.master')

@section('content')
<div style="width:70%;display: block;margin-left: auto;margin-right: auto;">
  <h2>All Categories</h2>
  <table class="table table-hover" style="">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Project_Name</th>
      <th scope="col">Name</th>
      <th scope="col">Assign_to_User</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
    <tr class="table-active">
      <th scope="row">{{ $loop->iteration }}</th>

      @if($project = \App\Project::find($category->project_id))
        <td><a href="{{ url('/projects/' . $project->id) }}">{{ $project->name }}</a></td>
      @else
        <td>-</td>
      @endif

      <td>
        <a href="{{ url('/categories/' . $category->id) }}">
          {{ $category->name }}
        </a>
      </td>

      @if($user = \App\User::find($category->assign_to))
        <td><a href="{{ url('/users/' . $user->id) }}">{{ $user->name }}</a></td>
      @else
        <td>-</td>
      @endif

    </tr>
    @endforeach
  </tbody>
  </table>

<a class="btn btn-success" href="{{ url('/categories/create') }}">Create Category</a>

</div>
@endsection
