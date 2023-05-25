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
        background-image: url("img/contact-us-banner.png");
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
        <h1 style="color: white" class="mb-3">CONTACT US</h1>
        <p style="color: black">HOME | CONTACT US</p>
    </div>
</section>
