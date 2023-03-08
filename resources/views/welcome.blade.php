<html>

<head>
    <title>Laravel AJAX CRUD Example Tutorial - www.techsolutionstuff.com</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>

    <div class="container mt-5">
        <form id="form-create" action="" method="POST">
            @csrf
            <input type="text" name="name">
            <input type="text" name="email">
            <button type="submit" id="clcik_for_create">Create</button>
        </form>
    </div>


    <div class="d-flex justify-content-center mt-3 mb-3">
        <input placeholder="search by name" class="w-75" id="search"/>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>

                    <th scope="col">Name</th>
                    <th scope="col">email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody class="all_data">
                @foreach ($allPost as $allPosts)
                    <tr>
                        <td>{{ $allPosts->name }}</td>
                        <td>{{ $allPosts->email }}</td>
                        <td><button
                                onclick="editButton('{{ $allPosts->name }}','{{ $allPosts->email }}','{{ $allPosts->id }}')"
                                class=" btn btn-primary edit-btn" data-toggle="modal" data-target="#myModal"
                                data-id="{{ $allPosts->id }}">Edit</button>
                            <button class="btn btn-danger delete-btn" data-id="{{ $allPosts->id }}">Delete</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>



            <tbody id="content" class="search_data">

            </tbody>


     


        </table>
    </div>


    <div class="container mt-5">
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">edit posts</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <form id="saveBtn" action="" method="POST">

                            @csrf
                            <input type="hidden" name="id" id="user_id">
                            <input type="text" name="name" id="user_name">
                            <br />
                            <br />
                            <input type="text" name="email" id="user_email">
                            <br />
                            <br />
                            <button id="update" type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>

                </div>
            </div>

        </div>

        <script>
            function editButton(name, email, id) {
                
                $('#user_name').val(name);
                $('#user_id').val(id);
                $('#user_email').val(email);

            }
        </script>

        <script type="text/javascript">
        $('#search').on('keyup',function(){
            $value=$(this).val();
            if($value)
            {
            
                $('.all_data').hide();
                $('.search_data').show(); 
            }
            else{
                $('.all_data').show();
                $('.search_data').hide();   
            }
          
            var url = '{{route('search') }}';

            $.ajax({
                url: url,
                method: "GET",
                data:{'search':$value},
                success:function(data){
                    //console.log(data);

                    $('#content').html(data);
                
                }
            })
        })

        </script>



        @include('ajax.update')
        @include('ajax.create')
        @include('ajax.delete')


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
</body>
</body>

</html>
