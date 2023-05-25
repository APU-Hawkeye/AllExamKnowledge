<?php
/**
 * @var App\View\AppView $this
 */
?>
<style>
    .heros {
        width: 100%;
        position: relative; }
    .heros h1 {
        margin: 0;
        font-size: 40px;
        font-weight: bold;
        color: #191c1f;
        text-transform: uppercase;
        line-height: 1; }
    .hero-dot
    {
        position: absolute;
        right: 10px;
        transform: rotate(90deg);
    }
    .heros h2 {
        color: #191c1f;
        margin: 15px 0 0 0;
        font-size: 24px;
        line-height: 1.5;
        font-weight: 500; }
    .heros .btn-get-started {
        margin-top: 30px;
        padding: 15px 40px;
        border-radius: 4px;
        transition: 0.5s;
        color: #fff;
        background-color: #00124c !important;
        border: 1px solid #00124c;
        border-radius: 10px; }
    .heros .btn-get-started span {
        font-family: inherit;
        font-weight: 500;
        font-size: 16px;
        letter-spacing: 1px; }
    .heros .btn-get-started i {
        margin-left: 5px;
        font-size: 18px;
        transition: 0.3s; }
    .heros .btn-get-started:hover i {
        transform: translateX(5px); }
    .heros.hero-img {
        background-image: url("img/about-us-banner.png");
        position: relative;
        background-size: cover;
        padding: 40px 0;
        width: 100%;
        height: 100%;
        background-repeat: no-repeat;
        background-position: 100%;
        top: 0; }

    .heading {
        font-family: Helvetica;
    }
    .theme-border-left
    {
        border-left: 2px solid #fe2e2d;
    }
    .color-background {
        background: #eaefff;
    }
</style>
<section class="heros hero-img">
    <div class="container">
        <h1 style="color: white" class="mb-3">ABOUT US</h1>
        <p style="color: black">HOME | ABOUT US</p>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h3 data-aos="fade-up" class="mb-4">About Us</h3>
                <p>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
            <div class="col-lg-6">
                <img src="img/about-us-img.png" alt="">
            </div>
        </div>
    </div>
</section>
<section class="color-background">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="img/girl-studying.png" alt="">
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <p class="mb-5">when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <div class="row">
                    <div class="col-lg-5 pl-5">
                        <div class="row">
                            <div class="pl-4 theme-border-left">
                                <img src="img/rankone.svg"><br>
                                <div class="pt-2">
                                    <h4>RANKED #1</h4>
                                </div>
                                <div class="pt-2">
                                    <p class="mb-0">Best Learning Platform</p>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="pl-4 theme-border-left">
                                <img src="img/100ksubcribers.svg"><br>
                                <div class="pt-2">
                                    <h4>100K+</h4>
                                </div>
                                <div class="pt-2">
                                    <p class="mb-0">Youtube subscribers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 pl-5">
                        <div class="row">
                            <div class="pl-4 theme-border-left">
                                <img src="img/onemilion.svg"><br>
                                <div class="pt-2">
                                    <h4>1M+</h4>
                                </div>
                                <div class="pt-2">
                                    <p class="mb-0">Monthly Active User</p>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="pl-4 theme-border-left">
                                <img src="img/500students.svg"><br>
                                <div class="pt-2">
                                    <h4>500+</h4>
                                </div>
                                <div class="pt-2">
                                    <p class="mb-0">Student Selections</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="mb-5 mt-5">
            <h3 class="heading"><b>Why Content with us</b></h3>
            <p>lorem ipsum is simply dummy text of the printing and typesetting industry.</p>
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


