<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Designation</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2>Add Designation</h2>
        <form action="/add_designation" method="post">
            @csrf
            <label for="designation">Designation:</label>
            <input type="text" id="designation" class="form-control" name="designation" required>
            <br>
            <button type="submit">Add Designation</button>
        </form>


    </div>



</body>

</html>