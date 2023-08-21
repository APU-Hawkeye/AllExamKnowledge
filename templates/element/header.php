<?php
/**
 * @var App\View\AppView $this
 * @var \Cake\Datasource\ResultSetInterface $categories
 * @var \Cake\Datasource\ResultSetInterface $subCategories
 */
$student = $this->getRequest()->getAttribute('identity');
$param = $this->getRequest()->getParam('action');
?>
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
                <?php
                /** @var \App\Model\Entity\Category $category */
                foreach ($categories as $key => $category) {
                    $collection = new \Cake\Collection\Collection($subCategories) ;
                    $subMatch = $collection->match(['category.id' => $category->id]);
                    if($key <= 3) {?>
                        <li class="<?php echo $subMatch ? 'dropdown' : ''?>">
                            <a class="nav-link" href=""><?php echo $category->title ?></a>
                            <?php
                            /** @var \App\Model\Entity\SubCategory $subCat */
                            foreach ($subMatch as $subCat) { ?>
                            <ul>
                                <li><a href="#"><?php echo $subCat->title ?></a></li>
                            </ul>
                            <?php } ?>
                        </li>
                    <?php }?>
                <?php } ?>
                </li>
<!--                <li><a class="nav-link" href="#">Test your self</a></li>-->
                <li><a class="nav-link" href="<?php echo $this->Url->build([
                        'controller' => 'Pages',
                        'action' => 'contactUs',
                ])?>">Contact</a></li>
                <?php if ($student) { ?>
                    <li><a class="nav-link" href="<?php echo $this->Url->build([
                            'controller' => 'Students',
                            'action' => 'dashboard',
                    ])?>"><?php echo __('Dashboard')?></a></li>
                <?php } ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
        <?php if ($student) {?>
            <a href="<?php echo $this->Url->build([
                'controller' => 'Students',
                'action' => 'logout',
            ])?>" class="btn btn-primary btn-theme gap-2 d-flex align-items-center order-2 order-lg-3">
                <span class=""><?php echo __('Log Out')?></span><span class="bx bx-user"></span>
            </a>
        <?php } else { ?>
            <a href="<?php echo $this->Url->build([
                'controller' => 'Students',
                'action' => 'login',
            ])?>" class="btn btn-primary btn-theme gap-2 d-flex align-items-center order-2 order-lg-3">
                <span class="">Login / Signup</span><span class="bx bx-user"></span>
            </a>
        <?php } ?>
    </div>
</header><!-- End Header -->

