
document.addEventListener("DOMContentLoaded", function(){
  $('.preloader-background').delay(1900).slideUp('slow');
  $('.preloader-wrapper').delay(1900).slideUp('slow');
});

$(document).ready(function() {
    Materialize.updateTextFields();
 $('.button-collapse').sideNav({
      menuWidth: 300,
      closeOnClick: true, 
      draggable: true 
    }
  );
 $('.tooltipped').tooltip();
  });
$(document).ready(function(){               
  $('.materialboxed').materialbox();
  $('.materialboxed').materialbox();
});

$(function(){
  $('.password').password({
    message: 'Click disini untuk melihat/menembunyikan password'
  }).on('show.bs.password', function(e) {
        $('#eventlog').text('Hide password');
        $('#filled-in-box').prop('checked', true);
   }).on('hide.bs.password', function(e) {
           $('#eventlog').text('Show password');
           $('#filled-in-box').prop('checked', false);
       });
    $('#filled-in-box').click(function() {
       $('.password').password('toggle');
  });
});