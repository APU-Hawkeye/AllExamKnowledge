<?php
/**
 * @var App\View\AppView $this
 */
?>
<style>
    .carousel-nav-icon {
        height: 48px;
        width: 48px;
        background: #fff;
        border-radius: 50%;
        line-height: 43px;
    }
    .carousel-nav-icon-video {
        height: 48px;
        width: 48px;
        background: #eaefff;
        border-radius: 50%;
        line-height: 43px;
    }
    .carousel-nav-icon svg{
        width: 20px;
        height: 20px;
    }
    .carousel-nav-icon-video svg{
        width: 25px;
        height: 20px;
        margin-left: 10px;
    }
    .carousel-inner {
        position: relative;
        width: 100%;
        overflow: visible;
    }
    .carousel-item {
        .col, .col-sm, .col-md {
            margin: 8px;
            height: 300px;
            background-size: cover;
            background-position: center center;
        }
    }
    .hero h2 {
        font-size: 36px;
    }
    #carouselIndicatorLeft {
        position: absolute;
        left: -10px;
        z-index: 999;
    }
    #carouselIndicatorRight {
        position: absolute;
        left: 70px;
        z-index: 999;
    }
    .landing-banner {
       height: 70vh;
    }
    .banner-cont {
        margin-top: -70px;
    }
    .video-news {
        margin-top: -110px;
    }
    .video-news-section {
        overflow: visible;
    }
    .content-with-us {
        padding: 10px 0;
        background: #eceef1;
    }
    .heading {
        font-family: Helvetica;
    }
    .theme-border-left
    {
        border-left: 2px solid #fe2e2d;
    }
</style>
<section id="hero" class="hero d-flex align-items-center top-header landing-banner">
    <div class="hero-dot"><img src="img/dotted-group.svg"></div>
    <div class="container banner-cont">
        <div class="row">
            <div class="col-lg-7 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up" class="mb-4">Welcome to All Exam Knowledge!</h1>
                <p>All Exam Knowledge is a one-stop online education platform that provides comprehensive exam preparation services for SSC, UPSC, RAILWAY, Banking, JEE and many more.
                </p>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-lg-start">
                        <a href="#" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span><?php echo __('Register Now') ?></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <img src="img/BannerImg.png" alt="">
            </div>

        </div>
    </div>
</section>
<section class="py-0 video-news-section">
    <div class="container video-news">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body video-bg">
                                        <div class="row">
                                            <div class="col-1 d-flex align-items-center justify-content-center">
                                                <a href="#carouselExampleIndicators" role="button" data-slide="prev" id="carouselIndicatorLeft">
                                                    <div class="carousel-nav-icon-video">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                            <path d="m88.6,121.3c0.8,0.8 1.8,1.2 2.9,1.2s2.1-0.4 2.9-1.2c1.6-1.6 1.6-4.2 0-5.8l-51-51 51-51c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8,0l-54,53.9c-1.6,1.6-1.6,4.2 0,5.8l54,53.9z"/>
                                                        </svg>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-lg-3 pt-2">
                                                <img src="img/laptop-video-icon.svg" alt="">
                                            </div>
                                            <div class="col-lg-3 pt-4">
                                                <h4>New Videos are coming on GK-GS</h4>
                                                <p>Prepare for you recent exam, watch the video</p>
                                            </div>
                                            <div class="col-lg-4 pt-4">
                                                <div class="row">
                                                    <div>
                                                        <img src="img/line.svg" alt="">
                                                    </div>
                                                    <div class="pl-5">
                                                        <h4>Coming on YouTube</h4>
                                                        <img src="img/date-icon.svg" alt="">&nbsp 10 April 2023
                                                        <img src="img/time-icon.svg" alt="" class="pl-5">&nbsp 5:30 pm
                                                        <div>
                                                            <button class="btn-primary theme-btn">Notify Me</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1 d-flex align-items-center justify-content-center">
                                                <a href="#carouselExampleIndicators" data-slide="next" id="carouselIndicatorRight">
                                                    <div class="carousel-nav-icon-video">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                            <path d="m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z"/>
                                                        </svg>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<!--                        <div class="carousel-item">-->
