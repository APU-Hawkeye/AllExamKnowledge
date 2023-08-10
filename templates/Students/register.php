<?php
/**
 * @var \Cake\View\View $this
 * @var \App\Model\Entity\Student $student
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
                            <?php echo $this->Flash->render(); ?>
                            <?php echo $this->Form->create($student, [
                                'autocomplete' => 'off',
                                'data-submit' => 'disable',
                                'novalidate',
                                'templates' => [
                                    'inputContainer' => '<div class="form-group">{{content}}</div>',
                                    'inputContainerError' => '<div class="form-group was-validated">{{content}}{{error}}</div>',
                                    'error' => '<div class="invalid-feedback mt-2">{{content}}</div>',
                                    'label' => '<label class="tx-12 font-weight-bold tx-spacing-2"{{attrs}}>{{text}}</label>',
                                ],
                                'class' => implode(' ', array_filter([
                                    'needs-validation',
                                    $student->hasErrors() ? 'was-validated' : null,
                                ]))
                            ]);
                            $this->Form->setConfig([
                                'autoSetCustomValidity' => false,
                                'errorClass' => 'is-invalid'
                            ])
                            ?>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="mb-2 text-muted" for="name">First Name</label>
                                        <?php echo $this->Form->control('first_name', [
                                            'type' => 'string',
                                            'class' => 'form-control',
                                            'label' =>  false,
                                            'required' => true,
                                            'templates' => [
                                                'label' => '<label class="tx-12 font-weight-bold tx-spacing-2 required"{{attrs}}>{{text}}</label>',
                                            ],
                                            'templateVars' => [
                                                'errorDiv' => '<div class="invalid-feedback mt-2 tx-12 tx-spacing-2"></div>'
                                            ],
                                        ]); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-2 text-muted" for="name">Last Name</label>
                                        <?php echo $this->Form->control('last_name', [
                                            'type' => 'string',
                                            'class' => 'form-control',
                                            'label' =>  false,
                                            'required' => true,
                                            'templates' => [
                                                'label' => '<label class="tx-12 font-weight-bold tx-spacing-2 required"{{attrs}}>{{text}}</label>',
                                            ],
                                            'templateVars' => [
                                                'errorDiv' => '<div class="invalid-feedback mt-2 tx-12 tx-spacing-2"></div>'
                                            ],
                                        ]); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                <?php echo $this->Form->control('email', [
                                    'type' => 'string',
                                    'class' => 'form-control',
                                    'label' =>  false,
                                    'required' => true,
                                    'templates' => [
                                        'label' => '<label class="tx-12 font-weight-bold tx-spacing-2 required"{{attrs}}>{{text}}</label>',
                                    ],
                                    'templateVars' => [
                                        'errorDiv' => '<div class="invalid-feedback mt-2 tx-12 tx-spacing-2"></div>'
                                    ],
                                ]); ?>
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="password">Password</label>
                                <?php echo $this->Form->control('password', [
                                    'class' => 'form-control',
                                    'label' =>  false,
                                    'required' => true,
                                    'templates' => [
                                        'label' => '<label class="tx-12 font-weight-bold tx-spacing-2 required"{{attrs}}>{{text}}</label>',
                                    ],
                                    'templateVars' => [
                                        'errorDiv' => '<div class="invalid-feedback mt-2 tx-12 tx-spacing-2"></div>'
                                    ],
                                ]); ?>
                            </div>
                            <p class="form-text text-muted mb-3">
                                By registering you agree with our terms and condition.
                            </p>

                            <div class="align-items-center d-flex">
                                <button type="submit" class="btn btn-primary btn-theme ms-auto">
                                    <?php echo __("Register"); ?>
                                </button>
                            </div>
                            <?php echo $this->Form->end(); ?>
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
