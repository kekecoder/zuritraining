<?php

ini_set('display_errors', 1);
error_reporting(~0);

//Putting my error message in constant variable
define('ERROR_MESSAGE', 'This Field is required');
//Error variable store in an array
$errorMsg = [];
$_SESSION = [];
$email = '';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    session_start();
    //using the function created to remove all form of malicious tags and script
    $email = formData('email');
    $password = formData('password');
//validing email and password if it does not exist
    if (!$email) {
        $errorMsg['email'] = ERROR_MESSAGE;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg['email'] = "Wrong Email Format";
    }
    if (!$password) {
        $errorMsg['password'] = ERROR_MESSAGE;
    }

    if (empty($errorMsg)) {
        $id = md5($_POST['email'] . $_POST['password']); //storing password and email in md5 hasing
        $file = file_get_contents('file.txt'); //geting the file.txt so that i can check if the data is store in the databse and also pass it to json for identifier
        $file = json_decode($file, true);
        if (array_key_exists($id, $file)) { //if the file and id exist
            header("Location: home.php");

        } else { // if it does not exist
            $_SESSION['message'] = 'login fail, no such user found';
        }
    }
}

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
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h3>Login here</h3>
        <form action="" method="post" novalidate>
        <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="Email" class="form-control <?php echo isset($errorMsg['email']) ? 'is-invalid' : '' ?>" value="<?php ?>">
                        <small class="invalid-feedback">
                            <?php echo $errorMsg['email'] ?? '' ?>
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Password" class="form-control <?php echo isset($errorMsg['password']) ? 'is-invalid' : '' ?>">
                        <small class="invalid-feedback">
                            <?php echo $errorMsg['password'] ?? '' ?>
                        </small>
                    </div><br>
            <button class="btn btn-primary">Login</button> <span>Don't have an account?<a href="registration.php" class="btn btn-outline-secondary"> Register</a></span>
        </form>
    </div>
    <?php
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
}
unset($_SESSION['message']);
?>
</body>
</html>
