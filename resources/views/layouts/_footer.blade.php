<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>1.0.0</b> (BETA)
    </div>
    <strong>Copyright &copy; {{date('Y')}} <a href="#">Keeta CMS</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<script src="{{ asset('backend/plugin/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('backend/plugin/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('backend/plugin/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/plugin/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('backend/plugin/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('backend/js/adminlte.min.js') }}"></script>
<script src="{{ asset('backend/js/demo.js') }}"></script>
<script src="{{ asset('backend/js/jquery.nestable.js') }}"></script>
<script src="{{ asset('backend/plugin/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('backend/plugin/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugin/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/plugin/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('backend/plugin/iCheck/icheck.min.js')}}"></script>

<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
<script>
  $('#datepicker').datepicker({
      autoclose: true
    })
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
</script>

<script>
  $(function () {
    CKEDITOR.replace('editor1', {
    	height: 300
    });
  })
</script>
    <script>
        var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
        var options = {
        height: 300,
        filebrowserImageBrowseUrl: route_prefix + '?type=Images',
        filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: route_prefix + '?type=Files',
        filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
      };
    </script>
    <script>
        CKEDITOR.replace( 'editor1', options);
    </script>
    <script>
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
    </script>
    <script>
        $('#lfm').filemanager('file', {prefix: route_prefix});
        
        var domain = route_prefix;
        $('#lfm').filemanager('file', {prefix: domain});
    </script>
    
<script>

$(document).ready(function()
{

    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1
    })
    .on('change', updateOutput);

    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));

});
</script>