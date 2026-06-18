<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contacts List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
require 'connection.php';
$sql = "SELECT course_name, start_date, progress, end_date FROM courses";
$result = mysqli_query($conn, $sql);
?>

<div class="container mb-2">
<h2 class="col-md-3 text-center bg-primary justify-content-center mx-auto">Courses List</h2>
    <table class="table table-bordered table-hover">
        <thead class="stable-primary">
        <tr>
            <th>Sr_No.</th>
            <th>Course Name</th>
            <th>Start Date</th>
            <th>Progress</th>
            <th>End Date</th>
        </tr>
        </thead>
        <tbody>

        <?php
        while ($row =  mysqli_fetch_assoc($result)){
        ?>

        <tr>
            <td><?php echo $row['course_name'];?></td>
            <td><?php echo $row['start_date'];?></td>
            <td><?php echo $row['progress'];?></td>
            <td><?php echo $row['end_date'];?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['serial_no'];?>" class="text-white">Edit</a>
                <a href="delete.php?delete_id=<?php echo $row['serial_no'];?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
    </table>
</div>

</body>
</html>
