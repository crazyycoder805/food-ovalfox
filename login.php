<!DOCTYPE html>
<html lang="zxx">

<?php require_once 'assets/includes/head.php'; ?>
<?php 

if (isset($_POST['username'])) { 
    if (!empty($_POST['password']) && !empty($_POST['username'])) {
        $user = $pdo->read('users', ['username'=>$_POST['username'], 'password'=>$_POST['password']]);
    
        
        if (!empty($user)) {
            $_SESSION['food_project_user_id'] = $user[0]['id'];

            $_SESSION['food_project_username'] = $user[0]['username'];
            $_SESSION['food_project_email'] = $user[0]['username'];

            $_SESSION['food_project_email'] = $user[0]['email'];

            $_SESSION['food_project_fname'] = $user[0]['fname'];
            $_SESSION['food_project_lname'] = $user[0]['lname'];
            $_SESSION['food_project_phone'] = $user[0]['phone'];

           header("location:menu.php");
        } else {
            $error = "User does'nt exsit";
        }
        
    } else {
        $error = "(Username Or Email) & Password must be filled correctly.";
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
                <div class="col-lg-8 offset-lg-2">
                    <!-- Booking Content start -->

                    <!-- Booking Content end -->

                    <!-- Booking Form start -->
                    <div class="booking-form">
                        <form id="bookingForm" action="#" method="POST" data-toggle="validator">
                            <div class="row">
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="username" class="form-control" id="username"
                                        placeholder="Username" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Password" required>
                                    <div class="help-block with-errors"></div>
                                </div>



                                <div class="col-md-12 button-group text-center">
                                    <button type="submit" class="btn-default">Submit Now</button>
                                    <div id="msgSubmit" class="h3 text-left hidden"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Booking Form end -->
                </div>
            </div>
        </div>
    </div>

    <?php require_once 'assets/includes/footer.php'; ?>
    <?php require_once 'assets/includes/javascript.php'; ?>
</body>


</html>