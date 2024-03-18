   <?php 
   $wishlist_items_navbar = [];
   $cart_items_navbar = [];

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
                   <a class="navbar-brand" href="index-2.php">
                       <img src="assets/images/logo.svg" alt="Logo">
                   </a>
                   <!-- Logo End -->

                   <!-- Main Menu start -->
                   <div class="collapse navbar-collapse main-menu">
                       <ul class="navbar-nav mr-auto" id="menu">
                           <li class="nav-item first-menu"><a class="nav-link" href="index.php">Home</a></li>
                           <li class="nav-item"><a class="nav-link" href="about.php">About us</a></li>
                           <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                           <li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
                           <li class="nav-item submenu"><a class="nav-link" href="#">Pages</a>
                               <ul>
                                   <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
                                   <li class="nav-item"><a class="nav-link" href="blog-single.php">Blog Details</a>
                                   </li>
                                   <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
                                   <li class="nav-item"><a class="nav-link" href="404.php">404</a></li>
                                   <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                                   <li class="nav-item"><a class="nav-link" href="signup.php">signup</a></li>
                               </ul>
                           </li>
                           <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                           <li class="nav-item">
                               <a class="nav-link" href="wishlist.php"><i style="font-size: 20px;"
                                       class="fa fa-heart"></i> (<?php echo $wishlist_items_navbar; ?>)</a>
                               
                           </li>
                           <li class="nav-item">
                               <a class="nav-link" href="cart.php"><i style="font-size: 20px;"
                                       class="fa fa-cart-plus"></i> (<?php echo $cart_items_navbar; ?>)</a>
                           </li>
                           <li class="nav-item highlighted-menu"><a class="btn-default" href="booking.php">Book
                                   Now</a></li>
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