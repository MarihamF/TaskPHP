<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">

        <h2>Register</h2>

        <form  method="post"  action="action.php" enctype="multipart/form-data">

            <div class="form-group">

                <label for="exampleInputName">Name</label>

                <input type="text" class="form-control"   name="name"  id="exampleInputName" aria-describedby="" placeholder="Enter Name">

            </div>

            <div class="form-group">

                <label for="exampleInputEmail">Email address</label>

                <input type="email" class="form-control" name="email"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

            </div>

            <div class="form-group">

                <label for="exampleInputPassword">password</label>

                <input type="text" class="form-control" name="password"  id="exampleInputPassword"  placeholder="Enter password">

            </div>

            <div class="form-group">

                <label for="exampleInputAddress">address</label>

                <input type="text" class="form-control" name="address"  id="exampleInputAddress" placeholder="Enter address">

            </div>

            <input type="radio" name="gender" value="female">Female

            <input type="radio" name="gender" value="male">Male

            <div class="form-group">

                <label for="exampleInputUrl">linedin account</label>

                <input type="text" class="form-control" name="url"  id="exampleInputUrl" placeholder="Enter linkedin account">

            </div>

            <div class="form-group">

                <label for="exampleInputcv">select cv</label>

                <input type="file" class="form-control"  name="pdf"  id="exampleInputcv" placeholder="select cv">

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </div>

</body>

</html>