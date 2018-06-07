@extends('layouts.master')

@section('content')
<div style="width:70%;display: block;margin-left: auto;margin-right: auto;">
  <h2>All Issues</h2>

  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Project_Name</th>
      <th scope="col">Category_Name</th>
      <th scope="col">Summary</th>
      <th scope="col">Reporter</th>
      <th scope="col">Assigned_to_Username</th>
    </tr>
  </thead>
  <tbody>
    @foreach($issues as $issue)
    <tr class="table-active">
      <th scope="row">{{ $loop->iteration }}</th>

      @if($project = \App\Project::find($issue->project_id))
        <td><a href="{{ url('/projects/' . $project->id) }}">{{ $project->name }}</a></td>
      @else
        <td>-</td>
      @endif

      @if($category = \App\Category::find($issue->category_id))
        <td><a href="{{ url('/categories/' . $category->id) }}">{{ $category->name }}</a></td>
      @else
        <td>-</td>
      @endif

      <td><a href="{{ url('/issues/' . $issue->id) }}">{{ $issue->summary }}</a></td>

      @if($userReporter = \App\User::find($issue->reporter))
        <td><a href="{{ url('/users/' . $userReporter->id) }}">{{ $userReporter->name }}</a></td>
      @else
        <td>-</td>
      @endif

      @if($userAssign = \App\User::find($issue->assigned_to))
        <td><a href="{{ url('/users/' . $userAssign->id) }}">{{ $userAssign->name }}</a></td>
      @else
        <td>-</td>
      @endif

    </tr>
    @endforeach
  </tbody>
</table>

<a class="btn btn-success" href="{{ url('/issues/create') }}">Create Issue</a>

</div>
@endsection
