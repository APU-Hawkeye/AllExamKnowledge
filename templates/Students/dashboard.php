<?php
/**
 * @var App\View\AppView $this
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
    <ul class="sidebar-menu do-nicescrol">
        <li class="tx"><a href="<?php echo $this->Url->build([
                'controller' => 'Students',
                'action' => 'dashboard'
            ]); ?>" class="waves-effect"><i class="fa fa-home"></i><span><?php echo __('Dashboard')?></span></a></li>
        <li><a href="<?php echo $this->Url->build([
                'controller' => 'Announcements',
                'action' => 'index'
            ]); ?>" class="waves-effect"><i class="fa fa-server"></i><span><?php echo __('Announcements')?></span></a></li>
        <li><a href="<?php echo $this->Url->build([
                'controller' => 'News',
                'action' => 'index'
            ]); ?>" class="waves-effect"><i class="fa fa-server"></i><span><?php echo __('News')?></span></a></li>
    </ul>
</div>
