<!DOCTYPE html>

<html lang="zxx">
<?php require_once 'assets/includes/head.php'; ?>
<?php

$success = "";
$error = "";
$id = "";

$food = $pdo->read("food");
$categories = $pdo->read("food_categories");
$variations = $pdo->read("food_variations");


$image_result = '';

if (isset($_POST['add_product_btn'])) {

        if (!empty($_POST['food_name']) && !empty($_POST['food_price']) && !empty($_POST['food_description'])
        && !empty($_POST['food_description'])  && !empty($_POST['food_category_id'])) {
            if (!$pdo->isDataInserted("food", ['food_name' => $_POST['food_name']])) {
                if (!empty($_FILES['image']['name'])) {
                    $image_result = $pdo2->upload('image', 'assets/food_project/food');
                        if ($image_result && $pdo->create("food", ['food_name' => $_POST['food_name'], 'food_price' => $_POST['food_price'], 
                        'food_description' => $_POST['food_description'], 'food_category_id' => $_POST['food_category_id'], 
                    'food_variation_id' => !empty($_POST['food_variation_id']) ? $_POST['food_variation_id'] : null,'image' => $image_result['filename']])) {
                        $success = "Product added.";
                                              header("Location:{$name}");

                    } else {
                        $error = "Something went wrong.";
                    }
                } else {
                    if ($pdo->create("food", ['food_name' => $_POST['food_name'], 'food_price' => $_POST['food_price'], 
                        'food_description' => $_POST['food_description'], 'food_category_id' => $_POST['food_category_id'], 
                    'food_variation_id' => !empty($_POST['food_variation_id']) ? $_POST['food_variation_id'] : null])) {
                        $success = "Product added.";
                                              header("Location:{$name}");

                    } else {
                        $error = "Something went wrong.";
                    }
                }
                
            } else {
                $error = "Product already added.";
            }
        } else {
            $error = "All fields must be filled.";
           
        }
    
} else if (isset($_POST['edit_product_btn'])) {
    if (!empty($_POST['food_name']) && !empty($_POST['food_price']) && !empty($_POST['food_description'])
    && !empty($_POST['food_description'])  && !empty($_POST['food_category_id'])) {
        if (!$pdo->isDataInsertedUpdate("food", ['food_name' => $_POST['food_name']])) {
            if (!empty($_FILES['image']['name'])) {
                $image_result = $pdo2->upload('image', 'assets/food_project/food');

                if ($image_result && $pdo->update("food", ['id' => $_GET['edit_product']], ['food_name' => $_POST['food_name'], 'food_price' => $_POST['food_price'], 
                        'food_description' => $_POST['food_description'], 'food_category_id' => $_POST['food_category_id'], 
                    'food_variation_id' => !empty($_POST['food_variation_id']) ? $_POST['food_variation_id'] : null,'image' => $image_result['filename']])) {
                    $success = "Product updated.";
                                          header("Location:{$name}");

                } else {
                    $error = "Something went wrong. or can't update this because no changes was found";
                }
            } else {
                if ($pdo->update("food", ['id' => $_GET['edit_product']], ['food_name' => $_POST['food_name'], 'food_price' => $_POST['food_price'], 
                'food_description' => $_POST['food_description'], 'food_category_id' => $_POST['food_category_id'], 
            'food_variation_id' => !empty($_POST['food_variation_id']) ? $_POST['food_variation_id'] : null])) {
                    $success = "Product updated.";
                                          header("Location:{$name}");

                } else {
                    $error = "Something went wrong. or can't update this because no changes was found";
                }
            }
        } else {
            $error = "Product already added.";
        }
    } else {
        $error = "All fields must be filled.";
    }
} else if (isset($_GET['delete_product'])) {
    if ($pdo->delete("food", $_GET['delete_product'])) {
        foreach ($pdo->read("cart", ['food_id' => $_GET['delete_product']]) as $fd) {
            $pdo->delete("cart", $_GET['delete_product'], 'food_id');
        }
        foreach ($pdo->read("wishlist", ['food_id' => $_GET['delete_product']]) as $fd) {
            $pdo->delete("wishlist", $_GET['delete_product'], 'food_id');
        }
        $success = "Product deleted.";
                              header("Location:{$name}");

    } else {
        $error = "Something went wrong.";
    }
}
if (isset($_GET['edit_product'])) {
    $id = $pdo->read("food", ['id' => $_GET['edit_product']]);
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
                                <h4 class="page-title">Product Form</h4>
                            </div>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-link">
                                        <a href="index.php"><i class="fas fa-home mr-2"></i>Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-link active">Product</li>
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
                                                        <label for="food_name" class="col-form-label">Food
                                                            Name</label>
                                                        <input
                                                            value="<?php echo isset($_GET['edit_product']) ? $id[0]['food_name'] : null; ?>"
                                                            class="form-control" name="food_name" type="text"
                                                            placeholder="Enter Food Name" id="food_name">
                                                    </div>
                                                </div>
                                                <div class="col-md">

                                                    <div class="form-group">
                                                        <label for="food_price" class="col-form-label">Food Price</label>
                                                        <input
                                                            value="<?php echo isset($_GET['edit_product']) ? $id[0]['food_price'] : null; ?>"
                                                            class="form-control" name="food_price" type="number"
                                                            placeholder="Enter Food Price" id="food_price">
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="image" class="col-form-label">Product</label>
                                                        <input class="form-control" name="image" type="file" id="image">

                                                        <?php 
                                                            if (isset($_GET['edit_product'])) {
                                                            ?>
                                                        Previous image:
                                                        <br />
                                                        <img width="100" height="100"
                                                            src="assets/food_project/food/<?php echo $id[0]['image']; ?>"
                                                            alt="" />
                                                        <?php } ?>
                                                    </div>
                                                </div>








                                            </div>
                                            <div class="row">
                                                <div class="col-md">

                                                    <div class="form-group s-opt">
                                                        <label for="food_category_id"
                                                            class="col-form-label">Category</label>
                                                        <select class="select2 form-control select-opt"
                                                            name="food_category_id" id="food_category_id">
                                                            <?php
        foreach ($categories as $category) {


        ?>
                                                            <option
                                                                <?php echo isset($_GET['edit_product']) && $id[0]['food_category_id'] == $category['id'] ? "selected" : null; ?>
                                                                value="<?php echo $category['id']; ?>">
                                                                <?php echo $category['category']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <span class="sel_arrow">
                                                            <i class="fa fa-angle-down "></i>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="col-md">

                                                    <div class="form-group s-opt">
                                                        <label for="food_variation_id"
                                                            class="col-form-label">Variaton</label>



                                                        <select class="select2 form-control select-opt"
                                                            name="food_variation_id" id="food_variation_id">
                                                            <option selected></option>
                                                            <?php
foreach ($variations as $vr) {
   


?>
                                                            <option
                                                                <?php echo isset($_GET['edit_product']) && $id[0]['food_variation_id'] == $vr['id'] ? "selected" : null; ?>
                                                                value="<?php echo $vr['id']; ?>">
                                                                <?php echo $vr['variation']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <span class="sel_arrow">
                                                            <i class="fa fa-angle-down "></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label for="food_description" class="col-form-label">Food
                                                            details</label>
                                                        <textarea class="form-control" placeholder="Food Details"
                                                            name="food_description"
                                                            id="food_description"><?php echo isset($_GET['edit_product']) ? $id[0]['food_description'] : null; ?></textarea>
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
                                                        <th>Food name</th>
                                                        <th>Food price</th>
                                                        <th>Food Description</th>
                                                        <th>Food image</th>
                                                        <th>Food category</th>
                                                        <th>Food variation</th>

                                                        <th>Created at</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                            foreach ($food as $product) {
                                                                $category = $pdo->read("food_categories", ['id' => $product['food_category_id']]);
                                                                $variation = $pdo->read("food_variations", ['id' => $product['food_variation_id']]);

                                                                

                                                            ?>
                                                    <tr>
                                                        <td><?php echo $product['id']; ?></td>
                                                        <td><?php echo $product['food_name']; ?></td>
                                                        <td><?php echo $product['food_price']; ?></td>
                                                        <td><?php echo $product['food_description']; ?></td>

                                                        <td><img width="100" height="50"
                                                                src="assets/food_project/food/<?php echo $product['image']; ?>"
                                                                alt="" /></td>
                                                        <td><?php echo $category[0]['category']; ?></td>
                                                        <td><?php echo !empty($variation[0]['variation']) ? $variation[0]['variation'] : "No variation."; ?></td>


                                                        <td><?php echo $product['created_at']; ?></td>
                                                        <td>
                                                            <a class="text-success"
                                                                href="food.php?edit_product=<?php echo $product['id']; ?>">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            &nbsp;&nbsp;&nbsp;
                                                            <a class="text-danger"
                                                                href="food.php?delete_product=<?php echo $product['id']; ?>">
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