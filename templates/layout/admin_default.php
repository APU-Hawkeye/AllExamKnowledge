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
    <link href="<?php echo $this->Url->build("/") ?>img/favicon.png" rel="icon">
    <title><?php echo $titleForLayout; ?></title>
    <?php echo $this->Html->css([
        'bootstrap.min',
        'animate',
        'sidebar-menu',
        'app-style',
        'icons',
    ]); ?>
    <style>
        td {
            font-size: 13px;
        }
    </style>
    <?php echo $this->fetch('stylesheets'); ?>
</head>

<body>

<!-- Start wrapper-->
<div id="wrapper">

    <?php echo $this->element('admin_sidebar'); ?>

    <div class="clearfix"></div>

    <?php echo $this->fetch('content'); ?>

    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
</div><!--End wrapper-->
<?php echo $this->Html->script([
    'jquery.min',
    'popper.min',
    'bootstrap.min',
    'sidebar-menu',
    'app-script',
    'waves'
]); ?>
<?php echo $this->fetch('js'); ?>
</body>
