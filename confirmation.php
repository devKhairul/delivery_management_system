<?php
session_start();
error_reporting(E_ALL);

require('objects/database.php');
require('objects/UserSession.php');

$db = new Database();
$db = $db->getConnection();

/**
 * @author Khairul Alam - khairul@sajida.org
 * User Feedback
 * @var [string]
 */

if (isset($_GET['uid']) && !empty($_GET['r']))
{
	$userId = $_GET['uid'];
	$ticketId = $_GET['tid'];
	$message = $_GET['r'];

	//check whether feedback exists or note
	$row = $db->query("SELECT count(*) FROM ticket_feedback WHERE ticketId=$ticketId")->fetchColumn();

	if ($row < 1)
	{
		// insert feedback if does not exist
		$stmt = $db->prepare("INSERT INTO ticket_feedback (userId, ticketId, feedback) VALUES (:userId,:ticketId,:feedback)");
		$stmt->bindParam(":userId", $userId);
		$stmt->bindParam(":ticketId", $ticketId);
		$stmt->bindparam(":feedback", $message);
		$stmt->execute();
	}
	else
	{
		$error = true;
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

				<div class="col-md-6">
					<h2><strong>


						<?php if (isset($error)) { ?>
							You have already provided your feedback!
						<?php } else { ?>
							Thank you for your Feedback
						<?php } ?>

					</strong></h2>
				</div>

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
