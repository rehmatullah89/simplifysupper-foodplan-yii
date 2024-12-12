
<!--======= Main Block ======-->
<div id="main-block">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="account-information">
            <!-- //////// Title Bar Start //////// -->
            <h2 class="home-title"><?php echo $userdetails->firstname; ?> Account</h2>
            <br/>

            <span class="title green">Account Information</span>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
                <span class="row col-lg-4 col-md-4 col-sm-12 col-xs-12">Username</span>
                <span class="row col-lg-8 col-md-8 col-sm-12 col-xs-12"><?php echo $userdetails->firstname .  $userdetails->lastname; ?></span>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
                <span class="row col-lg-4 col-md-4 col-sm-12 col-xs-12">Email</span>
                <span class="row col-lg-8 col-md-8 col-sm-12 col-xs-12"><?php echo $userdetails->email; ?></span>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row pull-right">
                <a class="btn-accept pull-right btn-genral" href="#">Change Passord</a>
                <a class="btn-decline pull-right btn-genral" href="#">Edit</a>

            </div>

            <div class="clearfix"></div>

            <hr/>

            <span class="title green">Personal Information</span>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
                <span class="row col-lg-4 col-md-4 col-sm-12 col-xs-12">First Name</span>
                <span class="row col-lg-8 col-md-8 col-sm-12 col-xs-12"><?php echo $userdetails->firstname;?> </span>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
                <span class="row col-lg-4 col-md-4 col-sm-12 col-xs-12">Last Name</span>
                <span class="row col-lg-8 col-md-8 col-sm-12 col-xs-12"><?php echo $userdetails->lastname; ?></span>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
                <span class="row col-lg-4 col-md-4 col-sm-12 col-xs-12">Gender</span>
                <span class="row col-lg-8 col-md-8 col-sm-12 col-xs-12"><?php echo $userdetails->gender; ?></span>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
                <span class="row col-lg-4 col-md-4 col-sm-12 col-xs-12">About Me</span>
                <span class="row col-lg-8 col-md-8 col-sm-12 col-xs-12">I strongly believe that dinner time is ideal
                    family time and I want to help you enjoy the memories without stressing over the details. By becoming
                    a member of Simplify Supper you are joining my family and joining me in my cause to help busy
                    homemakers serve up a delicious, healthy, budget friendly meal to your loved ones. Let's enjoy
                    dinner time together! Bon appetit!</span>
            </div>

            <div class="clearfix"></div>

            <hr />

            <span class="title green">Address Information</span>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
                <span class="row col-lg-4 col-md-4 col-sm-12 col-xs-12">Address</span>
                <span class="row col-lg-8 col-md-8 col-sm-12 col-xs-12"><?php echo $userdetails->address; ?></span>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
                <span class="row col-lg-4 col-md-4 col-sm-12 col-xs-12">City</span>
                <span class="row col-lg-8 col-md-8 col-sm-12 col-xs-12"><?php echo $userdetails->city; ?></span>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
                <span class="row col-lg-4 col-md-4 col-sm-12 col-xs-12">State</span>
                <span class="row col-lg-8 col-md-8 col-sm-12 col-xs-12"><?php echo $userdetails->state; ?></span>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
                <span class="row col-lg-4 col-md-4 col-sm-12 col-xs-12">Zip</span>
                <span class="row col-lg-8 col-md-8 col-sm-12 col-xs-12"><?php echo $userdetails->zip; ?></span>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
                <span class="row col-lg-4 col-md-4 col-sm-12 col-xs-12">Country</span>
                <span class="row col-lg-8 col-md-8 col-sm-12 col-xs-12"><?php echo $userdetails->country; ?></span>
            </div>

            <div class="clearfix"></div>

            <hr />

            <span class="title green">General Settings</span>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row">
                <span class="row col-lg-4 col-md-4 col-sm-12 col-xs-12">Receive email on my recipe of the day</span>
                <span class="row col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="btn-group">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-default btn-on active" type="button">ON</button>
                        </div>
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-default btn-off" type="button">OFF</button>
                        </div>
                    </div>
                </span>
            </div>



        </div>
    </div>
</div>
