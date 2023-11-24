<?php
/**
 * @var App\View\AppView $this
 * @var \App\Model\Entity\BlogArticle $article
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
            <h5 class="text-dark mb-0"><?php echo __('Blog Article') ?></h5>
        </ul>
        <?php if ($article->disabled ) { ?>
            <div data-toggle="modal" data-target="#enable" class="btn btn-sm btn-outline-secondary m-1"><?php echo __("Enable"); ?></div>
        <?php } else { ?>
            <div data-toggle="modal" data-target="#disable" class="btn btn-sm btn-outline-secondary m-1"><?php echo __("Disable"); ?></div>
        <?php } ?>
        <a href="<?php echo $this->Url->build([
            'controller' => 'Blogs',
            'action' => 'editArticle',
            $article->id,
        ])?>" class="btn btn-outline-primary btn-sm waves-effect waves-light m-1"><?php echo __("Edit")?></i>
        </a>
    </nav>
</div>
<div class="content-wrapper pl-0 pr-0 mt-n2">
    <div class="container-fluid pl-0 pr-0">
        <?php echo $this->Flash->render() ;?>
        <div class="p-4">
            <?php if ($article->disabled) {?>
                <div class="alert alert-outline-danger alert-dismissible">
                    <div class="alert-message">
                        <span><?php echo __("This Blog Article is in disabled state"); ?></span>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-sm-5 d-flex align-content-stretch">
                    <div class="card w-100 border mb-4">
                        <div class="card-body">
                            <div class="mb-3 tx-13 tx-spacing-2">
                                <h6 class="font-weight-bold mb-1"><?php echo __('Title')?></h6>
                                <div><?php echo $article->title ;?></div>
                            </div>
                            <div class="mb-3 tx-13 tx-spacing-2">
                                <h6 class="font-weight-bold mb-1"><?php echo __('Category')?></h6>
                                <div><?php echo $article->blog_category->title ;?></div>
                            </div>
                            <div class="mb-3 tx-13 tx-spacing-2">
                                <h6 class="font-weight-bold mb-1"><?php echo __('Author')?></h6>
                                <div><?php echo $article->blog_author->first_name.' '.$article->blog_author->last_name ;?></div>
                            </div>
                            <div class="mb-3 tx-13 tx-spacing-2">
                                <h6 class="font-weight-bold mb-1"><?php echo __('Slug')?></h6>
                                <div><?php echo $article->slug ?: 'Not Available' ;?></div>
                            </div>
                            <div class="mb-3 tx-13 tx-spacing-2">
                                <h6 class="font-weight-bold mb-1"><?php echo __('Read time')?></h6>
                                <div><?php echo $article->read_time ?: 'Not Available' ;?></div>
                            </div>
                            <div class="mb-3 tx-13 tx-spacing-2">
                                <h6 class="font-weight-bold mb-1"><?php echo __('Meta Description')?></h6>
                                <div><?php echo $article->meta_description ?: 'Not Available' ;?></div>
                            </div>
                            <div class="mb-3 tx-13 tx-spacing-2">
                                <h6 class="font-weight-bold mb-1"><?php echo __('Created')?></h6>
                                <div><?php echo $article->created->format("F d, Y h:i:s A T");?></div>
                            </div>
                            <div class="mb-3 tx-13 tx-spacing-2">
                                <h6 class="font-weight-bold mb-1"><?php echo __('Updated')?></h6>
                                <div><?php echo $article->modified->format("F d, Y h:i:s A T");?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 d-flex align-content-stretch">
                    <div class="card w-100 border mb-4">
                        <div class="card-body">
                            <div class="mb-3 tx-13 tx-spacing-2">
                                <h6 class="font-weight-bold mb-1"><?php echo __('Article Description')?></h6>
                                <div><?php echo $article->body ;?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if ($article->disabled) {
    echo $this->element("confirm_dialog", [
        'id' => 'enable',
        'url' => [
            'action' => 'enable',
            $article->id
        ],
        'title' => __("Warning"),
        'content' => __("Are you sure, you want to enable {0}", '<strong>'.$article->title.'</strong>')
    ]);
} else {
    echo $this->element('confirm_dialog', [
        'id' => 'disable',
        'url' => [
            'action' => 'disable',
            $article->id
        ],
        'title' => __("Warning"),
        'content' => __("Are you sure, you want to disable {0}", '<strong>'.$article->title.'</strong>')
    ]);
}
?>
<?php $this->Html->script([
    "/lib/semantic-ui/transition/transition.min",
    "/lib/semantic-ui/dropdown/dropdown.min",
], [
    'block' => 'scriptBottom'
]); ?>
<?php $this->Html->scriptStart(['block' => 'scriptBottom']); ?>
$(function(){
    $('.ui.dropdown').dropdown();
        const addUsersFormWrapper = new PerfectScrollbar('#editUserFormWrapper', {
        suppressScrollX: true
    });
});
<?php $this->Html->scriptEnd(); ?>
