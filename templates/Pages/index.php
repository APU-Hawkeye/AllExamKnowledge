<?php
/**
 * @var App\View\AppView $this
 */
?>

<section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-4">
                <h1 class="text-uppercase">Welcome to All Exam <span>Knowledge! <img src="img/logo-pen-icon.png" alt=""></span></h1>
                <p>All Exam Knowledge is a one-stop online education platform that provides comprehensive exam preparation services for SSC, UPSC, RAILWAY, Banking, JEE and many more.</p>
                <div class="d-flex">
                    <a href="#about" class="btn-get-started scrollto">Register Now</a>

                </div>
            </div>
            <div class="col-lg-5 text-center mb-4">
                <img src="img/hero-img.png" alt="" class="img-fluid">
            </div>
        </div>

    </div>
</section><!-- End Hero -->

<main id="main">
    <!-- ======= Coming video Section ======= -->
    <section class="coming-video py-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Swiper -->
                    <div class="swiper coming-video-swiper mySwiper shadow-lg">
                        <div class="swiper-wrapper ">
                            <div class="swiper-slide">
                                <div class="card w-100 border-0">
                                    <div class="card-body">
                                        <div class="coming-video-wrapper gap-3 gap-lg-5">
                                            <div class="coming-video-col gap-3">
                                                <div>
                                                    <img src="img/laptop-video-icon.png" width="120" alt="">
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <h4>New Video are coming on GK-GS</h4>
                                                    <p>Prepare for you recent exam, watch the video</p>
                                                </div>
                                            </div>
                                            <div class="coming-video-col">
                                                <div class="video-divider">

                                                </div>
                                            </div>
                                            <div class="coming-video-col flex-column align-items-start">
                                                <h5>Coming on Youtube</h5>
                                                <div class="d-flex gap-3">
                                                    <p><span class="bi bi-calendar"></span> 24 April 2023</p>
                                                    <p><span class="bi bi-clock"></span> 05:30PM</p>
                                                </div>
                                                <div>
                                                    <a href="#" class="btn btn-theme btn-primary">Notify Me</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="swiper-slide">Slide 2</div> -->
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- ======= //Coming video Section ======= -->
    <section class="news-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-border mb-3 w-100">
                        <div class="card-header cardHeading">
                            <h5 class="text-center">Latest Government Jobs</h5>
                        </div>
                        <div class="card-body news-list">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">
                                    <span class="float-left">Odisha PSC Cuttack </span>
                                    <span class="float-end"><?php echo $this->Html->link('View', '/files/OdisaPscCuttack.pdf', ['class' => 'pdf-link', 'target' => '_blank']);?></span>
                                </li>
                                <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">
                                    <span class="float-left">Sashastra Seema Bal </span>
                                    <span class="float-end"><?php echo $this->Html->link('View', '/files/SashastraSeemaBal.pdf', ['class' => 'pdf-link', 'target' => '_blank']);?></span>
                                </li>
<!--                                <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Cras justo odio<a href="#" class="float-end">click here</a></li>-->
<!--                                <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Dapibus ac facilisis in<a href="#" class="float-end">click here</a></li>-->
<!--                                <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Vestibulum at eros<a href="#" class="float-end">click here</a></li>-->
<!--                                <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Cras justo odio<a href="" class="float-end">click here</a></li>-->
<!--                                <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Dapibus ac facilisis in<a href="#" class="float-end">click here</a></li>-->
<!--                                <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Vestibulum at eros<a href="#" class="float-end">click here</a></li>-->
<!--                                <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Cras justo odio<a href="" class="float-end">click here</a></li>-->
<!--                                <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Dapibus ac facilisis in<a href="#" class="float-end">click here</a></li>-->
<!--                                <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Vestibulum at eros<a href="#" class="float-end">click here</a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-border mb-3 w-100">
                        <div class="card-header cardHeading">
                            <h5 class="text-center">News &amp; Events</h5>
                        </div>
                        <div class="card-body news-list">
                            <ul class="list-group list-group-flush">
                                <span class="text-center">Coming Soon</span>
