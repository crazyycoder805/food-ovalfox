   <?php 
   $wishlist_items_navbar = count([]);
   $cart_items_navbar = count([]);

   if (isset($_SESSION['food_project_username'])) {
    $wishlist_items_navbar = count($pdo->read("wishlist", ['user_id' => $_SESSION['food_project_user_id']]));
    $cart_items_navbar = count($pdo->read("cart", ['user_id' => $_SESSION['food_project_user_id']]));

   }

   ?>

   <!-- Header Start -->
   <header class="main-header" id="hero-section">
       <div class="header-sticky">
           <nav class="navbar navbar-expand-lg">
               <div class="container">
                   <!-- Logo Start -->
                   <a class="navbar-brand" href="index.php">
                       <img height="50" width="70" src="assets/images/burger.png" alt="" />
                       <span style="font-size: 15px;">Sweetness Delight</span>
                   </a>
                   <!-- Logo End -->

                   <!-- Main Menu start -->
                   <div class="collapse navbar-collapse main-menu">
                       <ul class="navbar-nav mr-auto" id="menu">
                           <li class="nav-item first-menu"><a class="nav-link" style="font-size: 12px;" href="index.php">Home</a></li>
                           <li class="nav-item"><a class="nav-link" style="font-size: 12px;" href="about.php">About us</a></li>
                           <li class="nav-item"><a class="nav-link" style="font-size: 12px;" href="menu.php">Menu</a></li>
                           <li class="nav-item"><a class="nav-link" style="font-size: 12px;" href="booking.php">Booking</a></li>

                           <li class="nav-item submenu"><a class="nav-link" style="font-size: 12px;" href="#">Access</a>
                               <ul>

                                   <li class="nav-item"><a class="nav-link" style="font-size: 12px;" href="login.php">Login</a></li>
                                   <li class="nav-item"><a class="nav-link" style="font-size: 12px;" href="signup.php">signup</a></li>
                               </ul>
                           </li>
                           <li class="nav-item"><a class="nav-link" style="font-size: 12px;" href="contact.php">Contact Us</a></li>
                           <li class="nav-item">
                               <a class="nav-link" style="font-size: 12px;" href="wishlist.php"><i style="font-size: 20px;"
                                       class="fa fa-heart"></i> (<?php echo $wishlist_items_navbar; ?>)</a>

                           </li>
                           <li class="nav-item">
                               <a class="nav-link" style="font-size: 12px;" href="cart.php"><i style="font-size: 20px;"
                                       class="fa fa-cart-plus"></i> (<?php echo $cart_items_navbar; ?>)</a>
                           </li>

                           <?php 
                            if (isset($_SESSION['food_project_user_id'])) {
                            ?>
                           <li class="nav-item highlighted-menu"><a style="font-size: 10px;" class="btn-default"
                                   href="index.php?lg=true">Logout</a></li>
                           <?php } ?>

                           <?php 
                            if (isset($_SESSION['food_project_user_id'])) {
                            ?>
                           <li class="nav-item highlighted-menu"><a style="font-size: 10px;" class="btn-default"
                                   href="userpanel.php">Panel</a></li>
                           <?php } ?>
                       </ul>
                   </div>
                   <!-- Main Menu End -->

                   <div class="navbar-toggle"></div>
               </div>
           </nav>
           <div class="responsive-menu"></div>
       </div>
   </header>
   <!-- Header End -->