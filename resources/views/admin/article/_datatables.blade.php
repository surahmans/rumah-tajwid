<script type="text/javascript">
    $(document).ready(function() {
         oTable = $('#article').DataTable({
             "processing": true,
             "serverSide": true,
             "order": [0, 'asc'],
             "ajax": "{!! URL::route('admin.article.data') !!}",
             "columns": [
                 {data: 'title', name: 'title', title: 'Title'},
                 {data: 'user.name', name: 'user', title: 'Author'},
                 {data: 'category.name', name: 'category', title: 'Category'},
                 {data: 'actions', name: 'actions', title: 'Actions', searchable: false, orderable: false, className: "uk-text-center"},
             ]
         });
    });
</script>