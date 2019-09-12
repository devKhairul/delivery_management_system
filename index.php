<?php
session_start();
error_reporting(E_ALL);

require('objects/database.php');
require('objects/UserSession.php');

$db = new Database();
$db = $db->getConnection();

$user = new UserSession($db);

/**
 * @author Khairul Alam - khairul@sajida.org
 * User Login
 * @var [string]
 */

if (isset($_POST['login']))
{
	$email = trim($_POST['email']);
	$password = $_POST['password'];

	if ($user->login($email,$password))
	{
			$stmt = $db->prepare("SELECT * FROM users WHERE userId=:userId");
			$stmt->execute(array(":userId" => $_SESSION['userId']));
			$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
			$userType = $userRow['userType'];
			$userStatus = $userRow['userStatus'];

			if (($userType === 'MGM' || $userType === 'OPSM' || $userType === 'SU') && $userStatus == 'Active')
			{
				$_SESSION['userName'] = $userRow['userName'];
				$_SESSION['userId'] = $userRow['userId'];
				$_SESSION['userType'] = $userRow['userType'];
				header('location:app/admin');

			} elseif (($userType === 'CCC' || $userType === 'SC') && $userStatus == 'Active')
			{
				$_SESSION['userName'] = $userRow['userName'];
				$_SESSION['userId'] = $userRow['userId'];
				$_SESSION['userType'] = $userRow['userType'];
				header('location:app/user');
			}

		} else {
			$errorLogin = 'failed';
		}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>SF TICKETING APP</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/logo.png" alt="image">
				</div>

				<form class="login100-form validate-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<?php if (isset($errorLogin)): ?>
						<div class="row">
							<div class="alert alert-danger alert-dismissible">
							  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  <strong>Wrong username or password!</strong>
							</div>
						</div>
					<?php endif; ?>


					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>

					<!-- <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div> -->

					<!-- <div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