<!--                                <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Cras justo odio<a href="#" class="float-end">click here</a></li>-->
<!--                                <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Dapibus ac facilisis in<a href="#" class="float-end">click here</a></li>-->
<!--                                <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Vestibulum at eros<a href="#" class="float-end">click here</a></li>-->
<!--                                <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Cras justo odio<a href="#" class="float-end">click here</a></li>-->
<!--                                <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Dapibus ac facilisis in<a href="#" class="float-end">click here</a></li>-->
<!--                                <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Vestibulum at eros<a href="#" class="float-end">click here</a></li>-->
<!--                                <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Cras justo odio<a href="#" class="float-end">click here</a></li>-->
<!--                                <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Dapibus ac facilisis in<a href="#" class="float-end">click here</a></li>-->
<!--                                <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Vestibulum at eros<a href="#" class="float-end">click here</a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="solutions section-bg">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10 text-center">
                    <h2 class="fw-bold text-black">Download Answer Key, Solution, GKGS & Many more </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="swiper solSwiper px-3">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="card card-border mb-3 w-100">
                                    <div class="card-header cardHeading">
                                        <h5 class="text-center">MCQ Question Papers</h5>
                                    </div>
                                    <div class="card-body notifications-carousel">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">
                                                <span class="float-left">Odisha High Court ASO Preliminary Questions 2023</span><span class="float-end"><?php echo $this->Html->link('View', '/files/OdishaHighCourtASOPreliminaryQuestions2023.pdf', ['class' => 'pdf-link', 'target' => '_blank']);?></span>
                                            </li>
                                            <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">
                                                <span class="float-left">MCQ Questions 1</span><span class="float-end"><?php echo $this->Html->link('View', '/files/mcq.pdf', ['class' => 'pdf-link', 'target' => '_blank']);?></span>
                                            </li>
                                            <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">
                                                <span class="float-left">Geography 1000 MCQ Questions</span><span class="float-end"><?php echo $this->Html->link('View', '/files/DishaThousandMcq.pdf', ['class' => 'pdf-link', 'target' => '_blank']);?></span>
                                            </li>
                                        </ul>
                                        <div class="w-100 d-flex align-items-center justify-content-center">
                                            <a href="#" class="text-primary">See All <i class="bx bx-right-arrow-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card card-border mb-3 w-100">
                                    <div class="card-header cardHeading">
                                        <h5 class="text-center">Reasoning</h5>
                                    </div>
                                    <div class="card-body notifications-carousel">
                                        <span class="text-center">Coming Soon</span>
                                        <ul class="list-group list-group-flush">
<!--                                            <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Cras justo odio<a href="#" class="float-end"><i class="bx bx-download"></i></a></li>-->
<!--                                            <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Dapibus ac facilisis in<a href="#" class="float-end"><i class="bx bx-download"></i></a></li>-->
<!--                                            <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Vestibulum at eros<a href="#" class="float-end"><i class="bx bx-download"></i></a></li>-->
<!--                                            <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Cras justo odio<a href="" class="float-end"><i class="bx bx-download"></i></a></li>-->
<!--                                            <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Dapibus ac facilisis in<a href="#" class="float-end"><i class="bx bx-download"></i></a></li>-->
                                        </ul>
                                        <div class="w-100 d-flex align-items-center justify-content-center">
                                            <a href="#" class="text-primary">See All <i class="bx bx-right-arrow-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card card-border mb-3 w-100">
                                    <div class="card-header cardHeading">
                                        <h5 class="text-center">Current Affairs</h5>
                                    </div>
                                    <div class="card-body notifications-carousel">
                                        <span class="text-center">Coming Soon</span>
                                        <ul class="list-group list-group-flush">
<!--                                            <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Cras justo odio<a href="#" class="float-end"><i class="bx bx-download"></i></a></li>-->
<!--                                            <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Dapibus ac facilisis in<a href="#" class="float-end"><i class="bx bx-download"></i></a></li>-->
<!--                                            <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Vestibulum at eros<a href="#" class="float-end"><i class="bx bx-download"></i></a></li>-->
<!--                                            <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Cras justo odio<a href="" class="float-end"><i class="bx bx-download"></i></a></li>-->
<!--                                            <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Dapibus ac facilisis in<a href="#" class="float-end"><i class="bx bx-download"></i></a></li>-->
                                        </ul>
                                        <div class="w-100 d-flex align-items-center justify-content-center">
                                            <a href="#" class="text-primary">See All <i class="bx bx-right-arrow-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!--                            <div class="swiper-slide">-->
