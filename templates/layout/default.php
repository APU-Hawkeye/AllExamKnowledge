<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 *  @var string $titleForLayout
 */

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $titleForLayout; ?></title>
    <?php echo $this->Html->meta('favicon.ico', '/img/logo.png', ['type' => 'icon']); ?>

    <?php echo $this->Html->css([
        '/lib/aos/aos',
        '/lib/bootstrap/css/bootstrap.min',
        '/lib/bootstrap-icons/bootstrap-icons',
        '/lib/boxicons/css/boxicons.min',
        '/lib/swiper/swiper-bundle.min',
        'style',
    ])?>
    <?php echo $this->fetch('css')?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<!-- ======= Header ======= -->
<?php echo $this->element("header"); ?>
<!-- End Header -->

<?php echo $this->fetch("content"); ?>

<!-- ======= Footer ======= -->
<?php echo $this->element("footer"); ?>
<!-- End Footer -->
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
</html>
