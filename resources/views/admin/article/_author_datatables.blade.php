<script type="text/javascript">
    $(document).ready(function() {
         oTable = $('#article').DataTable({
             "processing": true,
             "serverSide": true,
             "order": [0, 'asc'],
             "ajax": "{!! URL::route('author.article.data') !!}",
             "columns": [
                 {data: 'title', name: 'title', title: 'Title'},
                 {data: 'category.name', name: 'category_id', title: 'Category', searchable: false, orderable: false},
                 {data: 'actions', name: 'actions', title: 'Actions', searchable: false, orderable: false, className: "uk-text-center"},
             ]
         });
    });
</script>