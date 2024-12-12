<div id="about-panel">
    <div class="about-top blog-top">
        <div class="container">
            <h2>Our Contacts</h2>
        </div>
    </div>
    <div class="map-holder">
        <img src="<?php echo Yii::app()->request->baseUrl;?>/images/img-map.jpg" alt="" class="img-responsive" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <strong class="home-title">Contact Form</strong>
                <span class="title-comments">Fields marked with  <em>*</em> are mandatory</span>
                <form action="#">
                    <div class="form-row">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <label for="name" class="form-label">Your Name <em>*</em></label>
                            <input id="name" type="text" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <label for="email" class="form-label">Your Email <em>*</em></label>
                            <input id="email" type="text" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <label for="website" class="form-label">Website</label>
                            <input id="website" type="text" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <label class="form-label">Scurity Code</label>
                            <input type="text" />
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label class="form-label">&nbsp;</label>
                            <input type="text" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
                            <label for="comts" class="form-label">Your Comments</label>
                            <textarea id="comts" cols="10" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12">
                            <input type="submit" value="Send Message" class="btn-send-msg" />
                        </div>
                    </div>
                </form>
            </div>
            <!--=======Right Panel======-->
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right">
                <strong class="home-title">Contacts</strong>
                <ul class="contact-list-info">
                    <li><img src="<?php echo Yii::app()->request->baseUrl;?>/images/ico-home.jpg" alt="" />000 Street, City   xyz </li>
                    <li><img src="<?php echo Yii::app()->request->baseUrl;?>/images/ico-mail.jpg" alt="" /><a href="#">info@simplifysupper.com</a> </li>
                    <li><img src="<?php echo Yii::app()->request->baseUrl;?>/images/ico-phone.jpg" alt="" />1(000) 000 000</li>
                    <li><img src="<?php echo Yii::app()->request->baseUrl;?>/images/ico-website.jpg" alt="" /><a href="#">http://www.simplifysupper.com</a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>