<script type="text/javascript">
    $(document).ready(function() {
         oTable = $('#page').DataTable({
             "processing": true,
             "serverSide": true,
             "order": [0, 'asc'],
             "ajax": "{!! URL::route('admin.page.data') !!}",
             "columns": [
                 {data: 'title', name: 'title', title: 'Title'},
                 {data: 'slug', name: 'link', title: 'Link', searchable: false, orderable: false},
                 {data: 'actions', name: 'actions', title: 'Actions', searchable: false, orderable: false, className: "uk-text-center"},
             ]
         });
    });
</script>