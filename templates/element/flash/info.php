<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-light-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <div class="alert-icon">
        <i class="icon-close"></i>
    </div>
    <div class="alert-message">
        <span><?php echo $message; ?></span>
    </div>
</div>
