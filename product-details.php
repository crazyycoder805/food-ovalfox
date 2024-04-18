<!DOCTYPE html>
<html lang="zxx">

<?php require_once 'assets/includes/head.php'; ?>

<?php 

if (!isset($_GET['i'])) {
    header("location:index.php");
}
$food = $pdo->read("food", ['id'=> $_GET['i']]);
$food_categories = $pdo->read("food_categories", ['id' => $food[0]['food_category_id']]);
$food_tags = [["tag" => "no tag yet."]];
$foods = $pdo->customQuery("SELECT * FROM food LIMIT 0, 3");


$success = "";
$error = "";
if (isset($_POST['submit'])) {
    if (!empty($_POST['stars'])) {
        if ($pdo->create("reviews", ['food_id' => $_GET['i'], 'stars' => $_POST['stars'], 'described' => $_POST['described']])) {
            $success = "Review submited, auto refreshing...";
            $pdo->headTo("menu.php", 3000);
        } else {
            $error = "Something went wrong.";

        }
    } else {
        $error = "You must have to give atleast one star.";
    }
}

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
$stars = [];
$reviews = $pdo->read("reviews", ['food_id' => $_GET['i']]);
foreach ($reviews as $star) {
    $stars[] = $star['stars'];
}

if (isset($_GET['c'])) {
    if (isset($_SESSION['food_project_user_id'])) {
        if (!$pdo->isDataInserted("cart", ['food_id' => $_GET['c'], 'user_id' => $_SESSION['food_project_user_id']])) {
            if ($pdo->create("cart", ['food_id' => $_GET['c'], 'user_id' => $_SESSION['food_project_user_id']])) {
                $success = "Item carted.";
                $pdo->headTo("product-details.php?i={$_GET['i']}", 3000);
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
        if (!$pdo->isDataInserted("wishlist", ['food_id' => $_GET['w'], 'user_id' => $_SESSION['food_project_user_id']])) {
            if ($pdo->create("wishlist", ['food_id' => $_GET['w'], 'user_id' => $_SESSION['food_project_user_id']])) {
                $success = "Item wishlisted.";
                $pdo->headTo("product-details.php?i={$_GET['i']}", 3000);
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
                        <h1 class="text-anime">Perfect Pairings for Meal</h1>
                        <nav>
                            <ol class="breadcrumb wow fadeInUp" data-wow-delay="0.50s">
                                <li class="breadcrumb-item"><a href="#">John Doe</a></li>
                                <li class="breadcrumb-item active"><a href="#">March 17, 2024</a></li>
                                <li class="breadcrumb-item active"><a href="#">Restaurants</a></li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Blog Detail Page Start -->
    <div class="blog-detail-page">
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
                        <?php echo $error; ?>
                    </div>

                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <!-- Post Content Start -->
                    <div class="post-content wow fadeInUp" data-wow-delay="0.50s">
                        <!-- Post Feature Image Start -->
                        <div class="post-feature-img">
                            <img src="assets/images/post-single-1.jpg" alt="">
                        </div>
                        <!-- Post Feature Image End -->

                        <!-- Post Body Start -->
                        <div class="post-body">
                            <p>
                                <?php echo $food[0]['food_description']; ?>
                            </p>

                        </div>
                        <!-- Post Body End -->

                        <!-- Post Footer Start -->
                        <div class="post-footer">
                            <div class="footer-tag-links">
                                <h3>Tags:</h3>
                                <ul>
                                    <li><a href="#"><?php echo $food_tags[0]['tag']; ?></a></li>
                                </ul>
                            </div>

                            <div class="post-social-link">
                                <a href="#" class="social-link"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#" class="social-link"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#" class="social-link"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#" class="social-link"><i class="fa-brands fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <!-- Post Footer End -->

                    </div>

                    <div class="faq-accordion mt-4" id="accordion">
                        <!-- FAQ Item start -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Post a comment
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <div class="booking-form">
                                        <form id="bookingForm" method="POST" data-toggle="validator">
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-4">

                                                    <select name="stars" class="form-control" id="stars" required>
                                                        <option value="1">1</option>
                                                        <option value="1.5">1.5</option>

                                                        <option value="2">2</option>
                                                        <option value="2.5">2.5</option>

                                                        <option value="3">3</option>
                                                        <option value="3.5">3.5</option>

                                                        <option value="4">4</option>
                                                        <option value="4.5">4.5</option>

                                                        <option value="5">5</option>


                                                    </select>

                                                    <div class="help-block with-errors"></div>
                                                </div>




                                                <div class="form-group col-md-12 mb-4">
                                                    <textarea name="described" class="form-control" id="described"
                                                        rows="8" placeholder="Message"></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>

                                                <div class="col-md-12 button-group text-center">
                                                    <button type="submit" name="submit" class="btn-default">Submit
                                                        Now</button>
                                                    <div id="msgSubmit" class="h3 text-left hidden"></div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item end -->

                        <!-- FAQ Item start -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Customer reviews
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <?php 
                                    foreach ($reviews as $rev) {
                                        $user = $pdo->read("users", ['id' =>$rev['user_id']]);
                                    ?>
                                    <div class="border p-3 mb-3">
                                        <div class="d-flex flex-row align-items-center">
                                            <img src="assets/project/defaultuser.jpg" style="width: 70px;height: 70px;"
                                                class="img-thumbnail" alt="">
                                            &nbsp;&nbsp;&nbsp;
                                            <b><?php echo !empty($user[0]['username']) ? $user[0]['username'] : "anonymous"; ?></b>
                                            &nbsp;&nbsp;&nbsp;
                                            <?php $totalRating = calculateRating($stars);
                                    echo displayStarRating($totalRating); ?>
                                        </div>
                                        <p class="mt-3"><?php echo $rev['described']; ?></p>
                                    </div>

                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item end -->


                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <!-- Search Box Start -->
                    <div class="search-box wow fadeInUp" data-wow-delay="0.50s">
                        <h3>Rating:<?php $totalRating = calculateRating($stars);
                                    echo displayStarRating($totalRating) . " " . "($totalRating)"; ?>
                        </h3>
                        <h3>Product name: <?php echo $food[0]['food_name']; ?></h3>

                        <h3>Price: £<?php echo $food[0]['food_price']; ?></h3>
                        <h3>Category: <?php echo $food_categories[0]['category']; ?></h3>

                        <h3>Actions: <a href="product-details.php?i=<?php echo $_GET['i']; ?>&c=<?php echo $food[0]['id']; ?>" class="p-2"
                                style="font-size: 30px;color: grey;"><i class="fa fa-cart-plus"></i></a>


                            <a href="product-details.php?i=<?php echo $_GET['i']; ?>&w=<?php echo $food[0]['id']; ?>" class="p-2"
                                style="font-size: 30px;color: red;"><i class="fa fa-heart"></i></a>


                        </h3>

                    </div>
                    <!-- Search Box End -->

                    <!-- Category Section Start -->
                    <div class="category-section wow fadeInUp" data-wow-delay="0.75s">
                        <h3>Category</h3>
                        <ul>

                            <li><a href="#"><img src="assets/images/icon-fast-foods.svg"
                                        alt=""><?php echo $food_categories[0]['category']; ?></a></li>
                        </ul>
                    </div>
                    <!-- Category Section End -->

                    <!-- Recent Post Section start -->
                    <div class="recent-post-section wow fadeInUp" data-wow-delay="1.0s">
                        <h3>Recent Products</h3>
                        <div class="recent-post">

                            <?php 
                        foreach ($foods as $spf) {
                            $date = new DateTime($spf['created_at']);
                            $formattedDate = $date->format('F j, Y');
                        
                        ?>

                            <div class="post-item">
                                <div class="post-img">
                                    <a href="blog-details.html"><img src="assets/images/post-2.jpg" alt=""></a>
                                </div>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <ul>
                                            <li>
                                                <a href="#"><i
                                                        class="fa-regular fa-calendar-days"></i><?php echo $formattedDate; ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3><a href="blog-single.html"><?php echo $spf['food_name']; ?></a></h3>
                                </div>
                            </div>
                            <?php } ?>

                        </div>

                    </div>
                    <!-- Recent Post Section end -->

                    <!-- Tags Section Start -->
                    <div class="tags-section wow fadeInUp" data-wow-delay="1.0s">
                        <h3>Tags</h3>
                        <ul>

                            <li><a href="#"><?php echo $food_tags[0]['tag']; ?></a></li>




                        </ul>
                    </div>
                    <!-- Tags Section End -->
                </div>
            </div>
        </div>
    </div>


    <?php require_once 'assets/includes/footer.php'; ?>
    <?php require_once 'assets/includes/javascript.php'; ?>
</body>


</html>