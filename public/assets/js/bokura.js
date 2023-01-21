
$('#pilihan').filestyle({
        iconName   : 'fa fa-folder-open',
        buttonText : 'Pilih gambar',
        buttonName : 'btn-default',
        buttonBefore : true,
       'placeholder' : 'Tidak ada gambar yang dipilih',
        size : 'sm'
      });
$('.hapus').click(function() {
        $('#pilihan').filestyle('clear');
      });
        $(document).ready(function($){
            $('#keluar').on('click',function(){
               var getLink = $(this).attr('href');
                swal({
                        title: 'Apakah anda yakin ?',
                        text: 'Anda ingin keluar?',
                        type: 'warning',
                        html: true,
                        confirmButtonColor: '#d9534f',
                        showCancelButton: true,
                        },function(){
                        window.location.href = getLink
                    });
                return false;
            });
        });
        
  $(document).ready(function () {
    $(".select2").select2();
   $('#hapus').click(function() {
        $('#username').text('clear');
      });
    $('.check input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-red',
      radioClass: 'iradio_flat-red',
      increaseArea: '50%' 
    });
    $(".checkAll").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        $(".check input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        $(".check input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });
  });