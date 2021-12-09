<?php
require_once 'header.php';
$isSearchDomain           = getConfigValueByKey("isSearchDomain", $db);
$isTldBar                 = getConfigValueByKey("isTldBar", $db);
$isSearchDomainRequired   = getConfigValueByKey("isSearchDomainRequired", $db);
$companies                = getCompanies($db);
$cloudFeatures            = getCloudFeatures($db);
$services                 = getServices($db);
$testimonials             = getTestimonials($db);
$products                 = getProducts($db);





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
            <?php foreach ($products as $product) { ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="pricing-item">
                    <h4><?php echo $product->name ?></h4>
                    <div class="price">
                        <h6><?php echo $product->prefix . $product->monthly_price ?></h6>
                        <span>monthly</span>
                    </div>
                    <p><?php echo $product->description ?></p>
                    <div class="dev"></div>
                    <ul>
                    <?php foreach ($product->features  as $feature) { ?>
                        <li><i class="<?php echo $feature->icon ?>"></i><?php echo $feature->name ?></li>
                        <?php } ?>
                    </ul>
                    <a href="#" class="main-button">Start Plan</a>
                </div>
            </div>
            <?php } ?>
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