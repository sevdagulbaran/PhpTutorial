<?php
require_once 'header.php';
$isSearchDomain           = getConfigValueByKey("isSearchDomain", $db);
$isTldBar                 = getConfigValueByKey("isTldBar", $db);
$isSearchDomainRequired   = getConfigValueByKey("isSearchDomainRequired", $db);
$companies                = getCompanies($db);
$cloudFeatures            = getCloudFeatures($db);
$services                 = getServices($db);
$testimonials              = getTestimonials($db);




?>


<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="banner">
    <?php if ($isSearchDomain == 'true') { ?>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="header-text caption">
                        <h2>Search your domain</h2>
                        <div id="search-section">
                            <form id="suggestion_form" name="gs" method="get" action="#">
                                <div class="searchText">
                                    <input type="text" name="q" class="searchText" placeholder="Enter your domain here..." autocomplete="on" <?php $isSearchDomainRequired == 'true' ? "required" : "" ?>>
                                    <?php if ($isTldBar == 'true') { ?>
                                        <ul>
                                            <li><label><input type="checkbox" name="ext_com" value="1"><span>.com <em>($10/yr)</em></span></label></li>
                                            <li><label><input type="checkbox" name="ext_net" value="1"><span>.net <em>($12/yr)</em></span></label></li>
                                            <li><label><input type="checkbox" name="ext_org" value="1"><span>.org <em>($8/yr)</em></span></label></li>
                                            <li><label><input type="checkbox" name="ext_in" value="1"><span>.in <em>($6/yr)</em></span></label></li>
                                        </ul>
                                    <?php } ?>
                                </div>
                                <input type="submit" name="results" class="main-button" value="Search Now">
                            </form>
                            <div class="advSearch_chkbox">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<!-- Banner Ends Here -->

<!-- Trusted Starts Here -->
<div class="trusted-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="trusted-section-heading">
                    <h4>TRUSTED BY 1,250+ HAPPY CUSTOMERS WORLDWIDE</h4>
                </div>
            </div>
            <div class="col-md-12">
                <div class="owl-trusted owl-carousel">
                    <?php foreach ($companies as $company) { ?>
                        <div class="trusted-item">
                            <img src="assets/images/<?php echo $company->image ?>" alt="trusted 1">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Trusted Ends Here -->


<!-- Services Starts Here -->
<div class="services-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <span>Hosting Services</span>
                    <h2>Services we provide</h2>
                    <p>Host Cloud is a professional Bootstrap 4 template by TemplateMo for your hosting company websites. There are 4 HTML pages included in this template. You can feel free to customize anything. Please share this template to your friends. Thank you.</p>
                </div>
            </div>
            <?php foreach ($services as $service) { ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="service-item">
                        <i class="<?php echo $service->icon ?> "></i>
                        <h4><?php echo $service->title ?></h4>
                        <p><?php echo $service->description ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Services Ends Here -->


<!-- Pricing Starts Here -->
<div class="pricing-section">
    <div class="background-image-pricing">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="section-heading">
                    <h2>Cloud Hosting Plans</h2>
                    <p>Lorem ipsum dolor amet taxidermy sriracha cardigan salvia actually vice migas enamel pin sustainable carry scenester lomo hot chicken farm table actually kinfolk.</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="pricing-item">
                    <h4>Basic Cloud 5x</h4>
                    <div class="price">
                        <h6>$15.50</h6>
                        <span>monthly</span>
                    </div>
                    <p>Etiam sit amet placerat lacus, sed placerat mauris. Vestibulum malesuada vehicula sapien non tempus.</p>
                    <div class="dev"></div>
                    <ul>
                        <li><i class="fa fa-check"></i>500 GB Storage Space</li>
                        <li><i class="fa fa-check"></i>3 TB Data Transfer</li>
                        <li><i class="fa fa-check"></i>Basic Managed Panel</li>
                        <li><i class="fa fa-check"></i>24/7 Fast Support</li>
                        <li><i class="fa fa-check"></i>100 Premium Themes</li>
                        <li><i class="fa fa-check"></i>Cancel or Upgrade Anytime</li>
                    </ul>
                    <a href="#" class="main-button">Start Plan</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="pricing-item">
                    <h4>Cloud VPS 10x</h4>
                    <div class="price price-gradient">
                        <h6>$30.00</h6>
                        <span>monthly</span>
                    </div>
                    <p>Etiam sit amet placerat lacus, sed placerat mauris. Vestibulum malesuada vehicula sapien non tempus.</p>
                    <div class="dev"></div>
                    <ul>
                        <li><i class="fa fa-check"></i>1 TB Cloud Space</li>
                        <li><i class="fa fa-check"></i>8 TB Data Transfer</li>
                        <li><i class="fa fa-check"></i>Fully Managed Panel</li>
                        <li><i class="fa fa-check"></i>15-minute Quick Support</li>
                        <li><i class="fa fa-check"></i>Unlimted Web Addons</li>
                        <li><i class="fa fa-check"></i>Cancel or Upgrade Anytime</li>
                    </ul>
                    <a href="#" class="gradient-button">Select Plan</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="pricing-item">
                    <h4>Advanced Cloud</h4>
                    <div class="price">
                        <h6>$72.25</h6>
                        <span>monthly</span>
                    </div>
                    <p>Etiam sit amet placerat lacus, sed placerat mauris. Vestibulum malesuada vehicula sapien non tempus.</p>
                    <div class="dev"></div>
                    <ul>
                        <li><i class="fa fa-check"></i>4 TB Cloud Space</li>
                        <li><i class="fa fa-check"></i>20 TB Data Transfer</li>
                        <li><i class="fa fa-check"></i>Fully Managed Panel</li>
                        <li><i class="fa fa-check"></i>15-minute Quick Support</li>
                        <li><i class="fa fa-check"></i>Top Notch Web Apps</li>
                        <li><i class="fa fa-check"></i>Advanced Scalable</li>
                    </ul>
                    <a href="#" class="main-button">Take it now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pricing Ends Here -->


<!-- Features Starts Here -->
<div class="features-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <span>Best Quality for you</span>
                    <h2>Cloud Features</h2>
                </div>
            </div>
            <?php foreach ($cloudFeatures as $cloudFeature) { ?>
                <div class="col-md-6">
                    <div class="feature-item">
                        <div class="icon">
                            <img src="assets/images/<?php echo $cloudFeature->image ?>" alt="">
                        </div>
                        <h4><?php echo $cloudFeature->title ?></h4>
                        <p><?php echo $cloudFeature->description ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Features Ends Here -->


<!-- Testimonials Starts Here -->
<div class="testimonials-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <span>Testimonials</span>
                    <h2>What they say about us</h2>
                </div>
            </div>
            <div class="col-md-10 offset-md-1">
                <div class="owl-testimonials owl-carousel">
                    <?php foreach ($testimonials as $testimonial) { ?>
                        <div class="testimonial-item">
                            <div class="icon">
                                <i class="<?php echo $testimonial->image ?>"></i>
                            </div>
                            <p><?php echo $testimonial->description ?></p>
                            <h4><?php echo $testimonial->person ?></h4>
                            <span><?php echo $testimonial->job ?></span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonials Ends Here -->


<!-- Footer Starts Here -->
<?php require_once 'footer.php'; ?>