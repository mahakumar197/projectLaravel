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
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="d-flex justify-content-between mt-5">
            <h2>Register</h2>
            <a href="/user" class="btn btn-success text-dark font-weight-bold">View User Details</a>
        </div>
        <form action="register" method="POST" class="mt-3">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" required value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="designation">Designation</label>
                <input type="text" id="designation" name="designation" class="form-control" required value="{{ old('designation') }}">
            </div>
            <button type="submit" class="btn btn-success text-dark font-weight-bold">Register</button>

        </form>
    </div>


</body>

</html>