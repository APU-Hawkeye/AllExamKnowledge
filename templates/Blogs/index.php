<?php
/**
 * @var App\View\AppView $this
 * @var \Cake\Datasource\ResultSetInterface $articles
 */
$this->Html->css([
    "/lib/semantic-ui/dropdown/dropdown.min",
    "/lib/semantic-ui/transition/transition.min",
], ["block" => true]);

?>


<section id="hero" class="blog-banner-section">
    <div class="container">
        <div class="row align-items-center w-100">
            <div class="col-md-6">
                <h2 class="text-white blog-heading"><?php echo __('“The secret of getting
                                                                                ahead is getting
                                                                                        started.”');
                    ?></h2>
                <p class="text-white">Stay Ahead with Upcoming Government Job Vacancies: Keeping an eye on the latest job openings is crucial. Websites like official government portals, employment news websites, and dedicated job portals can be your go-to sources. Regularly check for updates and set up email alerts to be notified as soon as a new vacancy is announced. Mastering the Syllabus: Understanding the syllabus is the first step towards success. Analyze the topics and subjects mentioned in the official notification.</p>
            </div>
        </div>
    </div>
</section>
<main id="main" class="mt-5">
    <section class="blog-section py-5">
        <div class="container">
            <div class="row flex-nowrap">
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
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-8">
                    <?php
                    /** @var \App\Model\Entity\BlogArticle $blog */
                    foreach ($articles as $blog) { ?>
                        <div class="media blog-user-media mb-5">
                            <div class="media-body">
                                <div class="blog-user mb-3">
                                    <span class="blog-user-icon mr-3">
                                     <img class="img-fluid" src="img/blog_author_avatar.png" alt="">
                                    </span>

                                </div>
                                <h5 class="mt-0"><a href="<?php echo $this->Url->build([
                                    'controller' => 'Blogs',
                                    'action' => 'blog',
                                    $blog->id,
                                ]) ?>"><?php echo $blog->title; ?>
                                </a></h5>
                                <p><?php echo $blog->title; ?></p>
                                <p class="blog-date text-muted"><span class="mr-2"><?php echo $blog->read_time ?: ''; ?></span></p>
                            </div>
                            <div class="blog-image ms-3">
                                <a href="<?php echo $this->Url->build([
                                    'controller' => 'Blogs',
                                    'action' => 'blog',
                                    $blog->id,
                                ]) ?>">
                                    <img class="img-fluid" src="img/Seal_of_Odisha.png" alt="">
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-4">

                </div>
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
    </section>
</main>
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
});
<?php $this->Html->scriptEnd(); ?>
