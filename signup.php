<!DOCTYPE html>
<html lang="zxx">

<?php require_once 'assets/includes/head.php'; ?>
<?php 

$success = "";
$error = "";

if (isset($_POST['username'])) { 
    if (!empty($_POST['password']) && !empty($_POST['username']) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password'])) {
        if ($pdo->validateInput($_POST["username"], "username")) {
            if ($pdo->validateInput($_POST["fname"], "firstname")) {
                if ($pdo->validateInput($_POST["lname"], "lastname")) {
                    if ($pdo->validateInput($_POST["email"], "email")) {
                        if ($pdo->validateInput($_POST["phone"], "phone")) {
                            if ($pdo->validateInput($_POST["password"], "password")) {
                                if (!$pdo->isDataInserted("users", ['email' => $_POST['email']])) {
                                    if (!$pdo->isDataInserted("users", ['username' => $_POST['username']])) {
                                        if (!$pdo->isDataInserted("users", ['phone' => $_POST['phone']])) {
                                            if ($pdo->create("users", ['username' => $_POST['username'], 'password' => $_POST['password'], 'fname' => $_POST['fname'], 'lname' => $_POST['lname'], 
                                            'phone' => $_POST['phone']])) {
                                                $success = "Account created please sign in to proccess further. <a href='login.php'>Sign in</a>";
                                            }
                                        } else {
                                            $error = "Phone number is already registerd.";
                                        }
                                    } else {
                                        $error = "Username is already registerd.";
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
                $error = $pdo->validationErr;
            }
        }else {
            $error = $pdo->validationErr;
        }
        
    } else {
        $error = "All fields are required.";
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
                                    <input type="text" name="fname" class="form-control" id="fname"
                                        placeholder="First name" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="lname" class="form-control" id="lname"
                                        placeholder="Last name" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="email" name="email" class="form-control" placeholder="Email" id="email"
                                        required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="tel" name="phone" class="form-control" id="phone"
                                        placeholder="Phone number" required>
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
                    <div class="row mt-5">
                        <div class="col-md text-center">
                            Already have a account? <a href="login.php">Sign in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once 'assets/includes/footer.php'; ?>
    <?php require_once 'assets/includes/javascript.php'; ?>
</body>


</html>