<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>



<body>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="container">
        <div class="d-flex justify-content-between mt-5">
            <h2>Edit User</h2>
            <!-- <a href="/user" class="btn btn-success">View User Details</a> -->
        </div>
        <form action="editUserData" method="POST" class="mt-3">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{$user->email}}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="{{ $user->password }}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="designation">Designation</label>
                <input type="text" id="designation" name="designation" class="form-control" value="{{$user->designation}}" required>
            </div>
            <button type="submit" class="btn btn-success text-dark font-weight-bold">Update</button>

        </form>
    </div>


</body>

</html>