<!--                            <div class="row">-->
<!--                                <div class="col-md-12">-->
<!--                                    <div class="card card-border mb-3 w-100">-->
<!--                                        <div class="card-body">-->
<!--                                            ggg-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-border mb-3 w-100">
                    <div class="card-header cardHeading">
                        <h5 class="text-center"><?php echo __('Announcements')?></h5>
                    </div>
                    <div class="card-body notifications">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Cras justo odio<a href="#" class="float-right">click here</a></li>
                            <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Dapibus ac facilisis in<a href="#" class="float-right">click here</a></li>
                            <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Vestibulum at eros<a href="#" class="float-right">click here</a></li>
                            <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Cras justo odio<a href="" class="float-right">click here</a></li>
                            <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Dapibus ac facilisis in<a href="#" class="float-right">click here</a></li>
                            <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Vestibulum at eros<a href="#" class="float-right">click here</a></li>
                            <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Cras justo odio<a href="" class="float-right">click here</a></li>
                            <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Dapibus ac facilisis in<a href="#" class="float-right">click here</a></li>
                            <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Vestibulum at eros<a href="#" class="float-right">click here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-border mb-3 w-100">
                    <div class="card-header cardHeading">
                        <h5 class="text-center"><?php echo __('News & Events')?></h5>
                    </div>
                    <div class="card-body notifications">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Cras justo odio<a href="#" class="float-right">click here</a></li>
                            <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Dapibus ac facilisis in<a href="#" class="float-right">click here</a></li>
                            <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Vestibulum at eros<a href="#" class="float-right">click here</a></li>
                            <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Cras justo odio<a href="#" class="float-right">click here</a></li>
                            <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Dapibus ac facilisis in<a href="#" class="float-right">click here</a></li>
                            <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Vestibulum at eros<a href="#" class="float-right">click here</a></li>
                            <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Cras justo odio<a href="#" class="float-right">click here</a></li>
                            <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Dapibus ac facilisis in<a href="#" class="float-right">click here</a></li>
                            <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Vestibulum at eros<a href="#" class="float-right">click here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="hero" class="hero d-flex align-items-center top-header">
    <div class="my-5 text-center container top-header">
        <div class="row mb-2">
            <div class="col text-center mb-4">
                <h2 class="heading">Download Solutions, GKGS & Many more</h2>
            </div>
        </div>
        <div class="row d-flex align-items-center">
            <div class="col-1 d-flex align-items-center justify-content-center">
                <a href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <div class="carousel-nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path d="m88.6,121.3c0.8,0.8 1.8,1.2 2.9,1.2s2.1-0.4 2.9-1.2c1.6-1.6 1.6-4.2 0-5.8l-51-51 51-51c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8,0l-54,53.9c-1.6,1.6-1.6,4.2 0,5.8l54,53.9z"/>
                        </svg>
                    </div>
                </a>
            </div>
            <div class="col-10">
                <!--Start carousel-->
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card card-border mb-3 w-100">
                                        <div class="card-header cardHeading">
                                            <h5 class="text-center"><?php echo __('Aptitude')?></h5>
                                        </div>
                                        <div class="card-body .notifications-carousel">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Cras justo odio<a href="#" class="float-right"><img src="img/download-icon.png"></a></li>
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Dapibus ac facilisis in<a href="#" class="float-right"><img src="img/download-icon.png"></a></li>
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Vestibulum at eros<a href="#" class="float-right"><img src="img/download-icon.png"></a></li>
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Cras justo odio<a href="" class="float-right"><img src="img/download-icon.png"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-border mb-3 w-100">
                                        <div class="card-header cardHeading">
                                            <h5 class="text-center"><?php echo __('CBSE Exam')?></h5>
                                        </div>
                                        <div class="card-body .notifications-carousel">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Cras justo odio<a href="#" class="float-right"><img src="img/download-icon.png"></a></li>
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Dapibus ac facilisis in<a href="#" class="float-right"><img src="img/download-icon.png"></a></li>
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Vestibulum at eros<a href="#" class="float-right"><img src="img/download-icon.png"></a></li>
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Cras justo odio<a href="" class="float-right"><img src="img/download-icon.png"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-border mb-3 w-100">
                                        <div class="card-header cardHeading">
                                            <h5 class="text-center"><?php echo __('Grammars')?></h5>
                                        </div>
                                        <div class="card-body .notifications-carousel">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Cras justo odio<a href="#" class="float-right"><img src="img/download-icon.png"></a></li>
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Dapibus ac facilisis in<a href="#" class="float-right"><img src="img/download-icon.png"></a></li>
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Vestibulum at eros<a href="#" class="float-right"><img src="img/download-icon.png"></a></li>
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Cras justo odio<a href="" class="float-right"><img src="img/download-icon.png"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card card-border mb-3 w-100">
                                        <div class="card-header cardHeading">
                                            <h5 class="text-center"><?php echo __('Reasoning')?></h5>
                                        </div>
                                        <div class="card-body .notifications-carousel">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Cras justo odio<a href="#" class="float-right"><img src="img/download-icon.png"></a></li>
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Dapibus ac facilisis in<a href="#" class="float-right"><img src="img/download-icon.png"></a></li>
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Vestibulum at eros<a href="#" class="float-right"><img src="img/download-icon.png"></a></li>
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Cras justo odio<a href="" class="float-right"><img src="img/download-icon.png"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-border mb-3 w-100">
                                        <div class="card-header cardHeading">
                                            <h5 class="text-center"><?php echo __('GK')?></h5>
                                        </div>
                                        <div class="card-body .notifications-carousel">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Cras justo odio<a href="#" class="float-right"><img src="img/download-icon.png"></a></li>
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Dapibus ac facilisis in<a href="#" class="float-right"><img src="img/download-icon.png"></a></li>
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Vestibulum at eros<a href="#" class="float-right"><img src="img/download-icon.png"></a></li>
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Cras justo odio<a href="" class="float-right"><img src="img/download-icon.png"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-border mb-3 w-100">
                                        <div class="card-header cardHeading">
                                            <h5 class="text-center"><?php echo __('Current Affairs')?></h5>
                                        </div>
                                        <div class="card-body .notifications-carousel">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Cras justo odio<a href="#" class="float-right"><img src="img/download-icon.png"></a></li>
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Dapibus ac facilisis in<a href="#" class="float-right"><img src="img/download-icon.png"></a></li>
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Vestibulum at eros<a href="#" class="float-right"><img src="img/download-icon.png"></a></li>
                                                <li class="list-group-item"><img src="img/notification-icon.svg" alt="">Cras justo odio<a href="" class="float-right"><img src="img/download-icon.png"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End carousel-->
            </div>
            <div class="col-1 d-flex align-items-center justify-content-center"><a  href="#carouselExampleIndicators" data-slide="next">
                    <div class="carousel-nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path d="m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z"/>
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <h2 class="text-center mb-5 mt-4 heading">Learn From the Best</h2>
        <div class="row">
            <div class="col-lg-7 d-flex flex-column justify-content-center">
                <h2 data-aos="fade-up" class="mb-4">About Us</h2>
                <p><b>All Exam Knowledge is an educational platform for all competitive exam aspirants from India. We have been preparing candidates for various state and central examinations for over a decade.
                        Throughout our journey we have consistently followed our ideology of making competitive exam coaching accessible and affordable for all Indian students.
                    </b>
                </p>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-lg-start mb-5">
                        <a href="<?php echo $this->Url->build([
                            'controller' => 'Pages',
                            'action' => 'aboutUs'
                        ])?>" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span><?php echo __('know More') ?></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="img/teacher-img.png" alt="">
            </div>
        </div>
    </div>
