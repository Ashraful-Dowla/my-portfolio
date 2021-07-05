<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>My Portfolio</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    {{-- <link href="{{ asset('assets/portfolio/img/favicon.png') }}" rel="icon"> --}}
    <link href="{{ asset('assets/portfolio/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/portfolio/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/portfolio/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/portfolio/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/portfolio/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/portfolio/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/portfolio/vendor/venobox/venobox.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/portfolio/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Personal - v2.5.1
  * Template URL: https://bootstrapmade.com/personal-free-resume-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header-tops">
        <div class="container">

            <h1><a href="index.html">Ashraful Dowla</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
            <h2>I'm a passionate <span>web developer</span> from Chattagram</h2>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="#header">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="{{ url('/download') }}">Download Resume</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav><!-- .nav-menu -->

            <div class="social-links">
                <a href="https://www.facebook.com/ashraf.koushik/" class="facebook" target="_blank"><i
                        class="icofont-facebook"></i></a>
                <a href="https://www.linkedin.com/in/ashraful-dowla-4702a11a1/" class="linkedin" target="_blank"><i
                        class="icofont-linkedin"></i></a>
                <a href="https://github.com/Ashraful-Dowla" class="github" target="_blank"><i
                        class="icofont-github"></i></a>
            </div>

        </div>
    </header><!-- End Header -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">

        <!-- ======= About Me ======= -->
        <div class="about-me container">

            <div class="section-title">
                <h2>About</h2>
                <p>Learn more about me</p>
            </div>

            <div class="row">
                <div class="col-lg-4" data-aos="fade-right">
                    <img src="{{ asset('assets/portfolio/img/me.jpg') }}" class="img-fluid" alt="User image">
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                    <h3 class="text-capitalize">web developer</h3>
                    <p class="font-italic">
                        I'm a quick learner always ready to accept challenges.
                    </p>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="icofont-rounded-right"></i> <strong>Birthday:</strong> 2 January 1996</li>
                                <li><i class="icofont-rounded-right"></i> <strong>Phone:</strong> +88 01927065448</li>
                                <li><i class="icofont-rounded-right"></i> <strong>City:</strong> Chattagram,
                                    Bangladesh
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="icofont-rounded-right"></i> <strong>Age:</strong> 25</li>
                                <li><i class="icofont-rounded-right"></i> <strong>Freelance:</strong> Available</li>
                            </ul>
                        </div>
                    </div>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        If you have an apple and I have an apple and we exchange these apples then you and I will still
                        each have one apple. But if you have an idea and I have an idea and we exchange these ideas,
                        then each of us will have two ideas
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i> - George Bernard Shaw
                    </p>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        Any fool can write code that a computer can understand. Good programmers write code that humans
                        can understand.
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i> - Bill Gates
                    </p>
                </div>
            </div>

        </div><!-- End About Me -->

        <!-- ======= Skills  ======= -->
        <div class="skills container">

            <div class="section-title">
                <h2>Skills</h2>
            </div>

            <div class="row skills-content">
                @foreach ($skills as $skill)
                    <div class="col-lg-6">
                        <div class="progress">
                            <span class="skill">{{ $skill->name }} <i
                                    class="val">{{ $skill->progress_value }}%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar"
                                    aria-valuenow="{{ $skill->progress_value }}" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div><!-- End Skills -->

        <!-- ======= Testimonials ======= -->
        <div class="testimonials container">

            <div class="section-title">
                <h2>Testimonials</h2>
            </div>

            <div class="owl-carousel testimonials-carousel">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            {{ $testimonial->quote }}
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        @if ($testimonial->avatar)
                            <img src="{{ asset('storage/images/' . $testimonial->avatar) }}" class="testimonial-img"
                                alt="testimonial image" width="100" height="100">
                        @else
                            <img src="{{ asset('assets/admin/img/dummy.png' . $testimonial->avatar) }}"
                                class="testimonial-img" alt="testimonial image">
                        @endif
                        <h3>{{ $testimonial->name }}</h3>
                        <h4>{{ $testimonial->designation }}</h4>
                    </div>
                @endforeach
            </div>

        </div><!-- End Testimonials  -->

    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title">
                <h2>Services</h2>
                <p>My Services</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4><a href="">Lorem Ipsum</a></h4>
                        <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4><a href="">Sed ut perspiciatis</a></h4>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4><a href="">Magni Dolores</a></h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4><a href="">Nemo Enim</a></h4>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-slideshow"></i></div>
                        <h4><a href="">Dele cardo</a></h4>
                        <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-arch"></i></div>
                        <h4><a href="">Divera don</a></h4>
                        <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title">
                <h2>Portfolio</h2>
                <p>My Works</p>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-card">Card</li>
                        <li data-filter=".filter-web">Web</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container">

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="{{ asset('assets/portfolio/img/portfolio/portfolio-1.jpg') }}" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>App 1</h4>
                            <p>App</p>
                            <div class="portfolio-links">
                                <a href="{{ asset('assets/portfolio/img/portfolio/portfolio-1.jpg') }}"
                                    data-gall="portfolioGallery" class="venobox" title="App 1"><i
                                        class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" data-gall="portfolioDetailsGallery"
                                    data-vbtype="iframe" class="venobox" title="Portfolio Details"><i
                                        class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="{{ asset('assets/portfolio/img/portfolio/portfolio-2.jpg') }}" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                            <div class="portfolio-links">
                                <a href="{{ asset('assets/portfolio/img/portfolio/portfolio-2.jpg') }}"
                                    data-gall="portfolioGallery" class="venobox" title="Web 3"><i
                                        class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" data-gall="portfolioDetailsGallery"
                                    data-vbtype="iframe" class="venobox" title="Portfolio Details"><i
                                        class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="{{ asset('assets/portfolio/img/portfolio/portfolio-3.jpg') }}" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>App 2</h4>
                            <p>App</p>
                            <div class="portfolio-links">
                                <a href="{{ asset('assets/portfolio/img/portfolio/portfolio-3.jpg') }}"
                                    data-gall="portfolioGallery" class="venobox" title="App 2"><i
                                        class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" data-gall="portfolioDetailsGallery"
                                    data-vbtype="iframe" class="venobox" title="Portfolio Details"><i
                                        class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="{{ asset('assets/portfolio/img/portfolio/portfolio-4.jpg') }}" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Card 2</h4>
                            <p>Card</p>
                            <div class="portfolio-links">
                                <a href="{{ asset('assets/portfolio/img/portfolio/portfolio-4.jpg') }}"
                                    data-gall="portfolioGallery" class="venobox" title="Card 2"><i
                                        class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" data-gall="portfolioDetailsGallery"
                                    data-vbtype="iframe" class="venobox" title="Portfolio Details"><i
                                        class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="{{ asset('assets/portfolio/img/portfolio/portfolio-5.jpg') }}" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Web 2</h4>
                            <p>Web</p>
                            <div class="portfolio-links">
                                <a href="{{ asset('assets/portfolio/img/portfolio/portfolio-5.jpg') }}"
                                    data-gall="portfolioGallery" class="venobox" title="Web 2"><i
                                        class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" data-gall="portfolioDetailsGallery"
                                    data-vbtype="iframe" class="venobox" title="Portfolio Details"><i
                                        class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="{{ asset('assets/portfolio/img/portfolio/portfolio-6.jpg') }}" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>App 3</h4>
                            <p>App</p>
                            <div class="portfolio-links">
                                <a href="{{ asset('assets/portfolio/img/portfolio/portfolio-6.jpg') }}"
                                    data-gall="portfolioGallery" class="venobox" title="App 3"><i
                                        class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" data-gall="portfolioDetailsGallery"
                                    data-vbtype="iframe" class="venobox" title="Portfolio Details"><i
                                        class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="{{ asset('assets/portfolio/img/portfolio/portfolio-7.jpg') }}" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Card 1</h4>
                            <p>Card</p>
                            <div class="portfolio-links">
                                <a href="{{ asset('assets/portfolio/img/portfolio/portfolio-7.jpg') }}"
                                    data-gall="portfolioGallery" class="venobox" title="Card 1"><i
                                        class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" data-gall="portfolioDetailsGallery"
                                    data-vbtype="iframe" class="venobox" title="Portfolio Details"><i
                                        class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="portfolio-wrap">
                        <img src="{{ asset('assets/portfolio/img/portfolio/portfolio-8.jpg') }}" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Card 3</h4>
                            <p>Card</p>
                            <div class="portfolio-links">
                                <a href="{{ asset('assets/portfolio/img/portfolio/portfolio-8.jpg') }}"
                                    data-gall="portfolioGallery" class="venobox" title="Card 3"><i
                                        class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" data-gall="portfolioDetailsGallery"
                                    data-vbtype="iframe" class="venobox" title="Portfolio Details"><i
                                        class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                    <div class="portfolio-wrap">
                        <img src="{{ asset('assets/portfolio/img/portfolio/portfolio-9.jpg') }}" class="img-fluid"
                            alt="">
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                            <div class="portfolio-links">
                                <a href="{{ asset('assets/portfolio/img/portfolio/portfolio-9.jpg') }}"
                                    data-gall="portfolioGallery" class="venobox" title="Web 3"><i
                                        class="bx bx-plus"></i></a>
                                <a href="portfolio-details.html" data-gall="portfolioDetailsGallery"
                                    data-vbtype="iframe" class="venobox" title="Portfolio Details"><i
                                        class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Contact</h2>
                <p>Contact Me</p>
            </div>

            <div class="row mt-2">

                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="info-box">
                        <i class="bx bx-map"></i>
                        <h3>My Address</h3>
                        <p>Alo Villa, Munshipukur, Uttar Par, Panchlaish, Chattagram</p>
                    </div>
                </div>

                <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
                    <div class="info-box">
                        <i class="bx bx-share-alt"></i>
                        <h3>Social Profiles</h3>
                        <div class="social-links">
                            <a href="https://www.facebook.com/ashraf.koushik/" class="facebook" target="_blank"><i
                                    class="icofont-facebook"></i></a>
                            <a href="https://www.linkedin.com/in/ashraful-dowla-4702a11a1/" class="linkedin"
                                target="_blank"><i class="icofont-linkedin"></i></a>
                            <a href="https://github.com/Ashraful-Dowla" class="github" target="_blank"><i
                                    class="icofont-github"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mt-4 d-flex align-items-stretch">
                    <div class="info-box">
                        <i class="bx bx-envelope"></i>
                        <h3>Email Me</h3>
                        <p>ashrafuldowlaunited532@gmail.com</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 d-flex align-items-stretch">
                    <div class="info-box">
                        <i class="bx bx-phone-call"></i>
                        <h3>Call Me</h3>
                        <p>+88 01927065448</p>
                    </div>
                </div>
            </div>
            @include('portfolio.mail')
        </div>
    </section><!-- End Contact Section -->

    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/personal-free-resume-bootstrap-template/ -->
        {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/portfolio/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/portfolio/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/portfolio/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/portfolio/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/portfolio/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/portfolio/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/portfolio/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/portfolio/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/portfolio/vendor/venobox/venobox.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/portfolio/js/main.js') }}"></script>

</body>

</html>
