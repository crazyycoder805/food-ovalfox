<!DOCTYPE html>

<html lang="zxx">
<?php require_once 'assets/includes/head.php'; ?>
<?php

$success = "";
$error = "";
$id = "";

$reviews = $pdo->read("reviews");


 if (isset($_GET['delete_category'])) {
    if ($pdo->delete("reviews", $_GET['delete_category'])) {
        $success = "Review deleted.";
                              header("Location:{$name}");

    } else {
        $error = "Something went wrong.";
    }
}


 
?>

<body>
    <?php 
    
    require_once 'assets/includes/preloader.php'; 
    
    ?>

    <!-- Main Body -->
    <div class="page-wrapper">

        <!-- Header Start -->
        <?php require_once 'assets/includes/navbar.php'; ?>
        <!-- Sidebar Start -->
        <?php require_once 'assets/includes/sidebar.php'; ?>
        <!-- Container Start -->
        <div class="page-wrapper">
            <div class="main-content">
                <!-- Page Title Start -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <?php
                        if (!empty($success)) {
                        ?>
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-bs-dismiss="alert">&times;</button>
                            <?php echo $success; ?>
                        </div>
                        <?php } else if (!empty($error)) { ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-bs-dismiss="alert">&times;</button>
                            <?php echo $error; ?>
                        </div>

                        <?php } ?>
                        <div class="page-title-wrapper">
                            <div class="page-title-box">
                                <h4 class="page-title">Reviews</h4>
                            </div>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-link">
                                        <a href="index.php"><i class="fas fa-home mr-2"></i>Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-link active">Reviews</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- From Start -->
                <div class="from-wrapper">
                    <div class="row">

                        <div class="col-xl col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">

                                <div class="card-body">
                                    <table id="example1" class="table table-striped table-bordered dt-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User</th>
                                                <th>Stars</th>
                                                <th>On Product</th>
                                                <th>Review</th>

                                                <th>Created at</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                            foreach ($reviews as $rv) {
                                                                $user = $pdo->read("users", ['id' => $rv['user_id']]);
                                                                $food = $pdo->read("food", ['id' => $rv['food_id']]);

                                                                

                                                            ?>
                                            <tr>
                                                <td><?php echo $rv['id']; ?></td>
                                                <td><?php echo !empty($user[0]['username']) ? $user[0]['username'] : "unkown user"; ?>
                                                </td>
                                                <td><?php echo $rv['stars']; ?></td>
                                                <td><?php echo $food[0]['food_name']; ?></td>
                                                <td><?php echo $rv['described']; ?></td>
                                                <td><?php echo $rv['createdAt']; ?></td>
                                                <td>
                                                    
                                                    <a class="text-danger"
                                                        href="reviews.php?delete_category=<?php echo $rv['id']; ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <?php require_once 'assets/includes/footer.php'; ?>

            </div>
        </div>
    </div>


    <!-- Preview Setting Box -->
    <?php require_once 'assets/includes/settings-sidebar.php'; ?>
    <!-- Preview Setting -->
    <?php require_once 'assets/includes/javascript.php'; ?>
    <script>
    $(document).ready(function() {
        $('#example1').DataTable();
    });
    </script>

</body>

</html>