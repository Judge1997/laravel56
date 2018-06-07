@extends('layouts.master')


@section('content')
<div style="width:70%;display: block;margin-left: auto;margin-right: auto;">
  <h2>All Projects</h2>

  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">View_Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($projects as $project)
    <tr class="table-active">
      <th scope="row">{{ $loop->iteration }}</th>
      <td>
        <a href="{{ url('/projects/' . $project->id) }}">
          {{ $project->name }}
        </a>
      </td>
      <td>{{ $project->status }}</td>
      @if ($project->view_status === 'public')
        <td><i class="fa fa-unlock"></i> {{ $project->view_status }}</td>
      @else
        <td><i class="fa fa-lock"></i> {{ $project->view_status }}</td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>

  <a class="btn btn-success" href="{{ url('/projects/create') }}">Create Project</a>

</div>
@endsection
