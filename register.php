<?php require_once 'header.php';

?>

<!-- Heading Starts Here -->
<div class="page-heading header-text">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Register</h1>
				<p><a href="index.php">Home</a> / <span>Register</span></p>
			</div>
		</div>
	</div>
</div>
<!-- Heading Ends Here -->
<section class="h-100 my-login-page">
	<div class="container h-100">
		<div class="row justify-content-md-center h-100 my-5">
			<div class="card-wrapper">
				<div class="card fat">
					<div class="card-body">
						<h4 class="card-title">Register</h4>
						<?php
						if (isset($_POST['register'])) {

                            $result = insertToUser($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['password'], $db);

                            if(count($result["errors"]) == 0){
                                echo '<div class="alert alert-success" role="alert">'.$result["success"].'</div>';
                            }else{
                                echo '<div class="alert alert-danger" role="alert">
                                        <ul class="list-unstyled mb-0">';
                                foreach ($result["errors"] as $error) {
                                    echo "<li>$error</li>";
                                }
                               echo '</ul></div>';
                            }
                        }
						?>
						<form method="post" class="my-login-validation" novalidate="">
							<div class="form-group">
								<label for="name">Name</label>
								<input id="name" type="text" class="form-control" name="name" required autofocus>
								<div class="invalid-feedback">
									What's your name?
								</div>
							</div>
							<div class="form-group">
								<label for="surname">Surname</label>
								<input id="surname" type="text" class="form-control" name="surname" required autofocus>
								<div class="invalid-feedback">
									What's your surname?
								</div>
							</div>
							<div class="form-group">
								<label for="email">E-Mail Address</label>
								<input id="email" type="email" class="form-control" name="email" required>
								<div class="invalid-feedback">
									Your email is invalid
								</div>
							</div>

							<div class="form-group">
								<label for="password">Password</label>
								<input id="password" type="password" class="form-control" name="password" required data-eye>
								<div class="invalid-feedback">
									Password is required
								</div>
							</div>

							<div class="form-group">
								<div class="custom-checkbox custom-control">
									<input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
									<label for="agree" class="custom-control-label">I agree to the <a href="#">Terms and Conditions</a></label>
									<div class="invalid-feedback">
										You must agree with our Terms and Conditions
									</div>
								</div>
							</div>

							<div class="form-group m-0">
								<button type="submit" name="register" class="btn btn-primary btn-block">
									Register
								</button>
							</div>
							<div class="mt-4 text-center">
								Already have an account? <a href="login.php">Login</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php require_once 'footer.php'; ?>