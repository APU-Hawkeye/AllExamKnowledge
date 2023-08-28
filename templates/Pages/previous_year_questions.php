<?php
/**
 * @var App\View\AppView $this
 * @var \Cake\Datasource\ResultSetInterface $notes
 * @var \Cake\Datasource\ResultSetInterface $subCategories
 */
?>

<main id="main">
    <section class="py-0">
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light border-end download-sidebar">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <?php
                            /** @var \App\Model\Entity\SubCategory $category */
                            $i = 1 ;
                            foreach ($subCategories as $category) {?>
                                <li id="cat">
                                    <a href="#submenu.<?php echo $i ?>" data-bs-toggle="collapse" class="nav-link px-0 align-middle"
                                       data-id="<?php echo $category->id ?>"><i class="fs-4 bi bi-journal-arrow-down"></i>
                                        <span class="ms-1 d-none d-sm-inline"><?php echo $category->title ?></span>
                                    </a>
                                </li>
                            <?php $i ++; } ?>
                        </ul>
                    </div>
                </div>
                <div class="col py-5">
                    <div class="row">
                        <?php
                        /** @var \App\Model\Entity\StudyMaterial $note */
                        foreach ($notes as $note) {?>
                        <div class="col-lg-3 mb-4" id="notesData">
                            <div class="card">
                                <div class="card-body">
                                    <a href="#">
                                        <h4><?php echo $note->title ?></h4>
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
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
<!---->
<?php //$this->Html->scriptStart([ 'block' => 'scriptBottom' ]); ?>
<!--    $(document).ready(function() {-->
<!--        $('#menu li a').click(function() {-->
<!--            var catId = $(this).data('id');-->
<!---->
<!--            $.ajax({-->
<!--                url: '--><?php //echo $this->Url->build([
//                    "action" => "dataBySubCategory",
//                ]); ?><!--/'+catId,-->
<!--                dataType: 'json',-->
<!--                method:'GET',-->
<!--                success: function(response) {-->
<!--                    var notes = JSON.parse(response);-->
<!--                    $('#notesData').empty();-->
<!---->
<!--                    $.each(notes, function(index, note) {-->
<!--                        $('#notesData').append('<div class="col-lg-3 mb-4"><div class="card"><div class="card-body"><a href="#"><h4>' + note.title + '</h4></a><div class="mb-3"><a href="#" class="btn btn-light text-muted">Free Content</a></div><div class="d-flex justify-content-between align-items-center"><p class="mb-0"></p><button class="btn p-2 py-1">' + note.file + '</button></div></div></div></div>');-->
<!--                    });-->
<!--                }-->
<!--            });-->
<!--        });-->
<!--    });-->
<?php //$this->Html->scriptEnd(); ?>
