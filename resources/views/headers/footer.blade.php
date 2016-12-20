<script type="text/javascript">
(function($){

$(document).ready(function() {

  $('.datepicker').datepicker({
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'yy-mm-dd'
});
options = { to: { width: 200, height: 60 } };
$(".image_logo").fadeIn(4000);
//$(".form-register").toggle( 'drop', options, 500 );
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
$("#table_employees").dataTable({
  "aLengthMenu": [[3, 5, 7, 10], [3, 5, 7, "All"]],
  "pageLength": 3
});

//datatable holiday
$("#table-holidays").dataTable();
$("#table-clients").dataTable();
});
}(jQuery));
</script>
</body>
</html>
