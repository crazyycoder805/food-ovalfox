<!DOCTYPE html>
<html lang="zxx">
<?php require_once 'assets/includes/head.php'; ?>

<?php
if (!isset($_SESSION['food_project_user_id'])) {
    header("location:login.php");
} 
$total_orders_completed = $pdo->read("stripe_payments", ['status' => 'succeeded', 'user_id' => $_SESSION['food_project_user_id']]);
$total_wishlisted_items = $pdo->read("wishlist", ['user_id' => $_SESSION['food_project_user_id']]);
$total_cart_items = $pdo->read("cart", ['user_id' => $_SESSION['food_project_user_id']]);
$total_bookings = $pdo->read("bookings", ['user_id' => $_SESSION['food_project_user_id']]);
$success = "";
$error = "";
if (isset($_POST['fname'])) { 
    if (!empty($_POST['fname']) && 
    !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['phone'])) {
            if ($pdo->validateInput($_POST["fname"], "firstname")) {
                if ($pdo->validateInput($_POST["lname"], "lastname")) {
                    if ($pdo->validateInput($_POST["email"], "email")) {
                        if ($pdo->validateInput($_POST["phone"], "phone")) {
                                if (!$pdo->isDataInsertedUpdate("users", ['email' => $_POST['email']])) {
                                        if (!$pdo->isDataInsertedUpdate("users", ['phone' => $_POST['phone']])) {
                                            if ($pdo->update("users", ['id' => $_SESSION['food_project_user_id']], ['fname' => $_POST['fname'], 
                                            'lname' => $_POST['lname'], 
                                            'email' => $_POST['email'], 
                                            'phone' => $_POST['phone']])) {
                                                $success = "Account updated.";
                                                $pdo->headTo("index.php?lg=true");

                                            } else {
                                                $error = "Something went wrong. or can't update this because no changes was found";

                                            }
                                        } else {
                                            $error = "Phone number is already registerd.";
                                        }
                                   
                                } else {
                                    $error = "Email is already registerd.";
                                }
                           
                        } else {
                            $error = $pdo->validationErr;
                        }
                    } else {
                        $error = $pdo->validationErr;
                    }
                } else {
                    $error = $pdo->validationErr;
                }
            } else {
                $error = $pdo->validationErr;
            }
     
        
    } else {
        $error = "All fields are required.";
    }
    
} else if (isset($_GET['cb'])) {
    if ($pdo->update("bookings", ['id' => $_GET['cb']], ['status' => 'cancel'])) {
        $success = "Booking canceld.";
                     header("Location:userpanel.php");
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

                <!-- Menu Dises Section Start -->
                <div class="col-md-3">
                    <!-- Sidebar Menu Dises Nav start -->
                    <div class="menu-dises-nav wow fadeInLeft" data-wow-delay="0.75s">
                        <ul>

                            <li><a href="#" data-filter=".dashboard"><span class="text-muted">Dashboard</span></a></li>
                            <li><a href="#" data-filter=".orders-complete"><span class="text-muted">Orders
                                        Completed</span></a></li>
                            <li><a href="#" data-filter=".bookings"><span class="text-muted">Bookings</span></a></li>
                            <li><a href="#" data-filter=".eidt-profile"><span class="text-muted">Edit Profile</span></a>
                            </li>
                            <li><a href="index.php?lg=true"><span class="text-muted">Logout</span></a></li>


                        </ul>
                    </div>

                </div>


                <div class="col-md">
                    <!-- Menu Item Box start -->
                    <div class="row menu-item-boxes wow fadeInUp" data-wow-delay="1.00s">
                        <!-- Breakfast Section start -->


                        <div class="col-md menu-item-box breakfast dashboard">
                            <div class="row">
                                <div class="col-md">
                                    <div class="card">
                                        <div class="card-body">
                                            Orders completed (<?php echo count($total_orders_completed); ?>)
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="card">
                                        <div class="card-body">
                                            Wishlisted items (<?php echo count($total_wishlisted_items); ?>)
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="card">
                                        <div class="card-body">
                                            Cart items (<?php echo count($total_cart_items); ?>)
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            Bookings Completed (<?php echo count($total_bookings); ?>)
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md menu-item-box breakfast orders-complete">
                            <div class="row">
                                <div class="col-md">
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="font-size: 10px;">Order id</th>
                                                        <th style="font-size: 10px;">Order status</th>
                                                        <th style="font-size: 10px;">Item</th>
                                                        <th style="font-size: 10px;">Quantity</th>
                                                        <th style="font-size: 10px;">Total</th>
                                                        <th style="font-size: 10px;">Discounted amount</th>

                                                        <th style="font-size: 10px;">Vat</th>
                                                        <th style="font-size: 10px;">Delivery charges</th>
                                                        <th style="font-size: 10px;">Pay with</th>
                                                        <th style="font-size: 10px;">Final Amount</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $totalPrice = [];
                                                    foreach ($total_orders_completed as $order) {
                                                        $food = $pdo->read("food", ['id' => $order['food_id']]);
                                                        $totalPrice[] = $order['final_amount'];
                                                    ?>
                                                    <tr>
                                                        <td style="font-size: 10px;"><?php echo $order['id']; ?></td>
                                                        <td style="font-size: 10px;"><?php echo $order['status']; ?>
                                                        </td>
                                                        <td style="font-size: 10px;">
                                                            <?php echo $food[0]['food_name']; ?></td>
                                                        <td style="font-size: 10px;"><?php echo $order['quantity']; ?>
                                                        </td>
                                                        <td style="font-size: 10px;"><?php echo $order['total']; ?></td>
                                                        <td style="font-size: 10px;">
                                                            <?php echo $order['discounted_amount']; ?></td>

                                                        <td style="font-size: 10px;"><?php echo $order['vat']; ?></td>
                                                        <td style="font-size: 10px;"><?php echo $order['dc']; ?></td>
                                                        <td style="font-size: 10px;"><?php echo $order['pay_with']; ?>
                                                        </td>
                                                        <td style="font-size: 10px;">
                                                            <?php echo $order['final_amount']; ?></td>

                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td>Total revenue: <?php echo array_sum($totalPrice); ?></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md menu-item-box breakfast eidt-profile">
                            <div class="booking-form">
                                <form id="bookingForm" action="#" method="POST" data-toggle="validator">
                                    <div class="row">


                                        <div class="form-group col-md-6 mb-4">
                                            <input type="text" value="<?php echo $_SESSION['food_project_fname'] ?>"
                                                name="fname" class="form-control" id="fname" placeholder="First name"
                                                required>
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <div class="form-group col-md-6 mb-4">
                                            <input type="text" value="<?php echo $_SESSION['food_project_lname'] ?>"
                                                name="lname" class="form-control" id="lname" placeholder="Last name"
                                                required>
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <div class="form-group col-md-6 mb-4">
                                            <input type="email" name="email"
                                                value="<?php echo $_SESSION['food_project_email'] ?>"
                                                class="form-control" placeholder="Email" id="email" name="email"
                                                required>
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <div class="form-group col-md-6 mb-4">
                                            <input type="tel" value="<?php echo $_SESSION['food_project_phone'] ?>"
                                                name="phone" class="form-control" id="phone" placeholder="Phone number"
                                                required>
                                            <div class="help-block with-errors"></div>
                                        </div>




                                        <div class="col-md-12 button-group text-center">
                                            <button type="submit" class="btn-default">Submit Now</button>
                                            <div id="msgSubmit" class="h3 text-left hidden"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="col-md menu-item-box breakfast bookings">
                            <div class="row">
                                <div class="col-md">
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="font-size: 10px;">Name</th>
                                                        <th style="font-size: 10px;">Email</th>
                                                        <th style="font-size: 10px;">Phone</th>
                                                        <th style="font-size: 10px;">Date</th>
                                                        <th style="font-size: 10px;">Time</th>
                                                        <th style="font-size: 10px;">People</th>

                                                        <th style="font-size: 10px;">Child</th>
                                                        <th style="font-size: 10px;">Message</th>
                                                        <th style="font-size: 10px;">Status</th>
                                                        <th style="font-size: 10px;">Action</th>

                                                        <th style="font-size: 10px;">Created at</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($total_bookings as $booking) {
                                                    ?>
                                                    <tr>
                                                        <td style="font-size: 10px;"><?php echo $booking['name']; ?>
                                                        </td>
                                                        <td style="font-size: 10px;"><?php echo $booking['email']; ?>
                                                        </td>
                                                        <td style="font-size: 10px;">
                                                            <?php echo $booking['phone']; ?></td>
                                                        <td style="font-size: 10px;"><?php echo $booking['date']; ?>
                                                        </td>
                                                        <td style="font-size: 10px;"><?php echo $booking['time']; ?>
                                                        </td>
                                                        <td style="font-size: 10px;">
                                                            <?php echo $booking['nop']; ?></td>

                                                        <td style="font-size: 10px;"><?php echo $booking['noc']; ?></td>
                                                        <td style="font-size: 10px;"><?php echo $booking['message']; ?>
                                                        </td>
                                                        <td style="font-size: 10px;"><?php echo $booking['status']; ?>
                                                        </td>
                                                        <td style="font-size: 10px;"><?php 
                                                        if ($booking['status'] == 'pending') {
                                                        ?>
                                                            <a href="userpanel.php?cb=<?php echo $booking['id']; ?>">CANCEL</a>
                                                            <?php } ?>
                                                        </td>
                                                        <td style="font-size: 10px;">
                                                            <?php echo $booking['created_at']; ?></td>

                                                    </tr>
                                                    <?php } ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

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