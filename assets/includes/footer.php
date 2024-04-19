<footer class="footer">

    <!-- Scrolling Ticker Section Start -->
    <div class="scrolling-ticker">
        <div class="scrolling-ticker-box">
            <div class="scrolling-content">
                <span><i class="fa-solid fa-circle"></i>Vegetables Burger</span>
                <span><i class="fa-solid fa-circle"></i>Lemon Tea</span>
                <span><i class="fa-solid fa-circle"></i>Noodles</span>
                <span><i class="fa-solid fa-circle"></i>Fried Potatoes</span>
                <span><i class="fa-solid fa-circle"></i>Bone Steak</span>
                <span><i class="fa-solid fa-circle"></i>Aloo Gobi</span>
                <span><i class="fa-solid fa-circle"></i>Black Cold Coffee</span>
                <span><i class="fa-solid fa-circle"></i>Delicious Dosas</span>
                <span><i class="fa-solid fa-circle"></i>Lemon Tea</span>
                <span><i class="fa-solid fa-circle"></i>Black Cold Coffee</span>
            </div>

            <div class="scrolling-content">
                <span><i class="fa-solid fa-circle"></i>Vegetables Burger</span>
                <span><i class="fa-solid fa-circle"></i>Lemon Tea</span>
                <span><i class="fa-solid fa-circle"></i>Noodles</span>
                <span><i class="fa-solid fa-circle"></i>Fried Potatoes</span>
                <span><i class="fa-solid fa-circle"></i>Bone Steak</span>
                <span><i class="fa-solid fa-circle"></i>Aloo Gobi</span>
                <span><i class="fa-solid fa-circle"></i>Black Cold Coffee</span>
                <span><i class="fa-solid fa-circle"></i>Delicious Dosas</span>
                <span><i class="fa-solid fa-circle"></i>Lemon Tea</span>
                <span><i class="fa-solid fa-circle"></i>Black Cold Coffee</span>
            </div>
        </div>
    </div>
    <!-- Scrolling Ticker Section End -->

    <!-- Mega Footer Start -->
    <div class="footer-mega">
        <div class="container">
            <!-- Footer Start -->
            <div class="row">
                <!-- Footer About start -->
                <div class="col-lg-4 col-md-12">
                    <div class="footer-about">
                        <!-- Footer Logo start -->
                        <div class="footer-logo">
                            Sweetness Delight
                        </div>
                        <!-- Footer Logo end -->

                        <!-- Footer Content start -->

                        <!-- Footer Content end -->
                    </div>
                </div>
                <!-- Footer About end -->

                <!-- Footer Menu start -->
                <div class="col-lg-5 col-md-7">
                    <div class="row no-gutters">
                        <div class="col-md-6 col-12">
                            <div class="footer-links">
                                <h2>Our Menu</h2>
                                <ul>
                                    <?php 
                                    $category = $pdo->customQuery("SELECT * FROM food_categories LIMIT 0,5")
                                    ?>
                                    <?php 
                                    foreach ($category as $cs) {
                                        
                                    ?>
                                    <li><a href="menu.php"><i class="fa-solid fa-arrow-right"></i><?php echo $cs['category']; ?></a></li>
                                    <?php } ?>

                                    
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="footer-links">
                                <h2>Quick Links</h2>
                                <ul>
                                    <li><a href="index.php"><i class="fa-solid fa-arrow-right"></i>Home</a></li>
                                    <li><a href="about.php"><i class="fa-solid fa-arrow-right"></i>About Us</a></li>
                                    <li><a href="menu.php"><i class="fa-solid fa-arrow-right"></i>Menu</a></li>
                                    <li><a href="login.php"><i class="fa-solid fa-arrow-right"></i>Login</a></li>
                                    <li><a href="signup.php"><i class="fa-solid fa-arrow-right"></i>Signup</a></li>
                                    <li><a href="contact.php"><i class="fa-solid fa-arrow-right"></i>Contact Us</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Footer Menu end -->

                <!-- Footer Contact start -->
                <div class="col-lg-3 col-md-5">
                    <div class="footer-contact">
                        <h2>Contact Now</h2>
                        <ul>
                            <li>
                                <span class="icon-list-icon"><i class="fa-solid fa-location-dot"></i></span>
                                <span class="icon-list-text">Mirpur AJK</span>
                            </li>
                            <li>
                                <span class="icon-list-icon"><i class="fa-solid fa-phone"></i></span>
                                <span class="icon-list-text"><a href="#">(+92) 123 456 789</a></span>
                            </li>
                            <li>
                                <span class="icon-list-icon"><i class="fa-solid fa-envelope"></i></span>
                                <span class="icon-list-text"><a href="#">info@Sweetnessdelight.com</a></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Footer Contact end -->
            </div>
            <!-- Footer End -->

            <!-- Footer Subscribe Form Start -->


            <!-- Footer Copyright Start -->
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-md-6">
                        <p>Copyright © 2024 <strong>Sweetness Delight.</strong> All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="#hero-section" class="footer-btn"><span>Go to Top</span><i
                                class="fa-solid fa-arrow-up"></i></a>
                    </div>
                </div>
            </div>
            <!-- Footer Copyright End -->
        </div>
    </div>
    <!-- Mega Footer End -->
</footer>