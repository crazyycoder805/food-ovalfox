<!DOCTYPE html>

<html lang="zxx">
<?php require_once 'assets/includes/head.php'; ?>
<?php

$success = "";
$error = "";
$id = "";



$cuppons = $pdo->read("cuppons");
if (isset($_POST['add_product_btn'])) {

        if (!empty($_POST['cuppon_code']) && !empty($_POST['cuppon_limit']) && !empty($_POST['discount'])
        && !empty($_POST['expiry'])) {
            if (!$pdo->isDataInserted("cuppons", ['cuppon_code' => $_POST['cuppon_code']])) {
                
                if ($pdo->create("cuppons", ['cuppon_code' => $_POST['cuppon_code'], 'cuppon_limit' => $_POST['cuppon_limit'], 
                    'discount' => $_POST['discount'], 'expiry' => $_POST['expiry']])) {
                    $success = "Cuppon added.";
                                            header("Location:{$name}");

                } else {
                    $error = "Something went wrong.";
                }
                
                
            } else {
                $error = "Cuppon already added.";
            }
        } else {
            $error = "All fields must be filled.";
           
        }
    
} else if (isset($_POST['edit_product_btn'])) {
    if (!empty($_POST['cuppon_code']) && !empty($_POST['cuppon_limit']) && !empty($_POST['discount'])
        && !empty($_POST['expiry'])) {
        if (!$pdo->isDataInsertedUpdate("cuppons", ['cuppon_code' => $_POST['cuppon_code']])) {
            
            if ($pdo->update("cuppons", ['id' => $_GET['edit_product']],['cuppon_code' => $_POST['cuppon_code'], 'cuppon_limit' => $_POST['cuppon_limit'], 
            'discount' => $_POST['discount'], 'expiry' => $_POST['expiry']])) {
                $success = "Product updated.";
                                        header("Location:{$name}");

            } else {
                $error = "Something went wrong. or can't update this because no changes was found";
            }
            
        } else {
            $error = "Cuppon already added.";
        }
    } else {
        $error = "All fields must be filled.";
    }
} else if (isset($_GET['delete_product'])) {
    if ($pdo->delete("cuppons", $_GET['delete_product'])) {
        $success = "Product deleted.";
                              header("Location:{$name}");

    } else {
        $error = "Something went wrong.";
    }
}
if (isset($_GET['edit_product'])) {
    $id = $pdo->read("cuppons", ['id' => $_GET['edit_product']]);
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
                                <h4 class="page-title">Cuppons Form</h4>
                            </div>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-link">
                                        <a href="index.php"><i class="fas fa-home mr-2"></i>Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-link active">Cuppons</li>
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

                                    <form class="separate-form" method="post" enctype="multipart/form-data">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="row">

                                                <div class="col-md">

                                                    <div class="form-group">
                                                        <label for="cuppon_code" class="col-form-label">Cuppon
                                                            code</label>
                                                        <input
                                                            value="<?php echo isset($_GET['edit_product']) ? $id[0]['cuppon_code'] : null; ?>"
                                                            class="form-control" name="cuppon_code" type="text"
                                                            placeholder="Enter Cuppon Code" id="cuppon_code">
                                                    </div>
                                                </div>

                                                <div class="col-md">

                                                    <div class="form-group">
                                                        <label for="cuppon_limit" class="col-form-label">Cuppon
                                                            code</label>
                                                        <input
                                                            value="<?php echo isset($_GET['edit_product']) ? $id[0]['cuppon_limit'] : null; ?>"
                                                            class="form-control" name="cuppon_limit" type="number"
                                                            placeholder="Enter Cuppon Limit" id="cuppon_limit">
                                                    </div>
                                                </div>


                                                <div class="col-md">

                                                    <div class="form-group">
                                                        <label for="discount" class="col-form-label">Discount</label>
                                                        <input
                                                            value="<?php echo isset($_GET['edit_product']) ? $id[0]['discount'] : null; ?>"
                                                            class="form-control" name="discount" type="number"
                                                            placeholder="Enter Cuppon Discount" id="discount">
                                                    </div>
                                                </div>




                                            </div>

                                            <div class="row">
                                                <div class="col-md">

                                                    <div class="form-group">
                                                        <label for="expiry" class="col-form-label">Cuppon expiry</label>
                                                        <input
                                                            value="<?php echo isset($_GET['edit_product']) ? $id[0]['expiry'] : null; ?>"
                                                            class="form-control" name="expiry" type="date"
                                                            placeholder="Enter Cuppon expiry" id="expiry">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group mb-3">
                                                        <button class="btn btn-primary" type="reset">reset</button>
                                                        <input
                                                            name="<?php echo isset($_GET['edit_product']) ? "edit_product_btn" : "add_product_btn"; ?>"
                                                            class="btn btn-danger" type="submit">
                                                    </div>
                                                </div>
                                            </div>
                                            <table id="example1"
                                                class="table table-striped table-bordered dt-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Cuppon code</th>
                                                        <th>Cuppon Limit</th>
                                                        <th>Limit used</th>
                                                        <th>Used By</th>
                                                        <th>Discount</th>
                                                        <th>Expiry</th>

                                                        <th>Created at</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                            foreach ($cuppons as $cp) {
                                                                $user = $pdo->read("users", ['id' => $cp['user_id']]);

                                                                

                                                            ?>
                                                    <tr>
                                                        <td><?php echo $cp['id']; ?></td>
                                                        <td><?php echo $cp['cuppon_code']; ?></td>
                                                        <td><?php echo $cp['cuppon_limit']; ?></td>
                                                        <td><?php echo $cp['limit_used']; ?></td>


                                                        <td><?php echo !empty($user[0]['username']) ? $user[0]['username'] : "no user haved used this yet."; ?></td>
                                                        <td><?php echo $cp['discount']; ?>
                                                        </td>
                                                        <td><?php echo $cp['expiry']; ?>
                                                        </td>

                                                        <td><?php echo $cp['createdAt']; ?></td>
                                                        <td>
                                                            <a class="text-success"
                                                                href="cuppons.php?edit_product=<?php echo $cp['id']; ?>">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            &nbsp;&nbsp;&nbsp;
                                                            <a class="text-danger"
                                                                href="cuppons.php?delete_product=<?php echo $cp['id']; ?>">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </td>

                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <div class="form-group mb-3">

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
        $('#example1').DataTable();
    });
    </script>

</body>

</html>