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
                            <h1 class="fs-4 card-title fw-bold mb-4 auth-header">Register <span class="fw-normal fs-5 float-end">
                                    <a href="<?php echo $this->Url->build([
                                        'controller' => 'Pages',
                                        'action' => 'index',
                                    ])?>"><i class="bi bi-arrow-left me-2"></i><small>Back</small></a></span>
                            </h1>
                            <form method="POST" class="needs-validation auth-form" novalidate="" autocomplete="off">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="name">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                                    <div class="invalid-feedback">
                                        Name is required
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="" required>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <p class="form-text text-muted mb-3">
                                    By registering you agree with our terms and condition.
                                </p>

                                <div class="align-items-center d-flex">
                                    <button type="submit" class="btn btn-theme btn-primary ms-auto">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                                Already have an account? <a href="<?php echo $this->Url->build([
                                    'controller' => 'Students',
                                    'action' => 'login',
                                ])?>" class="text-danger">Login</a>
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
