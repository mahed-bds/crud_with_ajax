<script>
    $(document).on('click', '.delete-btn', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '{{ route('delete', ':id') }}'.replace(':id', id),
            type: 'DELETE',
            data: {
                'id': id,
                '_token': '{{ csrf_token() }}'
            },
            success: function(data) {
                if (data.success) {
                    window.location.reload();
                }
            }
        });
    });
</script>