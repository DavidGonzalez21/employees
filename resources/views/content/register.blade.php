@include('headers.header')
<div class="container content">
  <img src="https://www.clickittech.com/wp-content/uploads/2015/03/logo_sample8-Converted-e1426278580674.png" alt="" class="img-responsive img-rounded img-logo">
  {{ Form::open(array('action' => 'RegisterController@create', 'method' => 'POST')) }}
    <div class="input-control div-form-rg well">
      <input type="text" name="first_name" value="" class="form-control text-capitalize" placeholder="First Name"><br>
      <input type="text" name="last_name" value="" class="form-control text-capitalize" placeholder="Last Name"><br>
      <input type="text" name="middle_name" value="" class="form-control text-capitalize" placeholder="Middle Name"><br>
      <input type="text" name="email" value="" class="form-control text-capitalize" placeholder="Email"><br>
      <input type="password" name="password" value="" class="form-control" placeholder="Password"><br>
      <input type="text" name="cell_phone" value="" class="form-control text-capitalize" placeholder="Cell Phone"><br>
      <button type="submit" name="button" class="btn btn-primary" style="width: 100%;">Register Now</button>
    </div>
  {{ Form::close() }}
</div>
@include('headers.footer')
