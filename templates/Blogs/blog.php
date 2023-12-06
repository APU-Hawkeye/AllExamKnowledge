<?php
/**
 * @var App\View\AppView $this
 * @var \App\Model\Entity\BlogArticle $blog
 */
?>

<style>
    .blog-details-section .blog-details-image {
        width: 100%;
        height: auto;
        object-fit: contain;
    }
</style>
<main id="main" class="mt-6">
    <section class="blog-details-section pt-5 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-2">
                    <div class="media blog-details-media">
                        <div class="row w-100">
                            <div class="blog-user col-md-8">
                                <span class="blog-user-icon mr-3">
                                    <?php echo $this->Html->image('blog_author_avatar.png', ['class'=>'img-fluid']);?></span>
                                <span><?php echo $blog->blog_author->first_name.' '.$blog->blog_author->last_name;?><br><small><?php echo $blog->read_time.' minutes' ?: '';?></small></span>

                            </div>
                            <div class="blog-social col-md-4 text-right">
                                <ul class="list-unstyled d-inline-flex">
                                    <li>
                                        <a href="<?php echo $this->Url->build('https://www.facebook.com/sharer/sharer.php?u='.$this->request->getUri().'&amp;src=sdkpreparse'); ?>" target="_blank"><span><i class="bx bxl-facebook"></i></span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $this->Url->build('https://twitter.com/intent/tweet?hashtags=remitall,tweet,blog&url='.$this->request->getUri().'&amp;via=https://www.remitall.co.uk&amp;via=twitterdev');?>"
                                           target="_blank"><span><i class="bx bxl-twitter"></i></span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $this->Url->build(' http://www.linkedin.com/shareArticle?mini=true&url='.$this->request->getUri().'&title='.'&source=remitall.co.uk'); ?>" target="_blank"><span><i class="bx bxl-linkedin"></i></span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $this->Url->build('https://www.instagram.com/accounts/login/'); ?>" target="_blank""><span><i class="bx bxl-instagram"></i></span></a>
                                    </li>
                                    <li>
                                        <a href="#"><span><i class="bx bxs-share-alt"></i></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div><!--media-body-->
                    </div>
                    <h4 class="my-4"><a href="#"><?php echo $blog->title ?></a></h4>

                </div><!--//col-md-7-->
            </div><!--//row-->
            <div class="row">
                <div class="col-lg-7 offset-lg-2">
                    <div class="d-flex w-100 mb-4">
                        <?php echo $this->Html->image('Seal_of_Odisha.png', ['class'=>'img-fluid blog-details-image', 'alt'=>__('')]);?>
                    </div>
                    <p>
                        <?php echo $blog->body ?>
                    </p>
                    <p class="mt-4">
                        <span class="text-muted"><small><?php echo $blog->read_time. ' minutes' ?: '';?></small>
                        </span>
                    </p>

                </div>
            </div>
        </div>
    </section>
</main>

