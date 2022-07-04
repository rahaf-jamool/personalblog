<!-- jquery -->
<script src="{{ URL::asset('admin/assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('admin/assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script>
    var plugin_path = 'js/';

</script>

<!-- chart -->
<script src="{{ URL::asset('admin/assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('admin/assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('admin/assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('admin/assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('admin/assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('admin/assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('admin/assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('admin/assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('admin/assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('admin/assets/js/custom.js') }}"></script>

<script src="{{asset('vendor/aos/aos.js')}}"></script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>
  {{-- Select2 JS --}}
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

  <script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Choose Some Tags"
        });
    });
    $(function(){
      $('.selectpicker').selectpicker();
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  
@stack('scripts')