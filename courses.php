<?php

require 'connection.php';

$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$total_result = mysqli_query($conn, "SELECT id AS total FROM courses");
$total_rows = mysqli_num_rows($total_result);
$total_pages = ceil($total_rows / $limit);

$sql = "SELECT * FROM courses ORDER BY course_name LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
}
include 'header.php';
?>
    <div class="row mt-4">
        <div class="col-10 offset-md-1">

            <?php
            if (isset($msg)) {
            ?>
            <div class="alert alert-success">
            <?php echo $msg; ?>
            </div>
            <?php
            }
            ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Course Name</th>
                    <th>Start Date</th>
                    <th>Progress</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($courses)) {
                    foreach ($courses as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['course_name']; ?></td>
                            <td><?php echo $row['start_date']; ?></td>
                            <td><?php echo $row['progress']; ?></td>
                            <td><?php echo $row['end_date']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id'];?>">Edit</a>                                
                                <a href="delete.php?delete_id=<?php echo $row['id'];?>">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo '<tr><td colspan="6">No Data Found!</td></tr>';
                }
                ?>
            </tbody>
        </table>
        <nav>
                <ul class="pagination">
                    <!-- Previous -->
                    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
                    </li>

                    <!-- Page numbers -->
                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>

                    <!-- Next -->
                    <li class="page-item <?= $page >= $total_pages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                    </li>
                </ul>
            </nav>
        
        </div>
    </div>


<footer class="bg-light text-center py-3 mt-5">
    <p>&copy; 2024 My Website. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>