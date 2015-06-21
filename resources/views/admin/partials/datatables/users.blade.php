<script type="text/javascript">
    $(document).ready(function() {
         oTable = $('#users').DataTable({
             "processing": true,
             "serverSide": true,
             "order": [0, 'asc'],
             "ajax": "{!! URL::route('admin.user.data') !!}",
             "columns": [
                 {data: 'name', name: 'name', title: 'Name'},
                 {data: 'email', name: 'email', title: 'Email'},
                 {data: 'level', name: 'level', title: 'Level', searchable: false, orderable: false, width: '1%', className: "uk-text-center"},
                 {data: 'actions', name: 'actions', title: 'Actions', searchable: false, orderable: false, className: "uk-text-center"},
             ]
         });
    });
</script>

