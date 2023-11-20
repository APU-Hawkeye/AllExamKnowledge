<?php
/**
 * @var App\View\AppView $this
 * @var \App\Model\Entity\BlogAuthor $author
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
            <h5 class="text-dark mb-0"><?php echo __('Author - '.$author->first_name) ?></h5>
        </ul>
        <?php if ($author->disabled ) { ?>
            <div data-toggle="modal" data-target="#enable" class="btn btn-sm btn-outline-secondary m-1"><?php echo __("Enable"); ?></div>
        <?php } else { ?>
            <div data-toggle="modal" data-target="#disable" class="btn btn-sm btn-outline-secondary m-1"><?php echo __("Disable"); ?></div>
        <?php } ?>
        <button class="btn btn-sm btn-outline-primary m-1" data-toggle="modal" data-target="#editAuthor"><?php echo __("Edit")?></button>
    </nav>
</div>

<div class="content-wrapper pl-0 pr-0 mt-n2">
    <div class="container-fluid pl-0 pr-0">
        <?php echo $this->Flash->render() ;?>
        <div class="p-4">
            <?php if ($author->disabled) {?>
                <div class="alert alert-outline-danger alert-dismissible">
                    <div class="alert-message">
                        <span><?php echo __("This subcategory is in disabled state"); ?></span>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-sm-5 d-flex align-content-stretch">
                    <div class="card w-100 border mb-4">
                        <div class="card-body">
                            <div class="mb-3 tx-13 tx-spacing-2">
                                <h6 class="font-weight-bold mb-1"><?php echo __('First Name')?></h6>
                                <div><?php echo $author->first_name ;?></div>
                            </div>
                            <div class="mb-3 tx-13 tx-spacing-2">
                                <h6 class="font-weight-bold mb-1"><?php echo __('Last Name')?></h6>
                                <div><?php echo $author->last_name ;?></div>
                            </div>
                            <div class="mb-3 tx-13 tx-spacing-2">
                                <h6 class="font-weight-bold mb-1"><?php echo __('Description')?></h6>
                                <div><?php echo $author->description ;?></div>
                            </div>
                            <div class="mb-3 tx-13 tx-spacing-2">
                                <h6 class="font-weight-bold mb-1"><?php echo __('Created')?></h6>
                                <div><?php echo $author->created->format("F d, Y h:i:s A T");?></div>
                            </div>
                            <div class="mb-3 tx-13 tx-spacing-2">
                                <h6 class="font-weight-bold mb-1"><?php echo __('Updated')?></h6>
                                <div><?php echo $author->modified->format("F d, Y h:i:s A T");?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editAuthor">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-server"></i><?php echo __(' Edit Author')?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $this->Form->create($author, [
                    'url' => [
                        'controller' => 'Blogs',
                        'action' => 'editAuthor',
                        $author->id,
                    ],
                    'templates' => [
                        'inputContainer' => '<div class="form-group">{{content}}</div>',
                        'formGroup' => '{{label}}{{input}}{{errorDiv}}{{help}}',
                        'label' => '<label class="font-weight-bold tx-spacing-2"{{attrs}}>{{text}}</label>',
                    ],
                    'autocomplete' => 'off',
                    'novalidate'
                ])?>
                <?php echo $this->Form->control('first_name', [
                    'type' => 'string',
                    'class' => 'form-control tx-spacing-2'
                ])?>
                <?php echo $this->Form->control('last_name', [
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
    <div class="backdrop"></div>
<?php
if ($author->disabled) {
    echo $this->element("confirm_dialog", [
        'id' => 'enable',
        'url' => [
            'action' => 'enable',
            $author->id
        ],
        'title' => __("Warning"),
        'content' => __("Are you sure, you want to enable {0}", '<strong>'.$author->first_name.'</strong>')
    ]);
} else {
    echo $this->element('confirm_dialog', [
        'id' => 'disable',
        'url' => [
            'action' => 'disable',
            $author->id
        ],
        'title' => __("Warning"),
        'content' => __("Are you sure, you want to enable {0}", '<strong>'.$author->first_name.'</strong>')
    ]);
}
?>
<?php $this->Html->script([
    'jquery.mask.min',
    "/lib/semantic-ui/transition/transition.min",
    "/lib/semantic-ui/dropdown/dropdown.min",
    "/lib/jqueryui/jquery-ui.min",
], [
    'block' => 'scriptBottom'
]); ?>
<?php $this->Html->scriptStart(['block' => 'scriptBottom']); ?>
$(function(){
    $('.ui.dropdown').dropdown();
        const addUsersFormWrapper = new PerfectScrollbar('#editUserFormWrapper', {
        suppressScrollX: true
    });
    $('#editAuthor').find('form').eq(0).submit(function(event){
        event.preventDefault();
        let form = this;
        let data = new FormData(form);
        $(form).find('.was-validated').removeClass('was-validated');
        $(form).removeClass('was-validated');
        $(form).find('.invalid-feedback').removeClass('d-block').text('');
        $.ajax({
            url: $(this).attr("action"),
            method: 'POST',
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function(response) {
                window.location.reload(true);
            },
            complete: function(jqXHR, statusText) {
                $(form).find('.ui.dimmer').removeClass('active');
            },
            error: function(jqXHR, statusText) {
                if (jqXHR.status === 400) {
                $(form).addClass("was-validated");
                let errors = jqXHR.responseJSON;
                $.each(errors, function(field, error){
                let input = $('[name="'+field+'"]').eq(0);
                input.get(0).setCustomValidity('error');
                input.siblings('.invalid-feedback').text(error);
                input.parents(".form-group").addClass("was-validated");
                input.parents(".ui.dropdown").addClass("error");
                input.addClass("is-invalid");
                });
                } else if (jqXHR.status === 401) {
                window.location.reload(true);
                } else {
                }
            }
        });
    });
});
<?php $this->Html->scriptEnd(); ?>
