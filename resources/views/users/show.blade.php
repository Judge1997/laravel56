@extends('layouts.master')

@section('content')
<div class="container">
  <h2>User Detail</h2>

  <div class="card border-info mb-3">
    <div class="card-header">
        <h2>{{ $user->username }}</h2>
        <p>[ <i class="fa fa-user-circle"></i>
           {{ $user->access_level }} ]</p>
    </div>

    <ul class="list-group">
      <li class="list-group-item">Name: {{ $user->name }}</li>
      <li class="list-group-item">Email: {{ $user->email }}</li>
      <li class="list-group-item">
        Enabled? {!! $user->is_enabled ?
          '<i class="fa fa-check"></i>'
          : '<i class="fa fa-times"></i>' !!}
      </li>
      <li class="list-group-item">
        Joining Date: {{ $user->created_at->diffForHumans() }}
      </li>
    </ul>

    <div class="card-footer" style="display:flex">
      <a class="btn btn-default" href="{{ url('/users/' . $user->id . '/edit') }}">Edit</a>
      <a class="btn btn-default" href="/users/{{ $user->id }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?" style="margin-left:88%">Delete</a>
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
