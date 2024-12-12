<div id="about-panel">
    <div class="about-top blog-top">
        <div class="container">
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right text-right">
                <a class="title-comments" href="#">Already a Member?</a>
            </div>
            <h2>Sign Up</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-7 col-xs-12 col-lg-offset-1 col-md-offset-1">
                <div class="signup-holder">
                    <span class="title-create text-center">Create your account</span>
                    <span class="title-comments">Fields marked with  <em>*</em> are mandatory</span>

                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'simplesignup',
                        'focus' => array($model, 'email'),
                            )
                    );
                    ?>
                    <div class="row-holder">
                        <?php echo $form->errorSummary($model); ?>
                    </div>
                    <div class="row-holder">
                        <?php echo $form->textField($model, 'email', array('class' => 'username', 'placeholder' => 'Email')); ?>
                    </div>
                    <div class="row-holder">
                        <?php echo $form->passwordField($model, 'password', array('class' => 'password', 'placeholder' => 'Password')); ?>
                    </div>
                    <div class="row-holder">
                        <?php echo $form->passwordField($model, 'cpassword', array('class' => 'password', 'placeholder' => 'Confirm Password')); ?>
                    </div>


                    <div class="row-holder">
                        <?php echo CHtml::submitButton('Create Your Account', array('class' => 'btn-signup login-link-big')); ?>
                        <input type="hidden" id="submit-signup" value="Create Your Account" class="btn-login" />
                        <input type="submit" style="display:none;" id="after-signup" value="Create Your Account" class="btn-login" data-toggle="modal" data-target="#myModal" />
                    </div>

                    <?php echo CHtml::endForm(); ?>


                    <?php $this->endWidget(); ?>

                    <div class="row-holder text-center">
                        <span class="singOR">OR</span>
                    </div>
                    <div class="row-holder">
                        <a class="singnin-fb" href="https://www.facebook.com/dialog/oauth?client_id=716978615033533&redirect_uri=http://localhost/simplifysupper/frontend/www/site/join/&scope=email">SignIn With Facebook</a>
                    </div>

                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/img-signup.jpg" class="img-responsive" alt="" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1">
                <div class="signup-info">
                    <span class="title-benefit">Member Benefits</span>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-xs-12">
                            <ul>
                                <li><a href="#">Individual Meal Planning Calendar</a></li>
                                <li><a href="#">Print and email grocery list</a></li>
                                <li><a href="#">Send grocery list to your cell phone</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-12">
                            <ul>
                                <li><a href="#">Add personal recipes</a></li>
                                <li><a href="#">Submit recipes to the site</a></li>
                                <li><a href="#">Create profile and add friends</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-12">
                            <ul>
                                <li><a href="#">Rate and select favorite recipes</a></li>
                                <li><a href="#">Share recipes, tips and tricks</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer-->
        <!--=======Footer======-->
        <div id="footer">
            <div class="footer-top">
                <div class="row">
                    <div class="container">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs 12">
                            <strong class="f-title">About</strong>
                            <ul class="site-links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Be Our Sponsor</a></li>
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs 12">
                            <strong class="f-title">Categories</strong>
                            <ul class="site-links">
                                <li><a href="#">Beef Recipes</a></li>
                                <li><a href="#">Chicken Recipes</a></li>
                                <li><a href="#">Dessert Recipes</a></li>
                                <li><a href="#">Fish Recipes</a></li>
                                <li><a href="#"> Healthy Recipes</a></li>
                                <li><a href="#">Vegetarian Recipes</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs 12">
                            <strong class="f-title">Testimonial</strong>
                            <div class="testimonial">
                                <div class="img-holder">
                                    <img src="images/img02.jpg" alt="" />
                                </div>
                                <div class="txt-holder">
                                    <span class="testi-name">Emily</span>
                                    <p>Simplify Supper makes my life easier. It helps me cook great meals, saves me time and money. Keep the spirits
                                        high Krista. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs 12">
                            <strong class="f-title">Stay Connected</strong>
                            <ul class="site-links">
                                <li><img src="images/img-connect.jpg" alt="" class="img-responsive" /></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="container">
                        <div class="col-lg-4 col-sm-6 col-xs-12">
                            <p class="copy-right">&copy;2013 Simplify Supper, LLC.</p>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-xs-12 pull-right">
                            <ul class="social-networks">
                                <li class="fb"><a href="#">facebook</a></li>
                                <li class="tw"><a href="#">Twitter</a></li>
                                <li class="pint"><a href="#">pinterest</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--------->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <a href="#" class="cross-model" data-dismiss="modal"><img src="images/ico-cross.png" alt="" /></a>
                    <div class="modal-body">
                        <h2 class="thanks-title">Thank you for <br />Signing Up</h2>
                        <div class="model-inner">
                            <span class="title-comments">Now it is time to complete this process</span>

                            <?php
                            if (Yii::app()->user->hasFlash('useremail')) {
                                $useremail = Yii::app()->user->getFlash('useremail');
                                ?>
                                <p class="abt-para">Thank you for signing up for your account.  To complete this process you have to confirm
                                    by clicking the link we have mailed to your mail account: <a class="abt-link" href="<?php echo Yii::app()->user->getFlash('useremail'); ?>"></a></p>
                                <h3><img src="images/ico-mail01.jpg" alt="" />If you did not receive a mail: 
                                    <a class="abt-link" href="<?php echo Yii::app()->request->baseUrl . '/site/resendmail?email=' . $useremail; ?>">Resend Email</a></h3>
                                <?php
                            } echo Yii::app()->user->getFlash('useremail');
                            ?>
                            <p class="abt-para">You can now close this window by clicking finish.</p>
                            <p class="abt-para">Your Simplify Supper Team <a class="readmore pull-right" href="#">Finish</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!----------->
    </div>
</div>

<a data-toggle="modal" href="#myModal" class="btn btn-primary" style="display:none;" id="signupmodal">Launch modal</a>



<div id="popup-open"><?php echo Yii::app()->user->getFlash('popup'); ?></div>

<!--------Modal after signup-------------->




<script>
    $(document).ready(function() {
        $('.btn-simplesignup').click(function(e) {
            e.preventDefault();
            alert('signup clicked');
            return false;
        });
        var popup = $("#popup-open").text();
        if (popup == "1")
        {
            $('#signupmodal').click();
        }
    });
</script>
<style>
    .errorSummary
    {
        background-color: pink;
        font-size: 12px;
        margin-left:0px;
    }
    .login-link-big{

        background: none repeat scroll 0 0 #16a085;
        color: #fff;
        font-size: 12px;
        line-height: 30px;
        padding: 0 123px;
        text-transform: uppercase;

    }

</style>

