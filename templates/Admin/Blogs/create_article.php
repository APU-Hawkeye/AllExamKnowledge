<?php
/**
 * @var App\View\AppView $this
 * @var \Cake\Datasource\ResultSetInterface $categories
 * @var \Cake\Datasource\ResultSetInterface $authors
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
            <h5 class="text-dark mb-0"><?php echo __('Create Article'); ?></h5>
        </ul>
    </nav>
</div>
<div class="content-wrapper pl-0 pr-0 mt-n2">
    <div class="container-fluid pl-0 pr-0">
    <?php echo $this->Flash->render() ?>
        <div class="row">
            <div class="col-xl-7 mx-auto">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <?php echo $this->Form->create($article, [
                            'url' => [
                                'controller' => 'Blogs',
                                'action' => 'createArticle'
                            ],
                            'templates' => [
                                'inputContainer' => '<div class="form-group">{{content}}</div>',
                                'formGroup' => '{{label}}{{input}}{{errorDiv}}{{help}}',
                                'label' => '<label class="font-weight-bold tx-spacing-2"{{attrs}}>{{text}}</label>',
                            ],
                            'type'  =>  'file',
                            'autocomplete' => 'off',
                            'novalidate'
                        ])?>
                        <?php echo $this->Form->control('blog_category_id', [
                            'type' => 'select',
                            'options' => $categories,
                            'empty' => 'Please Select',
                            'class' => 'form-control tx-spacing-2',
                            'required' => true,
                            'templateVars' => [
                                'errorDiv' => '<div class="invalid-feedback mt-2 tx-12 tx-spacing-2"></div>'
                            ],
                            'templates' => [
                                'label' => '<label class="font-weight-bold tx-spacing-2 required"{{attrs}}>{{text}}</label>'
                            ],
                        ])?>
                        <?php echo $this->Form->control('blog_author_id', [
                            'type' => 'select',
                            'options' => $authors,
                            'empty' => 'Please Select',
                            'class' => 'form-control tx-spacing-2',
                            'required' => true,
                            'templateVars' => [
                                'errorDiv' => '<div class="invalid-feedback mt-2 tx-12 tx-spacing-2"></div>'
                            ],
                            'templates' => [
                                'label' => '<label class="font-weight-bold tx-spacing-2 required"{{attrs}}>{{text}}</label>'
                            ],
                        ])?>
                        <?php echo $this->Form->control('title', [
                            'type' => 'string',
                            'class' => 'form-control tx-spacing-2',
                            'required' => true,
                            'templateVars' => [
                                'errorDiv' => '<div class="invalid-feedback mt-2 tx-12 tx-spacing-2"></div>'
                            ],
                            'templates' => [
                                'label' => '<label class="font-weight-bold tx-spacing-2 required"{{attrs}}>{{text}}</label>'
                            ],
                        ])?>
                        <?php echo $this->Form->control('slug', [
                            'type' => 'string',
                            'class' => 'form-control tx-spacing-2',
                            'required' => false,
                            'templateVars' => [
                                'errorDiv' => '<div class="invalid-feedback mt-2 tx-12 tx-spacing-2"></div>'
                            ],
                            'templates' => [
                                'label' => '<label class="font-weight-bold tx-spacing-2 required"{{attrs}}>{{text}}</label>'
                            ],
                        ])?>
                        <?php echo $this->Form->control('body', [
                            'type' => 'textarea',
                            'class' => 'form-control tx-spacing-2',
                            'required' => false,
                            'templateVars' => [
                                'errorDiv' => '<div class="invalid-feedback mt-2 tx-12 tx-spacing-2"></div>'
                            ],
                            'templates' => [
                                'label' => '<label class="font-weight-bold tx-spacing-2 required"{{attrs}}>{{text}}</label>'
                            ],
                        ])?>
                        <?php echo $this->Form->control('read_time', [
                            'type' => 'string',
                            'class' => 'form-control tx-spacing-2',
                            'required' => false,
                            'templateVars' => [
                                'errorDiv' => '<div class="invalid-feedback mt-2 tx-12 tx-spacing-2"></div>'
                            ],
                            'templates' => [
                                'label' => '<label class="font-weight-bold tx-spacing-2"{{attrs}}>{{text}}</label>'
                            ],
                        ])?>
                        <div class="custom-file mt-2">
                            <?php echo $this->Form->control('image',[
                                'type'  => 'file',
                                'class' => 'custom-file-input',
                                'id'    => 'inputGroupFile01',
                                'label' => false
                            ]); ?>
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                        <button type="submit" class="btn btn-primary tx-spacing-2"><i class="fa fa-check-square-o"></i><?php echo __("Save"); ?></button>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
