<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laravel Ajax Project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('toastr.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6">
                <div class="card" style="margin-top:50px">
                    <div class="card-header text-center">Input Form</div>
                    <div class="card-body">
                        <form id="data">
                            {{@csrf_field()}}
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="form-control " placeholder="First Name" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                            </div>

                            <div class="form-group">
                                <label for="father_name">Father Name</label>
                                <input type="text" id="father_name" name="father_name" class="form-control " placeholder="Father Name" required>
                            </div>

                            <div class="form-group">
                                <label for="mother_name">Mother Name</label>
                                <input type="text" id="mother_name" name="mother_name" class="form-control" placeholder="Mother Name" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Address:</label>
                                <textarea class="form-control" name="address" rows="5" id="address" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary" id="button">Submit</button>

                        </form>

                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="margin-top:50px">
                    <div class="card-header text-center">Display Data</div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-striped " id="table_data">
                            <thead>
                                <th>First Name</th>
                                <th>Email</th>
                                <th>Father Name</th>
                                <th>Mother Name</th>
                                <th>Address</th>
                            </thead>
                            <tbody>
                                @foreach($information_data as $item)
                                <tr>
                                    <td>{{$item->first_name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->father_name}}</td>
                                    <td>{{$item->mother_name}}</td>
                                    <td>{{$item->address}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>

                </div>

            </div>
        </div>


    </div>

    <script src="{{asset('toastr.min.js')}}"></script>

   

    <script>
        $(document).ready(function() {
            $('#data').submit(function(e) {
                e.preventDefault();

                let first_name = $('#first_name').val();
                let email = $('#email').val();
                let father_name = $('#father_name').val();
                let mother_name = $('#mother_name').val();
                let address = $('#address').val();
                let token = $('input[name="_token"]').val();

                $.ajax({
                    url: '/record_data',
                    type: 'POST',
                    data: {
                        first_name: first_name,
                        email: email,
                        father_name: father_name,
                        mother_name: mother_name,
                        address: address,
                        _token: token
                    },
                    success: function(response) {
                        if (response) {
                            $('#table_data tbody').prepend('<tr><td>' + response.first_name + '</td><td>' + response.email + '</td><td>' + response.father_name + '</td><td>' + response.mother_name + '</td><td>' + response.address + '</td></tr>');
                            $('#data')[0].reset();
                            toastr.success(`New Person ${response.first_name} Adeed Successfully`);

                        }

                       

                    }
                })

            })
        })
    </script>


</body>

</html>