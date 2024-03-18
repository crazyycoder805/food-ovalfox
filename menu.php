<!DOCTYPE html>
<html lang="zxx">
<?php require_once 'assets/includes/head.php'; ?>

<?php 
$food = $pdo->read("food");
$food_categories = $pdo->read("food_categories");
$success = "";
$error = "";

function calculateRating($ratings) {
    $totalRatings = count($ratings);
    $totalStars = array_sum($ratings);
    
    if ($totalRatings > 0) {
        $averageRating = $totalStars / $totalRatings;
        return number_format($averageRating, 1); // Format to have one decimal place
    } else {
        return 0; // If no ratings are given, return 0.
    }
}

function displayStarRating($rating) {
    $fullStars = floor($rating);
    $halfStar = $rating - $fullStars >= 0.5;
    $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);

    $output = '';

    // Full stars
    for ($i = 0; $i < $fullStars; $i++) {
        $output .= '<i style="color: #ffaa00;" class="fa fa-star"></i>';
    }

    // Half star
    if ($halfStar) {
        $output .= '<i style="color: #ffaa00;" class="fa fa-star-half"></i>';
    }

    // Empty stars
    for ($i = 0; $i < $emptyStars; $i++) {
        $output .= '<i style="color: #ffaa00;" class="far fa-star"></i>';
    }

    return $output;
}


if (isset($_GET['c'])) {
    if (isset($_SESSION['food_project_user_id'])) {
        if (!$pdo->isDataInserted("cart", ['food_id' => $_GET['c']])) {
            if ($pdo->create("cart", ['food_id' => $_GET['c'], 'user_id' => $_SESSION['food_project_user_id']])) {
                $success = "Item carted.";
                $pdo->headTo("menu.php", 3000);
            } else {
                $error = "Smoething went wrong";
            }
        } else {
            $error = "Item is already carted.";

        }
    } else {
        $error = "Please sign in to cart this item. <a href='login.php'>Sign in</a>";
    }
} else if (isset($_GET['w'])) {
    if (isset($_SESSION['food_project_user_id'])) {
        if (!$pdo->isDataInserted("wishlist", ['food_id' => $_GET['w']])) {
            if ($pdo->create("wishlist", ['food_id' => $_GET['w'], 'user_id' => $_SESSION['food_project_user_id']])) {
                $success = "Item wishlisted.";
                $pdo->headTo("menu.php", 3000);
            } else {
                $error = "Smoething went wrong";
            }
        } else {
            $error = "Item is already wishlisted.";

        }
    } else {
        $error = "Please sign in to wishlist this item. <a href='login.php'>Sign in</a>";
    }
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
                        <h1 class="text-anime">Menu</h1>
                        <nav>
                            <ol class="breadcrumb wow fadeInUp" data-wow-delay="0.50s">
                                <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                <li class="breadcrumb-item active">Menu</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Menu Page Start -->
    <div class="menu-page-section">
        <div class="container">
            <div class="row">
                <div class="col-md">
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
                        <?php if(is_string($error)){ echo $error;} else { foreach($error as $err){ echo $err . "<br />";}} ?>
                    </div>

                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                </div>

                <!-- Menu Dises Section Start -->
                <div class="col-lg-3 col-md-12">
                    <!-- Sidebar Menu Dises Nav start -->
                    <div class="menu-dises-nav wow fadeInLeft" data-wow-delay="0.75s">
                        <ul>
                            <?php 
                            foreach ($food_categories as $category) {
                               $category_foods = count($pdo->read("food", ['id' => $category['id']]));
                            ?>
                            <li><a href="#" data-filter=".<?php echo $category['category']; ?>">
                                    <img src="assets/images/icon-fast-foods.svg"
                                        alt=""><?php echo $category['category']; ?> (<span
                                        class="text-muted"><?php echo $category_foods; ?></span>)</a></li>
                            <?php } ?>


                        </ul>
                    </div>
                    <!-- Sidebar Menu Dises Nav end -->
                </div>


                <div class="col-lg-9 col-md-12">
                    <!-- Menu Item Box start -->
                    <div class="row menu-item-boxes wow fadeInUp" data-wow-delay="1.00s">
                        <!-- Breakfast Section start -->

                        <?php 
                            foreach ($food as $fd) {
                               $category = $pdo->read("food_categories", ['id' => $fd['food_category_id']]);
                            ?>
                        <div class="col-lg-4 col-md-6 menu-item-box breakfast <?php echo $category[0]['category']; ?>">
                            <div class="menu-item">
                                <!-- Menu Item Image start -->
                                <a href="product-details.php?i=<?php echo $fd['id']; ?>">
                                    <div class="menu-item-img">
                                        <figure class="image-anime">
                                            <img src="assets/images/menu-1.jpg" alt="">
                                        </figure>
                                    </div>
                                </a>
                                <!-- Menu Item Image start -->

                                <!-- Menu Item Body start -->
                                <div class="menu-item-body">
                                    <div class="rating-img">

                                        <?php 
                                    $stars = [];
                                    foreach ($pdo->read("reviews", ['food_id' => $fd['id']]) as $star) {
                                        $stars[] = $star['stars'];
                                    }
                                    $totalRating = calculateRating($stars);
                                    echo displayStarRating($totalRating) . " " . "($totalRating)";
                                    ?>

                                    </div>
                                    <h2>£<?php echo $fd['food_price']; ?></h2>
                                    <span class="text-muted"><?php echo $category[0]['category']; ?></span>

                                    <a href="product-details.php?i=<?php echo $fd['id']; ?>">
                                        <h3><?php echo $fd['food_name']; ?></h3>
                                    </a>
                                    <p>Sit amet, consectetur adipiscing elit maximus velit, non eleifend.</p>

                                    <div class="text-center">


                                        <a href="menu.php?c=<?php echo $fd['id']; ?>" class="p-2"
                                            style="font-size: 30px;color: grey;"><i class="fa fa-cart-plus"></i></a>


                                        <a href="menu.php?w=<?php echo $fd['id']; ?>" class="p-2"
                                            style="font-size: 30px;color: red;"><i class="fa fa-heart"></i></a>



                                        <a href="product-details.php?i=<?php echo $fd['id']; ?>" class="p-2"
                                            style="font-size: 30px;color: black;"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <!-- Menu Item Body end -->
                            </div>
                        </div>

                        <?php } ?>


                    </div>
                    <!-- Menu Item Box end -->
                </div>
                <!-- Menu Dises Section End -->
            </div>
        </div>
    </div>
    <!-- Most Popular Dises End -->




    <?php require_once 'assets/includes/footer.php'; ?>
    <?php require_once 'assets/includes/javascript.php'; ?>
</body>


</html>