

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $("#update").click(function(e) {

            e.preventDefault();

            var name = $("input[id=user_name]").val();
                    var email = $("input[id=user_email]").val();
                    var id = $("input[id=user_id]").val();
                    console.log(name);
                    console.log(email);
                    console.log(id);

                    var url = '/edit/' + id;
                    //console.log(url)

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
                      alert("Error")
                    }
                },
                error: function(error) {
                    //console.log(error)
                }
            });
        });

    });
</script>