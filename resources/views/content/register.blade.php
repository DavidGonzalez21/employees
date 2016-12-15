@include('headers.header')
<div class="container content" style="text-align: center;">
  <div class="center margin-top-5">
    <img src="https://www.clickittech.com/wp-content/uploads/2015/03/logo_sample8-Converted-e1426278580674.png" alt="" class="img-responsive img-rounded img-logo">
  </div>
  {{ Form::open(array('action' => 'RegisterController@create', 'method' => 'POST')) }}
    <div class="input-control div-form-rg well margin-top-5" hidden="">
      @if($errors->any())
          @foreach($errors->getMessages() as $this_error)
              <P class="">{{$this_error[0]}}</p>
          @endforeach
      @endif
      <input type="text" name="first_name" id="fname" value="" class="form-control text-capitalize" placeholder="First Name"><br>
      <input type="text" name="last_name" value="" class="form-control text-capitalize" placeholder="Last Name"><br>
      <input type="text" name="other_name" value="" class="form-control text-capitalize" placeholder="Other Name"><br>
      <input type="text" name="email" value="" class="form-control text-capitalize" placeholder="Email"><br>
      <input type="password" name="password" value="" class="form-control" placeholder="Password"><br>
      <input type="text" name="cell_phone" value="" class="form-control text-capitalize" placeholder="Cell Phone"><br>
      <button type="submit" name="button" class="btn btn-primary" style="width: 100%;">Register Now</button>
    </div>
  {{ Form::close() }}
</div>
@include('headers.footer')
<script type="text/javascript">
  options = { to: { width: 200, height: 60 } };
  $(".img-logo").fadeIn(4000);
  $( ".div-form-rg" ).fadeIn(1000);
</script>
