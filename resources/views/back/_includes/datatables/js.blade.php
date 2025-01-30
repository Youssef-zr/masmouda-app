<!-- Page JS Plugins -->
<script src="{{ url("assets/back/js/plugins/datatables/dataTables.min.js") }}"></script>
<script src="{{ url("assets/back/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js") }}"></script>
<script src="{{ url("assets/back/js/plugins/datatables-responsive/js/dataTables.responsive.min.js") }}"></script>
<script src="{{ url("assets/back/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js") }}"></script>
{!! $dataTable->scripts() !!}

<!-- change datatable lang dynamic -->
<script>
    (function($, DataTable) {
        // Datatable global configuration
        $.extend(true, DataTable.defaults, {
            language: @json(datatables_lang())
        });
    })(jQuery, jQuery.fn.dataTable);
</script>