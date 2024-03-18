<!DOCTYPE html>
<html lang="zxx">

<?php require_once 'assets/includes/head.php'; ?>

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
                        <h1 class="text-anime">Contact Us</h1>
                        <nav>
                            <ol class="breadcrumb wow fadeInUp" data-wow-delay="0.50s">
                                <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                                <li class="breadcrumb-item active">Contact Us</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Send Message Start -->
    <div class="send-msg-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <!-- Section Title start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp" data-wow-delay="0.50s">Send Message</h3>
                        <h2 class="text-anime">Find Us Here. Make Real Results Happen.</h2>
                    </div>
                    <!-- Section Title end -->

                    <div class="send-msg-body">
                        <p class="wow fadeInUp" data-wow-delay="0.75s">There are many variations of passages of orem
                            Ipsum available, but the majority have suffered alteration in some form, by cted ipsumlor
                            sit amet, consectetur adipisicing elit, sed do usmod temp idunt ut et dolore magna aliqua ut
                            enim ad minim.</p>

                        <a href="#" class="btn-default wow fadeInUp" data-wow-delay="1.0s">Book Now</a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <!-- Contact Form start -->
                    <div class="contact-form wow fadeInUp" data-wow-delay="1.25s">
                        <form id="contactForm" action="#" method="POST" data-toggle="validator">
                            <div class="row">
                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                                        required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                        required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone"
                                        required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <textarea name="msg" class="form-control" id="msg" rows="4"
                                        placeholder="Write a Message" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-md-12 button-group">
                                    <button type="submit" class="btn-default">Submit Now</button>
                                    <div id="msgSubmit" class="h3 text-left hidden"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Send Message End -->

    <!-- Contact Us Section Start -->
    <div class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section Title start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp" data-wow-delay="0.50s">Contact Us</h3>
                        <h2 class="text-anime">Get In Touch</h2>
                    </div>
                    <!-- Section Title end -->
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-8 col-md-12 order-lg-1 order-2">
                    <!-- Google Map start -->
                    <div class="google-map wow fadeInUp" data-wow-delay="0.75s">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d56481.31329163797!2d-82.30112043759952!3d27.776444959332093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sUnited%20States%20solar!5e0!3m2!1sen!2sin!4v1706008331370!5m2!1sen!2sin"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <!-- Google Map end -->
                </div>

                <div class="col-lg-4 col-md-12 order-lg-2 order-1">
                    <!-- Contact Details start -->
                    <div class="contact-detail wow fadeInRight" data-wow-delay="1.0s">
                        <h3>Contact Details</h3>

                        <ul class="contact-list-icon">
                            <li class="list-item">
                                <span class="list-icon-img"> <img src="assets/images/icon-map.svg" alt=""> </span>
                                <span class="list-icon-text">123 Main Street Citytown, Stateville 12345 United States
                                </span>
                            </li>
                            <li class="list-item">
                                <span class="list-icon-img"> <img src="assets/images/icon-email.svg" alt=""> </span>
                                <span class="list-icon-text"><a href="#">info@domainname.com</a></span>
                            </li>
                            <li class="list-item">
                                <span class="list-icon-img"> <img src="assets/images/icon-phone.svg" alt=""> </span>
                                <span class="list-icon-text"><a href="#">(+0) 123 456 789</a></span>
                            </li>
                        </ul>
                    </div>
                    <!-- Contact Details end -->
                </div>
            </div>
        </div>
    </div>


    <?php require_once 'assets/includes/footer.php'; ?>
    <?php require_once 'assets/includes/javascript.php'; ?>
</body>


</html>