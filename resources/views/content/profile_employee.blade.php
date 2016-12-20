@include('headers.header')

@include('content.head_container')

<div class="center well">
  <center><img src="/{{$employee->profile_photo}}" class="img-responsive img-rounded" width="140" heigth="140" alt=""></center>
  <span class="text-capitalize"><h4>{{ $employee->first_name }}</h4></span>
  <span class="text-capitalize"><h4>{{ $employee->last_name . ' ' . $employee->other_name }}</h4></span>
  <span class="text-capitalize"><h4>{{ $employee->email }}</h4></span>
</div>

@foreach ($holidays as $holiday)
  <h5>{{ $holiday->holiday_name }}</h5>
@endforeach

@extends('content.modal')

@section('modalid')
employeeModal
@stop

@section('modaltittle')
<h5>Add / Update employee</h5>
@stop

@section('modalbody')
<div class="panel panel-default">
  <!-- <div class="panel-heading center"></div> -->
  <div class="panel-body">
    <form id="add_employee_form" class="form-horizontal" role="form" method="POST" action="{{ url('/add_employee') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
      @if (session('status_create'))
      <script>
      $(function() {
        $('#employeeModal').modal('show');
      });
      </script>
      @endif
      @if (session('status_update'))
      <script>
      $(function() {
        $('#update').modal('show');
        $('#add_employee_form').attr('action', '/update_employee');
      });
      </script>
      @endif
      @if (! $errors->isEmpty())
      <script>
      $(function() {
        $('#employeeModal').modal('show');
      });
      </script>
      @endif
      <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
        <label for="first_name" class="col-md-4 control-label">First Name</label>

        <div class="col-md-6">
          <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

          @if ($errors->has('first_name'))
          <span class="help-block">
            <strong>{{ $errors->first('first_name') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
        <label for="last_name" class="col-md-4 control-label">Last Name</label>

        <div class="col-md-6">
          <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

          @if ($errors->has('last_name'))
          <span class="help-block">
            <strong>{{ $errors->first('last_name') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="form-group{{ $errors->has('other_name') ? ' has-error' : '' }}">
        <label for="other_name" class="col-md-4 control-label">Other Name</label>

        <div class="col-md-6">
          <input id="other_name" type="text" class="form-control" name="other_name" value="{{ old('other_name') }}" required autofocus>

          @if ($errors->has('other_name'))
          <span class="help-block">
            <strong>{{ $errors->first('other_name') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

        <div class="col-md-6">
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

          @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="form-group{{ $errors->has('cell_phone') ? ' has-error' : '' }}">
        <label for="cell_phone" class="col-md-4 control-label">Cell Phone</label>

        <div class="col-md-6">
          <input id="cell_phone" type="text" class="form-control" name="cell_phone" value="{{ old('cell_phone') }}" required>

          @if ($errors->has('cell_phone'))
          <span class="help-block">
            <strong>{{ $errors->first('cell_phone') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="form-group{{ $errors->has('user_skype') ? ' has-error' : '' }}">
        <label for="user_skype" class="col-md-4 control-label">User skype</label>

        <div class="col-md-6">
          <input id="user_skype" type="text" class="form-control" name="user_skype" value="{{ old('user_skype') }}" required>

          @if ($errors->has('user_skype'))
          <span class="help-block">
            <strong>{{ $errors->first('user_skype') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
        <label for="birth_date" class="col-md-4 control-label">Birth date</label>

        <div class="col-md-6">
          <input id="birth_date" type="text" class="form-control datepicker" name="birth_date" value="{{ old('birth_date') }}" required>

          @if ($errors->has('birth_date'))
          <span class="help-block">
            <strong>{{ $errors->first('birth_date') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="form-group{{ $errors->has('hire_date') ? ' has-error' : '' }}">
        <label for="hire_date" class="col-md-4 control-label">Hire date</label>

        <div class="col-md-6" class="datepicker">
          <input id="hire_date" type="text" class="form-control datepicker" name="hire_date" value="{{ old('hire_date') }}" required>

          @if ($errors->has('hire_date'))
          <span class="help-block">
            <strong>{{ $errors->first('hire_date') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="form-group{{ $errors->has('profile_photo') ? ' has-error' : '' }}">
        <label for="profile_photo" class="col-md-4 control-label">Profile photo</label>

        <div class="col-md-6">
          <input id="profile_photo" type="file" class="form-control" name="profile_photo">

          @if ($errors->has('profile_photo'))
          <span class="help-block">
            <strong>{{ $errors->first('profile_photo') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
          <button type="submit" id="action_button" name="action_button" class="btn btn-primary">
            Register
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
@stop

@include('content.footer_container')

@include('headers.footer')
