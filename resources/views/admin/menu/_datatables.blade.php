<script type="text/javascript">
    $(document).ready(function() {
         oTable = $('#menu').DataTable({
             "processing": true,
             "serverSide": true,
             "order": [0, 'asc'],
             "ajax": "{!! URL::route('admin.menu.data') !!}",
             "columns": [
                 {data: 'name', name: 'name', title: 'Name'},
                 {data: 'page', name: 'page', title: 'Link'},
                 {data: 'submenu[, ].name', name: 'child', title: 'Child'},
                 {data: 'actions', name: 'actions', title: 'Actions', searchable: false, orderable: false, className: "uk-text-center"},
             ]
         });
    });
</script>