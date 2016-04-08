@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="col-sm-offset-2 col-sm-8">
      <p>
        Laravel example of simple api with a regular http request and others with ajax
      </p>

      <div class="panel panel-default">
        <div class="panel-heading">
          New Vehicle
        </div>

        <div class="panel-body">
          <!-- Validation Errors -->
          @include('errors.validator')

          <!-- Form -->
          <form action="/vehicles" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="vehicle-plate" class="col-sm-3 control-label">Plate</label>

              <div class="col-sm-6">
                <input type="text" name="plate" id="vehicle-plate" class="form-control" value="{{ old('plate') }}">
              </div>
            </div>

            <div class="form-group">
              <label for="vehicle-brand" class="col-sm-3 control-label">Brand</label>

              <div class="col-sm-6">
                <select type="text" name="brand" id="vehicle-brand" class="form-control" value="{{ old('brand') }}">
                  <option>Chevrolet</option>
                  <option>Renault</option>
                  <option>Ford</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="vehicle-model" class="col-sm-3 control-label">Model</label>

              <div class="col-sm-6">
                <select type="text" name="model" id="vehicle-model" class="form-control" value="{{ old('model') }}">
                </select>
              </div>
            </div>

            <!-- Add Vehicle Button -->
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                  <i class="fa fa-btn fa-plus"></i>Add Vehicle
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Vehicles list -->
      <div class="panel panel-default">
        <div class="panel-heading">
          Vehicles List
        </div>

        <div class="panel-body">
          <table class="table table-striped vehicle-table">
            <thead>
              <th>Vehicles</th>
              <th>&nbsp;</th>
            </thead>
            <tbody id="vehiclesList">
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
@endsection