<!--                                <div class="card card-border mb-3 w-100">-->
<!--                                    <div class="card-header cardHeading">-->
<!--                                        <h5 class="text-center">Reasoning</h5>-->
<!--                                    </div>-->
<!--                                    <div class="card-body .notifications-carousel">-->
<!--                                        <ul class="list-group list-group-flush">-->
<!--                                            <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Cras justo odio<a href="#" class="float-end"><i class="bx bx-download"></i></a></li>-->
<!--                                            <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Dapibus ac facilisis in<a href="#" class="float-end"><i class="bx bx-download"></i></a></li>-->
<!--                                            <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Vestibulum at eros<a href="#" class="float-end"><i class="bx bx-download"></i></a></li>-->
<!--                                            <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Cras justo odio<a href="" class="float-end"><i class="bx bx-download"></i></a></li>-->
<!--                                            <li class="list-group-item py-3"><img src="img/notification-icon.png" class="me-2" alt="">Dapibus ac facilisis in<a href="#" class="float-end"><i class="bx bx-download"></i></a></li>-->
<!--                                        </ul>-->
<!--                                        <div class="w-100 d-flex align-items-center justify-content-center">-->
<!--                                            <a href="#" class="text-primary">See All <i class="bx bx-right-arrow-alt"></i></a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10 text-center">
                    <h2 class="fw-bold">Learn From The Best </h2>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h4 class="mb-4 fw-bold">About Us</h4>
                    <p>
                        All Exam Knowledge is an educational platform for all competitive exam aspirants from India. We have been preparing candidates for various state and central examinations for over a decade. Throughout our journey we have consistently followed our ideology of making competitive exam coaching accessible and affordable for all Indian students.
                    </p>
                    <div>
                        <a href="#" class="btn btn-theme btn-primary">Know More</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="img/about.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- ======= why-us Section ======= -->
    <section class="why-us">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-10">
                    <h2 class="fw-bold text-black">Why Content with us</h2>
                    <p>Comprehensive Study Material,Expert Faculty at Your Disposal, Interactive Learning Experience, Convenience at Your Fingertips</p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-4 mb-4">
                    <img src="img/why-img.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 ps-5">
                    <div class="row mb-5">
                        <div class="col-lg-6 why-column">
                            <div class="mb-2">
                                <span class="bi bi-bank"></span>
                            </div>
                            <h6 class="text-dark text-uppercase fw-bold">Government Exams</h6>
                            <p class="mb-0">
                                Banking, SSC, Railways, Defence, Teaching & Many more
                            </p>
                        </div>
                        <div class="col-lg-6 why-column">
                            <div class="mb-2">
                                <span><img src="img/support-icon.png" alt=""></span>
                            </div>
                            <h6 class="text-dark text-uppercase fw-bold">Mentor Supports</h6>
                            <p class="mb-0">
                                Banking,SSC,Railway Exams & Many more
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 why-column">
                            <div class="mb-2">
                                <span><img src="img/download-icon.png" width="43" alt=""></span>
                            </div>
                            <h6 class="text-dark text-uppercase fw-bold">Download PDF</h6>
                            <p class="mb-0">
                                Download Answer Key, Solution, GKGS & Many more
                            </p>
                        </div>
                        <div class="col-lg-6 why-column">
                            <div class="mb-2">
                                <span><img src="img/test-icon.png" alt=""></span>
                            </div>
                            <h6 class="text-dark text-uppercase fw-bold">Test yourself</h6>
                            <p class="mb-0">
                                Download Answer Keys,Solutions,GK GS & Many more
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pb-0 upload-video-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold text-black">Uploaded Today Video</h2>
                    <p></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 position-relative">
                    <div class="uploaded-video">
                        <div class="row">
                            <div class="col-lg-6">
                                <iframe width="100%" height="250" src="https://www.youtube.com/embed/upzp4xG8kUc" title="Osssc Panchayat Executive Officer and Junior Assistant Exam Expected GK Questions Analysis 2023." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <div class="col-lg-6">
                                <iframe width="100%" height="250" src="https://www.youtube.com/embed/4X7IlmXZNBQ" title="Osssc Panchayat Executive Officer and Junior Assistant Exam 2023: Expected Computer Questions." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-bg recent-video-section" >
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold text-black">Recent Uploaded Video</h2>
                    <p>Comprehensive Study Material,Expert Faculty at Your Disposal, Interactive Learning Experience, Convenience at Your Fingertips</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="swiper videoSwiper px-3">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <iframe width="100%" height="250" src="https://www.youtube.com/embed/Neq4wyxwHis" title="Osssc Panchayat Executive Officer and Junior Assistant Exam Expected GK Questions Analysis 2023." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <div class="swiper-slide">
                                <iframe width="100%" height="250" src="https://www.youtube.com/embed/BY4o0p9qydY" title="Ossc CGLRE Main Exam 2023 Date Out! Latest Update Notification." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <div class="swiper-slide">
                                <iframe width="100%" height="250" src="https://www.youtube.com/embed/mHU0zfe8ZkM" title="Ossc Chsl Exam 300+ Post Vacancy Exam Pattern Syllabus Details Notification 2023." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <div class="swiper-slide">
                                <iframe width="100%" height="250" src="https://www.youtube.com/embed/mHU0zfe8ZkM" title="Ossc Chsl Exam 300+ Post Vacancy Exam Pattern Syllabus Details Notification 2023." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <div class="swiper-slide">
                                <iframe width="100%" height="250" src="https://www.youtube.com/embed/f9Wnn_mJpgM" title="Ossc Chsl Exam 300+ Post Vacancy Details Notification 2023." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                            <div class="swiper-slide">
                                <iframe width="100%" height="250" src="https://www.youtube.com/embed/mU9LrU3V8-k" title="&quot;Crack OSSC CGLRE Exam with Current Affairs and Computer Awareness Expected Questions&quot; 2023." frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

