@include('headers.header')

@include('content.head_container')

<button type="button" class="btn btn-primary" name="button" id="btn-add-holiday" data-toggle="modal" data-target="#holidayModal" style="float: right;">Add holiday</button>
<div class="holidays center">
  <table class="table table-stripped" id="table-holidays">
    <thead>
      <tr class="active">
        <td>Country</td>
        <td>holiday / dia festivo</td>
        <td>Date</td>
        <td></td>
        <td></td>
      </tr>
    </thead>
    <tbody>

    @foreach($holidays as $holiday)
    @if($holiday->country == 1)
      <tr id="{{ $holiday->holiday_id }}">
        <td><img src="/images/icons/flag-mx.png" alt=""></td>
        <td><span class="text-capitalize" id="hname" data-date=" {{ $holiday->holiday_date }} " data-country=" {{ $holiday->country }} "> {{ $holiday->holiday_name }}</span><br></td>
        <td><span> {{ $holiday->holiday_date }} </span></td>
        <td><button type="button" class="btn btn-danger delete_holiday" name="delete_holiday" id="delete_holiday"><span class="glyphicon glyphicon-trash"></span></button></td>
        <td><button type="button" class="btn btn-success update_holiday" name="update_holiday"><span class="glyphicon glyphicon-refresh"></span></button></td>
      </tr>
    @else
      <tr id="{{ $holiday->holiday_id }}">
        <td><img src="/images/icons/flag-usa.png" alt=""></td>
        <td><span class="text-capitalize" id="hname" data-date=" {{ $holiday->holiday_date }} " data-country=" {{ $holiday->country }} "> {{ $holiday->holiday_name }}</span><br></td>
        <td><span> {{ $holiday->holiday_date }} </span></td>
        <td><button type="button" class="btn btn-danger delete_holiday" name="delete_holiday"><span class="glyphicon glyphicon-trash"></span></button></td>
        <td><button type="button" class="btn btn-success update_holiday" name="update_holiday"><span class="glyphicon glyphicon-refresh"></span></button></td>
      </tr>
    @endif
    @endforeach

    </tbody>

  </table>
</div>

@extends('content.modal')

@section('modalid')
holidayModal
@stop

@section('modaltittle')
<h5>Add / Update holidays</h5>
@stop

@section('modalbody')
<div class="panel panel-default">
  <!-- <div class="panel-heading center"></div> -->
  <div class="panel-body">
    @if (session('status_create') || session('status_update'))
    <script>
    $(function() {
      $('#holidayModal').modal('show');
    });
    </script>
    @elseif (session('success'))
    <script>
    toastr.success("{{ session('success') }}");
    </script>
    @endif
    <form id="add_holiday_form" class="form-horizontal" role="form" method="POST" action="{{ url('/add_holiday') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
    <div class="form-group{{ $errors->has('holiday_name') ? ' has-error' : '' }}">
      <label for="holiday_name" class="col-md-4 control-label">Name</label>

      <div class="col-md-6">
        <input id="holiday_name" type="text" class="form-control" name="holiday_name" value="{{ old('holiday_name') }}" required autofocus>

        @if ($errors->has('holiday_name'))
        <span class="help-block">
          <strong>{{ $errors->first('holiday_name') }}</strong>
        </span>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('holiday_date') ? ' has-error' : '' }}">
      <label for="holiday_date" class="col-md-4 control-label">Date</label>

      <div class="col-md-6">
        <input id="holiday_date" type="text" class="datepicker form-control" name="holiday_date" value="{{ old('holiday_date') }}" required autofocus>

        @if ($errors->has('holiday_date'))
        <span class="help-block">
          <strong>{{ $errors->first('holiday_date') }}</strong>
        </span>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
      <label for="country" class="col-md-4 control-label">Country</label>

      <div class="col-md-6">
        <select id="country" type="text" class="form-control" name="country" value="{{ old('holiday_date') }}" autofocus>
          <option value="1">Mexico</option>
          <option value="2">USA</option>
        </select>

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
  $(".update_holiday").click(function() {
    $('#add_holiday_form').attr('action', '/update_holiday');
    $("#holidayModal").modal('show');

    var idtr = $(this).closest('tr').attr('id');

    var date = $("#"+idtr+" #hname").attr('data-date');
    var country = $("#"+idtr+" #hname").attr('data-country');
    $("#action_button_h").val(idtr).text('Update data');
    $("#holiday_name").removeAttr('required').val($("#"+idtr+" #hname").text().trim());
    $("#holiday_date").removeAttr('required').val(date.trim());
    $("#country").val(parseInt(country));
  });

  $("#btn-add-holiday").click(function() {
    $('#add_holiday_form').attr('action', '/add_holiday');
    $("#action_button_h").val('').text('Save data');
    $('#add_holiday_form').attr('action', '/add_holiday');
    $("#holiday_name").focus().val('').attr('required', true);
    $("#holiday_date").attr('required', true).val('');
    $("#country").val(1);
  });
</script>
