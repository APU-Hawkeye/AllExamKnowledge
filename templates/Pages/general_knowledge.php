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
                    <div class="toolbar px-3 py-4 bg-light">
                        <div class="d-flex justify-content-between">
                            <div class="d-none d-sm-block d-md-block d-lg-block">
                                <?php echo $this->PaginationControl->get([
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
                                ]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        /** @var \App\Model\Entity\StudyMaterial $note */
                        foreach ($notes as $note) {?>
                            <div class="col-lg-3 mb-4" id="notesData">
                                <div class="card">
                                    <div class="card-body">
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
