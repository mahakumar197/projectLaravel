<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <!-- Add your stylesheets or other head elements here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<style>
    /* Set the maximum width for the table container */
    .table-container {
        max-width: 800px;
        /* Adjust the value based on your needs */
        margin: auto;
        /* Center the table horizontally */
    }
</style>

<body class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="d-flex justify-content-between mt-5 mb-3">
        <h2>Registered Users</h2>
        <a href="/register" class="btn btn-success text-dark font-weight-bold">Register</a>
    </div>
    <div class="container">
        <table class="table table-hover">
            <thead class="bg-success">
                <tr>

                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Designation</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample data, replace this with dynamic data from your backend -->
                @foreach($getUserData as $userData)
                <tr>

                    <td>{{$userData->name}}</td>
                    <td>{{$userData->email}}</td>
                    <td>{{$userData->password}}</td>
                    <td>{{$userData->designation}}</td>
                    <td>
                        <a href="user/{{$userData->id}}/edit" class="btn btn-dark btn-sm">Edit</a>
                        <form action="user/{{$userData->id}}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-dark btn-sm">Delete</button>
                        </form>
                        <script>
                            // Read success message from the HTML element
                            var successMessage = document.getElementById('success-notification').getAttribute('data-success');

                            // Display a Toastr notification if a success message is present
                            if (successMessage) {
                                toastr.success(successMessage);
                            }

                            function confirmDelete() {
                                // Display a confirmation dialog
                                if (window.confirm('Are you sure you want to delete this user?')) {
                                    return true; // Submit the form
                                }
                                return false; // Cancel the form submission
                            }
                        </script>
                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</body>

</html>