<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<footer id="page-footer" class="content-info" role="contentinfo">
        <section class="section contact contact" id="contact">
            <div class="section-inner5">
                <div class="section-content">

                    <div class="contact-col contact-left col-md-6">
                        <div class="section-header">
                            <h2 class="section-title">COME VISIT US</h2>

                            <h4 class="section-sub-title">Give us a call, send us an email or better yet, stop by and
                                see
                                us.</h4>

                            <div class="section-description">
                                <p>Monday – Friday 9:00 am – 5:00 pm | Saturday 10:00 am – 2:00 pm<br><b>Mailing
                                        Address:
                                        121 Carpenter Lane, Harrisonburg, VA 22801</b></p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-col contact-right col-md-6">
                        <div role="form" class="contact-f" id="contact-f" lang="en-US" dir="ltr">
                            <div class="screen-reader-response"></div>
                            <form action="#" method="post" class="contact-f-form" novalidate="novalidate">
                                <div class="input">
                                    <input type="text" name="fullname" value="" size="40"
                                        class="contact-f-form-control contact-f-text contact-f-validates-as-required"
                                        aria-required="true" aria-invalid="false" placeholder="Name">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="email" name="email" value="" size="40"
                                            class="contact-f-form-control contact-f-validates-as-email"
                                            aria-required="true" aria-invalid="false" placeholder="Email Address">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="tel" name="telephone" value="" size="40"
                                            class="contact-f-form-control contact-f-validates-as-tel"
                                            aria-invalid="false" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" name="address" value="" size="40"
                                            class="contact-f-form-control contact-f-validates-as-required"
                                            aria-required="true" aria-invalid="false"
                                            placeholder="Adress, City,Zip Code">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="hidden" value="" class="hidden_contactTo" name="hidden_contactTo">
                                        <select name="contactTo" class="contact-f-form-control contact-f-not-valid">
                                            <option value="">Harrisonburg</option>
                                            <option value="spencer@helmuthbuilders.com">Front Royal</option>
                                            <option value="diane@helmuthbuilders.com">Staunton</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="textarea-message">
                                    <textarea name="message" cols="40" rows="10"
                                        class="contact-f-form-control contact-f-textarea" placeholder="Message">
                                </textarea>
                                </div>

                                <input type="submit" value="SEND" class="contact-f-form-control contact-f-submit"><input
                                    type="hidden" class="contact-f-pum" value="">
                                <div class="contact-f-response-output contact-f-display-none"></div>
                            </form>
                        </div>
                    </div>


                    <div class="contact-location">
                        <div class="location-item">
                            <strong>Harrisonburg Office</strong>

                            <p>4309 S Valley Pike <br>Harrisonburg, VA 22802</p>
                            <p>O: <a href="#">540-833-2276</a></p>
                            <p>C: <a href="#">540-421-1818</a></p>
                            <p>Email: <a href="#">tyler@helmuthbuilders.com</a></p>
                        </div>
                        <div class="location-item">
                            <strong>Staunton&nbsp;Office</strong>

                            <p>815 Richmond Avenue <br>Staunton, VA&nbsp;24401</p>
                            <p>O: <a href="#">540-712-2221</a></p>
                            <p>C: <a href="#">540-660-2606</a></p>
                            <p>Email: <a href="#">diane@helmuthbuilders.com</a></p>
                        </div>
                        <div class="location-item">
                            <strong>Front Royal Office</strong>

                            <p>1231 Shenandoah <br>Avenue Front Royal, VA 22630</p>
                            <p>O: <a href="#">540-636-1907</a></p>
                            <p>C: <a href="#">540-244-1492</a></p>
                            <p>Email: <a href="mailto: spencer@helmuthbuilders.com">spencer@helmuthbuilders.com</a></p>
                        </div>

                        <div class="location-item footer-social">

                            <div class="chanel-social">
                                <a target="_blank" class="chanel chanel-facebook"
                                    href="https://www.facebook.com/HelmuthBuildersInc/">
                                    <img src="./src/images/facebook.svg" alt="facebook">
                                </a>
                                <a target="_blank" class="chanel chanel-instagram"
                                    href="https://www.instagram.com/helmuthbuilders/">
                                    <img src="./src/images/instagram.svg" alt="instagram">
                                </a>
                                <a target="_blank" class="chanel chanel-twitter"
                                    href="https://twitter.com/helmuthbuilders">
                                    <img src="./src/images/twitter.svg" alt="twitter">
                                </a>
                                <a target="_blank" class="chanel chanel-google"
                                    href="https://plus.google.com/u/0/111509630275663484126">
                                    <img src="./src/images/google-plus.svg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <div id="footer-copyright">
            <div class="row">
                <div id="copyright-bar" class="col-lg-12"><span>© Helmuth Builders. All rights reserved. <a
                            href="#">FAQs</a></span>
                    <a target="_blank" href="#" class="seadev-logo"><img alt="Website Design &amp; Development by Seadev" src="./src/images/seadev-logo.svg"></a></div>
            </div>
            <div class="clearfix"></div>
        </div>
        </div>
    </footer>

    <script src="jquery-3.5.1.min.js"></script>
    <script src="./src/script.js"></script>
</body>
</html>