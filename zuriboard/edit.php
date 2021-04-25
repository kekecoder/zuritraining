<?php
//making connection to the database
require_once 'server.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM register_course WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

//describing errors
$errors = [];

$courses = '';
//check the current request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $courses = $_POST['newcourse'];

    //Validation
    //Validation
    if (!$courses) {
        $errors[] = "Course is required";
    }

    if (empty($errors)) {
        //inserting into the database
        $statment = $pdo->prepare("UPDATE register_course SET courses = :courses WHERE id = :id");
        $statment->bindValue(':courses', $courses);
        $statment->bindValue(':id', $id);

        $statment->execute();

        header('Location: index.php');
    }
}
require_once 'header.php';
?>

    <title>Update Courses</title>
</head>
<body>
    <div class="container">

    <p>
        <a class="btn btn-outline-secondary" href="index.php">Go Back to Courses</a>
    </p>
    <h3>Update</h3>
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <div><?php echo $error ?></div>
            <?php endforeach;?>
        </div>
    <?php endif;?>

    <form action="" method="post">
        <div class="form-group">
            <label></label>
            <input type="text" class="form-control" name="newcourse">
        </div><br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
</body>
</html>