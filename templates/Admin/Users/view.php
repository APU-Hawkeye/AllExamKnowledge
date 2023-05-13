<?php
/**
 * @var App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="content-header">
    <div>
        <h4 class="mg-b-0 tx-spacing-2"><i data-feather="user" class="mr-2"></i><?php echo __('User - '.$user->user_role) ?></h4>
    </div>
    <nav class="nav">
        <?php echo $this->BackButton->render([
            "class" => "btn btn-sm btn-outline-secondary"
        ]); ?>
        <?php if ( $user->disabled ) { ?>
            <div data-toggle="modal" data-target="#enable" class="ml-2 btn btn-sm btn-outline-secondary"><?php echo __("Enable"); ?></div>
        <?php } else { ?>
            <div data-toggle="modal" data-target="#disable" class="ml-2 btn btn-sm btn-outline-secondary"><?php echo __("Disable"); ?></div>
        <?php } ?>
        <button class="ml-2 btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#editUser"><?php echo __("Edit")?></button>
    </nav>
</div>
<div class="content-body">
    <?php echo $this->Flash->render(); ?>
    <?php if ($user->disabled) { ?>
        <div class="alert alert-danger alert-outline tx-spacing-2" role="alert"><?php echo __("User is in disabled state."); ?></div>
    <?php } ?>
    <div class="row">
        <div class="col-sm-8 col-md-8 col-lg-6 col-xl-5 d-flex align-items-stretch">
            <div class="card border w-100 mb-4">
                <div class="card-body tx-13">
                    <div class="font-weight-bold tx-spacing-2 pd"><?php echo  __('UIN')?></div>
                    <p class="tx-spacing-2"> <?php echo $user->uin ;?> </p>
                    <div class="font-weight-bold tx-spacing-2"><?php echo  __('First Name')?></div>
                    <p class="tx-spacing-2"> <?php echo $user->first_name ;?> </p>
                    <div class="font-weight-bold tx-spacing-2"><?php echo  __('Last Name')?></div>
                    <p class="tx-spacing-2"> <?php echo $user->last_name ;?> </p>
                    <div class="font-weight-bold tx-spacing-2"><?php echo  __('Username')?></div>
                    <p class="tx-spacing-2"> <?php echo $user->username ;?> </p>
                    <div class="font-weight-bold tx-spacing-2"><?php echo  __('Email')?></div>
                    <p class="tx-spacing-2"> <?php echo $user->email ;?> </p>
                    <div class="font-weight-bold tx-spacing-2"><?php echo  __('Password Expiry') ?></div>
                    <p class="tx-spacing-2"> <?php echo $user->password_expiry ? $user->password_expiry->format("F d, Y h:i:s A T") : __("Not Available") ;?> </p>
                    <div class="font-weight-bold tx-spacing-2"><?php echo  __('Password Update') ?></div>
                    <p class="tx-spacing-2"> <?php echo $user->password_updated ? $user->password_updated->format("F d, Y h:i:s A T") :  __("Not Available") ;?> </p>
                    <div class="font-weight-bold tx-spacing-2"><?php echo  __('Created') ?></div>
                    <p class="tx-spacing-2"> <?php echo $user->created->format("F d, Y h:i:s A T");?> </p>
                    <div class="font-weight-bold tx-spacing-2"><?php echo  __('Modified') ?></div>
                    <p class="tx-spacing-2"> <?php echo $user->modified->format("F d, Y h:i:s A T");?> </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="editUser" class="off-canvas wd-500 off-canvas-overlay off-canvas-right">
    <div class="pd-25">
        <h5 class="tx-spacing-2"><a href="#" class="close"><i data-feather="x"></i></a><?php echo __("Edit User"); ?></h5>
    </div>
    <div class="pd-l-25 pd-r-25 pd-b-25 pd-t-0 ht-90p tx-13" id="editUserFormWrapper">
        <?php echo $this->Form->create($user, [
            'url' => [
                'action' => 'edit',
                $user->id,
                '?' => [
                    'referer' => $this->getRequest()->getRequestTarget()
                ]
            ],
            'templates' => [
                'inputContainer' => '<div class="form-group">{{content}}</div>',
                'formGroup' => '{{label}}{{input}}{{errorDiv}}{{help}}',
                'label' => '<label class="font-weight-bold tx-spacing-2"{{attrs}}>{{text}}</label>',
            ],
            'autocomplete' => 'off',
            'class' => 'needs-validation',
            'data-submit' => 'disable',
            'novalidate'
        ]);
        $this->Form->setConfig([
            'autoSetCustomValidity' => false,
        ]);
        ?>
        <div class="ui inverted dimmer">
            <div class="ui loader"></div>
        </div>
        <?php echo $this->Form->control('first_name', [
            'type' => 'string',
            'label' => __("First name"),
            'class' => 'form-control tx-spacing-2',
            'error' => false,
            'required' => true,
            'templateVars' => [
                'errorDiv' => '<div class="invalid-feedback mt-2 tx-12 tx-spacing-2"></div>'
            ],
            'templates' => [
                'label' => '<label class="font-weight-bold tx-spacing-2 required"{{attrs}}>{{text}}</label>'
            ],
        ]); ?>
        <?php echo $this->Form->control('last_name', [
            'type' => 'string',
            'label' => __("Last name"),
            'class' => 'form-control tx-spacing-2',
            'error' => false,
            'required' => true,
            'templateVars' => [
                'errorDiv' => '<div class="invalid-feedback mt-2 tx-12 tx-spacing-2"></div>'
            ],
            'templates' => [
                'label' => '<label class="font-weight-bold tx-spacing-2 required"{{attrs}}>{{text}}</label>'
            ],
        ]); ?>
        <?php echo $this->Form->control("email", [
            'label' => __("Email Address"),
            'class' => 'form-control tx-spacing-2',
            'error' => false,
            'required' => true,
            'templateVars' => [
                'errorDiv' => '<div class="invalid-feedback mt-2 tx-12 tx-spacing-2"></div>'
            ],
            'templates' => [
                'label' => '<label class="font-weight-bold tx-spacing-2 required"{{attrs}}>{{text}}</label>'
            ],
        ]) ?>
        <button type="submit" class="btn btn-primary btn-block tx-spacing-2"><?php echo __("Save"); ?></button>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<div class="backdrop"></div>
<?php
if ($user->disabled) {
    echo $this->element("confirm_dialog", [
        'id' => 'enable',
        'url' => [
            'action' => 'enable',
            $user->id
        ],
        'title' => __("Warning"),
        'content' => __("Are you sure, you want to enable {0}", '<strong>'.$user->full_name.'</strong>')
    ]);
} else {
    echo $this->element('confirm_dialog', [
        'id' => 'disable',
        'url' => [
            'action' => 'disable',
            $user->id
        ],
        'title' => __("Warning"),
        'content' => __("Are you sure, you want to enable {0}", '<strong>'.$user->full_name.'</strong>')
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
    $('#editUser').find('form').eq(0).submit(function(event){
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
