<script type="text/javascript">
    $(document).ready(function() {
         oTable = $('#article').DataTable({
             "processing": true,
             "serverSide": true,
             "order": [0, 'desc'],
             "ajax": "{!! URL::route('admin.article.data') !!}",
             "columns": [
                 {data: 'id', name: 'id',  visible: false},
                 {data: 'title', name: 'title', title: 'Title'},
                 {data: 'user.name', name: 'user_id', title: 'Author', searchable: false, orderable: true},
                 {data: 'category.name', name: 'category_id', title: 'Category', searchable: false, orderable: true},
                 {data: 'actions', name: 'actions', title: 'Actions', searchable: false, orderable: false, className: "uk-text-center"},
             ]
         });
    });
</script>