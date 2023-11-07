<?php
/**
 * @var \App\View\AppView $this
 */
?>
<style>
    .img-fluid {
        max-width: 60%;
        height: 60%;
        margin-top: 10px;
        margin-left: 20px;
    }
</style>
<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="#">
            <?php echo $this->Html->image('logo.png', ['class' => 'img-fluid-sidebar']) ?>
        </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <li class="tx"><a href="<?php echo $this->Url->build([
                'controller' => 'Users',
                'action' => 'dashboard'
            ]); ?>" class="waves-effect"><i class="fa fa-home"></i><span><?php echo __('Dashboard')?></span></a></li>
        <li><a href="<?php echo $this->Url->build([
                'controller' => 'JobNotifications',
                'action' => 'index'
            ]); ?>" class="waves-effect"><i class="fa fa-server"></i><span><?php echo __('Job Notifications')?></span></a></li>
<!--        <li><a href="--><?php //echo $this->Url->build([
//                'controller' => 'News',
//                'action' => 'index'
//            ]); ?><!--" class="waves-effect"><i class="fa fa-server"></i><span>--><?php //echo __('News')?><!--</span></a></li>-->
        <li><a href="<?php echo $this->Url->build([
                'controller' => 'Categories',
                'action' => 'index'
            ]); ?>" class="waves-effect"><i class="fa fa-server"></i><span><?php echo __('Main Categories')?></span>
            </a>
        </li>
        <li><a href="<?php echo $this->Url->build([
                'controller' => 'SubCategories',
                'action' => 'index'
            ]); ?>" class="waves-effect"><i class="fa fa-server"></i><span><?php echo __('Sub Categories')?></span>
            </a>
        </li>
        <li><a href="<?php echo $this->Url->build([
                'controller' => 'StudyMaterials',
                'action' => 'index'
            ]); ?>" class="waves-effect"><i class="fa fa-server"></i><span><?php echo __('Study Materials')?></span>
            </a>
        </li>
        <li><a href="<?php echo $this->Url->build([
                'controller' => 'Learners',
                'action' => 'index'
            ]); ?>" class="waves-effect"><i class="fa fa-server"></i><span><?php echo __('Students')?></span>
            </a>
        </li>
        <li><a href="<?php echo $this->Url->build([
                'controller' => 'Blogs',
                'action' => 'dashboard'
            ]); ?>" class="waves-effect"><i class="fa fa-server"></i><span><?php echo __('Blogs')?></span>
            </a>
        </li>

        <li><a href="<?php echo $this->Url->build([
                'controller' => 'Users',
                'action' => 'index'
            ]); ?>" class="waves-effect"><i class="fa fa-user-circle-o"></i><span><?php echo __('Users')?></span></a></li>
        <li><a href="<?php echo $this->Url->build([
                'controller' => 'Users',
                'action' => 'logout'
            ]); ?>" class="waves-effect"><i class="fa fa-sign-out text-red"></i> <span><?php echo __('Logout'); ?></span></a></li>
    </ul>

</div>
