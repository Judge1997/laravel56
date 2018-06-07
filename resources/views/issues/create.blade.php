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

        <h2>Add New Issue</h2><br>

        <form class="" action="/issues" method="post" style="display:flex;justify-content:space-evenly;;width:100%">

            <!-- CSRF:Cross-Site Request Forgery -->

            @csrf

            <div class="" style="width:50%">
              <div class="form-group">
                  <label>Project Name</label>
                  <select class="form-control" name="project_id" style="width:40%">
                      @foreach($projects as $value)
                          @if(old('project_id') == $value->id)
                              <option selected value="{{ $value->id }}">{{ $value->name }}</option>
                          @else
                              <option value="{{ $value->id }}">{{ $value->name }}</option>
                          @endif
                      @endforeach
                  </select>
              </div><br>

              <div class="form-group">
                  <label>Category Name</label>
                  <select class="form-control" name="category_id" style="width:40%">
                      @foreach($categories as $value)
                          @if(old('category_id') == $value->id)
                              <option selected value="{{ $value->id }}">{{ $value->name }}</option>
                          @else
                              <option value="{{ $value->id }}">{{ $value->name }}</option>
                          @endif
                      @endforeach
                  </select>
              </div><br>

              <div class="form-group">
                  <label>Summary</label>
                  <input type="text" class="form-control" placeholder="Enter summary" name="summary" value="{{ old('summary') }}" style="width:60%">
                  {{ $errors->first('summary') }}
              </div><br>


              <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" style="width:25%">
                      @foreach($status as $key => $value)
                          @if(old('status') == $key)
                              <option selected value="{{ $key }}">{{ $value }}</option>
                          @else
                              <option value="{{ $key }}">{{ $value }}</option>
                          @endif
                      @endforeach
                  </select>
              </div><br>

              <div class="form-group">
                  <label>Reporter name</label>
                  <select class="form-control" name="reporter" style="width:40%">
                      @foreach($users as $value)
                          @if(old('reporter') == $value->id)
                              <option selected value="{{ $value->id }}">{{ $value->name }}</option>
                          @else
                              <option value="{{ $value->id }}">{{ $value->name }}</option>
                          @endif
                      @endforeach
                  </select>
              </div><br>

              <div class="form-group">
                  <label>Assigned to name</label>
                  <select class="form-control" name="assigned_to" style="width:40%">
                      @foreach($users as $value)
                          @if(old('assigned_to') == $value->id)
                              <option selected value="{{ $value->id }}">{{ $value->name }}</option>
                          @else
                              <option value="{{ $value->id }}">{{ $value->name }}</option>
                          @endif
                      @endforeach
                  </select>
              </div><br>

              <div class="form-group">
                  <label>Priority</label>
                  <select class="form-control" name="priority" style="width:25%">
                      @foreach($priority as $key => $value)
                          @if(old('priority') == $key)
                              <option selected value="{{ $key }}">{{ $value }}</option>
                          @else
                              <option value="{{ $key }}">{{ $value }}</option>
                          @endif
                      @endforeach
                  </select>
              </div><br>

              <br>
              <button class="btn btn-primary" type="submit" >Submit</button>

            </div>

            <div class="" style="width:50%">

              <div class="form-group">
                  <label>Severity</label>
                  <select class="form-control" name="severity" style="width:25%">
                      @foreach($severity as $key => $value)
                          @if(old('severity') == $key)
                              <option selected value="{{ $key }}">{{ $value }}</option>
                          @else
                              <option value="{{ $key }}">{{ $value }}</option>
                          @endif
                      @endforeach
                  </select>
              </div><br>

              <div class="form-group">
                  <label>Reproducibility</label>
                  <select class="form-control" name="reproducibility" style="width:25%">
                      @foreach($reproducibility as $key => $value)
                          @if(old('reproducibility') == $key)
                              <option selected value="{{ $key }}">{{ $value }}</option>
                          @else
                              <option value="{{ $key }}">{{ $value }}</option>
                          @endif
                      @endforeach
                  </select>
              </div><br>

              <div class="form-group">
                  <label>Description</label>
                  <br>
                  <textarea name="description" class="form-control" placeholder="Enter description" rows="8" cols="80" style="width:70%">{{ old('description') }}</textarea>
              </div><br>

              <div class="form-group">
                  <label>Steps</label>
                  <br>
                  <textarea name="steps" class="form-control" placeholder="Enter steps" rows="8" cols="80" style="width:70%">{{ old('steps') }}</textarea>
              </div><br>


            </div>

        </form>
        <br><br><br>
    </div>
@endsection
