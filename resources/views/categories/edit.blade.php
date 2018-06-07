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

        <h2>Edit Category</h2><br>

        <form class="" action="/categories/{{ $category->id }}" method="post">

            <!-- CSRF:Cross-Site Request Forgery -->

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Project Name</label>
                <select class="form-control" name="project_id" style="width:30%">
                    @foreach($projects as $value)
                        @if(( old('project_id') ?? $category->project_id ) == $value->id)
                            <option selected value="{{ $value->id }}">{{ $value->name }}</option>
                        @else
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div><br>


            <div class="form-group">
                <label>Category Name</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ old('name') ?? $category->name }}" style="width:40%">
                {{ $errors->first('name') }}
            </div><br>

            <div class="form-group">
                <label>Assign to name</label>
                <select class="form-control" name="assign_to" style="width:30%">
                    @foreach($users as $value)
                        @if(( old('assign_to') ?? $category->assign_to ) == $value->id)
                            <option selected value="{{ $value->id }}">{{ $value->name }}</option>
                        @else
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div><br>

            <br>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection
