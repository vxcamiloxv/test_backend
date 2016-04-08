@extends('layouts.app')

@section('content')

  {{-- <h1>Car {{ $vehicle->id }}</h1>
  <ul>
  <li>User: {{ $vehicle->make }}</li>
  <li>Plate: {{ $vehicle->plate }}</li>
  <li>Model: {{ $vehicle->model }}</li>
  <li>Brand: {{ $vehicle->brand }}</li>
  </ul> --}}


  <div class="panel-body">
    @include('errors/validator')

    <!--Form -->
    <form action="/vehicles" method="POST" class="form-horizontal">
      {{ csrf_field() }}

      <div class="form-group">
        <label for="task" class="col-sm-3 control-label">Task</label>

        <div class="col-sm-6">
          <input type="text" name="name" id="task-name" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i> Add Task
          </button>
        </div>
      </div>
    </form>
  </div>

@endsection
