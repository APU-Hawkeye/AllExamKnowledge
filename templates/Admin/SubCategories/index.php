<?php
/**
 * @var App\View\AppView $this
 * @var \Cake\Datasource\ResultSetInterface $categories
 * @var \Cake\Datasource\ResultSetInterface $subCategories
 */
function getWords($sentence, $count = 10) {
    preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
    return $matches[0];
}
?>
<style>
    .toolbar .btn{
        padding: 9px 15px;
    }
</style>
<div class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top bg-white">
        <ul class="navbar-nav mr-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link toggle-menu" href="">
                    <i class="icon-menu menu-icon"></i>
                </a>
            </li>
            <h5 class="text-dark mb-0"><?php echo __('Sub Categories'); ?></h5>
        </ul>
        <button data-toggle="modal" class="btn btn-outline-primary btn-sm waves-effect waves-light m-1" data-target="#addModal">
            <i class="fa fa-plus"></i>
        </button>
    </nav>
</div>
<div class="content-wrapper pl-0 pr-0 mt-n2">
    <div class="container-fluid pl-0 pr-0">
        <?php echo $this->Flash->render() ?>
        <div class="toolbar px-3 py-4 bg-light">
            <div class="d-flex justify-content-between">
                <div class="d-none d-sm-block d-md-block d-lg-block">
                    <?php echo $this->PaginationControl->get([
                        25 => __("25 Records"),
                        50 => __("50 Records"),
                        75 => __("75 Records"),
                        100 => __("100 Records"),
                    ]); ?>
                </div>
                <div class="col-md-5 col-sm-4 col-9">
                    <?php echo $this->Form->create(null, [
                        'type' => 'GET',
                        'templates' => [
                            'inputContainer' => '{{content}}'
                        ],
                        'valueSources' => ['query']
                    ]); ?>
                    <?php echo $this->getRequest()->getQuery("status") ? $this->Form->hidden('status') : null; ?>
                    <?php echo $this->getRequest()->getQuery("limit") ? $this->Form->hidden('limit') : null; ?>
                    <div class="input-group">
                        <?php echo $this->Form->control('q', [
                            'label' => false,
                            'class' => 'form-control',
                            'placeholder' => __("Search...")
                        ]) ?>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
                <div class="col-md-4 col-sm-4 d-none d-sm-block">
                    <div class="btn-group m-0">
                        <a href="<?php echo $this->Url->build([
                            '?' => [
                                'status' => null,
                                'q' => $this->getRequest()->getQuery('q'),
                                'limit' => $this->getRequest()->getQuery('limit')
                            ]
                        ]) ?>" type="button" class="<?php echo empty($this->getRequest()->getQuery('status')) ?
                            'active' :
                            ''; ?> btn btn-outline-primary waves-effect waves-light"><?php echo __('All'); ?></a>
                        <a href="<?php echo $this->Url->build([
                            '?' => [
                                'status' => 'active',
                                'q' => $this->getRequest()->getQuery('q'),
                                'limit' => $this->getRequest()->getQuery('limit')
                            ]
                        ]) ?>" type="button" class="<?php echo $this->getRequest()->getQuery('status') === 'active'
                            ? 'active' :
                            ''; ?> btn btn-outline-primary waves-effect waves-light"><?php echo __('Active'); ?></a>
                        <a href="<?php echo $this->Url->build([
                            '?' => [
                                'status' => 'disabled',
                                'q' => $this->getRequest()->getQuery('q'),
                                'limit' => $this->getRequest()->getQuery('limit')
                            ]
                        ]) ?>" type="button" class="<?php echo $this->getRequest()->getQuery('status') === 'disabled' ?
                            'active' :
                            ''; ?> btn btn-outline-primary waves-effect waves-light"><?php echo __('Disabled'); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive bg-white">
            <table class="table table-bordered mb-0">
                <thead class="thead-outline-primary">
                <tr>
                    <th width="2%"></th>
                    <th><?php echo __("Code") ?></th>
                    <th><?php echo __("Title") ?></th>
                    <th><?php echo __("Category") ?></th>
                    <th><?php echo __("Status") ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if ($categories->isEmpty() === false) { ?>
                    <?php /** @var \App\Model\Entity\SubCategory $subcategory*/
                    foreach ($subCategories as $subcategory) {?>
                        <tr>
                            <td><a href="<?php echo $this->Url->build([
                                    'controller' => 'SubCategories',
                                    'action' => 'view',
                                    $subcategory->id,
                                ])?>"> <i class="fa fa-search"></i> </a>
                            </td>
                            <td><?php echo $subcategory->code ;?></td>
                            <td><?php echo $subcategory->title ;?></td>
<!--                            <td>--><?php //echo $category->description ? getWords($category->description) : 'Not Available';?><!--</td>-->
                            <td><?php echo $subcategory->category->title ;?></td>
                            <td><?php echo $subcategory->disabled ?? __('Active') ;?></td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="10">
                            <div class="p-5 text-center">
                                <h1 class="text-muted"><i class="mdi mdi-alert"></i></h1>
                                <h4 class="text-muted"><?php echo __("No records were found") ?></h4>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="toolbar px-3 py-4 bg-light mb-n4">
            <div class="row">
                <div class="col-md-10 col-sm-10 d-none d-sm-block"></div>
                <div class="col-md-2 col-sm-2 col-3 text-right">
                    <ul class="pagination mb-0 float-right">
                        <?php echo $this->Paginator->prev(); ?>
                        <?php echo $this->Paginator->next(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-server"></i><?php echo __(' Add Category')?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $this->Form->create(null, [
                    'url' => [
                        'controller' => 'SubCategories',
                        'action' => 'add'
                    ],
                    'templates' => [
                        'inputContainer' => '<div class="form-group">{{content}}</div>',
                        'formGroup' => '{{label}}{{input}}{{errorDiv}}{{help}}',
                        'label' => '<label class="font-weight-bold tx-spacing-2"{{attrs}}>{{text}}</label>',
                    ],
                    'autocomplete' => 'off',
                    'novalidate'
                ])?>
                <?php echo $this->Form->control('category_id', [
                    'type' => 'select',
                    'options' => $categories,
                    'empty' => __('Please Select'),
                    'class' => 'form-control tx-spacing-2'
                ])?>
                <?php echo $this->Form->control('code', [
                    'type' => 'string',
                    'class' => 'form-control tx-spacing-2'
                ])?>
                <?php echo $this->Form->control('title', [
                    'type' => 'string',
                    'class' => 'form-control tx-spacing-2'
                ])?>
                <?php echo $this->Form->control('description', [
                    'type' => 'textarea',
                    'class' => 'form-control tx-spacing-2'
                ])?>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary tx-spacing-2"><i class="fa fa-check-square-o"></i><?php echo __("Save"); ?></button>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>