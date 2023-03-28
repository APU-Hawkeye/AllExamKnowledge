<?php
/**
 * @var App\View\AppView $this
 */
?>
<section class="top-header">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <nav id="navbar" class="navbar">
            <ul></ul>
            <ul>
                <li>call</li>
                <li>email</li>
            </ul>
            <ul></ul>
        </nav>
    </div>
</section>
<header id="header" class="header">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <nav id="navbar" class="navbar">
            <a class="logo d-flex align-items-center" href="<?php echo $this->Url->build([
                "controller" => "Pages",
                "action" => "index"
            ]); ?>"><?php echo $this->Html->image('logo.png', ['alt'=>'alk', 'class' => 'img-fluid']);?> </a>
            <ul>
                <li class="nav-item active"><a class="nav-link" href="#"><?php echo __('Home')?></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><?php echo __('About us')?></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><?php echo __('Videos')?></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><?php echo __('Contact Us')?></a></li>
            </ul>
            <ul class="d-none d-md-flex d-lg-flex">
                <li class="nav-item"><a href="<?php echo $this->Url->build([
                        "controller" => "Customers",
                        "action" => "login"
                    ]); ?>" class="getstarted"><?php echo __("SignUp/Login");?></a></li>
            </ul>
        </nav>
    </div>
</header>

