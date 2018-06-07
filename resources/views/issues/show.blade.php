@extends('layouts.master')

@section('content')
<div class="container">
  <h2>Issue Detail</h2>

  <div class="card border-info mb-3">
    <div class="card-header">
        <h2>{{ $issue->summary }}</h2>
    </div>

    <ul class="list-group">

      @if($project = \App\Project::find($issue->project_id))
        <li class="list-group-item">Project_name: <a href="{{ url('/projects/' . $project->id) }}">{{ $project->name }}</a></li>
      @else
        <li class="list-group-item">Project_name: -</li>
      @endif
      @if($category = \App\Category::find($issue->category_id))
        <li class="list-group-item">Category_name: <a href="{{ url('/categories/' . $category->id) }}">{{ $category->name }}</a></li>
      @else
        <li class="list-group-item">Category_name: -</li>
      @endif

      <li class="list-group-item">Status: {{ $issue->status }}</li>

      @if($userReporter = \App\User::find($issue->reporter))
        <li class="list-group-item">Reporter: <a href="{{ url('/users/' . $userReporter->id) }}">{{ $userReporter->name }}</a></li>
      @else
        <li class="list-group-item">Reporter: -</li>
      @endif
      @if($userAssign = \App\User::find($issue->assigned_to))
        <li class="list-group-item">Assigned_to_User: <a href="{{ url('/users/' . $userAssign->id) }}">{{ $userAssign->name }}</a></li>
      @else
        <li class="list-group-item">Assigned_to_User: -</li>
      @endif

      <li class="list-group-item">Priority: {{ $issue->priority }}</li>
      <li class="list-group-item">Severity: {{ $issue->severity }}</li>
      <li class="list-group-item">Reproducibility: {{ $issue->reproducibility }}</li>
      <li class="list-group-item">Description: {{ $issue->description }}</li>
      <li class="list-group-item">Steps: {{ $issue->steps }}</li>
      <li class="list-group-item">
        Joining Date: {{ $issue->created_at->diffForHumans() }}
      </li>
    </ul>

    <div class="card-footer" style="display:flex">
      <a class="btn btn-default" href="{{ url('/issues/' . $issue->id . '/edit') }}">Edit</a>
      <a class="btn btn-default" href="/issues/{{ $issue->id }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?" style="margin-left:88%">Delete</a>
    </div>
  </div>
</div>
@endsection

@push('script')
  <script type="text/javascript">
      (function() {

    var laravel = {
      initialize: function() {
        this.methodLinks = $('a[data-method]');
        this.token = $('a[data-token]');
        this.registerEvents();
      },

      registerEvents: function() {
        this.methodLinks.on('click', this.handleMethod);
      },

      handleMethod: function(e) {
        var link = $(this);
        var httpMethod = link.data('method').toUpperCase();
        var form;

        // If the data-method attribute is not PUT or DELETE,
        // then we don't know what to do. Just ignore.
        if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
          return;
        }

        // Allow user to optionally provide data-confirm="Are you sure?"
        if ( link.data('confirm') ) {
          if ( ! laravel.verifyConfirm(link) ) {
            return false;
          }
        }

        form = laravel.createForm(link);
        form.submit();

        e.preventDefault();
      },

      verifyConfirm: function(link) {
        return confirm(link.data('confirm'));
      },

      createForm: function(link) {
        var form =
        $('<form>', {
          'method': 'POST',
          'action': link.attr('href')
        });

        var token =
        $('<input>', {
          'type': 'hidden',
          'name': '_token',
          'value': link.data('token')
          });

        var hiddenInput =
        $('<input>', {
          'name': '_method',
          'type': 'hidden',
          'value': link.data('method')
        });

        return form.append(token, hiddenInput)
                   .appendTo('body');
      }
    };

    laravel.initialize();

    })();
  </script>
@endpush
