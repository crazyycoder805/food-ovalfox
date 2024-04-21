<!DOCTYPE html>
<html lang="zxx">

<?php require_once 'assets/includes/head.php'; ?>
<?php 
if (isset($_POST['name'])) {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['date']) && !empty($_POST['time'])&& !empty($_POST['people'])) {
        if ($pdo->validateInput($_POST['email'], 'email')) {
            if ($pdo->validateInput($_POST['phone'], 'phone')) {
                if (empty($pdo->customQuery("SELECT * FROM bookings WHERE user_id = {$_SESSION['food_project_user_id']} AND status != 'booked'"))) {
                    if ($pdo->create("bookings", ['name' => $_POST['name'], 'email' => $_POST['email'], 'phone' => $_POST['phone'], 'date' => $_POST['date'], 
                    'time' => $_POST['time'], 'nop' => $_POST['people'], 'noc' => $_POST['child'], 'message' => $_POST['msg'], 'status' => 'pending', 
                    'user_id' => $_SESSION['food_project_user_id']])) {
                        $success = "Tabled booked please check your panel to view the status, or you will be auto redirect to view the status of the booking...";
                                     $pdo->headTo("userpanel.php", 5000);
                    } else {
                        $error = "Something went wrong.";
                    }
                } else {
                    $error = "You have already booked a table, you can book another table after aproval of previos table.";

                }
                
            } else {
                $error = "Invalid phone format.";
            }
        } else {
            $error = "Invalid email format.";
        }
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
                        <h1 class="text-anime">Advance Booking</h1>
                        <nav>
                            <ol class="breadcrumb wow fadeInUp" data-wow-delay="0.50s">
                                <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                <li class="breadcrumb-item active">Booking</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Advance Booking Start -->
    <div class="advance-booking-page wow fadeInUp" data-wow-delay="0.75s">
        <div class="container">
            <div class="row">
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
                <div class="col-lg-8 offset-lg-2">
                    <!-- Booking Content start -->
                    <div class="booking-content">
                        <p>Secure your spot at our restaurant with ease using our advance booking form. Simply provide
                            your details and preferences, and we'll ensure your reservation is seamlessly arranged.
                            Enjoy the convenience of planning your dining experience ahead of time, guaranteeing a
                            memorable visit to our establishment.</p>
                    </div>
                    <!-- Booking Content end -->
                    <?php 
                if (isset($_SESSION['food_project_username'])) {
                ?>
                    <!-- Booking Form start -->
                    <div class="booking-form">
                        <form id="bookingForm" method="POST" data-toggle="validator">
                            <div class="row">
                                <div class="form-group col-md-6 mb-4">
                                    <input
                                        value="<?php echo $_SESSION['food_project_fname'] . " " . $_SESSION['food_project_lname']; ?>"
                                        type="text" name="name" class="form-control" id="name" placeholder="Name"
                                        required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input value="<?php echo $_SESSION['food_project_email']; ?>" type="email"
                                        name="email" class="form-control" id="email" placeholder="Email" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input value="<?php echo $_SESSION['food_project_phone']; ?>" type="tel"
                                        name="phone" class="form-control" id="phone" placeholder="Phone" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="date" name="date" class="form-control" id="date" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="time" name="time" class="form-control" id="time" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="number" name="people" class="form-control" id="people"
                                        placeholder="No. of People" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    (Optional)
                                    <input type="number" name="child" class="form-control" id="child"
                                        placeholder="No. of Child">
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    (Optional)
                                    <textarea name="msg" class="form-control" id="msg" rows="8"
                                        placeholder="Message"></textarea>
                                </div>

                                <div class="col-md-12 button-group text-center">
                                    <button type="submit" class="btn-default">Submit Now</button>
                                    <div id="msgSubmit" class="h3 text-left hidden"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Booking Form end -->
                    <?php } else { ?>
                    <div class="row">
                        <div class="col-md">
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-bs-dismiss="alert">&times;</button>
                                Sign in to book a table. <a href="login.php">Sign in</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <?php require_once 'assets/includes/footer.php'; ?>
    <?php require_once 'assets/includes/javascript.php'; ?>
</body>


</html>