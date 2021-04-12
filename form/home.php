<?php
session_start();

$id = md5($_POST['email'] . $_POST['password']); //storing password and email in md5 hasing
$file = file_get_contents('file.txt'); //geting the file.txt so that i can check if the data is store in the databse and also pass it to json for identifier
$file = json_decode($file, true);
if (array_key_exists($id, $file)) { //if the file and id exist
    if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
        header('Location: registration.php');
        exit;
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Home Page</title>
</head>
<body>
    <h3>Welcome</h3>
    <form action="logout.php" method="GET">
    <input type="hidden" name="logout">
        <a href="logout.php" name='logout' class="btn btn-warning">Log Out</a>
    </form>
</body>
</html>
