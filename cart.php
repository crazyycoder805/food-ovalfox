<!DOCTYPE html>
<html lang="zxx">
<?php require_once 'assets/includes/head.php';require_once 'assets/includes/config.php'; ?>

<?php 

$cart_items = [];


if (isset($_SESSION['food_project_username'])) {
    $cart_items = $pdo->read("cart", ['user_id' => $_SESSION['food_project_user_id']]);
}

if (isset($_GET['dc'])) {
    if ($pdo->delete("cart", $_GET['dc'])) {
        $success = "Cart item deleted, auto refreshing...";
        $pdo->headTo("cart.php", 3500);
    } else {
        $error = "Something went wrong.";
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
                        <h1 class="text-anime">Gallery</h1>
                        <nav>
                            <ol class="breadcrumb wow fadeInUp" data-wow-delay="0.50s">
                                <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
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
                            <tr class="text-center">
                                <th>Product name</th>
                                <th>Unit price</th>
                                <th>Product quantity</th>
                                <th>Total</th>

                                <th>Date addded</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($cart_items as $item) {
                                $food = $pdo->read("food", ['id' => $item['food_id']]);
                                $totalPrice = [];
                                foreach ($food as $sf) {
                                    $totalPrice[] = $sf['food_price'];
                                }
                                $totalPrice = array_sum($totalPrice);
                            ?>
                            <tr class="text-center">
                                <td><?php echo $food[0]['food_name']; ?></td>
                                <td>£<?php echo $food[0]['food_price']; ?></td>
                                <td><input id="item_total_input" name="item_total_input"
                                        data-foodprice="<?php echo  $food[0]['food_price']; ?>"
                                        data-i="<?php echo  $food[0]['id']; ?>" class="text-center" value="1"
                                        style="width: 100px;" type="number"></td>
                                <td>£<span
                                        id="total-item-price<?php echo $food[0]['id']; ?>"><?php echo $food[0]['food_price']; ?></span>
                                </td>

                                <td><?php echo $food[0]['created_at']; ?></td>
                                <td><a style="color: red;" href="cart.php?dc=<?php echo $item['id']; ?>"><i
                                            class="fa fa-trash"></i></a></td>

                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="row mt-4 justify-content-end">
                <div class="col-md-6">
                    <h3>Car Totals</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>Cart Subtotal</th>
                                <td>£<?php echo $totalPrice; ?></td>

                            </tr>
                            <tr class="text-center">
                                <th>Discount</th>
                                <td>£<span id="discount">0</span>
                                    <form method="post"><input name="cuppon_code" id="cuppon_code"
                                            placeholder="Enter Cuppon Code" type="text" /><button type="submit"
                                            style="border-radius: 0px;" class="btn btn-sm btn-danger">Apply
                                            cuppon</button></form>
                                </td>

                            </tr>
                            <tr class="text-center">
                                <th>Total</th>
                                <td>£<span id="discounted_total"><?php echo $totalPrice; ?></span></td>

                            </tr>
                            <tr class="text-center">
                                <th>Vat</th>
                                <td>£<span>3.20</span></td>

                            </tr>
                            <tr class="text-center">
                                <th>Vat</th>
                                <td>£<span>2.50</span></td>

                            </tr>
                            <tr class="text-center">
                                <th>Final amount</th>
                                <td>£<span class="text-success" id="final_amount"><?php echo ceil(($totalPrice + 3.20 + 2.50) * 100) / 100; ?></span></td>

                            </tr>
                            
                            <tr class="text-center">
                                <th>Pay with</th>
                                <td>
                                    <form action="submit.php" method="post">
                                        <script id="stripePayment" src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="<?php echo $publishableKey?>" data-amount="<?php echo ceil(($totalPrice + 3.20 + 2.50) * 100); ?>"
                                            data-name="Sweet Delight"
                                            data-description="Sweet Delight a best restaurent where you can imagine any taste you want"
                                            data-image="https://www.logostack.com/wp-content/uploads/designers/eclipse42/small-panda-01-600x420.jpg"
                                            data-currency="gbp" data-email="<?php echo $_SESSION['food_project_email'] ?>">
                                        </script>

                                    </form>
                                    
                                    
                                    <button class="btn m-3 btn-primary">Paypal</button>
                                </td>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <?php } else { ?>
            <div class="row">
                <div class="col-md">
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-bs-dismiss="alert">&times;</button>
                        Sign in to view cart items. <a href="login.php">Sign in</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- Gallery Page End -->


    <?php require_once 'assets/includes/footer.php'; ?>
    <?php require_once 'assets/includes/javascript.php'; ?>
    <script>
    $(function() {
        let totalAmount = 0;
        $(document).on("change", "#item_total_input", e => {
            let i = $(e.target).data("i");
            let food_price = $(e.target).data("foodprice");
            let inputValue = +$(e.target).val();
            if (inputValue <= 0) {
                inputValue = 1;
                $(e.target).val(inputValue);
            }

            $(`#total-item-price${i}`).text(inputValue * +food_price);
            totalAmount += inputValue * +food_price;
            $("#discounted_total").text(totalAmount);
        });
    });
    </script>
</body>


</html>