<script type="text/javascript">
    $(document).ready(function() {
         oTable = $('#submenu').DataTable({
             "processing": true,
             "serverSide": true,
             "order": [0, 'asc'],
             "ajax": "{!! URL::route('admin.submenu.data') !!}",
             "columns": [
                 {data: 'name', name: 'name', title: 'Name'},
                 {data: 'page', name: 'page', title: 'Link'},
                 {data: 'parent_menu.name', name: 'parent', title: 'Parent'},
                 {data: 'actions', name: 'actions', title: 'Actions', searchable: false, orderable: false, className: "uk-text-center"},
             ]
         });
    });
</script>