<!DOCTYPE html>

<html lang="zxx">
<?php require_once 'assets/includes/head.php'; ?>
<?php



$success = "";
$error = "";
$id = "";

$categories = $pdo->read("food_categories");


if (isset($_POST['add_category_btn'])) {
    if (!empty($_POST['category'])) {
        if (!$pdo->isDataInserted("food_categories", ['category' => $_POST['category']])) {
           
                if ($pdo->create("food_categories", ['category' => $_POST['category']])) {
                    $success = "Category added.";
                                 header("Location:{$name}");
                } else {
                    $error = "Something went wrong.";
                }
            
            
        } else {
            $error = "Category already added.";
        }
    } else {
        $error = "Category name must be filled.";
    }
} else if (isset($_POST['edit_category_btn'])) {
    if (!empty($_POST['category'])) {
        if (!$pdo->isDataInsertedUpdate("food_categories", ['category' => $_POST['category']])) {
            
                if ($pdo->update("food_categories", ['id' => $_GET['edit_category']], ['category' => $_POST['category']])) {
                    $success = "Category updated.";
                                 header("Location:{$name}");
                } else {
                    $error = "Something went wrong. or can't update this because no changes was found";
                }
                
            
        } else {
            $error = "Category already added.";
        }
    } else {
        $error = "Category name must be filled.";
    }
} else if (isset($_GET['delete_category'])) {
    if ($pdo->delete("food_categories", $_GET['delete_category'])) {
        $success = "Category deleted.";
                     header("Location:{$name}");
    } else {
        $error = "Something went wrong.";
    }
}
if (isset($_GET['edit_category'])) {
    $id = $pdo->read("food_categories", ['id' => $_GET['edit_category']]);
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
                                <h4 class="page-title">Category Form</h4>
                            </div>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-link">
                                        <a href="index.php"><i class="fas fa-home mr-2"></i>Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-link active">Category</li>
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
                                                        <label for="category" class="col-form-label">Category</label>
                                                        <input
                                                            value="<?php echo isset($_GET['edit_category']) ? $id[0]['category'] : null; ?>"
                                                            class="form-control" name="category" type="text"
                                                            placeholder="Enter Category Name" id="category">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <button class="btn btn-primary" type="reset">reset</button>
                                                        <input
                                                            name="<?php echo isset($_GET['edit_category']) ? "edit_category_btn" : "add_category_btn"; ?>"
                                                            class="btn btn-danger" type="submit">
                                                    </div>
                                                    <table id="categoryTable"
                                                        class="table table-striped table-bordered dt-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Category name</th>

                                                                <th>Created at</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($categories as $category) {


                                                            ?>
                                                            <tr>
                                                                <td><?php echo $category['id']; ?></td>
                                                                
                                                                <td><?php echo $category['category']; ?></td>

                                                                <td><?php echo $category['createdAt']; ?></td>
                                                                <td>
                                                                    <a class="text-success"
                                                                        href="categories.php?edit_category=<?php echo $category['id']; ?>">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    <a class="text-danger"
                                                                        href="categories.php?delete_category=<?php echo $category['id']; ?>">
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
        $('#categoryTable').DataTable();
        $('#subcategory').DataTable();
    });
    </script>

</body>

</html>