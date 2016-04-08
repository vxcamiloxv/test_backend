@extends('layouts.app')

@section('content')

  <div class="panel-body">
    @include('errors/validator')

    <!--Form -->
    <form action="/vehicles" method="POST" class="form-horizontal">
      {{ csrf_field() }}

      <div class="form-group">
        <label for="vehicle" class="col-sm-3 control-label">Vehicle</label>

        <div class="col-sm-6">
          <input type="text" name="name" id="vehicle-plate" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i> Add Vehicle
          </button>
        </div>
      </div>
    </form>
  </div>

@endsection
