@include('headers.header')

@include('content.head_container')
  <button type="button" id="btn-add-task" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#taskModal" style="float: right;">
    Add task
  </button>
  <table class="table table-bordered">
    @if (session('success'))
    <script>
    toastr.success("{{ session('success') }}");
    </script>
    @endif
    <tbody>
      @foreach ($tasks as $task)
      <tr id="{{ $task->task_id }}">
        <td class="text-capitalize" id="fname"> {{ $task->task_name }} </td>
        <td>{{ $task->start_work }}</td>
        <td>{{ $task->end_work }}</td>
        <td><a href="{{ url('/task/details', $task->task_id) }}" class="btn btn-success">Details</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @extends('content.modal')

  @section('modalid')
  taskModal
  @stop

  @section('modaltittle')
  <h5>Add / Update Tasks</h5>
  @stop

  @section('modalbody')
  <div class="panel panel-default">
    <!-- <div class="panel-heading center"></div> -->
    <div class="panel-body">
      <form id="add_user_form" class="form-horizontal" role="form" method="POST" action="{{ url('/add_task') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        @if (session('status'))
        <script>
        $(function() {
          $('#taskModal').modal('show');
        });
        </script>
        <div class="alert alert-success">
          <span>{{ session('status') }}</span>
        </div>
        @endif
        @if (session('status_update'))
        <script>
        $(function() {
          $('#taskModal').modal('show');
          $('#add_task_form').attr('action', '/update_task');
        });
        </script>
        @endif
        @if (! $errors->isEmpty())
        <script>
        $(function() {
          $('#taskModal').modal('show');
        });
        </script>
        @endif
        <div class="form-group{{ $errors->has('task_name') ? ' has-error' : '' }}">
          <label for="task_name" class="col-md-4 control-label">Task Name</label>

          <div class="col-md-6">
            <input id="first_name" type="text" class="form-control" name="task_name" value="{{ old('task_name') }}" required autofocus>

            @if ($errors->has('task_name'))
            <span class="help-block">
              <strong>{{ $errors->first('task_name') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('start_work') ? ' has-error' : '' }}">
          <label for="start_work" class="col-md-4 control-label">Start Work</label>

          <div class="col-md-6">
            <input id="start_work" type="text" class="form-control datepicker" name="start_work" value="{{ old('start_work') }}" required autofocus>

            @if ($errors->has('start_work'))
            <span class="help-block">
              <strong>{{ $errors->first('start_work') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('end_work') ? ' has-error' : '' }}">
          <label for="end_work" class="col-md-4 control-label">End Work</label>

          <div class="col-md-6">
            <input id="end_work" type="text" class="form-control datepicker" name="end_work" value="{{ old('end_work') }}" required autofocus>

            @if ($errors->has('end_work'))
            <span class="help-block">
              <strong>{{ $errors->first('end_work') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('employee_id') ? ' has-error' : '' }}">
          <label for="employee_id" class="col-md-4 control-label">Employee</label>

          <div class="col-md-6">
            <select id="employee_id" type="text" class="form-control" name="employee_id" required autofocus>
              @foreach ($employees as $employee)
                <option value=" {{ $employee->employee_id }} "> {{ $employee->first_name . ' ' . $employee->last_name }} </option>
              @endforeach
            </select>
            @if ($errors->has('employee_id'))
            <span class="help-block">
              <strong>{{ $errors->first('employee_id') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('client_id') ? ' has-error' : '' }}">
          <label for="client_id" class="col-md-4 control-label">Client</label>

          <div class="col-md-6">
            <select id="client_id" type="text" class="form-control" name="client_id" required autofocus>
              @foreach ($clients as $client)
                <option value=" {{ $client->client_id }} "> {{ $client->first_name . ' ' . $client->last_name }} </option>
              @endforeach
            </select>
            @if ($errors->has('client_id'))
            <span class="help-block">
              <strong>{{ $errors->first('client_id') }}</strong>
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
