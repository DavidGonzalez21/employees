@include('headers.header')

@include('content.head_container')

<button type="button" id="btn-add-user" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="float: right;">
  Add user
</button>
<table class="table table-bordered">
  @if (session('success'))
    <script>
      toastr.success("{{ session('success') }}");
    </script>
  @endif
  <tbody>
@foreach ($users as $user)
  <tr id="{{ $user->user_id }}">
    <td><img src="{{ $user->profile_photo }}" width="50" height="50" alt="" class="img-responsive img-rounded center"></td>
    <td class="text-capitalize" id="fname"> {{ $user->first_name }} </td>
    <td class="text-capitalize" id="lname"> {{ $user->last_name }} </td>
    <td class="text-capitalize" id="mname"> {{ $user->middle_name }} </td>
    <td id="femail"> {{ $user->email }} </td>
    <td id="fphone"> {{ $user->cell_phone }} </td>
    <td> <form class="" action="delete_user/{{ $user->user_id }}" method="get">
      <button type="submit" id=" {{ $user->user_id}} " name="delete_user" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
    </form></td>
    <td> <button type="button" id=" {{ $user->user_id }}" name="update_user" class="update btn btn-success"> <span class="glyphicon glyphicon-refresh"></span> </button> </td>
  </tr>
@endforeach
  </tbody>
  </table>
@extends('content.modal')

@section('modalid')
myModal
@stop

@section('modaltittle')
<h5>Add / Update user</h5>
@stop

@section('modalbody')
<div class="panel panel-default">
  <!-- <div class="panel-heading center"></div> -->
  <div class="panel-body">
    <form id="add_user_form" class="form-horizontal" role="form" method="POST" action="{{ url('/add_user') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
      @if (session('status'))
      <script>
      $(function() {
          $('#myModal').modal('show');
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
          $('#add_user_form').attr('action', '/update_user');
      });
      </script>
      @endif
      @if (! $errors->isEmpty())
      <script>
      $(function() {
          $('#myModal').modal('show');
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

      <div class="form-group{{ $errors->has('middle_name') ? ' has-error' : '' }}">
        <label for="middle_name" class="col-md-4 control-label">Other Name</label>

        <div class="col-md-6">
          <input id="middle_name" type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}" required autofocus>

          @if ($errors->has('middle_name'))
          <span class="help-block">
            <strong>{{ $errors->first('middle_name') }}</strong>
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

      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Password</label>

        <div class="col-md-6">
          <input id="password" type="password" class="form-control" name="password" required>

          @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="form-group">
        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

        <div class="col-md-6">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
      </div>

      <div class="form-group{{ $errors->has('cell_phone') ? ' has-error' : '' }}">
        <label for="cell_phone" class="col-md-4 control-label">Cell Phone</label>

        <div class="col-md-6">
          <input id="cell_phone" type="text" class="form-control" name="cell_phone" required>

          @if ($errors->has('cell_phone'))
          <span class="help-block">
            <strong>{{ $errors->first('cell_phone') }}</strong>
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
<script type="text/javascript">
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
  $("#myModal").modal('show');
  var idtr = $(this).closest('tr').attr('id');
  $('#add_user_form').attr('action', '/update_user');
  $("#action_button").val(idtr).text('Update data');
  $("#first_name").removeAttr('required').val($('#'+idtr+' >#fname').text().trim())
  $("#last_name").removeAttr('required').val($('#'+idtr+' >#lname').text().trim())
  $("#middle_name").removeAttr('required').val($('#'+idtr+' >#mname').text().trim())
  $("#email").removeAttr('required').val($('#'+idtr+' >#femail').text().trim())
  $("#cell_phone").removeAttr('required').val($('#'+idtr+'>#fphone').text().trim())
  $("#password").removeAttr('required');
  $("#password-confirm").removeAttr('required');
  //alert($('#'+idtr+' > #fname').text());
})

//add user button
$("#btn-add-user").click(function() {
  $("#action_button").val('').text('Save data');
  $('#add_user_form').attr('action', '/add_user');
  $("#first_name").val('').attr('required', true);;
  $("#last_name").attr('required', true).val('');
  $("#middle_name").attr('required', true).val('');
  $("#email").attr('required', true).val('');
  $("#cell_phone").attr('required', true).val('');
  $("#password").attr('required', true).val('');
  $("#password-confirm").attr('required', true).val('');
});
</script>
