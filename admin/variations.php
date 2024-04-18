<!DOCTYPE html>

<html lang="zxx">
<?php require_once 'assets/includes/head.php'; ?>
<?php



$success = "";
$error = "";
$id = "";

$variations = $pdo->read("food_variations");


if (isset($_POST['add_variation_btn'])) {
    if (!empty($_POST['variation'])) {
        if (!$pdo->isDataInserted("food_variations", ['variation' => $_POST['variation']])) {
           
                if ($pdo->create("food_variations", ['variation' => $_POST['variation']])) {
                    $success = "variation added.";
                                 header("Location:{$name}");
                } else {
                    $error = "Something went wrong.";
                }
            
            
        } else {
            $error = "variation already added.";
        }
    } else {
        $error = "variation name must be filled.";
    }
} else if (isset($_POST['edit_variation_btn'])) {
    if (!empty($_POST['variation'])) {
        if (!$pdo->isDataInsertedUpdate("food_variations", ['variation' => $_POST['variation']])) {
            
                if ($pdo->update("food_variations", ['id' => $_GET['edit_variation']], ['variation' => $_POST['variation']])) {
                    $success = "variation updated.";
                                 header("Location:{$name}");
                } else {
                    $error = "Something went wrong. or can't update this because no changes was found";
                }
                
            
        } else {
            $error = "variation already added.";
        }
    } else {
        $error = "variation name must be filled.";
    }
} else if (isset($_GET['delete_variation'])) {
    if ($pdo->delete("food_variations", $_GET['delete_variation'])) {
        $success = "variation deleted.";
                     header("Location:{$name}");
    } else {
        $error = "Something went wrong.";
    }
}
if (isset($_GET['edit_variation'])) {
    $id = $pdo->read("food_variations", ['id' => $_GET['edit_variation']]);
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
                                <h4 class="page-title">variation Form</h4>
                            </div>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-link">
                                        <a href="index.php"><i class="fas fa-home mr-2"></i>Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-link active">variation</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- From Start -->
                <div class="from-wrapper">
                    <div class="row">

                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">

                                <div class="card-body">

                                    <form class="separate-form" method="post" enctype="multipart/form-data">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="row">
                                                <div class="col-md">
                                                    
                                                    <div class="form-group">
                                                        <label for="variation" class="col-form-label">variation</label>
                                                        <input
                                                            value="<?php echo isset($_GET['edit_variation']) ? $id[0]['variation'] : null; ?>"
                                                            class="form-control" name="variation" type="text"
                                                            placeholder="Enter variation Name" id="variation">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <button class="btn btn-primary" type="reset">reset</button>
                                                        <input
                                                            name="<?php echo isset($_GET['edit_variation']) ? "edit_variation_btn" : "add_variation_btn"; ?>"
                                                            class="btn btn-danger" type="submit">
                                                    </div>
                                                    <table id="variationTable"
                                                        class="table table-striped table-bordered dt-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>variation name</th>

                                                                <th>Created at</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($variations as $variation) {


                                                            ?>
                                                            <tr>
                                                                <td><?php echo $variation['id']; ?></td>
                                                                
                                                                <td><?php echo $variation['variation']; ?></td>

                                                                <td><?php echo $variation['createdAt']; ?></td>
                                                                <td>
                                                                    <a class="text-success"
                                                                        href="variations.php?edit_variation=<?php echo $variation['id']; ?>">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    <a class="text-danger"
                                                                        href="variations.php?delete_variation=<?php echo $variation['id']; ?>">
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

                                    </form>
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
        $('#variationTable').DataTable();
        $('#subvariation').DataTable();
    });
    </script>

</body>

</html>