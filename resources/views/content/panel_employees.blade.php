@include('headers.header')

@include('content.head_container')
  <button type="button" id="btn-add-employee" class="btn btn-primary" data-toggle="modal" data-target="#employeeModal" style="float: right;">
    Add employee
  </button>
  <table class="table table-bordered">
    @if (session('success'))
    <script>
    toastr.success("{{ session('success') }}");
    </script>
    @endif
    <tbody>
      <thead>
        <tr>
          <td><span class="glyphicon glyphicon-user"></span></td>
          <td><span class="glyphicon glyphicon-envelope"></span></td>
          <td><span class="glyphicon glyphicon-earphone"></span></td>
          <td><span class="glyphicon glyphicon-earphone"> Skype</span></td>
          <td><span class="glyphicon glyphicon-calendar"></span></td>
          <td><span class="glyphicon glyphicon-calendar"></span></td>
          <td><span class=""></span></td>
          <td><span class=""></span></td>
        </tr>
      </thead>
      @foreach ($employees as $employee)
      <tr id="{{ $employee->employee_id }}">
        <td class="pp_employee" width="180px !important"><span id="firstname" class="text-capitalize label label-primary">{{ $employee->first_name }}</span><img src="{{ $employee->profile_photo }}" width="50" height="50" alt="" class="img-responsive img-rounded center"><span id="names" class="text-capitalize label label-primary"> {{ $employee->last_name . ' ' . $employee->other_name }} </span></td>
        <td id="femail"> {{ $employee->email }} </td>
        <td id="fphone"> {{ $employee->phone }} </td>
        <td class="text-capitalize" id="uskype"> {{ $employee->user_skype }} </td>
        <td id="dob"> {{ $employee->date_of_birth }} </td>
        <td id="hdate"> {{ $employee->hire_date }} </td>
        <td> <form class="" action="delete_user/{{ $employee->employee_id }}" method="get">
          <button type="submit" id=" {{ $employee->employee_id}} " name="delete_user" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
        </form></td>
        <td> <button type="button" id=" {{ $employee->employee_id }}" name="update_user" class="update btn btn-success"> <span class="glyphicon glyphicon-refresh"></span> </button> </td>
      </tr>
      @endforeach
    </tbody>
  </table>
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
        @if (session('status'))
        <script>
        $(function() {
          $('#employeeModal').modal('show');
        });
        </script>
        <div class="alert alert-success">
          <span>{{ session('status') }}</span>
        </div>
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
            <input id="birth_date" type="text" class="form-control" name="birth_date" value="{{ old('birth_date') }}" required>

            @if ($errors->has('birth_date'))
            <span class="help-block">
              <strong>{{ $errors->first('birth_date') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="form-group{{ $errors->has('hire_date') ? ' has-error' : '' }}">
          <label for="hire_date" class="col-md-4 control-label">Hire date</label>

          <div class="col-md-6">
            <input id="hire_date" type="text" class="form-control datepicker" name="hire_date" value="{{ old('hire_date') }}" required>

            @if ($errors->has('hire_date'))
            <span class="help-block">
              <strong>{{ $errors->first('hire_date') }}</strong>
            </span>
            @endif
          </div>
        </div>

        <div class="input-group date" data-provide="datepicker">
            <input type="text" class="form-control">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
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
<script type="text/javascript">
$('.datepicker').datepicker();
options = { to: { width: 200, height: 60 } };
$(".image_logo").fadeIn(4000);
$(".form-register").toggle( 'drop', options, 500 );
// $('#add_user_form').submit(function(event) {
//     $(this).ajaxSubmit({
//       error: function(xhr) {
//         console.log('Error: ' + xhr.status);
//       },
//       success: function(response) {
//         if(response.status === 'OK')
//         {
//           alert(response.message);
//           $('#add_user_form')[0].reset();
//         }
//         else
//         {
//           alert(response.responseJSON);
//         }
//       }
//     });
//     return false;
//     //Very important line, it disable the page refresh.
//     event.preventDefault();
//     //return false;
//   });

//update_user
$('.update').click(function() {
  $("#employeeModal").modal('show');

  var idtr = $(this).closest('tr').attr('id');
  var names = $("#"+idtr+" #names").text().split(' ');
  $('#add_employee_form').attr('action', '/update_employee');
  $("#action_button").val(idtr).text('Update data');

  $("#first_name").removeAttr('required').val($('#'+idtr+' #firstname').text().trim())
  $("#last_name").removeAttr('required').val(names[1].trim())
  $("#other_name").removeAttr('required').val(names[2].trim())
  $("#email").removeAttr('required').val($('#'+idtr+' >#femail').text().trim())
  $("#cell_phone").removeAttr('required').val($('#'+idtr+'>#fphone').text().trim())
  $("#user_skype").removeAttr('required').val($('#'+idtr+'>#uskype').text().trim());
  $("#birth_date").removeAttr('required').val($('#'+idtr+'>#dob').text().trim());
  $("#hire_date").removeAttr('required').val($('#'+idtr+'>#hdate').text().trim());
  //alert($('#'+idtr+' > #fname').text());
})

//add user button
$("#btn-add-employee").click(function() {
  $("#action_button").val('').text('Save data');
  $('#add_employee_form').attr('action', '/add_employee');
  $("#first_name").focus().val('').attr('required', true);
  $("#last_name").attr('required', true).val('');
  $("#other_name").attr('required', true).val('');
  $("#email").attr('required', true).val('');
  $("#cell_phone").attr('required', true).val('');
  $("#user_skype").attr('required', true).val('');
  $("#birth_date").attr('required', true).val('');
  $("#hire_date").attr('required', true).val('');
});

// $(".pp_employee").mouseenter(function() {
//   var tdid = $(this).closest('tr').attr('id');
//   $('#'+tdid).find('td').each (function(index, value) {
//     $(this).show('slow');
//   });
// });
// $(".pp_employee").mouseleave(function() {
//   var tdid = $(this).closest('tr').attr('id');
//   $("#"+tdid+' #femail').hide('slow');
//   $("#"+tdid+' #fphone').hide('slow');
//   $("#"+tdid+' #uskype').hide('slow');
//   $("#"+tdid+' #dob').hide('slow');
//   $("#"+tdid+' #hdate').hide('slow');
// });

//datepicker
</script>
