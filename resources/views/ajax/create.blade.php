<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $("#clcik_for_create").click(function(e) {

            e.preventDefault();

            var name = $("input[name=name]").val();
            var email = $("input[name=email]").val();
            var url = '{{route('create') }}';
            console.log(name);
            console.log(email);

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    name: name,
                    email: email
                },
                success: function(response) {
                    if (response.success) {
                        alert(response.message) 
                        window.location.reload('/');//Message come from controller
                    } else {
                        //alert("Error")
                    }
                },
                error: function(error) {
                    //console.log(error)
                }
            });
        });

    });
</script>