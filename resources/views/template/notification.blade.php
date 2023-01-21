<script>

$(function(){
 @if(Session::has('success'))
  Materialize.toast("{{ Session::get('success') }}", 5000, 'rounded');
 @endif
});

</script>