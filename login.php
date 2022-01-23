<?php require_once 'header.php';

if(isset($_SESSION['loggeduser'])){
    header("Location: userpanel.php");
}

?>

<!-- Heading Starts Here -->
<div class="page-heading header-text">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Login</h1>
				<p><a href="index.php">Home</a> / <span>Login</span></p>
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
						<h4 class="card-title">Login</h4>
				<?php

				if (isset($_POST['login'])) {
					$result = isUserExist( $_POST['email'], $_POST['password'], $db);
                            if(count($result["errors"]) == 0){
								if ($result["data"][0]->status == 'active' ) {
									echo '<div class="alert alert-success" role="alert">'.$result["success"].'</div>';
                                    $_SESSION['loggeduser'] = $result["data"][0];
                                    header("Location: userpanel.php");
								}else {
									echo '<div class="alert alert-danger" role="alert">Kullanıcı hesabı yasaklandı</div>';
								}
                            }else{
                                echo '<div class="alert alert-danger" role="alert">
                                        <ul class="list-unstyled mb-0">';
                                foreach ($result["errors"] as $error) {
                                    echo "<li>$error</li>";
                                }
                                echo '</ul></div>';
                            }
						    }?>

						<form method="post" class="my-login-validation" novalidate="">
							<div class="form-group">
								<label for="email">E-Mail Address</label>
								<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
								<div class="invalid-feedback">
									Email is invalid
								</div>
							</div>

							<div class="form-group">
								<label for="password">Password
									<a href="#" class="float-right">
										Forgot Password?
									</a>
								</label>
								<input id="password" type="password" class="form-control" name="password" required data-eye>
								<div class="invalid-feedback">
									Password is required
								</div>
							</div>

							<div class="form-group">
								<div class="custom-checkbox custom-control">
									<input type="checkbox" name="remember" id="remember" class="custom-control-input">
									<label for="remember" class="custom-control-label">Remember Me</label>
								</div>
							</div>

							<div class="form-group m-0">
								<button type="submit" name="login" class="btn btn-primary btn-block">
								<a href="userpanel.php">Login </a>
								</button>
							</div>
							<div class="mt-4 text-center">
								Don't have an account? <a href="register.php">Create One</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php require_once 'footer.php'; ?>