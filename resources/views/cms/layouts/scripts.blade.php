  @yield('scripts')
  {!! HTML::script('cms/js/jquery.min.js') !!}
  {!! HTML::script('cms/js/bootstrap.min.js') !!}
  {!! HTML::script('cms/js/custom.js') !!}

  @if($gc->table)
  {!!Html::style('cms/css/jquery.dataTables.min.css')!!}
  {!!Html::script('cms/js/data_tables/jquery.dataTables.js')!!}
  <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
      $('#list_table').DataTable();
    } );
  </script>
  @endif

  @if($gc->form)
  <!-- daterangepicker -->
  {!!Html::script('cms/js/moment/moment.min.js')!!}
  {!!Html::script('cms/js/datepicker/daterangepicker.js')!!}
  @endif


  @yield('scripts')