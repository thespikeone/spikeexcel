<?php 
session_start();

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/png" href="assets/img/logo3.png" />
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SpikeExcel</title>
    <meta content="" name="description">

    <meta content="" name="keywords">



</head>

<body>

    <?php include_once('header.php'); ?>

    <!-- ======= Hero Section ======= -->


    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
<?php include_once('assets/php/func.php'); confirme(); ?>
            <div class="row">

                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">We offer modern solutions for growing your business</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">We are team of talented Devlopers to make your life
                        easier</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="auth/register/register.php"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Get Started</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="content">
                            <h3>Who We Are</h3>
                            <h2>We're in the business of making storage in cloud</h2>
                            <p>
                                But we also work every day to apply and share our know how in ways that benefit people,
                                and our planet in order to build a better tomorrow
                            </p>
                            <div class="text-center text-lg-start">
                                <a href="#"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span>Read More</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="">
                    </div>

                </div>
            </div>

        </section><!-- End About Section -->

        <!-- ======= Values Section ======= -->
        <section id="values" class="values">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Our Values</h2>
                    <p>Our Core Values</p>
                </header>

                <div class="row">

                    <div class="col-lg-4">
                        <div class="box" data-aos="fade-up" data-aos-delay="200">
                            <img src="assets/img/values-1.png" class="img-fluid" alt="">
                            <h3>Community</h3>
                            <p>We believe in giving back to our community with our profits</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box" data-aos="fade-up" data-aos-delay="400">
                            <img src="assets/img/values-2.png" class="img-fluid" alt="">
                            <h3>Performance</h3>
                            <p>We are exceptionally focussed and dynamic, we strive to deliver excelent results whether
                                safety,environmental operational,financial</p>
                        </div>
                    </div>



                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box" data-aos="fade-up" data-aos-delay="600">
                            <img src="assets/img/values-3.png" class="img-fluid" alt="">
                            <h3>Integrity</h3>
                            <p>We do what we say we're going to do,when we say we're going to do it</p>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- End Values Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="232"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Happy Clients</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="521"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Projects</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-headset" style="color: #15be56;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="1463"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Hours Of Support</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-people" style="color: #bb0852;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Hard Workers</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->





        <!-- ======= Services Section ======= -->
        <section id="services" class="services">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Services</h2>
                    <p>Our Services</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue">
                            <i class="ri-file-upload-line icon"></i>
                            <h3>Upload file</h3>
                            <p>you can upload and export and read your file excel</p>

                        </div>
                    </div>
                    <!--red,pink,purple-->
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-box orange">
                            <i class="ri-lock-2-line icon"></i>
                            <h3>Security</h3>
                            <p>your data is encrypted and stored in a secure place.</p>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-box green">
                            <i class="ri-database-2-line icon"></i>
                            <h3>Api</h3>
                            <p>you have your own API to share your data securely</p>

                        </div>
                    </div>



                </div>

            </div>

        </section><!-- End Services Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Pricing</h2>
                    <p>Check our Pricing</p>
                </header>

                <div class="row gy-4" data-aos="fade-left">

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="box">
                            <h3 style="color: #07d5c0;">Free Plan</h3>
                            <div class="price"><sup>$</sup>0<span> / mo</span></div>
                            <img src="assets/img/pricing-free.png" class="img-fluid" alt="">
                            <ul>
                                <li>2 files Max</li>
                                <li>Read & Export Only Limit 2 par day</li>
                                <li>Nulla at volutpat dola</li>
                                <li class="na">Pharetra massa</li>
                                <li class="na">Massa ultricies mi</li>
                            </ul>
                            <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="box">
                            <span class="featured">Featured</span>
                            <h3 style="color: #65c600;">Starter Plan</h3>
                            <div class="price"><sup>$</sup>19<span> / mo</span></div>
                            <img src="assets/img/pricing-starter.png" class="img-fluid" alt="">
                            <ul>
                                <li>10 files Max</li>
                                <li>Read & Export Limit 10 par day</li>
                                <li>Nulla at volutpat dola</li>
                                <li>Pharetra massa</li>
                                <li class="na">Massa ultricies mi</li>
                            </ul>
                            <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="box">
                            <h3 style="color: #ff901c;">Business Plan</h3>
                            <div class="price"><sup>$</sup>29<span> / mo</span></div>
                            <img src="assets/img/pricing-business.png" class="img-fluid" alt="">
                            <ul>
                                <li>20 files Max</li>
                                <li>Read & Export & convert Limit 20 par day</li>
                                <li>Nulla at volutpat dola</li>
                                <li>Pharetra massa</li>
                                <li>Massa ultricies mi</li>
                            </ul>
                            <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                        <div class="box">
                            <h3 style="color: #ff0071;">Ultimate Plan</h3>
                            <div class="price"><sup>$</sup>49<span> / mo</span></div>
                            <img src="assets/img/pricing-ultimate.png" class="img-fluid" alt="">
                            <ul>
                                <li>No limit upload</li>
                                <li>Read & Export & convert no limit</li>
                                <li>Nulla at volutpat dola</li>
                                <li>Pharetra massa</li>
                                <li>Massa ultricies mi</li>
                            </ul>
                            <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- End Pricing Section -->

        <?php include_once('assets/php/faq.php') ?>





        <!-- ======= Team Section ======= -->
        <section id="team" class="team">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Team</h2>
                    <p>Our hard working team</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href="https://twitter.com/YounesSarni" target="_blank"><i
                                            class="bi bi-twitter"></i></a>
                                    <a href="https://www.facebook.com/younes.sarni31/" target="_blank"><i
                                            class="bi bi-facebook"></i></a>
                                    <a href="https://www.instagram.com/devloping_off/" target="_blank"><i
                                            class="bi bi-instagram"></i></a>
                                    <a href="https://www.younes-sarni.ga/" target="_blank"><i
                                            class="bi bi-link"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Younes Sarni</h4>
                                <span>Ceo & Devloper of Spike</span>
                                <p></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                                <div class="social">
                                    <a href="https://www.facebook.com/imad.madridiano.33" target="_blank"><i
                                            class="bi bi-facebook"></i></a>
                                    <a href="https://www.instagram.com/mad_bsk/" target="_blank"><i
                                            class="bi bi-instagram"></i></a>

                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Imad Hakam</h4>
                                <span>Marketing</span>
                                <p></p>
                            </div>
                        </div>
                    </div>






                </div>

            </div>

        </section><!-- End Team Section -->





        <?php include_once('assets/php/contact.php') ?>

    </main><!-- End #main -->

    <?php include_once('footer.php'); ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


</body>

</html>