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
                        <h3 class="wow fadeInUp" data-wow-delay="0.50s">Welcome to Sweetness Delight</h3>
                        <h1 class="text-anime">Taste Flavours from Around the World</h1>
                    </div>
                    <!-- Section Title end -->

                    <!-- Hero Content start -->
                    <div class="hero-content wow fadeInUp" data-wow-delay="0.75s">
                        <p>Indulge your senses with our exquisite menu crafted with passion and care by our team of
                            talented chefs. Start your culinary adventure with a selection of artisanal appetizers,
                            bursting with vibrant colors and bold flavors. From delicate bruschetta topped with ripe
                            tomatoes and basil to crispy calamari served with zesty aioli, each dish is a masterpiece in
                            its own right.</p>
                    </div>
                    <!-- Hero Content end -->

                    <!-- Hero Footer start -->
                    <div class="hero-footer">
                        <a href="menu.php" class="btn-default btn-order-online wow fadeInUp"
                            data-wow-delay="1.25s">Order
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
                            <p>For the main course, prepare to be delighted by a symphony of tastes from around the
                                world. Sink your teeth into tender cuts of prime steak, perfectly grilled to your
                                preference, or savor the delicate flavors of freshly caught seafood, sourced from local
                                waters. Vegetarian options abound, showcasing the freshest seasonal produce and
                                innovative cooking techniques.</p>
                        </div>

                        <div class="about-icon-box">
                            <div class="icon-box wow fadeInUp" data-wow-delay="1.00s">
                                <div class="icon-box-img">
                                    <img src="assets/images/icon-about-1.svg" alt="">
                                </div>
                                <div class="icon-box-content">
                                    <h3>Online Order</h3>
                                    <p>Pair your meal with a selection from our extensive wine list, featuring a curated
                                        collection of fine wines from renowned vineyards around the globe.</p>
                                </div>
                            </div>

                            <div class="icon-box wow fadeInUp" data-wow-delay="1.25s">
                                <div class="icon-box-img">
                                    <img src="assets/images/icon-about-2.svg" alt="">
                                </div>
                                <div class="icon-box-content">
                                    <h3>24X7 Services</h3>
                                    <p>Pair your meal with a selection from our extensive wine list, featuring a curated
                                        collection of fine wines from renowned vineyards around the globe.</p>
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
                            <p>At Sweet Delightness, hospitality is our passion, and every guest is treated like family.
                                Whether you're celebrating a special occasion or simply enjoying a leisurely meal with
                                loved ones, our attentive staff is dedicated to ensuring your experience is nothing
                                short of extraordinary.</p>
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
                            <p>Escape the ordinary and treat yourself to a culinary journey like no other at Sweetness
                                Delight,
                                where every moment is infused with sweetness and delight.</p>
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
                            <p>Pair your meal with a selection from our extensive wine list, featuring a curated
                                collection of fine wines from renowned vineyards around the globe. Or, indulge in one of
                                our handcrafted cocktails, expertly mixed by our skilled bartenders using only the
                                finest spirits and freshest ingredients.</p>
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

    <!-- Most Popular Dises End -->

    <!-- Food Pricing Start -->

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

                            <p class="wow fadeInUp" data-wow-delay="0.75s">Vegetarian options abound, showcasing the
                                freshest seasonal produce and innovative cooking techniques.</p>

                            <div class="info-btn">
                                <a href="menu.php" class="btn-default wow fadeInUp" data-wow-delay="1.25s">Explore
                                    Menu</a>
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
                                            <p>Indulge your senses with our exquisite menu crafted with passion and care
                                                by our team of talented chefs. Start your culinary adventure with a
                                                selection of artisanal appetizers, bursting with vibrant colors and bold
                                                flavors. From delicate bruschetta topped with ripe tomatoes and basil to
                                                crispy calamari served with zesty aioli, each dish is a masterpiece in
                                                its own right.</p>
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
                                            <p>Indulge your senses with our exquisite menu crafted with passion and care
                                                by our team of talented chefs. Start your culinary adventure with a
                                                selection of artisanal appetizers, bursting with vibrant colors and bold
                                                flavors. From delicate bruschetta topped with ripe tomatoes and basil to
                                                crispy calamari served with zesty aioli, each dish is a masterpiece in
                                                its own right.</p>
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
                                            <p>Indulge your senses with our exquisite menu crafted with passion and care
                                                by our team of talented chefs. Start your culinary adventure with a
                                                selection of artisanal appetizers, bursting with vibrant colors and bold
                                                flavors. From delicate bruschetta topped with ripe tomatoes and basil to
                                                crispy calamari served with zesty aioli, each dish is a masterpiece in
                                                its own right.</p>
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




    <?php require_once 'assets/includes/footer.php'; ?>
    <?php require_once 'assets/includes/javascript.php'; ?>
</body>


</html>