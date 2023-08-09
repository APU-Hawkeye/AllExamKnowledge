<?php
/**
 * @var App\View\AppView $this
 */
?>
<head>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1516212154764308"
            crossorigin="anonymous"></script>
</head>
<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-telephone d-flex align-items-center"><span>+91 97785 39234</span></i>
            <i class="bi bi-envelope d-flex align-items-center ms-4"><a href="mailto:contact@example.com">contact@allexamknowledge.com</a></i>
        </div>
    </div>
</section>
<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <h1 class="logo "><a href="<?php echo $this->Url->build([
                'controller' => 'Pages',
                'action' => 'index',
            ])?>"><?php echo $this->Html->image('logo.png', ['alt'=>'alk', 'class' => 'img-fluid']);?></a></h1>
        <nav id="navbar" class="navbar order-3 order-lg-2">
            <ul>
                <li><a class="nav-link active" href="<?php echo $this->Url->build([
                    'controller' => 'Pages',
                    'action' => 'index',
                ])?>">Home</a></li>
                <li><a class="nav-link" href="<?php echo $this->Url->build([
                    'controller' => 'Pages',
                    'action' => 'aboutUs',
                ])?>">About Us</a></li>
                <li><a class="nav-link" href="<?php echo $this->Url->build([
                    'controller' => 'Pages',
                    'action' => 'downloadPdf',
                ])?>">GK Section</a></li>
                <li><a class="nav-link" href="<?php echo $this->Url->build([
                    'controller' => 'Pages',
                    'action' => 'downloadPdf',
                ])?>">Current Affairs</a></li>
                <li><a class="nav-link" href="<?php echo $this->Url->build([
                    'controller' => 'Pages',
                    'action' => 'downloadPdf',
                ])?>">Syllabus</a></li>
                <li><a class="nav-link" href="<?php echo $this->Url->build([
                    'controller' => 'Pages',
                    'action' => 'downloadPdf',
                ])?>">Previous Year QS</a></li>
                <li><a class="nav-link" href="<?php echo $this->Url->build([
                    'controller' => 'Pages',
                    'action' => 'downloadPdf',
                ])?>"><span>Downloads</span></a>
<!--                    <ul>-->
<!--                        <li><a href="#">Drop Down 1</a></li>-->
<!--                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>-->
<!--                            <ul>-->
<!--                                <li><a href="#">Deep Drop Down 1</a></li>-->
<!--                                <li><a href="#">Deep Drop Down 2</a></li>-->
<!--                                <li><a href="#">Deep Drop Down 3</a></li>-->
<!--                                <li><a href="#">Deep Drop Down 4</a></li>-->
<!--                                <li><a href="#">Deep Drop Down 5</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li><a href="#">Drop Down 2</a></li>-->
<!--                        <li><a href="#">Drop Down 3</a></li>-->
<!--                        <li><a href="#">Drop Down 4</a></li>-->
<!--                    </ul>-->
                </li>
<!--                <li><a class="nav-link" href="#">Test your self</a></li>-->
                <li><a class="nav-link" href="<?php echo $this->Url->build([
                        'controller' => 'Pages',
                        'action' => 'contactUs',
                ])?>">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
        <a href="<?php echo $this->Url->build([
            'controller' => 'Students',
            'action' => 'login',
        ])?>" class="btn btn-primary btn-theme gap-2 d-flex align-items-center order-2 order-lg-3"><span class="">Login / Signup</span><span class="bx bx-user"></span></a>
    </div>
</header><!-- End Header -->

