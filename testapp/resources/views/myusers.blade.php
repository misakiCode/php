<!DOCTYPE html>
<html>
    <head>
        <title>User List</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h2>User List</h2>
            <form action="/myusers" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <!-- User Name -->
                <div class="form-group">
                    <label for="myuser" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="name" id="myuser-name" class="form-control">
                    </div>
                    <label for="myuser" class="col-sm-3 control-label">Age</label>
                    <div class="col-sm-6">
                        <input type="text" name="age" id="myuser-age" class="form-control">
                    </div>
                    <label for="myuser" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="text" name="email" id="myuser-email" class="form-control">
                    </div>
                </div>

                <!-- Add User Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-xs btn-primary">
                            Add User
                        </button>
                    </div>
                </div>
            </form>

            <!-- Current Users -->
            <h2>Current Users</h2>
            <table class="table table-striped task-table">
                <thead>
                    <th>Name</th><th>Age</th><th>Email</th><th> </th>
                </thead>

                <tbody>
                    @foreach ($myusers as $myuser)
                        <tr>
                            <!-- User Name -->
                            <td><div>{{ $myuser->name }}</div></td>
                            <td><div>{{ $myuser->age }}</div></td>
                            <td><div>{{ $myuser->email }}</div></td>
                            <td>
                                <form action="/myusers/{{ $myuser->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-xs btn-danger">Delete User</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>