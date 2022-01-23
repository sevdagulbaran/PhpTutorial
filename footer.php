<?php
require_once 'connection.php';
require_once 'functions.php';

$isFooterActive     = getConfigValueByKey("isFooterActive", $db);
$aboutus  			= getConfigValueByKey("aboutus", $db);
$phone        		= getConfigValueByKey("phone ", $db);
$email				= getConfigValueByKey("email", $db);
$support			= getConfigValueByKey("support", $db);
$website			= getConfigValueByKey("website", $db);
$siteTitle			= getConfigValueByKey("siteTitle", $db);
$footerItems		= getFooterItems($db);

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
						<p><?php echo $aboutus ?></p>
					</div>
				</div>
				<?php foreach ($footerItems as $footerItem) { ?>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="footer-item">
						<div class="footer-heading">
							<h2><?php echo $footerItem->title ?></h2>
						</div>
						<ul class="footer-list">
							<?php foreach ($footerItem->subItems as $subItem) { ?>
								<li><a href="<?php echo $subItem->link ?>"><?php echo $subItem->name ?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<?php } ?>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="footer-item">
						<div class="footer-heading">
							<h2>More Information</h2>
						</div>
						<ul class="footer-list">
							<li>Phone: <a href="#"><?php echo $phone ?></a></li>
							<li>Email: <a href="#"><?php echo $email ?></a></li>
							<li>Support: <a href="#"><?php echo $support ?></a></li>
							<li>Website: <a href="#"><?php echo $website ?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-12">
					<div class="sub-footer">
						<p>Copyright &copy; <?php echo date('Y') . " " . $siteTitle ?>
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

<script>
    $("#reply-btn").click(function (){
        $("#reply-form").slideToggle()
    })
</script>

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