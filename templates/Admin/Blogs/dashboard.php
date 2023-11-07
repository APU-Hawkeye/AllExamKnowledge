<?php
/**
 *  @var App\View\AppView $this
 */
?>

<div class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top bg-white">
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link toggle-menu" href="">
                    <i class="icon-menu menu-icon"></i>
                </a>
            </li>
            <h5 class="text-dark mb-0"><?php echo __('Blog Menu') ?></h5>
        </ul>
    </nav>
</div>
<div class="content-wrapper pl-0 pr-0 mt-n2">
    <div class="container-fluid pl-0 pr-0 p-4">
        <?php echo $this->Flash->render() ;?>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4">
                <div class="col">
                    <div class="card w-100 border mb-4">
                        <div class="card-body">
                            <div class="mg-b-25"><i class="wd-50 ht-50 tx-gray-500"></i></div>
                            <h5 class="tx-inverse mg-b-20"><?php echo __("Blog Articles") ?></h5>
                            <p class="mg-b-20"><?php echo __("View articles and configure enable disable actions") ?></p>
                            <a href="<?php echo $this->Url->build([
                                'controller' => 'Blogs',
                                'action' => 'index',
                                '?' => [
                                    'referer' => $this->getRequest()->getRequestTarget()
                                ]
                            ]) ?>" class="tx-medium text-primary"><?php echo __("View and Manage"); ?> <i class="icon ion-md-arrow-forward mg-l-5"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card w-100 border mb-4">
                        <div class="card-body">
                            <div class="mg-b-25"><i class="wd-50 ht-50 tx-gray-500"></i></div>
                            <h5 class="tx-inverse mg-b-20"><?php echo __("Blog Categories") ?></h5>
                            <p class="mg-b-20"><?php echo __("View blog categories and configure settings") ?></p>
                            <a href="<?php echo $this->Url->build([
                                'controller' => 'Blogs',
                                'action' => 'categories',
                                '?' => [
                                    'referer' => $this->getRequest()->getRequestTarget()
                                ]
                            ]) ?>" class="tx-medium text-primary"><?php echo __("View and Manage"); ?> <i class="icon ion-md-arrow-forward mg-l-5"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card w-100 border mb-4">
                        <div class="card-body">
                            <div class="mg-b-25"><i class="wd-50 ht-50 tx-gray-500"></i></div>
                            <h5 class="tx-inverse mg-b-20"><?php echo __("Authors") ?></h5>
                            <p class="mg-b-20"><?php echo __("View blog authors and configure settings") ?></p>
                            <a href="<?php echo $this->Url->build([
                                'controller' => 'Blogs',
                                'action' => 'authors',
                                '?' => [
                                    'referer' => $this->getRequest()->getRequestTarget()
                                ]
                            ]) ?>" class="tx-medium text-primary"><?php echo __("View and Manage"); ?> <i class="icon ion-md-arrow-forward mg-l-5"></i></a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
