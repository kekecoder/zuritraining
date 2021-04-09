<?php
//Putting my error message in constant variable
define('ERROR_MESSAGE', 'This Field is required');
//Error Message
$errorMsg = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //accepting data from user
    $firstname = formData('firstname');
    $lastname = formData('lastname');
    $username = formdata('username');
    $email = formData('email');
    $password = formData('password');
    $cpassword = formData('cpassword');

    //performing validation
    if (!$firstname) {
        $errorMsg['firstname'] = ERROR_MESSAGE;
    }
    if (!$lastname) {
        $errorMsg['lastname'] = ERROR_MESSAGE;
    }
    if (!$username) {
        $errorMsg['username'] = ERROR_MESSAGE;
    }
    if (!$email) {
        $errorMsg['email'] = ERROR_MESSAGE;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg['email'] = 'Invalid Email Address';
    }
    if (!$password) {
        $errorMsg['password'] = ERROR_MESSAGE;
    }
    if ($password !== $cpassword) {
        $errorMsg['cpassword'] = 'Does not match with password';
    }

    //saving the collected form data to file
    if (empty($errorMsg)) {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
    }

}
//function to help remove unnecessary tags
//stopping user from entering malicious script tag
function formData($field)
{
    $_POST[$field]??='';
    return htmlspecialchars(stripslashes($_POST[$field]));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Registration Page</title>
</head>
<body>
    <div class="container">
        <form action="" method="post" novalidate>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" name="firstname" placeholder="First Name" class="form-control <?php echo isset($errorMsg['firstname']) ? 'is-invalid' : '' ?>">
                        <small class="invalid-feedback">
                            <?php echo $errorMsg['firstname'] ?? '' ?>
                        </small>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" name="lastname" placeholder="Last Name" class="form-control <?php echo isset($errorMsg['lastname']) ? 'is-invalid' : '' ?>">
                        <small class="invalid-feedback">
                            <?php echo $errorMsg['lastname'] ?? '' ?>
                        </small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" placeholder="Username" class="form-control <?php echo isset($errorMsg['username']) ? 'is-invalid' : '' ?>">
                        <small class="invalid-feedback">
                            <?php echo $errorMsg['username'] ?? '' ?>
                        </small>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="Email" class="form-control <?php echo isset($errorMsg['email']) ? 'is-invalid' : '' ?>">
                        <small class="invalid-feedback">
                            <?php echo $errorMsg['email'] ?? '' ?>
                        </small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Password" class="form-control <?php isset($errorMsg['password']) ? 'is-invalid' : ''?>">
                        <small class="invalid-feedback">
                            <?php echo $errorMsg['password'] ?? '' ?>
                        </small>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control <?php echo isset($errorMsg['cpassword']) ? 'is-invalid' : '' ?>">
                        <small class="invalid-feedback">
                            <?php echo $errorMsg['cpassword'] ?? '' ?>
                        </small>
                    </div>
                </div>
            </div><br>
            <button class="btn btn-primary">submit</button> <a href="login.php" class="btn btn-primary">Login</a>
        </form>
    </div>
</body>
</html>
