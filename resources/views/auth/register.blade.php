@include('headers.header')

@include('content.head_container')
              <div class="col-lg-12 col-md-10  col-md-offset-2 col-sm-offset-4">
                  <div class="panel panel-default">
                      <div class="image_logo panel-heading center"><img src="https://www.clickittech.com/wp-content/uploads/2015/03/logo_sample8-Converted-e1426278580674.png" alt=""></div>
                      <div class="panel-body form-register">
                          <form id="add_user_form" class="form-horizontal" role="form" method="POST" action="{{ url('/add_user') }}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              @if (session('status'))
                                  <div class="alert alert-success">
                                      <span>{{ session('status') }}</span>
                                  </div>
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
                                      <button type="submit" class="btn btn-primary">
                                          Register
                                      </button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>

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
</script>
