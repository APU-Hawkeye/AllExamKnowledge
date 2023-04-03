<?php
/**
* @var App\View\AppView $this
* @var string $id
* @var string $url
* @var string $title
* @var string $content
* @var string $yesText
* @var string $noText
* @var string $danger
* @var string $warning
* @var string $success
*/
$yesText = $yesText ?? null;
$noText = $noText ?? null;
$danger = $danger ?? null;
$warning = $warning ?? null;
$success = $success ?? null;
?>
<div class="modal" id="<?php echo $id ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <?php echo $this->Form->create(null, [
                "url" => $url,
                'data-submit' => 'disable'
            ]); ?>
            <?php if ( $title ?? null ) { ?>
                <div class="modal-header">
                    <h5 class="modal-title tx-14 text-danger tx-spacing-2"><?php echo $title; ?></h5>
                </div>
            <?php } ?>
            <div class="modal-body tx-spacing-2">
                <div class="ui inverted dimmer">
                    <div class="ui loader"></div>
                </div>
                <p class="tx-spacing-2 tx-13 text-justify"><?php echo $content; ?></p>
                <?php if ($danger) { ?>
                    <p class="text-danger tx-spacing-2 tx-13 text-justify"><?php echo $danger; ?></p>
                <?php } ?>
                <?php if ($warning) { ?>
                    <p class="text-warning tx-spacing-2 tx-13 text-justify"><?php echo $warning; ?></p>
                <?php } ?>
                <?php if ($success) { ?>
                    <p class="text-success tx-spacing-2 tx-13 text-justify"><?php echo $success; ?></p>
                <?php } ?>
                <div class="text-right">
                    <button type="button" data-dismiss="modal" class="btn btn-outline-secondary tx-spacing-2 mr-2"><?php echo $noText ?? __("No") ?></button>
                    <button type="submit" class="btn btn-outline-primary tx-spacing-2"><?php echo $yesText ?? __("Yes") ?></button>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>

