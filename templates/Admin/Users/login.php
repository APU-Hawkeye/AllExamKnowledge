<?php
/**
 * @var \App\View\AppView $this
 * @var string $titleForLayout
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
    <title><?php echo $titleForLayout; ?></title>
    <?php $this->Html->css([
        "bootstrap.min",
        "animate",
        "icons",
        "app-style",
    ], [
        "block" => "stylesheets"
    ]); ?>
    <?php echo $this->fetch('stylesheets'); ?>
</head>

<body>
<!-- Start wrapper-->
<div id="wrapper">
    <style>
        img {
            max-width: 70%;
            height: 70%;
        }
    </style>
    <div class="height-100v d-flex align-items-center justify-content-center">
        <div class=" card-authentication1 border-primary border-top-sm mx-auto">
            <div class="card-group">
                <div class="card mb-0 ">
                    <div class="card-body">
                        <div class="card-content p-3">
                            <div class="text-center">
                                <!--<img src="assets/images/logo-icon.png">-->
                                <?php echo $this->Html->image('logo.png')?>
                            </div>
                            <div class="card-title text-center py-3"><?php echo __("Sign In"); ?></div>
                            <?php echo $this->Flash->render(); ?>
                            <?php echo $this->Form->create(null, [
                                'autocomplete' => 'off',
                                'data-submit' => 'disable',
                                'templates' => [
                                    'inputContainer' => '{{content}}',
                                    'inputErrorContainer' => '{{content}}'
                                ]
                            ]); ?>
                            <div class="form-group">
                                <div class="position-relative has-icon-left">
                                    <label for="username" class="sr-only"><?php echo __("Username"); ?></label>
                                    <?php echo $this->Form->control('username', [
                                        'label' => false,
                                        'class' => 'form-control',
                                        'placeholder' => __('Your Username')
                                    ]) ?>
                                    <div class="form-control-position">
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="position-relative has-icon-left">
                                    <label for="password" class="sr-only"><?php echo __("Password"); ?></label>
                                    <?php echo $this->Form->control('password', [
                                        'label' => false,
                                        'class' => 'form-control',
                                        'placeholder' => __('Your Password')
                                    ]) ?>
                                    <div class="form-control-position">
                                        <i class="icon-lock"></i>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-block waves-effect waves-light"><?php echo __("Sign In"); ?></button>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
</div><!--wrapper-->
<?php $this->Html->script([
    'jquery.min',
    'popper.min',
    'bootstrap.min'
], [
    'block' => 'js'
]) ?>
<?php echo $this->fetch('js'); ?>
</body>
</html>
