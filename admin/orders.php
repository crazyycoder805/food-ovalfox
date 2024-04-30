<!DOCTYPE html>

<html lang="zxx">
<?php require_once 'assets/includes/head.php'; ?>
<?php

$success = "";
$error = "";
$id = "";
$total_orders_completed = $pdo->read("stripe_payments", ['status' => 'succeeded']);


$reviews = $pdo->read("reviews");


 if (isset($_GET['delete_category'])) {
    if ($pdo->delete("reviews", $_GET['delete_category'])) {
        $success = "Review deleted.";
                              header("Location:{$name}");

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
                                <h4 class="page-title">Orders</h4>
                            </div>
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-link">
                                        <a href="index.php"><i class="fas fa-home mr-2"></i>Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-link active">Orders</li>
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
                                    <table id="example1" class="table table-striped table-bordered dt-responsive">
                                        <thead>
                                            <tr>
                                                <th style="font-size: 8px;">Order id</th>
                                                <th style="font-size: 8px;">Order status</th>
                                                <th style="font-size: 8px;">Item</th>
                                                <th style="font-size: 8px;">Quantity</th>
                                                <th style="font-size: 8px;">Total</th>
                                                <th style="font-size: 8px;">Discounted amount</th>

                                                <th style="font-size: 8px;">Vat</th>
                                                <th style="font-size: 8px;">Delivery charges</th>
                                                <th style="font-size: 8px;">Pay with</th>
                                                <th style="font-size: 8px;">Final Amount</th>

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
                                                <td style="font-size: 8px;"><?php echo $order['id']; ?></td>
                                                <td style="font-size: 8px;"><?php echo $order['status']; ?>
                                                </td>
                                                <td style="font-size: 8px;">
                                                    <?php echo $food[0]['food_name']; ?></td>
                                                <td style="font-size: 8px;"><?php echo $order['quantity']; ?>
                                                </td>
                                                <td style="font-size: 8px;"><?php echo $order['total']; ?></td>
                                                <td style="font-size: 8px;">
                                                    <?php echo $order['discounted_amount']; ?></td>

                                                <td style="font-size: 8px;"><?php echo $order['vat']; ?></td>
                                                <td style="font-size: 8px;"><?php echo $order['dc']; ?></td>
                                                <td style="font-size: 8px;"><?php echo $order['pay_with']; ?>
                                                </td>
                                                <td style="font-size: 8px;">
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