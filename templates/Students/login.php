<?php
/**
 * @var \Cake\View\View $this
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title><?php echo __('Register'); ?></title>

    <?php echo $this->Html->css([
        '/lib/aos/aos',
        '/lib/bootstrap/css/bootstrap.min',
        '/lib/bootstrap-icons/bootstrap-icons',
        '/lib/boxicons/css/boxicons.min',
        '/lib/swiper/swiper-bundle.min',
        'style',
    ])?>
    <?php echo $this->fetch('css')?>
</head>
<body>
    <section class="h-100 bg-light py-0">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'index',
                            ])?>">
                            <?php echo $this->Html->image('logo.png', ['alt'=>'logo', 'class' => 'img-fluid', 'width' => "150"]);?>
                        </a>
                    </div>
                    <div class="card shadow-lg border-0">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4 auth-header">Welcome Back <span class="fw-normal fs-5 float-end">
                                    <a href="<?php echo $this->Url->build([
                                        'controller' => 'Pages',
                                        'action' => 'index',
                                    ])?>"><i class="bi bi-arrow-left me-2"></i><small>Back</small></a></span>
                            </h1>
                            <?php echo $this->Flash->render(); ?>
                            <?php echo $this->Form->create(null, [
                                'autocomplete' => 'off',
                                'data-submit' => 'disable',
                                'templates' => [
                                    'inputContainer' => '{{content}}',
                                    'inputErrorContainer' => '{{content}}'
                                ]
                            ]); ?>
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                <?php echo $this->Form->control('username', [
                                    'label' => false,
                                    'class' => 'form-control',
                                ]) ?>
                                <div class="invalid-feedback">
                                    Email is invalid
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="mb-2 w-100">
                                    <label class="text-muted" for="password">Password</label>
                                    <a href="forgot.html" class="float-end">
                                        Forgot Password?
                                    </a>
                                </div>
                                <?php echo $this->Form->control('password', [
                                    'label' => false,
                                    'class' => 'form-control',
                                ]) ?>
                                <div class="invalid-feedback">
                                    Password is required
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                    <label for="remember" class="form-check-label">Remember Me</label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-theme ms-auto"><?php echo __("Login"); ?></button>
                            </div>

<!--                            <form method="POST" class="needs-validation auth-form" novalidate="" autocomplete="off">-->
<!--                                <div class="mb-3">-->
<!--                                    <label class="mb-2 text-muted" for="email">E-Mail Address</label>-->
<!--                                    <input id="email" type="email" class="form-control" name="email" value="" required autofocus>-->
<!--                                    <div class="invalid-feedback">-->
<!--                                        Email is invalid-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="mb-3">-->
<!--                                    <div class="mb-2 w-100">-->
<!--                                        <label class="text-muted" for="password">Password</label>-->
<!--                                        <a href="forgot.html" class="float-end">-->
<!--                                            Forgot Password?-->
<!--                                        </a>-->
<!--                                    </div>-->
<!--                                    <input id="password" type="password" class="form-control" name="password" required>-->
<!--                                    <div class="invalid-feedback">-->
<!--                                        Password is required-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="d-flex align-items-center">-->
<!--                                    <div class="form-check">-->
<!--                                        <input type="checkbox" name="remember" id="remember" class="form-check-input">-->
<!--                                        <label for="remember" class="form-check-label">Remember Me</label>-->
<!--                                    </div>-->
<!--                                    <button type="submit" class="btn btn-primary btn-theme ms-auto">-->
<!--                                        Login-->
<!--                                    </button>-->
<!--                                </div>-->
<!--                            </form>-->
                            <?php echo $this->Form->end(); ?>
                        </div>
                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                                Don't have an account? <a href="<?php echo $this->Url->build([
                                    'controller' => 'Students',
                                    'action' => 'register',
                                ])?>" class="text-danger">Create One</a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5 text-muted">
                        <div class="copyright">
                            &copy; Copyright 2023<strong> <span>allexamknowledge </span></strong>Pvt. Ltd.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <?php echo $this->Html->script([
        '/lib/purecounter/purecounter_vanilla',
        '/lib/aos/aos',
        '/lib/bootstrap/js/bootstrap.bundle.min',
        '/lib/isotope-layout/isotope.pkgd.min',
        '/lib/swiper/swiper-bundle.min',
        '/lib/waypoints/noframework.waypoints',
        '/lib/php-email-form/validate',
        'main',
    ]); ?>
    <?php echo $this->fetch('js'); ?>
</body>
