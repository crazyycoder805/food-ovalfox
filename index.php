<!DOCTYPE html>
<html lang="zxx">

<?php require_once 'assets/includes/head.php'; ?>

<?php 

if (isset($_GET['lg'])) {
    session_unset();
    session_destroy();
    header("location:index.php");
   }
?>
<body class="tt-magic-cursor goto-top">
    <?php 
	require_once 'assets/includes/preloader.php';
	?>
    <?php 
	require_once 'assets/includes/navbar.php';
	?>

    <!-- Home Hero Section Start -->
    <div class="hero parallaxie">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Title start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp" data-wow-delay="0.50s">Welcome to Fwizz</h3>
                        <h1 class="text-anime">Taste Flavours from Around the World</h1>
                    </div>
                    <!-- Section Title end -->

                    <!-- Hero Content start -->
                    <div class="hero-content wow fadeInUp" data-wow-delay="0.75s">
                        <p>Duis nec semper ligula. Nullam nec justo vel metus gravida consequat. Suspendisse potenti.
                            Quisque fermentum, nisl vitae auctor commodo, justo metus tincidunt elit.</p>
                    </div>
                    <!-- Hero Content end -->

                    <!-- Hero Footer start -->
                    <div class="hero-footer">
                        <a href="#" class="btn-default btn-book-now wow fadeInUp" data-wow-delay="1s">Book Now</a>
                        <a href="#" class="btn-default btn-order-online wow fadeInUp" data-wow-delay="1.25s">Order
                            Online</a>
                    </div>
                    <!-- Hero Footer end -->
                </div>
            </div>
        </div>
        <div class="down-arrow">
            <a href="#home-about"><img src="assets/images/icon-down-arrow.svg" alt=""></a>
        </div>
    </div>
    <!-- Home Hero Section End -->

    <!-- Home About Section Start -->
    <div class="home-about" id="home-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <!-- About Left Content Start -->
                    <div class="home-about-left">
                        <div class="home-about-img">
                            <figure class="reveal image-anime">
                                <img src="assets/images/about-us-1.jpg" alt="">
                            </figure>

                            <figure class="reveal image-anime">
                                <img src="assets/images/about-us-2.jpg" alt="">
                            </figure>
                        </div>

                        <div class="home-about-since">
                            <h3>Since</h3>
                            <h2>1870</h2>
                        </div>
                    </div>
                    <!-- About Left Content End -->
                </div>

                <div class="col-lg-6 col-md-12">
                    <!-- About Content Start -->
                    <div class="home-about-right">
                        <!-- Section Ttile Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp" data-wow-delay="0.50s">About Restaurant</h3>
                            <h2 class="text-anime">Living Well Begins with Eating Well</h2>
                        </div>
                        <!-- Section Ttile Start -->

                        <div class="home-about-content wow fadeInUp" data-wow-delay="0.75s">
                            <p>Duis nec semper ligula. Nullam nec justo vel metus gravida consequat. Suspendisse
                                potenti. Quisque fermentum, nisl vitae auctor commodo, justo metus tincidunt elit,</p>
                        </div>

                        <div class="about-icon-box">
                            <div class="icon-box wow fadeInUp" data-wow-delay="1.00s">
                                <div class="icon-box-img">
                                    <img src="assets/images/icon-about-1.svg" alt="">
                                </div>
                                <div class="icon-box-content">
                                    <h3>Online Order</h3>
                                    <p>Duis nec semper ligula. Nullam nec.</p>
                                </div>
                            </div>

                            <div class="icon-box wow fadeInUp" data-wow-delay="1.25s">
                                <div class="icon-box-img">
                                    <img src="assets/images/icon-about-2.svg" alt="">
                                </div>
                                <div class="icon-box-content">
                                    <h3>24X7 Services</h3>
                                    <p>Duis nec semper ligula. Nullam nec.</p>
                                </div>
                            </div>
                        </div>

                        <a href="#" class="btn-default wow fadeInUp" data-wow-delay="1.50s">Book Now</a>
                    </div>
                    <!-- About Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Home About Section End -->

    <!-- Why Choose Us Start -->
    <div class="why-choose-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Title start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp" data-wow-delay="0.50s">Why Choose us</h3>
                        <h2 class="text-anime">The Health Food For Wealthy Mood</h2>
                    </div>
                    <!-- Section Title end -->
                </div>
            </div>

            <div class="row">
                <!-- Why Choose Us Image Box start -->
                <div class="col-md-4 col-12">
                    <div class="wcu-img-box wow fadeInUp" data-wow-delay="0.50s">
                        <!-- Image Box start -->
                        <div class="image-box">
                            <figure>
                                <img src="assets/images/icon-why-choose-us-1.svg" alt="">
                            </figure>
                        </div>
                        <!-- Image Box end -->

                        <!-- Image Box Body start -->
                        <div class="image-body">
                            <h3>Quality Foods</h3>
                            <p>Sit amet, consectetur adipiscing elit quisque eget maximus velit, non eleifend libero
                                curabitur dapibus mauris.</p>
                        </div>
                        <!-- Image Box Body end -->
                    </div>
                </div>
                <!-- Why Choose Us Image Box end -->

                <!-- Why Choose Us Image Box start -->
                <div class="col-md-4 col-12">
                    <div class="wcu-img-box wow fadeInUp" data-wow-delay="0.75s">
                        <!-- Image Box start -->
                        <div class="image-box">
                            <figure>
                                <img src="assets/images/icon-why-choose-us-2.svg" alt="">
                            </figure>
                        </div>
                        <!-- Image Box end -->

                        <!-- Image Box Body start -->
                        <div class="image-body">
                            <h3>Fastest Delivery</h3>
                            <p>Sit amet, consectetur adipiscing elit quisque eget maximus velit, non eleifend libero
                                curabitur dapibus mauris.</p>
                        </div>
                        <!-- Image Box Body end -->
                    </div>
                </div>
                <!-- Why Choose Us Image Box end -->

                <!-- Why Choose Us Image Box start -->
                <div class="col-md-4 col-12">
                    <div class="wcu-img-box wow fadeInUp" data-wow-delay="1.0s">
                        <!-- Image Box start -->
                        <div class="image-box">
                            <figure>
                                <img src="assets/images/icon-why-choose-us-3.svg" alt="">
                            </figure>
                        </div>
                        <!-- Image Box end -->

                        <!-- Image Box Body start -->
                        <div class="image-body">
                            <h3>Original Recipes</h3>
                            <p>Sit amet, consectetur adipiscing elit quisque eget maximus velit, non eleifend libero
                                curabitur dapibus mauris.</p>
                        </div>
                        <!-- Image Box Body end -->
                    </div>
                </div>
                <!-- Why Choose Us Image Box end -->
            </div>

        </div>
    </div>
    <!-- Why Choose Us End -->

    <!-- Most Popular Dises Start -->
    <div class="most-popular-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Title start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp" data-wow-delay="0.50s">Hot Dises</h3>
                        <h2 class="text-anime">Most Popular Dises</h2>
                    </div>
                    <!-- Section Title end -->
                </div>
            </div>

            <div class="row">
                <!-- Menu Dises Section Start -->

                <div class="col-lg-3 col-md-12">
                    <!-- Sidebar Menu Dises Nav start -->
                    <div class="menu-dises-nav wow fadeInLeft" data-wow-delay="0.75s">
                        <ul>
                            <li><a href="#" class="active-menu-dises" data-filter="*"><img
                                        src="assets/images/icon-breakfast.svg" alt="">All Popular Dises</a></li>
                            <li><a href="#" data-filter=".breakfast"><img src="assets/images/icon-breakfast.svg"
                                        alt="">Breakfast</a></li>
                            <li><a href="#" data-filter=".lunches"><img src="assets/images/icon-lunches.svg"
                                        alt="">Lunches</a>
                            </li>
                            <li><a href="#" data-filter=".dinner"><img src="assets/images/icon-dinner.svg"
                                        alt="">Dinner</a>
                            </li>
                            <li><a href="#" data-filter=".drinks"><img src="assets/images/icon-drinks.svg"
                                        alt="">Drinks</a>
                            </li>
                            <li><a href="#" data-filter=".fast-foods"><img src="assets/images/icon-fast-foods.svg"
                                        alt="">Fast
                                    Foods</a></li>
                            <li><a href="#" data-filter=".dessert"><img src="assets/images/icon-dessert.svg"
                                        alt="">Dessert</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar Menu Dises Nav end -->
                </div>


                <div class="col-lg-9 col-md-12">
                    <!-- Menu Item Box start -->
                    <div class="row menu-item-boxes wow fadeInUp" data-wow-delay="1.00s">
                        <!-- Menu Item start -->
                        <div class="col-lg-4 col-md-6 menu-item-box lunches dinner fast-foods">
                            <div class="menu-item">
                                <!-- Menu Item Image start -->
                                <div class="menu-item-img">
                                    <figure class="image-anime">
                                        <img src="assets/images/menu-1.jpg" alt="">
                                    </figure>
                                </div>
                                <!-- Menu Item Image start -->

                                <!-- Menu Item Body start -->
                                <div class="menu-item-body">
                                    <div class="rating-img">
                                        <img src="assets/images/start-rating.png" alt="">
                                    </div>
                                    <h3>Grilled Marinated</h3>
                                    <p>Sit amet, consectetur adipiscing elit maximus velit, non eleifend.</p>
                                </div>
                                <!-- Menu Item Body end -->
                            </div>
                        </div>
                        <!-- Menu Item end -->

                        <!-- Menu Item start -->
                        <div class="col-lg-4 col-md-6 menu-item-box breakfast lunches">
                            <div class="menu-item">
                                <!-- Menu Item Image start -->
                                <div class="menu-item-img">
                                    <figure class="image-anime">
                                        <img src="assets/images/menu-2.jpg" alt="">
                                    </figure>
                                </div>
                                <!-- Menu Item Image start -->

                                <!-- Menu Item Body start -->
                                <div class="menu-item-body">
                                    <div class="rating-img">
                                        <img src="assets/images/start-rating.png" alt="">
                                    </div>
                                    <h3>Fried Egg</h3>
                                    <p>Sit amet, consectetur adipiscing elit maximus velit, non eleifend.</p>
                                </div>
                                <!-- Menu Item Body end -->
                            </div>
                        </div>
                        <!-- Menu Item end -->

                        <!-- Menu Item start -->
                        <div class="col-lg-4 col-md-6 menu-item-box dinner fast-foods">
                            <div class="menu-item">
                                <!-- Menu Item Image start -->
                                <div class="menu-item-img">
                                    <figure class="image-anime">
                                        <img src="assets/images/menu-3.jpg" alt="">
                                    </figure>
                                </div>
                                <!-- Menu Item Image start -->

                                <!-- Menu Item Body start -->
                                <div class="menu-item-body">
                                    <div class="rating-img">
                                        <img src="assets/images/start-rating.png" alt="">
                                    </div>
                                    <h3>Sardine Spaghetti</h3>
                                    <p>Sit amet, consectetur adipiscing elit maximus velit, non eleifend.</p>
                                </div>
                                <!-- Menu Item Body end -->
                            </div>
                        </div>
                        <!-- Menu Item end -->

                        <!-- Menu Item start -->
                        <div class="col-lg-4 col-md-6 menu-item-box dessert">
                            <div class="menu-item">
                                <!-- Menu Item Image start -->
                                <div class="menu-item-img">
                                    <figure class="image-anime">
                                        <img src="assets/images/menu-4.jpg" alt="">
                                    </figure>
                                </div>
                                <!-- Menu Item Image start -->

                                <!-- Menu Item Body start -->
                                <div class="menu-item-body">
                                    <div class="rating-img">
                                        <img src="assets/images/start-rating.png" alt="">
                                    </div>
                                    <h3>Ice Waffle</h3>
                                    <p>Sit amet, consectetur adipiscing elit maximus velit, non eleifend.</p>
                                </div>
                                <!-- Menu Item Body end -->
                            </div>
                        </div>
                        <!-- Menu Item end -->

                        <!-- Menu Item start -->
                        <div class="col-lg-4 col-md-6 menu-item-box drinks lunches dinner">
                            <div class="menu-item">
                                <!-- Menu Item Image start -->
                                <div class="menu-item-img">
                                    <figure class="image-anime">
                                        <img src="assets/images/menu-5.jpg" alt="">
                                    </figure>
                                </div>
                                <!-- Menu Item Image start -->

                                <!-- Menu Item Body start -->
                                <div class="menu-item-body">
                                    <div class="rating-img">
                                        <img src="assets/images/start-rating.png" alt="">
                                    </div>
                                    <h3>Egg Omelet</h3>
                                    <p>Sit amet, consectetur adipiscing elit maximus velit, non eleifend.</p>
                                </div>
                                <!-- Menu Item Body end -->
                            </div>
                        </div>
                        <!-- Menu Item end -->

                        <!-- Menu Item start -->
                        <div class="col-lg-4 col-md-6 menu-item-box dinner lunches">
                            <div class="menu-item">
                                <!-- Menu Item Image start -->
                                <div class="menu-item-img">
                                    <figure class="image-anime">
                                        <img src="assets/images/menu-6.jpg" alt="">
                                    </figure>
                                </div>
                                <!-- Menu Item Image start -->

                                <!-- Menu Item Body start -->
                                <div class="menu-item-body">
                                    <div class="rating-img">
                                        <img src="assets/images/start-rating.png" alt="">
                                    </div>
                                    <h3>Gourmet meal</h3>
                                    <p>Sit amet, consectetur adipiscing elit maximus velit, non eleifend.</p>
                                </div>
                                <!-- Menu Item Body end -->
                            </div>
                        </div>
                        <!-- Menu Item end -->

                    </div>
                    <!-- Menu Item Box end -->
                </div>
                <!-- Menu Dises Section End -->
            </div>
        </div>
    </div>
    <!-- Most Popular Dises End -->

    <!-- Food Pricing Start -->
    <div class="food-pricing">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <!-- Section Ttile start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp" data-wow-delay="0.50s">Best Pricing</h3>
                        <h2 class="text-anime">Foods Pricing</h2>
                    </div>
                    <!-- Section Ttile end -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <!-- Food Pricing List start -->
                    <div class="pricing-list wow fadeInUp" data-wow-delay="0.75s">
                        <!-- Pricing List Item start -->
                        <div class="pricing-list-item">
                            <ul>
                                <li>
                                    <span class="price-list-title">Vegetables Burger</span>
                                    <span class="price-list-separator"></span>
                                    <span class="price-list-price">$29</span>
                                </li>
                            </ul>
                            <p>Duis nec semper ligula. Nullam nec justo vel metus gravida consequat Suspendi.</p>
                        </div>
                        <!-- Pricing List Item end -->

                        <!-- Pricing List Item start -->
                        <div class="pricing-list-item">
                            <ul>
                                <li>
                                    <span class="price-list-title">Lemon Tea</span>
                                    <span class="price-list-separator"></span>
                                    <span class="price-list-price">$29</span>
                                </li>
                            </ul>
                            <p>Duis nec semper ligula. Nullam nec justo vel metus gravida consequat Suspendi.</p>
                        </div>
                        <!-- Pricing List Item end -->

                        <!-- Pricing List Item start -->
                        <div class="pricing-list-item">
                            <ul>
                                <li>
                                    <span class="price-list-title">Noodles</span>
                                    <span class="price-list-separator"></span>
                                    <span class="price-list-price">$29</span>
                                </li>
                            </ul>
                            <p>Duis nec semper ligula. Nullam nec justo vel metus gravida consequat Suspendi.</p>
                        </div>
                        <!-- Pricing List Item end -->

                        <!-- Pricing List Item start -->
                        <div class="pricing-list-item">
                            <ul>
                                <li>
                                    <span class="price-list-title">Fried Potatoes</span>
                                    <span class="price-list-separator"></span>
                                    <span class="price-list-price">$29</span>
                                </li>
                            </ul>
                            <p>Duis nec semper ligula. Nullam nec justo vel metus gravida consequat Suspendi.</p>
                        </div>
                        <!-- Pricing List Item end -->

                        <!-- Pricing List Item start -->
                        <div class="pricing-list-item">
                            <ul>
                                <li>
                                    <span class="price-list-title">Aloo Gobi</span>
                                    <span class="price-list-separator"></span>
                                    <span class="price-list-price">$29</span>
                                </li>
                            </ul>
                            <p>Duis nec semper ligula. Nullam nec justo vel metus gravida consequat Suspendi.</p>
                        </div>
                        <!-- Pricing List Item end -->

                        <!-- Pricing List Item start -->
                        <div class="pricing-list-item">
                            <ul>
                                <li>
                                    <span class="price-list-title">Bone Steak</span>
                                    <span class="price-list-separator"></span>
                                    <span class="price-list-price">$29</span>
                                </li>
                            </ul>
                            <p>Duis nec semper ligula. Nullam nec justo vel metus gravida consequat Suspendi.</p>
                        </div>
                        <!-- Pricing List Item end -->
                    </div>
                    <!-- Food Pricing List end -->
                </div>

                <div class="col-lg-4 col-md-12">
                    <!-- Food Pricing Bar start -->
                    <div class="food-bar-items">
                        <!-- Food Bar Item start -->
                        <div class="food-bar-1 wow fadeInUp" data-wow-delay="1.00s">
                            <div class="food-bar-details">
                                <h3>Delicious Meal</h3>
                                <p>Duis nec semper ligula Nullam.</p>
                                <h4>50% Off</h4>
                                <a href="#" class="btn-default">Order Online</a>
                            </div>
                        </div>
                        <!-- Food Bar Item end -->

                        <!-- Food Bar Item start -->
                        <div class="food-bar-2 wow fadeInUp" data-wow-delay="1.25s">
                            <div class="food-bar-details">
                                <h3>Japanese Food</h3>
                                <p>Duis nec semper ligula Nullam.</p>
                                <h4>Buy 1 Get 1 Free</h4>
                                <a href="#" class="btn-default">Order Online</a>
                            </div>
                        </div>
                        <!-- Food Bar Item end -->
                    </div>
                    <!-- Food Pricing Bar end -->
                </div>
            </div>
        </div>

    </div>
    <!-- Food Pricing End -->

    <!-- Restaurants Information Start -->
    <div class="restaurant-inforamtion">
        <div class="container">
            <div class="row">
                <!-- Info Box start -->
                <div class="col-md-12">
                    <div class="restaurant-info-box">
                        <div class="info-box-content">
                            <!-- Section Ttile start -->
                            <div class="section-title">
                                <h2 class="text-anime">Discover Restaurants Near From You.</h2>
                            </div>
                            <!-- Section Ttile end -->

                            <p class="wow fadeInUp" data-wow-delay="0.75s">Sed do eiusmod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam</p>

                            <div class="info-btn">
                                <a href="#" class="btn-default wow fadeInUp" data-wow-delay="1.00s">Find Restaurant</a>
                                <a href="#" class="btn-default wow fadeInUp" data-wow-delay="1.25s">Explore Menu</a>
                            </div>

                        </div>

                        <!-- Info Box Img start -->
                        <div class="info-box-img">
                            <img src="assets/images/restaurants.png" alt="">
                        </div>
                        <!-- Info Box Img end -->
                    </div>
                </div>
                <!-- Info Box end -->
            </div>

            <div class="row">
                <!-- Counter Bar Item start -->
                <div class="col-lg-3 col-6">
                    <div class="counter-bar wow fadeInUp" data-wow-delay="0.50s">
                        <div class="counter-bar-img">
                            <img src="assets/images/info-bar-1.jpg" alt="">
                        </div>
                        <div class="counter-bar-body">
                            <h3><span class="counter">56</span></h3>
                            <p>Food Verities</p>
                        </div>
                    </div>
                </div>
                <!-- Info Bar Item end -->

                <!-- Info Bar Item start -->
                <div class="col-lg-3 col-6">
                    <div class="counter-bar wow fadeInDown" data-wow-delay="0.75s">
                        <div class="counter-bar-img">
                            <img src="assets/images/info-bar-2.jpg" alt="">
                        </div>
                        <div class="counter-bar-body">
                            <h3><span class="counter">7</span></h3>
                            <p>Awards</p>
                        </div>
                    </div>
                </div>
                <!-- Info Bar Item end -->

                <!-- Info Bar Item start -->
                <div class="col-lg-3 col-6">
                    <div class="counter-bar wow fadeInUp" data-wow-delay="1.25s">
                        <div class="counter-bar-img">
                            <img src="assets/images/info-bar-3.jpg" alt="">
                        </div>
                        <div class="counter-bar-body">
                            <h3><span class="counter">125</span>k</h3>
                            <p>Happy Foodies</p>
                        </div>
                    </div>
                </div>
                <!-- Info Bar Item end -->

                <!-- Info Bar Item start -->
                <div class="col-lg-3 col-6">
                    <div class="counter-bar wow fadeInDown" data-wow-delay="1.50s">
                        <div class="counter-bar-img">
                            <img src="assets/images/info-bar-4.jpg" alt="">
                        </div>
                        <div class="counter-bar-body">
                            <h3><span class="counter">3</span></h3>
                            <p>Branches</p>
                        </div>
                    </div>
                </div>
                <!-- Info Bar Item end -->
            </div>
        </div>
    </div>
    <!-- Restaurants Information End -->

    <!-- Testimonials Section Start -->
    <div class="testimonials-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7">
                    <!-- Section Ttite start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp" data-wow-delay="0.50s">Testimonial</h3>
                        <h2 class="text-anime">What People's Say About Resaturant</h2>
                    </div>
                    <!-- Section Ttite end -->

                    <div class="testimonial-slider-wrapper wow fadeInUp" data-wow-delay="0.75s">
                        <!-- Testimonial Carousel start -->
                        <div class="swiper testimonial-slider">
                            <div class="swiper-wrapper">
                                <!-- Testimonial Slide start -->
                                <div class="swiper-slide">
                                    <div class="testimonial-slide">
                                        <div class="testimonial-body">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                since the 1500s, when an unknown printer took a galley of type and
                                                scrambled mak a type specimen book.</p>
                                        </div>

                                        <div class="testimonial-footer">
                                            <h3>Diana</h3>
                                            <p>Happy Customer</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Testimonial Slide end -->

                                <!-- Testimonial Slide start -->
                                <div class="swiper-slide">
                                    <div class="testimonial-slide">
                                        <div class="testimonial-body">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                since the 1500s, when an unknown printer took a galley of type and
                                                scrambled mak a type specimen book.</p>
                                        </div>

                                        <div class="testimonial-footer">
                                            <h3>Caroline</h3>
                                            <p>Happy Customer</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Testimonial Slide end -->

                                <!-- Testimonial Slide start -->
                                <div class="swiper-slide">
                                    <div class="testimonial-slide">
                                        <div class="testimonial-body">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                since the 1500s, when an unknown printer took a galley of type and
                                                scrambled mak a type specimen book.</p>
                                        </div>

                                        <div class="testimonial-footer">
                                            <h3>Lisa</h3>
                                            <p>Happy Customer</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Testimonial Slide end -->
                            </div>

                            <div class="swiper-pagination">
                                <div class="swiper-button swiper-button-next"></div>
                                <div class="swiper-button swiper-button-prev"></div>
                            </div>
                        </div>
                        <!-- Testimonial Carousel end -->
                    </div>

                </div>
                <!-- Testimonial Img start -->
                <div class="col-lg-6 col-md-5">
                    <div class="testimonial-img">
                        <img src="assets/images/testimonial-img.png" alt="">
                    </div>
                </div>
                <!-- Testimonial Img end -->
            </div>
        </div>
    </div>

    <!-- Testimonials Section End -->

    <!-- Upcoming Events Post Start -->
    <div class="events-post">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Title start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp" data-wow-delay="0.50s">Features Events</h3>
                        <h2 class="text-anime">Upcoming Events</h2>
                    </div>
                    <!-- Section Title end -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <!-- Post Item Start -->
                    <div class="post-item wow fadeInUp" data-wow-delay="0.75s">
                        <!-- Post Featured Image start -->
                        <div class="post-featured-image">
                            <a href="blog-single.php">
                                <figure class="image-anime">
                                    <img src="assets/images/post-1.jpg" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Post Featured Image end -->

                        <!-- Post Header Start -->
                        <div class="post-header">
                            <div class="post-meta">
                                <ul>
                                    <li class="post-meta-date"><a href="blog-single.php">March 17, 2024</a></li>
                                    <li><a href="#">Restaurants</a></li>
                                </ul>
                            </div>
                            <h3><a href="blog-single.php">Wine and Dine: Perfect Pairings for an Unforgettable Meal</a>
                            </h3>
                        </div>
                        <!-- Post Header End -->
                    </div>
                    <!-- Post Item End -->
                </div>

                <div class="col-lg-4 col-md-12">
                    <!-- Post Item Start -->
                    <div class="post-item wow fadeInUp" data-wow-delay="1.0s">
                        <!-- Post Featured Image start -->
                        <div class="post-featured-image">
                            <a href="blog-single.php">
                                <figure class="image-anime">
                                    <img src="assets/images/post-2.jpg" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Post Featured Image end -->

                        <!-- Post Header Start -->
                        <div class="post-header">
                            <div class="post-meta">
                                <ul>
                                    <li class="post-meta-date"><a href="blog-single.php">March 17, 2024</a></li>
                                    <li><a href="#">Restaurants</a></li>
                                </ul>
                            </div>
                            <h3><a href="blog-single.php">A Spotlight on Our Culinary Innovations</a></h3>
                        </div>
                        <!-- Post Header End -->
                    </div>
                    <!-- Post Item End -->
                </div>

                <div class="col-lg-4 col-md-12">
                    <!-- Post Item Start -->
                    <div class="post-item wow fadeInUp" data-wow-delay="1.25s">
                        <!-- Post Featured Image start -->
                        <div class="post-featured-image">
                            <a href="blog-single.php">
                                <figure class="image-anime">
                                    <img src="assets/images/post-3.jpg" alt="">
                                </figure>
                            </a>
                        </div>
                        <!-- Post Featured Image end -->

                        <!-- Post Header Start -->
                        <div class="post-header">
                            <div class="post-meta">
                                <ul>
                                    <li class="post-meta-date"><a href="blog-single.php">March 17, 2024</a></li>
                                    <li><a href="#">Restaurants</a></li>
                                </ul>
                            </div>
                            <h3><a href="blog-single.php">Tantalizing Tidbits: Fun Facts About Our Menu Creations</a>
                            </h3>
                        </div>
                        <!-- Post Header End -->
                    </div>
                    <!-- Post Item End -->
                </div>
            </div>
        </div>
    </div>


    <?php require_once 'assets/includes/footer.php'; ?>
    <?php require_once 'assets/includes/javascript.php'; ?>
</body>


</html>