@extends('layouts.master')

@section('content')
    <div style="width:70%;display: block;margin-left: auto;margin-right: auto;">
        <h2>Edit Project</h2>

        <form class="" action="/projects/{{ $project->id }}" method="post">

            <!-- CSRF:Cross-Site Request Forgery -->

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Name: </label>
                <input type="text" class="form-control" class="" name="name" value="{{ old('name') ?? $project->name }}" style="width:30%">
                {{ $errors->first('name') }}
            </div><br>

            <div class="form-group">
                <label>Description</label>
                <br>
                <textarea name="description" class="form-control" rows="8" cols="80" style="width:50%">{{ old('description') ?? $project->description }}</textarea>
                {{ $errors->first('description') }}
            </div><br>

            <div class="form-group">
                <label>View Status</label>
                <select class="form-control" name="view_status" style="width:15%">
                    @foreach($view_status as $key => $value)
                        @if((old('view_status') ?? $project->view_status) == $key)
                            <option selected value="{{ $key }}">{{ $value }}</option>
                        @else
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endif
                    @endforeach
                    <!-- <option @if (old('view_status') == 'public') selected="selected" @endif value="public">Public</option>
                    <option @if (old('view_status') == 'private') selected="selected" @endif value="private">Private</option> -->
                </select>
            </div><br>

            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" style="width:15%">
                    @foreach($status as $key => $value)
                        @if((old('status') ?? $project->status) == $key)
                            <option selected value="{{ $key }}">{{ $value }}</option>
                        @else
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endif
                    @endforeach
                    <!-- <option @if (old('view_status') == 'public') selected="selected" @endif value="public">Public</option>
                    <option @if (old('view_status') == 'private') selected="selected" @endif value="private">Private</option> -->
                </select>
            </div>

            <br>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection
