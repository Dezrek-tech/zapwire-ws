<?php
global $app;

use Melbahja\Seo\Schema;
use Melbahja\Seo\Schema\Thing;
use Melbahja\Seo\MetaTags;

$schema = new Schema(
    new Thing('Organization', [
        'url'          => $app->url(''),
        'logo'         => $app->url($app->project_info['logos']['z6']),
        'contactPoint' => new Thing('ContactPoint', [
            'email' => 'zapwire.ws@gmail.com',
            'contactType' => 'customer service'
        ])
    ])
);

$metatags = new MetaTags();

$metatags
    ->title($app->project_info['app_name'])
    ->description($app->project_info['description'])
    ->meta('author', $app->project_info['author'])
    ->image($app->url($app->project_info['logos']['z6']))
    ->mobile($app->url(''))
    ->canonical($app->url(''))
    ->shortlink($app->url(''))
    ->amp($app->url(''));
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?=$metatags."\n"?>
    <?=$schema."\n"?>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="<?= $app->url('src/assets/landing') ?>/vendor/swiper/swiper-bundle.min.css">
    <!-- Modal Video-->
    <link rel="stylesheet" href="<?= $app->url('src/assets/landing') ?>/vendor/modal-video/css/modal-video.min.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,600,800&amp;display=swap">
    <!-- Device Mockup-->
    <link rel="stylesheet" href="<?= $app->url('src/assets/landing') ?>/css/device-mockups.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= $app->url('src/assets/landing') ?>/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?= $app->url('src/assets/landing') ?>/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?=$app->url($app->project_info['logos']['z6'])?>">
</head>

<body>
    <!-- navbar-->
    <header class="header">
        <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="navbar">
            <div class="container"><a class="navbar-brand" href="index.html"><img src="<?=$app->url($app->project_info['logos']['z2'])?>" alt="" width="110"></a>
                <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link link-scroll active" href="#hero">Home <span class="sr-only">(current)</span></a></li>
                        <li class="nav-item"><a class="nav-link link-scroll" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link link-scroll" href="#why">Why Zapwire?</a></li>
                        <li class="btn btn-warning" disabled>Beta</li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Hero Section-->
    <section class="hero bg-top py-5" id="hero" style="background: url(<?= $app->url('src/assets/landing') ?>/img/banner-4.png) no-repeat; background-size: 100% 80%">
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-lg-5 py-5">
                    <h1>Socketing Made Easy!</h1>
                    <p class="my-4 text-muted"><?=$app->project_info['description']?></p>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mb-2 mb-lg-0"><a class="btn btn-primary btn-lg px-4"  href="<?=$app->url('join-beta')?>"> <i class="fas fa-plus me-3"></i>Join Beta Program</a></li>
                        <li class="list-inline-item"><a class="btn btn-primary btn-lg px-4" href="#about"> <i class="fas fa-eye me-3"></i>Read More</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 ml-auto">
                <div class="screen"><img class="img-fluid" src="<?= $app->url('src/assets/landing')?>/img/hero-graphic.png" alt=""></div>
                        
                </div>
            </div>
        </div>
    </section>
    <section class="bg-center py-0" id="about" style="background: url(img/service-bg.svg) no-repeat; background-size: cover">
        <section class="about py-0">
            <div class="container">
                <p class="h6 text-uppercase text-primary">What is it all about?</p>
                <h2 class="mb-5">Websocketing based on channels</h2>
                <div class="row pb-5 gy-4">
                    <div class="col-lg-4 col-md-6">
                        <!-- Services Item-->
                        <div class="card border-0 shadow rounded-lg py-4 text-start">
                            <div class="card-body p-5">
                                <div class="svg-icon svg-icon-light" style="font-size:60px;width:60px;height:60px;color:#ff904e">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <h3 class="h4 my-4">Easy Monitoring</h3>
                                <p class="text-sm text-muted mb-0">Monitor/Manage your socket channel and logs from your GUI wizard </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <!-- Services Item-->
                        <div class="card border-0 shadow rounded-lg py-4 text-start">
                            <div class="card-body p-5">
                                <div class="svg-icon svg-icon-light" style="font-size:60px;width:60px;height:60px;color:#39f8d2">
                                    <i class="fas fa-code"></i>
                                </div>
                                <h3 class="h4 my-4">No need for code</h3>
                                <p class="text-sm text-muted mb-0">Our GUI wizard makes it easy to genrate the javascript wiring code for each of your created channel anytime anywhere.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <!-- Services Item-->
                        <div class="card border-0 shadow rounded-lg py-4 text-start">
                            <div class="card-body p-5">
                                <div class="svg-icon svg-icon-light" style="font-size:60px;width:60px;height:60px;color:#8190ff">
                                    <i class="fa fa-exclamation-triangle"></i>
                                </div>
                                <h3 class="h4 my-4">Error reporting</h3>
                                <p class="text-sm text-muted mb-0">You can report any issue or problems encountered while using and operating your channels</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="with-pattern-1 py-5" id="why">
            <div class="container py-5">
                <div class="row align-items-center mb-5 gy-5">
                    <div class="col-lg-6"><img class="img-fluid w-100 px-lg-5" src="<?= $app->url('src/assets/landing') ?>/img/genz.png" alt=""></div>
                    <div class="col-lg-6">
                        <h2>As a Gen'z web-dev rookie this is for You</h2>
                        <p class="text-muted">Our easy to use platform offers wide range of features from code genration to error reporting</p>
                        <a class="btn btn-primary js-modal-btn"  href="<?=$app->url('join-beta')?>"><i class="fas fa-plus me-2"></i>Join Beta Program</a>
                    </div>
                </div>
                <div class="row align-items-center gy-5">
                    <div class="col-lg-6">
                        <h2>Create a simple project realtime in just few clicks</h2>
                        <p class="text-muted">
                            It works just like a missing block of your building block, </br>
                            with just few clicks and lines your simple chat application is realtime ready.
                        </p>
                        <ul class="list-check">
                            <li class="text-muted mb-2">Latency: 1000ms max</li>
                            <li class="text-muted mb-2">Probaility of Error encounter: 30/100</li>
                        </ul>
                        <a class="btn btn-primary js-modal-btn"  href="<?=$app->url('join-beta')?>"><i class="fas fa-plus me-2"></i>Join Beta Program</a>
                    </div>
                    <div class="col-lg-6">
                        <div class="row gy-4">
                            <div class="col-lg-6 col-sm-6">
                                <!-- Services Item-->
                                <div class="card border-0 shadow rounded-lg text-start px-2">
                                    <div class="card-body px py-5">
                                        <div class="svg-icon" style="font-size:40px;width:40px;height:40px;color:#ff904e">
                                            <i class="fa fa-users"></i>
</div>
                                        <h3 class="h5 my-3">Join the Beta Program</h3>
                                        <p class="text-sm mb-0 text-muted">This is the first step to joining the first users of zapwire-ws</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <!-- Services Item-->
                                <div class="card border-0 shadow rounded-lg text-start px-2">
                                    <div class="card-body px py-5">
                                        <div class="svg-icon" style="font-size:40px;width:40px;height:40px;color:#39f8d2">
                                            <i class="fa fa-download"></i>
</div>
                                        <h3 class="h5 my-3">Await your mail</h3>
                                        <p class="text-sm mb-0 text-muted">The wait period may be between 2-3 days due to some issues which we cannot disclose.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <!-- Services Item-->
                                <div class="card border-0 shadow rounded-lg text-start px-2">
                                    <div class="card-body px py-5">
                                        <div class="svg-icon" style="font-size:40px;width:40px;height:40px;color:#8190ff">
                                            <i class="fa fa-envelope"></i>
</div>
                                        <h3 class="h5 my-3">Get your Mail</h3>
                                        <p class="text-sm mb-0 text-muted">On getting your mail your credentials for login is sent.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <!-- Services Item-->
                                <div class="card border-0 shadow rounded-lg text-start px-2">
                                    <div class="card-body px py-5">
                                        <div class="svg-icon" style="font-size:40px;width:40px;height:40px;color:#ff634b">
                                            <i class="fa fa-magic"></i>
</div>
                                        <h3 class="h5 my-3">Sign In and do your Magic!</h3>
                                        <p class="text-sm mb-0 text-muted">Sign in from the mail you already got and yeah start building!.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!-- <section class="p-0" id="testimonials" style="background: url(<?= $app->url('src/assets/landing') ?>/img/testimonials-bg.png) no-repeat; background-size: 40% 100%; background-position: left center">
        <div class="container text-center">
            <p class="h6 text-uppercase text-primary">Testimonials</p>
            <h2 class="mb-5">What Our Users Says?</h2>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="swiper testimonials-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide h-auto">
                                <div class="mx-3 mx-lg-5 my-5 pt-3">
                                    <div class="card shadow rounded-lg px-4 py-5 px-lg-5 with-pattern bg-white border-0">
                                        <div class="card-body index-forward pt-5 rounded-lg">
                                            <div class="testimonial-img"><img class="rounded-circle" src="<?= $app->url('src/assets/landing') ?>/img/avatar-1.jpg" alt="" width="100" /></div>
                                            <p class="lead text-muted mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                            <h5 class="mb-0">Sarah Hudson</h5>
                                            <p class="text-primary mb-0 text-sm">Tech Developer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide h-auto">
                                <div class="mx-3 mx-lg-5 my-5 pt-3">
                                    <div class="card shadow rounded-lg px-4 py-5 px-lg-5 with-pattern bg-white border-0">
                                        <div class="card-body index-forward pt-5 rounded-lg">
                                            <div class="testimonial-img"><img class="rounded-circle" src="<?= $app->url('src/assets/landing') ?>/img/avatar-2.png" alt="" width="100" /></div>
                                            <p class="lead text-muted mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                            <h5 class="mb-0">Frank Smith</h5>
                                            <p class="text-primary mb-0 text-sm">Tech Developer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide h-auto">
                                <div class="mx-3 mx-lg-5 my-5 pt-3">
                                    <div class="card shadow rounded-lg px-4 py-5 px-lg-5 with-pattern bg-white border-0">
                                        <div class="card-body index-forward pt-5 rounded-lg">
                                            <div class="testimonial-img"><img class="rounded-circle" src="<?= $app->url('src/assets/landing') ?>/img/avatar-1.jpg" alt="" width="100" /></div>
                                            <p class="lead text-muted mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                            <h5 class="mb-0">Sarah Hudson</h5>
                                            <p class="text-primary mb-0 text-sm">Tech Developer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide h-auto">
                                <div class="mx-3 mx-lg-5 my-5 pt-3">
                                    <div class="card shadow rounded-lg px-4 py-5 px-lg-5 with-pattern bg-white border-0">
                                        <div class="card-body index-forward pt-5 rounded-lg">
                                            <div class="testimonial-img"><img class="rounded-circle" src="<?= $app->url('src/assets/landing') ?>/img/avatar-2.png" alt="" width="100" /></div>
                                            <p class="lead text-muted mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                            <h5 class="mb-0">Frank Smith</h5>
                                            <p class="text-primary mb-0 text-sm">Tech Developer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <a class="scroll-top-btn" id="scrollTop" href="#!"><i class="fas fa-long-arrow-alt-up"></i></a>
    <footer class="with-pattern-1 position-relative pt-5">
        <div class="container py-5">
            <div class="row gy-4">
                <div class="col-lg-3"><img class="mb-4" src="<?=$app->url($app->project_info['logos']['z2'])?>" alt="" width="110">
                    <p class="text-muted"><?=$app->project_info['description']?>.</p>
                </div>
                <div class="col-lg-2">
                    <h2 class="h5 mb-4">Quick Links</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled d-inline-block me-4 mb-0">
                            <li class="mb-2"><a class="footer-link" href="<?=$app->url('join-beta')?>">Join Beta Program</a></li>
                            <li class="mb-2"><a class="footer-link" href="#about">About us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <h2 class="h5 mb-4">Services</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled me-4 mb-0">
                            <li class="mb-2"><a class="footer-link" href="#!">Coming Soon..</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5">
                    <h2 class="h5 mb-4">Contact Info</h2>
                    <ul class="list-unstyled me-4 mb-3">
                        <li class="mb-2 text-muted">Lagos, Nigeria. </li>
                        <li class="mb-2"><a class="footer-link" href="mailto:<?=$app->project_info['info_email']?>"><?=$app->project_info['info_email']?></a></li>
                    </ul>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a class="social-link" href="https://web.facebook.com/profile.php?id=100083087804520"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a class="social-link" href="https://twitter.com/zapwire1"><i class="fab fa-twitter"></i></a></li>
                        <!-- <li class="list-inline-item"><a class="social-link" href="#!"><i class="fab fa-linkedin-in"></i></a></li>
                        <li class="list-inline-item"><a class="social-link" href="#!"><i class="fab fa-instagram"></i></a></li> -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyrights">
            <div class="container text-center py-4">
                <p class="mb-0 text-muted text-sm">&copy; 2021, Your company. Template by <a href="https://bootstrapious.com/p/app-landing-page" class="text-reset">Bootstrapious</a>.</p>
                <!-- If you want to remove the backlink, please purchase the Attribution-Free License. See details in readme.txt or license.txt. Thanks!-->
            </div>
        </div>
    </footer>
    <!-- JavaScript files-->
    <script src="<?= $app->url('src/assets/landing') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= $app->url('src/assets/landing') ?>/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= $app->url('src/assets/landing') ?>/vendor/modal-video/js/modal-video.js"></script>
    <script src="<?= $app->url('src/assets/landing') ?>/js/front.js"></script>
    <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {

            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
                var div = document.createElement("div");
                div.className = 'd-none';
                div.innerHTML = ajax.responseText;
                document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>

</html>