<!-- Modal -->
<div class="modal fade" id=@yield('modalid') tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <img src="https://www.clickittech.com/wp-content/uploads/2015/03/logo_sample8-Converted-e1426278580674.png" alt="" class="img-responsive center">
      </div>
      <div class="modal-body">
        @yield('modalbody')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
