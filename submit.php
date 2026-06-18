<?php

require 'connection.php';

if (isset($_POST['submit'])) {

    $course_name = mysqli_real_escape_string($conn, $_POST['course_name']);
    $start_date = $_POST['start_date'];
    $progress = mysqli_real_escape_string($conn, $_POST['progress']);
    $end_date = $_POST['end_date'];

    if (empty($course_name)) {
        $errors[] = "Course Name is required.";
    }
    if (empty($start_date) || strtotime($start_date) === false) {
        $errors[] = "Start Date is required and must be a valid date.";
    } else {
        $start_date = date('Y-m-d', strtotime($start_date));
    }
    if (empty($progress)) {
        $errors[] = "Progress is required.";
    } elseif (!is_numeric($progress)) {
        $errors[] = "Progress must be a numeric value.";
    }
    if (empty($end_date) || strtotime($end_date) === false) {
        $errors[] = "End Date is required and must be a valid date.";
    } else {
        $end_date = date('Y-m-d', strtotime($end_date));
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        if (isset($_POST['id'])) {
            header("Location: edit.php?id=" . $_POST['id']);
            exit();
        } else {
            header("Location: add.php");
            exit();
        }
    }

    if (isset($_POST['id'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $sql = "UPDATE courses SET course_name = '$course_name', start_date = '$start_date', progress ='$progress', end_date ='$end_date' WHERE id = $id";
        $msg = 'Data Updated!';
    } else {
        $sql = "INSERT INTO courses (course_name, start_date, progress, end_date) VALUES ('$course_name', '$start_date', '$progress', '$end_date')";
        $msg = 'Data Added!';
    }

    $res = mysqli_query($conn, $sql);

    if ($res == 1) {
        header("Location: courses.php?msg=$msg");
        exit();
    } else {
        $errors[] = 'Error: Data Not Added/Updated! ' . mysqli_error($conn);
        $_SESSION['errors'] = $errors;
        header("Location: add.php");
        exit();
    }
} else {
    echo "Form not submitted properly.";
}
?>