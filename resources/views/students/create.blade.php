<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container">

    <form class="container" action="{{ route('Student.store') }}" method="POST">
        @csrf
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
          <label for="exampleInputFirstName">First Name:</label>
          <input type="text" class="form-control" id="exampleInputFirstName" name="first_name" placeholder="Enter first name">
        </div>
        <div class="form-group">
            <label for="exampleInputLastName">Last Name:</label>
            <input type="text" class="form-control" id="exampleInputLastName" name="last_name" placeholder="Enter last name">
        </div>
        <div class="form-group">
            <label for="exampleInputAddress">Address:</label>
            <input type="text" class="form-control" id="exampleInputAddress" name="address" placeholder="Enter address">
        </div>
        <div class="form-group">
            <label for="exampleInputBirthday">Birth Day:</label>
            <input type="text" class="form-control" id="exampleInputBirthday" name="dob" placeholder="Enter birth day">
        </div>
        <div class="form-group">
            <label for="exampleInputPhoneNumber">Phone Number:</label>
            <input type="text" class="form-control" id="exampleInputPhoneNumber" name="contact_no" placeholder="Enter phone number">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>
</html>
