<?php
/**
 * @var App\View\AppView $this
 */
?>
<main id="main">

    <section class="py-0">
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light border-end download-sidebar">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li class="nav-item">
                                <a href="#" class="nav-link align-middle px-0">
                                    <i class="fs-4 bi bi-journal-arrow-down"></i> <span class="ms-1 d-none d-sm-inline">GK-GS</span>
                                </a>
                            </li>
                            <li>
                                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi bi-journal-arrow-down"></i> <span class="ms-1 d-none d-sm-inline">ALL</span> </a>
                                <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                    <li class="w-100">
                                        <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1 </a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2 </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi bi-journal-arrow-down"></i> <span class="ms-1 d-none d-sm-inline">NCERT/CBSE/ICSE</span></a>
                            </li>
                            <li>
                                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                    <i class="fs-4 bi bi-journal-arrow-down"></i> <span class="ms-1 d-none d-sm-inline">Previous Year Questions</span></a>
                                <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                    <li class="w-100">
                                        <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 1</a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi bi-journal-arrow-down"></i> <span class="ms-1 d-none d-sm-inline">All Entrance Exam</span> </a>
                                <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                                    <li class="w-100">
                                        <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 1</a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 2</a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 3</a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Product</span> 4</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi bi-journal-arrow-down"></i> <span class="ms-1 d-none d-sm-inline">Chemistry</span> </a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col py-5">
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <a href="#">
                                        <h4>Odisha High Court ASO Preliminary Questions 2023</h4>
                                    </a>
                                    <div class="mb-3">
                                        <a href="#" class="btn btn-light text-muted">Free Content</a>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0"></p>
                                        <button class="btn btn-theme p-2 py-1">
                                            <span class="ms-2 bi bi-eye">
                                                <?php echo $this->Html->link('view', '/files/OdishaHighCourtASOPreliminaryQuestions2023.pdf', ['class' => 'pdf-link', 'target' => '_blank']);?>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <a href="#">
                                        <h4>Geography 1000 MCQ Questions</h4>
                                    </a>
                                    <div class="mb-3">
                                        <a href="#" class="btn btn-light text-muted">Free Content</a>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0"></p>
                                        <button class="btn btn-theme p-2 py-1">
                                            <span class="ms-2 bi bi-eye">
                                                <?php echo $this->Html->link('view', '/files/DishaThousandMcq.pdf', ['class' => 'pdf-link', 'target' => '_blank']);?>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <a href="#">
                                        <h4>ARI AMIN SFS-2021</h4>
                                    </a>
                                    <div class="mb-3">
                                        <a href="#" class="btn btn-light text-muted">Free Content</a>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0"></p>
                                        <button class="btn btn-theme p-2 py-1">
                                            <span class="ms-2 bi bi-eye">
                                                <?php echo $this->Html->link('view', '/files/ARIAMINSFS-2021.pdf', ['class' => 'pdf-link', 'target' => '_blank']);?>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <a href="#">
                                        <h4>Excise Constable 2014</h4>
                                    </a>
                                    <div class="mb-3">
                                        <a href="#" class="btn btn-light text-muted">Free Content</a>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0"></p>
                                        <button class="btn btn-theme p-2 py-1">
                                            <span class="ms-2 bi bi-eye">
                                                <?php echo $this->Html->link('view', '/files/Excise-Constable-2014.pdf', ['class' => 'pdf-link', 'target' => '_blank']);?>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <a href="#">
                                        <h4>Excise Constable 2018</h4>
                                    </a>
                                    <div class="mb-3">
                                        <a href="#" class="btn btn-light text-muted">Free Content</a>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0"></p>
                                        <button class="btn btn-theme p-2 py-1">
                                            <span class="ms-2 bi bi-eye">
                                                <?php echo $this->Html->link('view', '/files/Excise-Constable-2018.pdf', ['class' => 'pdf-link', 'target' => '_blank']);?>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <a href="#">
                                        <h4>ICDS Supervisor 2016 Paper1</h4>
                                    </a>
                                    <div class="mb-3">
                                        <a href="#" class="btn btn-light text-muted">Free Content</a>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0"></p>
                                        <button class="btn btn-theme p-2 py-1">
                                            <span class="ms-2 bi bi-eye">
                                                <?php echo $this->Html->link('view', '/files/ICDS-Supervisor-2016-Paper1.pdf', ['class' => 'pdf-link', 'target' => '_blank']);?>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
<!--                        <div class="col-lg-6 mb-4">-->
<!--                            <div class="card">-->
<!--                                <div class="card-body">-->
<!--                                    <a href="#">-->
<!--                                        <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h4>-->
<!--                                    </a>-->
<!--                                    <div class="mb-3">-->
<!--                                        <a href="#" class="btn btn-light text-muted">Free Download</a>-->
<!--                                    </div>-->
<!--                                    <div class="d-flex justify-content-between align-items-center">-->
<!--                                        <p class="mb-0">50 questions</p>-->
<!--                                        <a href="#" class="btn btn-primary btn-theme p-2 py-1">view <span class="ms-2 bi bi-eye"></span></a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-end">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
