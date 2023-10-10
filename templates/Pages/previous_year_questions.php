<?php
/**
 * @var App\View\AppView $this
 * @var \Cake\Datasource\ResultSetInterface $notes
 * @var \Cake\Datasource\ResultSetInterface $subCategories
 * @var \Cake\Datasource\ResultSetInterface $sc
 */

$this->Html->css([
    "/lib/semantic-ui/dropdown/dropdown.min",
    "/lib/semantic-ui/transition/transition.min",
], ["block" => true]);
?>
<body>
    <main id="main">
        <section class="py-0">
            <div class="container-fluid">
                <div class="row flex-nowrap">
<!--                    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light border-end download-sidebar">-->
<!--                        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">-->
<!--                            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">-->
<!--                                --><?php
//                                /** @var \App\Model\Entity\SubCategory $category */
//                                foreach ($subCategories as $category) {?>
<!--                                    <li>-->
<!--                                        <a href="" data-bs-toggle="collapse" class="nav-link px-0 align-middle"><i class="fs-4 bi bi-journal-arrow-down"></i>-->
<!--                                        <span class="ms-1 d-none d-sm-inline" id="option">--><?php //echo $category->title ?><!--</span>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                --><?php //} ?>
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="col py-5">
                        <div class="toolbar px-3 py-4 bg-light">
                            <div class="d-flex justify-content-between">
                                <div class="d-none d-sm-block d-md-block d-lg-block">
                                    <?php echo $this->Paginator->limitControl([
                                        10 => __("10 Records"),
                                        20 => __("20 Records"),
                                        30 => __("30 Records"),
                                        40 => __("40 Records"),
                                        50 => __("50 Records"),
                                        60 => __("60 Records"),
                                        70 => __("70 Records"),
                                        80 => __("80 Records"),
                                        90 => __("90 Records"),
                                        100 => __("100 Records"),
                                    ], null, [
                                        'label' => false,
                                        'class' => 'ui dropdown',
                                        'empty' => __("Records")
                                    ]); ?>
                                </div>
                                <div class="px-3 flex-grow-1">
                                </div>
                                <div class="px-4">
                                    <?php echo $this->Form->create(null, [
                                        'type' => 'GET',
                                        'templates' => [
                                            'inputContainer' => '{{content}}',
                                        ],
                                        'valueSources' => ['query']
                                    ]); ?>
                                    <div class="input-group w-100">
                                        <?php echo $this->Form->control('sub_category', [
                                            'type' => 'select',
                                            'class' => 'form-control ui dropdown',
                                            'empty' => __("Sub Category"),
                                            'id' => 'sub-category',
                                            'options' => $sc,
                                            'label' => false,
                                        ]) ?>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary btn-block tx-spacing-2"><i class="bi bi-search"></i></button>
                                        </div>
                                    </div>
                                    <?php echo $this->Form->end(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            /** @var \App\Model\Entity\StudyMaterial $note */
                            $totalData = count($notes);
                            foreach ($notes as $note) {?>
                                <div class="col-lg-3 mb-4" id="notesData">
                                    <div class="card">
                                        <div class="card-body" id="contentData">
                                            <a href="#">
                                                <p><?php echo $note->title ?></p>
                                            </a>
                                            <div class="mb-3">
                                                <a href="#" class="btn btn-light text-muted">Free Content</a>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-0"></p>
                                                <button class="btn p-2 py-1">
                                                    <?php echo $this->Html->link('Download', '/files/'.$note->file, ['download' => substr($note->file, strrpos($note->file, '\\') + 1)]);?>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="p-3 d-flex flex-row justify-content-between bg-light">
                            <div class="justify-content-start tx-spacing-2 pd-t-8"><?php echo $this->Paginator->counter('Page {{page}} of {{pages}}, showing {{current}} records out of total {{count}} records'); ?></div>
                            <ul class="pagination pagination-outline justify-content-end mg-b-0">
                                <?php echo $this->Paginator->first(); ?>
                                <?php echo $this->Paginator->prev(); ?>
                                <?php echo $this->Paginator->numbers(); ?>
                                <?php echo $this->Paginator->next(); ?>
                                <?php echo $this->Paginator->last(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
</body>
<?php $this->Html->script([
    "/lib/semantic-ui/transition/transition.min",
    "/lib/semantic-ui/dropdown/dropdown.min",
    '/lib/feather-icons/feather.min',
], [
    'block' => 'script'
]); ?>
<?php $this->Html->scriptStart([ 'block' => 'script' ]); ?>
$(function(){
    $('.ui.dropdown').dropdown({
        selectOnKeydown: false,
        forceSelection: false
    });
    $("#sub-category").dropdown({
        selectOnKeydown: false,
        forceSelection: false
    });
});
<!--$(document).ready(function() {-->
<!--    $('#menu li a').click(function() {-->
<!--        var catId = $(this).data('id');-->
<!--        $.ajax({-->
<!--            url: '--><?php //echo $this->Url->build([
//                "action" => "dataBySubCategory",
//            ]); ?><!--/'+catId,-->
<!--            dataType: 'json',-->
<!--            method:'GET',-->
<!--            success: function(response) {-->
<!--                var notes = JSON.parse(response);-->
<!--                $('#notesData').empty();-->
<!---->
<!--                $.each(notes, function(index, note) {-->
<!--                    $('#notesData').append('<div class="col-lg-3 mb-4"><div class="card"><div class="card-body"><a href="#"><h4>' + note.title + '</h4></a>-->
<!--                    <div class="mb-3"><a href="#" class="btn btn-light text-muted">Free Content</a></div>-->
<!--                    <div class="d-flex justify-content-between align-items-center"><p class="mb-0"></p>-->
<!--                        <button class="btn p-2 py-1">' + note.file + '</button></div></div>-->
<!--                    </div></div>');-->
<!--                });-->
<!--            }-->
<!--        });-->
<!--    });-->
<!--});-->

<?php $this->Html->scriptEnd(); ?>
