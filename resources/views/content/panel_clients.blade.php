@include('headers.header')

@include('content.head_container')

<button type="button" class="btn btn-primary" name="button" id="btn-add-holiday" data-toggle="modal" data-target="#clientModal" style="float: right;">Add client</button>
<div class="holidays center">
  <table class="table table-stripped" id="table-clients">
    <thead>
      <tr class="active">
        <td>First name</td>
        <td>Last name</td>
        <td>Email</td>
        <td>Country</td>
        <td></td>
        <td></td>
      </tr>
    </thead>
    <tbody>

    @foreach($clients as $client)
      <tr id="{{ $client->client_id }}">
        <td><span id="fname" class="text-capitalize"> {{ $client->first_name }} </span></td>
        <td><span id="lname" class="text-capitalize"> {{ $client->last_name }} </span></td>
        <td><span id="email_lbl"> {{ $client->email }}</span></td>
        <td><span id="country_lbl" class="text-capitalize"> {{ $client->country }}</span></td>
        <td><form class="" action=" {{ url('/delete_client') }} " method="post">
          <button type="button" class="btn btn-danger delete_client" name="delete_holiday" id="delete_holiday"><span class="glyphicon glyphicon-trash"></span></button>
        </form></td>
        <td><button type="button" class="btn btn-success update_client" name="update_holiday"><span class="glyphicon glyphicon-refresh"></span></button></td>
      </tr>
    @endforeach

    </tbody>

  </table>
</div>

@extends('content.modal')

@section('modalid')
clientModal
@stop

@section('modaltittle')
<h5>Add / Update client</h5>
@stop

@section('modalbody')
<div class="panel panel-default">
  <!-- <div class="panel-heading center"></div> -->
  <div class="panel-body">
    @if (session('status_create') || session('status_update'))
    <script>
    $(function() {
      $('#clientModal').modal('show');
    });
    </script>
    @elseif (session('success'))
    <script>
    toastr.success("{{ session('success') }}");
    </script>
    @endif
    <form id="add_client_form" class="form-horizontal" role="form" method="POST" action="{{ url('/add_client') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
      <label for="first_namee" class="col-md-4 control-label">First name</label>

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
      <label for="last_name" class="col-md-4 control-label">Last name</label>

      <div class="col-md-6">
        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

        @if ($errors->has('last_name'))
        <span class="help-block">
          <strong>{{ $errors->first('last_name') }}</strong>
        </span>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
      <label for="last_name" class="col-md-4 control-label">Email</label>

      <div class="col-md-6">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

        @if ($errors->has('email'))
        <span class="help-block">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
      <label for="country" class="col-md-4 control-label">Country</label>

      <div class="col-md-6">
        <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}" required autofocus>

        @if ($errors->has('country'))
        <span class="help-block">
          <strong>{{ $errors->first('country') }}</strong>
        </span>
        @endif
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-6 col-md-offset-4">
        <button type="submit" id="action_button_h" name="action_button_h" class="btn btn-primary">
          Save data
        </button>
      </div>
    </div>
    </form>
@stop

@include('content.footer_container')

@include('headers.footer')

<script>
  $(".update_client").click(function() {
    $('#add_client_form').attr('action', '/update_holiday');
    $("#clientModal").modal('show');

    var idtr = $(this).closest('tr').attr('id');

    $("#action_button_h").val(idtr).text('Update data');
    $("#first_name").removeAttr('required').val($("#"+idtr+" #fname").text().trim());
    $("#last_name").removeAttr('required').val($("#"+idtr+" #lname").text().trim());
    $("#email").removeAttr('required').val($("#"+idtr+" #email_lbl").text().trim());
    $("#country").val($("#"+idtr+" #country_lbl").text().trim());
  });

  $("#btn-add-client").click(function() {
    $('#add_holiday_form').attr('action', '/add_holiday');
    $("#action_button_h").val('').text('Save data');
    $('#add_holiday_form').attr('action', '/add_holiday');
    $("#holiday_name").focus().val('').attr('required', true);
    $("#holiday_date").attr('required', true).val('');
    $("#country").val(1);
  });
</script>
