<!DOCTYPE html>

<html lang="zxx">
<?php require_once 'assets/includes/head.php'; ?>
<?php

$success = "";
$error = "";
$total_bookings = $pdo->read("bookings");
if (isset($_GET['cb'])) {
    if ($pdo->update("bookings", ['id' => $_GET['cb']], ['status' => 'cancel'])) {
        $success = "Booking canceld.";
                     header("Location:bookings.php");
    } else {
        $error = "Something went wrong.";
    }
} else if (isset($_GET['bb'])) {
    if ($pdo->update("bookings", ['id' => $_GET['bb']], ['status' => 'booked'])) {
        $success = "Booking approved.";
                     header("Location:bookings.php");
    } else {
        $error = "Something went wrong.";
    }
}else if (isset($_GET['bd'])) {
    if ($pdo->delete("bookings", $_GET['bd'])) {
        $success = "Booking deleted.";
                     header("Location:bookings.php");
    } else {
        $error = "Something went wrong.";
    }
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
                                <h4 class="page-title">Bookings</h4>
                            </div>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-link">
                                        <a href="index.php"><i class="fas fa-home mr-2"></i>Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-link active">Bookings</li>
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

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <table id="example1" class="table table-striped table-bordered dt-responsive">
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
                                                        <a
                                                            href="bookings.php?cb=<?php echo $booking['id']; ?>">CANCEL</a>
                                                        ||
                                                        <a
                                                            href="bookings.php?bb=<?php echo $booking['id']; ?>">APPROVE</a>
                                                        ||
                                                        <a
                                                            href="bookings.php?bd=<?php echo $booking['id']; ?>">DELETE</a>
                                                        <?php } else { ?>
                                                        <a
                                                            href="bookings.php?bd=<?php echo $booking['id']; ?>">DELETE</a>
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