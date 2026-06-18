<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark overflow-hidden">
        <div class="container">
            <a class="navbar-brand" href="homepage.php">My Academy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="homepage.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active bg-primary" href="admission.html">Signup</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php
require 'connection.php';
session_start();
if (!empty($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    session_destroy();
?>
<div class="alert alert-danger">
    <?php
    foreach ($errors as $key => $val) {
        echo $val . '<br>';
    }
    ?>
</div>
<?php
}
?>
<div class="container">
    <div class="col-8 offset-md-2 mt-4">
        <br>
        <h2>Add Course</h2>
        <br>
        <form action="submit.php" method="post">
            <div class="form-group">
                <label for="course_name">Course Name:</label>
                <input type="text" class="form-control" id="course_name" placeholder="Enter Course_Name" name="course_name">
            </div>
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" class="form-control" id="start_date" placeholder="Enter Start_Date" name="start_date">
            </div>
            <div class="form-group">
                <label for="progress">Progress:</label>
                <input type="text" class="form-control" id="progress" placeholder="Enter Progress" name="progress">
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" class="form-control" id="end_date" placeholder="Enter End_Date" name="end_date">
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>