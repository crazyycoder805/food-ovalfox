<!DOCTYPE html>
<html lang="zxx">
<?php require_once 'assets/includes/head.php'; ?>

<?php 

$wishlist_items = [];


if (isset($_SESSION['food_project_username'])) {
    $wishlist_items = $pdo->read("wishlist", ['user_id' => $_SESSION['food_project_user_id']]);

    
}
?>

<body class="tt-magic-cursor goto-top">
    <?php 
	require_once 'assets/includes/preloader.php';
	?>
    <?php 
	require_once 'assets/includes/navbar.php';
	?>


    <!-- Page Header Start -->
    <div class="page-header parallaxie">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Page Header Box start -->
                    <div class="page-header-box">
                        <h1 class="text-anime">Gallery</h1>
                        <nav>
                            <ol class="breadcrumb wow fadeInUp" data-wow-delay="0.50s">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Gallery</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Gallery Page Start -->
    <div class="gallery-page">
        <div class="container">
            <?php 
                if (isset($_SESSION['food_project_username'])) {
                ?>
            <div class="row">
                <div class="col-md">
                    <div class="alert alert-info fade show">
                        Quantity of every single item can be increased while checking out.
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12 wow fadeInUp" data-wow-delay="0.50s">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product name</th>
                                <th>Unit price</th>
                                <th>Date addded</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($wishlist_items as $item) {
                                $food = $pdo->read("food", ['id' => $item['food_id']]);
                            
                            ?>
                            <tr>
                                <td><?php echo $food[0]['food_name']; ?></td>
                                <td><?php echo $food[0]['food_price']; ?></td>
                                <td><?php echo $item['createdAt']; ?></td>
                                <td><a href="menu.php?c=<?php echo $food[0]['id']; ?>">Add to cart</a> | <a href="menu.php?r=<?php echo $food[0]['id']; ?>">Remove</a></td>

                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <?php } else { ?>
            <div class="row">
                <div class="col-md">
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-bs-dismiss="alert">&times;</button>
                        Sign in to view wishlist items. <a href="login.php">Sign in</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- Gallery Page End -->


    <?php require_once 'assets/includes/footer.php'; ?>
    <?php require_once 'assets/includes/javascript.php'; ?>
</body>


</html>