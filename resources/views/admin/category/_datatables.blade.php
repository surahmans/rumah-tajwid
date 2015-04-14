<script type="text/javascript">
    $(document).ready(function() {
         oTable = $('#category').DataTable({
             "processing": true,
             "serverSide": false,
             "order": [0, 'asc'],
             "ajax": "{!! URL::route('admin.category.data') !!}",
             "columns": [
                 {data: 'name', name: 'name', title: 'Name'},
                 {data: 'slug', name: 'slug', title: 'Link', orderable: false},
                 {data: 'actions', name: 'actions', title: 'Actions', searchable: false, orderable: false, className: "uk-text-center"},
             ]
         });
    });
</script>