<script type="text/javascript">
    $(document).ready(function() {
         oTable = $('#slide').DataTable({
             "processing": true,
             "serverSide": true,
             "ajax": "{!! URL::route('admin.slide.data') !!}",
             "columns": [
                 {data: 'title', name: 'title', title: 'Title'},
                 {data: 'status', name: 'status', title: 'Status', searchable: false, orderable: false, className: 'uk-text-center'},
                 {data: 'actions', name: 'actions', title: 'Actions', searchable: false, orderable: false, className: "uk-text-center"},
             ]
         });
    });
</script>