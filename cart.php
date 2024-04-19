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

if (isset($_POST['cuppon_code'])) {
    if (!empty($_POST['cuppon_code'])) {
        $cuppon = $pdo->read("cuppons", ['cuppon_code' => $_POST['cuppon_code']]);
        if (!empty($cuppon)) {
            if ($cuppon[0]['limit_used'] <= $cuppon[0]['cuppon_limit']) {
                if ($pdo->update("cuppons", ['id' => $cuppon[0]['id']], ['limit_used' => $cuppon[0]['limit_used'] + 1])) {
                    $success = "Cuppon code applied. got {$cuppon[0]['discount']}% discount, limit {$cuppon[0]['limit_used']} out of {$cuppon[0]['cuppon_limit']} used, auto refreshing...";
                    $_SESSION['food_project_cuppon_discount'] = $cuppon[0]['discount'];
                    $pdo->headTo("cart.php", 6000);
    
                } else {
                    $error = "Something went wrong.";

                }
            } else {
                $error = "Cuppon limit is already used.";
            }
            
        } else {
            $error = "Cuppon code is invalid.";
        }
    } else {
        $error = "Please enter the cuppon code.";
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
                            $totalPriceAfterSum = 0;
                            $totalPrice = [];
                            foreach ($cart_items as $item) {
                                $food = $pdo->read("food", ['id' => $item['food_id']]);

                                foreach ($food as $sf) {
                                    $totalPrice[] = $sf['food_price'];
                                }
                            ?>
                            <tr class="text-center" id="target-table">
                                <td class="fn"><?php echo $food[0]['food_name']; ?></td>
                                <td>£<span class="fp"><?php echo $food[0]['food_price']; ?></span></td>
                                <td><input id="item_total_input" name="item_total_input"
                                        data-foodprice="<?php echo  $food[0]['food_price']; ?>"
                                        data-i="<?php echo  $food[0]['id']; ?>" class="text-center ftq" value="1"
                                        style="width: 100px;" type="number"></td>
                                <td class="target-td">£<span id="total-item-price<?php echo $food[0]['id']; ?>"
                                        class="itemwise-total ftp"><?php echo $food[0]['food_price']; ?></span>
                                </td>

                                <td><?php echo $food[0]['created_at']; ?></td>
                                <td><a style="color: red;" href="cart.php?dc=<?php echo $item['id']; ?>"><i
                                            class="fa fa-trash"></i></a></td>

                            </tr>
                            <?php } 
                                                            $totalPriceAfterSum = array_sum($totalPrice);

                            ?>
                        </tbody>
                    </table>

                    <?php } ?>
                </div>
            </div>
            <?php 
                if (isset($_SESSION['food_project_username'])) {
                ?>
            <div class="row mt-4 justify-content-end">
                <div class="col-md-6">
                    <h3>Car Totals</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>Cart Subtotal</th>
                                <td>£<span id="sub-total"><?php echo $totalPriceAfterSum; ?></span></td>

                            </tr>
                            <tr class="text-center">
                                <th>Discount</th>
                                <td>£<span
                                        id="discount"><?php echo isset($_SESSION['food_project_cuppon_discount']) && !empty($_SESSION['food_project_cuppon_discount']) ? $_SESSION['food_project_cuppon_discount'] : 0 ?></span>
                                    <form method="post"><input name="cuppon_code" id="cuppon_code"
                                            placeholder="Enter Cuppon Code" type="text" /><button type="submit"
                                            style="border-radius: 0px;" class="btn btn-sm btn-danger">Apply
                                            cuppon</button></form>
                                </td>

                            </tr>
                            <tr class="text-center">
                                <th>Total</th>
                                <td>£<span id="discounted_total"><?php echo $totalPriceAfterSum; ?></span></td>

                            </tr>
                            <tr class="text-center">
                                <th>Vat</th>
                                <td>£<span>3.20</span></td>

                            </tr>
                            <tr class="text-center">
                                <th>Delivery charges</th>
                                <td>£<span>2.50</span></td>

                            </tr>
                            <tr class="text-center">
                                <th>Final amount</th>
                                <td>£<span class="text-success"
                                        id="final_amount"><?php echo isset($_SESSION['food_project_cuppon_discount']) && !empty($_SESSION['food_project_cuppon_discount']) ? (ceil(($totalPriceAfterSum + 3.20 + 2.50) * 100) / 100) - $_SESSION['food_project_cuppon_discount'] :ceil(($totalPriceAfterSum + 3.20 + 2.50) * 100) / 100; ?></span>
                                </td>

                            </tr>

                            <tr class="text-center">
                                <th>Pay with</th>
                                <td>

                                    <select class="form-control" name="pay_with_dd" id="pay_with_dd">
                                        <option value="cod">Cash on delivery</option>
                                        <option value="stripe">Stripe</option>

                                    </select>
                                    <br />
                                    <div id="payment-btn-stripe" hidden>
                                        <form action="submit.php" method="post">

                                            <script id="stripePayment" src="https://checkout.stripe.com/checkout.js"
                                                class="stripe-button" data-key="<?php echo $publishableKey?>"
                                                data-amount="<?php echo ceil(($totalPriceAfterSum + 3.20 + 2.50) * 100); ?>"
                                                data-name="Sweet Delight"
                                                data-description="Sweet Delight a best restaurent where you can imagine any taste you want"
                                                data-image="https://www.logostack.com/wp-content/uploads/designers/eclipse42/small-panda-01-600x420.jpg"
                                                data-currency="gbp"
                                                data-email="<?php echo $_SESSION['food_project_email'] ?>">
                                            </script>
                                            </script>
                                            <input hidden type="text" name="pay_with" value="stripe" class="pay_with" />
                                            <input hidden type="text"
                                                value="<?php echo ceil(($totalPriceAfterSum + 3.20 + 2.50) * 100); ?>"
                                                name="total_final_amount" class="total_final_amount">

                                            <input hidden type="text"
                                                value="<?php echo ceil(($totalPriceAfterSum + 3.20 + 2.50) * 100) - isset($_SESSION['food_project_cuppon_discount']) && !empty($_SESSION['food_project_cuppon_discount']) ? - $_SESSION['food_project_cuppon_discount'] : 0; ?>"
                                                name="discounted_amount_input" class="discounted_amount_input">
                                            <input hidden name="sub-total-input" class="sub-total-input" type="text"
                                                value="<?php  echo $totalPriceAfterSum; ?>">

                                            <div hidden class="all-inputs"></div>

                                        </form>

                                    </div>

                                    <div id="cod">
                                        <form action="submit.php" method="post">

                                            <button type="submit" class="btn btn-primary btn-sm">Pay</button>
                                            <input hidden type="text"
                                                value="<?php echo ceil(($totalPriceAfterSum + 3.20 + 2.50) * 100); ?>"
                                                name="total_final_amount" class="total_final_amount">
                                            <input hidden type="text" name="pay_with" value="cod" class="pay_with" />
                                            <input hidden type="text"
                                                value="<?php echo ceil(($totalPriceAfterSum + 3.20 + 2.50) * 100) - isset($_SESSION['food_project_cuppon_discount']) && !empty($_SESSION['food_project_cuppon_discount']) ? - $_SESSION['food_project_cuppon_discount'] : 0; ?>"
                                                name="discounted_amount_input" class="discounted_amount_input">
                                            <input hidden name="sub-total-input" class="sub-total-input" type="text"
                                                value="<?php  echo $totalPriceAfterSum; ?>">
                                            <div hidden class="all-inputs"></div>

                                        </form>

                                    </div>

                                    <?php 
              
                    foreach ($cart_items as $item) {
                        $food = $pdo->read("food", ['id' => $item['food_id']]);

                        foreach ($food as $sf) {
                            $totalPrice[] = $sf['food_price'];
                        }
                    
                    ?>



                                    <?php } ?>





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
    let foods = [];

    $(".fn").each((i, ele) => {
        let food = {
            food_name: ele.textContent,
            food_price: $(".fp")[i].textContent,
            food_total_quantity: $(".ftq")[i].value,
            food_total_price: $(".ftp")[i].textContent
        };
        foods.push(food);
    });


    $('.all-inputs').each((i, ele) => {
        foods.forEach((food, index) => {
            index += 1;

            $(ele).append(`
            <input type="text" id="food_name_${index}" name="food_name_${index}" value="${food.food_name}">
            <input type="text" id="food_price_${index}" name="food_price_${index}" value="${food.food_price}">
            <input type="text" id="food_total_quantity_${index}" name="food_total_quantity_${index}" value="${food.food_total_quantity}">
            <input type="text" id="food_total_price_${index}" name="food_total_price_${index}" value="${food.food_total_price}">
        `);
        });
    });
    $(document).on("change", "#item_total_input", e => {

        let totalAmount = 0;
        let finalAmount = 0;

        let i = $(e.target).data("i");
        let food_price = $(e.target).data("foodprice");
        let inputValue = +$(e.target).val();
        if (inputValue <= 0) {
            inputValue = 1;
            $(e.target).val(inputValue);
        }
        totalAmount = +inputValue * +food_price;


        $(`#total-item-price${i}`).text(totalAmount);


        let arrTotal = [];
        $(".target-td").find(".itemwise-total").each((inx, ele) =>
            arrTotal.push(+$(ele).text()));
        let sum = arrTotal.reduce(function(accumulator, currentValue) {
            return accumulator + currentValue;
        }, 0);
        $("#sub-total").text(sum);
        $(".sub-total-input").val(sum);

        finalAmount = (Math.ceil((sum + 3.20 +
            2.50) * 100) / 100);

        <?php 
        if (isset($_SESSION['food_project_cuppon_discount']) && !empty($_SESSION['food_project_cuppon_discount'])) { ?>
        finalAmount -= <?php echo $_SESSION['food_project_cuppon_discount']; ?>;
        <?php } ?>
        $("#discounted_total").text(sum - +
            <?php echo !empty($_SESSION['food_project_cuppon_discount']) && isset($_SESSION['food_project_cuppon_discount']) ? $_SESSION['food_project_cuppon_discount'] : 0; ?>
        );
        $(".discounted_amount_input").val(sum - +
            <?php echo !empty($_SESSION['food_project_cuppon_discount']) && isset($_SESSION['food_project_cuppon_discount']) ? $_SESSION['food_project_cuppon_discount'] : 0; ?>
        );

        $("#final_amount").text(finalAmount);
        $(".total_final_amount").each((i, el) => {
            $(el).val(finalAmount);
        });

        $("#stripePayment").data("amount", finalAmount);
        $("#stripe_payment_amount_input").val(finalAmount);
        $("#payment-btn-stripe").html(
            `<script id="stripePayment" src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo $publishableKey; ?>" data-amount="${finalAmount * 100}" data-name="Sweet Delight" data-description="Sweet Delight a best restaurent where you can imagine any taste you want" data-image="https://www.logostack.com/wp-content/uploads/designers/eclipse42/small-panda-01-600x420.jpg" data-currency="gbp" data-email="<?php echo $_SESSION['food_project_email']; ?>">`
        );
        foods = [];

        $(".fn").each((i, ele) => {
            let food = {
                food_name: ele.textContent,
                food_price: $(".fp")[i].textContent,
                food_total_quantity: $(".ftq")[i].value,
                food_total_price: $(".ftp")[i].textContent
            };
            foods.push(food);
        });


        $('.all-inputs').each((i, ele) => {
            foods.forEach((food, index) => {
                index += 1;

                $(ele).append(`
            <input type="text" id="food_name_${index}" name="food_name_${index}" value="${food.food_name}">
            <input type="text" id="food_price_${index}" name="food_price_${index}" value="${food.food_price}">
            <input type="text" id="food_total_quantity_${index}" name="food_total_quantity_${index}" value="${food.food_total_quantity}">
            <input type="text" id="food_total_price_${index}" name="food_total_price_${index}" value="${food.food_total_price}">
        `);
            });
        });
    });


    $("#pay_with_dd").on("change", e => {
        if (e.target.value == "cod") {
            $("#payment-btn-stripe").prop("hidden", true);
            $("#cod").prop("hidden", false);

        } else if (e.target.value == "stripe") {
            $("#payment-btn-stripe").prop("hidden", false);
            $("#cod").prop("hidden", true);

        }
    })
    </script>
</body>


</html>