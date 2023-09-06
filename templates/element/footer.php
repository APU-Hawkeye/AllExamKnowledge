<?php
/**
 * @var App\View\AppView $this
 */
?>

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-newsletter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <h4>Stay In Touch</h4>
                    <p>We have been preparing candidates for various state and central examinations for over a decade</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="w-100 text-center">
                        <ul class="footer-menu">
                            <li><a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'index',
                            ])?>" class="text-white">Home</a></li>
                            <li><a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'aboutUs',
                            ])?>" class="text-white">About Us</a></li>
                            <li><a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'contactUs',
                            ])?>" class="text-white">Contact Us</a></li>
                            <li><a href="<?php echo $this->Url->build([
                                'controller' => 'Pages',
                                'action' => 'privacyPolicy',
                            ])?>" class="text-white">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="w-100 text-center">
                        <h4>Get In Touch with Us</h4>
                        <div class="footer-contact">
                            <span><i><img src="img/whatsapp.png" width="20" alt=""></i> (+91) +91 97785 39234</span>
                            <span><i><img src="img/email.png" width="20" alt=""></i> contact@allexamknowledge.com</span>
                            <span>
                  <a href="#"><img src="img/linkedin.png" width="20" alt=""></a>
                  <a href="#"><img src="img/instagram.png" width="20" alt=""></a>
                  <a href="#"><img src="img/twitter.png" width="20" alt=""></a>
                  <a href="#"><img src="img/youtube.png" width="20" alt=""></a>
                </span>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer><!-- End Footer -->
<footer class="bottom-footer">
    <div class="container py-4">
        <div class="copyright">
            &copy; Copyright 2023<strong> <span>AllExamKnowledge </span></strong>Pvt. Ltd.
            Read our <a href="<?php echo $this->Url->build([
                'controller' => 'Pages',
                'action' => 'privacyPolicy',
            ])?>" class="text-secondary">Privacy Policy & Terms & Conditions</a> for more.
        </div>

    </div>
</footer>