</section>
<section id="hero" class="hero d-flex content-with-us">
    <div class="container">
        <div class="mb-5 mt-5">
            <h3 class="heading"><b>Why Content with us</b></h3>
            <p> Comprehensive Study Material,Expert Faculty at Your Disposal, Interactive Learning Experience, Convenience at Your Fingertips</p>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <img src="img/content-with-us.png" alt="">
            </div>
            <div class="col-lg-3 pl-5">
                <div class="row">
                    <div class="pl-4 theme-border-left">
                        <img src="img/gov-exam.svg"><br>
                        <div class="pt-2">
                            <h4>GOVERNMENT EXAMS</h4>
                        </div>
                        <div class="pt-2">
                            <p class="mb-0">Banking,SSC,Railway Exams & Many more</p>
                        </div>
                    </div>
                </div>
                <div class="row pt-5">
                    <div class="pl-4 theme-border-left">
                        <img src="img/download-pdf.svg"><br>
                        <div class="pt-2">
                            <h4>DOWNLOAD PDF</h4>
                        </div>
                        <div class="pt-2">
                            <p class="mb-0">Download Answer Keys,Solutions,GK GS & Many more</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 pl-5">
                <div class="row">
                    <div class="pl-4 theme-border-left">
                        <img src="img/mentor-support.svg"><br>
                        <div class="pt-2">
                            <h4>MENTOR SUPPORTS</h4>
                        </div>
                        <div class="pt-2">
                            <p class="mb-0">Banking,SSC,Railway Exams & Many more</p>
                        </div>
                    </div>
                </div>
                <div class="row pt-5">
                    <div class="pl-4 theme-border-left">
                        <img src="img/test-yourself.svg"><br>
                        <div class="pt-2">
                            <h4>TEST YOURSELF</h4>
                        </div>
                        <div class="pt-2">
                            <p class="mb-0">Download Answer Keys,Solutions,GK GS & Many more</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="hero" class="hero d-flex align-items-center top-header">
    <div class="my-5 text-center container">
        <div class="row mb-2">
            <div class="col text-center mb-4">
                <h2>Recent Uploaded Videos</h2>
                <span>Lorem ispsum simply dummy text of the printing</span>
            </div>
        </div>
        <div class="row d-flex align-items-center">
            <div class="col-1 d-flex align-items-center justify-content-center">
                <a href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <div class="carousel-nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path d="m88.6,121.3c0.8,0.8 1.8,1.2 2.9,1.2s2.1-0.4 2.9-1.2c1.6-1.6 1.6-4.2 0-5.8l-51-51 51-51c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8,0l-54,53.9c-1.6,1.6-1.6,4.2 0,5.8l54,53.9z"/>
                        </svg>
                    </div>
                </a>
            </div>
            <div class="col-10">
                <!--Start carousel-->
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-4">
                                    <iframe width="100%" height="250" src="https://www.youtube.com/embed/mU9LrU3V8-k" title="&quot;Crack OSSC CGLRE Exam with Current Affairs and Computer Awareness Expected Questions&quot; 2023." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                                <div class="col-md-4">
                                    <iframe width="100%" height="250" src="https://www.youtube.com/embed/0Q1WJBsATJ0" title="&quot;Crack OSSC CGLRE Exam with Current Affairs and Computer Awareness Expected Questions&quot; 2023." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                                <div class="col-md-4">
                                    <iframe width="100%" height="250" src="https://www.youtube.com/embed/01Yz-IFfKeY" title="osssc peo and ja new exam date update notification 2023." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <iframe width="100%" height="250" src="https://www.youtube.com/embed/hsXZQXmvg3s" title="&quot;Crack OSSC CGLRE Exam with Current Affairs and Computer Awareness Expected Questions&quot; 2023." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                                <div class="col-md-4">
                                    <iframe width="100%" height="250" src="https://www.youtube.com/embed/UP0qcGJQD9o" title="&quot;Crack OSSC CGLRE Exam with Current Affairs and Computer Awareness Expected Questions&quot; 2023." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                                <div class="col-md-4">
                                    <iframe width="100%" height="250" src="https://www.youtube.com/embed/utwcdHU7T0Q" title="&quot;Crack OSSC CGLRE Exam with Current Affairs and Computer Awareness Expected Questions&quot; 2023." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End carousel-->
            </div>
            <div class="col-1 d-flex align-items-center justify-content-center"><a  href="#carouselExampleIndicators" data-slide="next">
                    <div class="carousel-nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path d="m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z"/>
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
