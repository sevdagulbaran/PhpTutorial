<?php
require_once 'connection.php';
require_once 'functions.php';

$isFooterActive     = getConfigValueByKey("isFooterActive", $db);
$footerDescription  = getConfigValueByKey("footerDescription", $db);
$footerPhone        = getConfigValueByKey("footerPhone ", $db);
$footerEmail		= getConfigValueByKey("footerEmail", $db);
$footerSupport		= getConfigValueByKey("footerSupport", $db);
$footerWebsite		= getConfigValueByKey("footerWebsite", $db);
$siteTitle			= getConfigValueByKey("siteTitle",$db);

?>
<?php if ($isFooterActive == 'true') { ?>
	<!-- Footer Starts Here -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="footer-item">
						<div class="footer-heading">
							<h2>About Us</h2>
						</div>
						<p><?php echo $footerDescription ?></p>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="footer-item">
						<div class="footer-heading">
							<h2>Hosting Plans</h2>
						</div>
						<ul class="footer-list">
							<li><a href="#">Basic Cloud 5X</a></li>
							<li><a href="#">Cloud VPS 10X</a></li>
							<li><a href="#">Advanced Cloud</a></li>
							<li><a href="#">Custom Designs</a></li>
							<li><a href="#">Special Solutions</a></li>
						</ul>
					</div>
				</div>


				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="footer-item">
						<div class="footer-heading">
							<h2>Useful Links</h2>
						</div>
						<ul class="footer-list">
							<li><a href="#">Cloud Hosting Platform</a></li>
							<li><a href="#">Light Speed Zone</a></li>
							<li><a href="#">Content Delivery Network</a></li>
							<li><a href="#">Customer Support</a></li>
							<li><a href="#">Latest News</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="footer-item">
						<div class="footer-heading">
							<h2>More Information</h2>
						</div>
						<ul class="footer-list">
							<li>Phone: <a href="#"><?php echo $footerPhone ?></a></li>
							<li>Email: <a href="#"><?php echo $footerEmail ?></a></li>
							<li>Support: <a href="#"><?php echo $footerSupport ?></a></li>
							<li>Website: <a href="#"><?php echo $footerWebsite ?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-12">
					<div class="sub-footer">
						<p>Copyright &copy; <?php echo date('Y')." ".$siteTitle ?>
							- Designed by <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer Ends Here -->
<?php } ?>
<!-- Bootstrap core JavaScript -->
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Additional Scripts -->
<script src="/assets/js/custom.js"></script>
<script src="/assets/js/owl.js"></script>
<script src="/assets/js/accordions.js"></script>


<script language="text/Javascript">
	cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
	function clearField(t) { //declaring the array outside of the
		if (!cleared[t.id]) { // function makes it static and global
			cleared[t.id] = 1; // you could use true and false, but that's more typing
			t.value = ''; // with more chance of typos
			t.style.color = '#fff';
		}
	}

	$("#btn1").click(function() {
		$("#p1").hide(1000);
	});
</script>

</body>

</html>