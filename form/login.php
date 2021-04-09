<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h3>Login here</h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" placeholder="Username" class="form-control">
            </div><br>
            <button class="btn btn-primary">Login</button> <span>Don't have an account?<a href="registration.php" class="btn btn-outline-secondary"> Register</a></span>
        </form>
    </div>
</body>
</html>
