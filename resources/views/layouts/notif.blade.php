<script src="{{ asset('assets/js/toastr.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/toastr.css') }}">
<script>
@if(Session::has('success'))
toastr.success("{{ Session::get('success') }}");
@endif
@if(Session::has('info'))
toastr.info("{{ Session::get('info') }}");
@endif
@if(Session::has('warning'))
toastr.warning("{{ Session::get('warning') }}");
@endif
@if(Session::has('error'))
toastr.error("{{ Session::get('error') }}");
@endif
</script>