@extends('layouts.master')

@section('content')
<div class="container">
  <h2>Project Detail</h2>

  <div class="card border-info mb-3">
    <div class="card-header">
        <h2>{{ $project->name }}</h2>
        @if ($project->view_status === 'public')
          <p>[ <i class="fa fa-unlock"></i> {{ $project->view_status }} ]</p>
        @else
          <p>[ <i class="fa fa-lock"></i> {{ $project->view_status }} ]</p>
        @endif

    </div>

    <ul class="list-group">
      <li class="list-group-item">Status: {{ $project->status }}</li>
      <li class="list-group-item">Description: {{ $project->description }}</li>
      <li class="list-group-item">
        Joining Date: {{ $project->created_at->diffForHumans() }}
      </li>
    </ul>

    <div class="card-footer" style="display:flex">
      <a class="btn btn-default" href="{{ url('/projects/' . $project->id . '/edit') }}">Edit</a>
      <a class="btn btn-default" href="/projects/{{ $project->id }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?" style="margin-left:88%">Delete</a>
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
