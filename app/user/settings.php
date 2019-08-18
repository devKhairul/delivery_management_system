<?php
error_reporting(E_ALL);
require('header.php');
require_once('config/database.php');
require_once('objects/User.php');

$userId = $_SESSION['userId'];

// Initiate database connection
$database = new DB();
$db = $database->getConnection();

// User object instance
$user = new User($db);

$data = $user->showSingle($userId);


if (isset($_POST['update']))
{
  $password = $_POST['password'];
  $conPass = $_POST['confirmPassword'];

  if ($password === $conPass)
  {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if ($user->updateProfile($userId, $password))
    {
      $success = 'true';
    }
    else
    {
      $failed = 'true';
    }
  }
}


?>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
            <?php if (isset($success)) { ?>
              <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> account updated successfully.
              </div>
            <?php } elseif (isset($failed)) { ?>
              <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sorry.</strong> something went wrong.
              </div>
            <?php } ?>
          </div>
        </div>

        <div class="row">

            <div class="col-lg-6 offset-lg-3">
                <div class="card">

                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center"><strong>Update Profile</strong></h3>
                                </div>
                                <hr>
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" novalidate="novalidate">

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1"><strong>Name</strong> </label>
                                        <input name="userName" type="text" class="form-control" value="<?php echo $data['userName']; ?>" readonly>
                                    </div>

                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1"><strong>Email</strong> </label>
                                        <input name="email" type="email" class="form-control" value="<?php echo $data['userEmail']; ?>" readonly>
                                    </div>

                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1"><strong>New Password</strong> </label>
                                        <input name="password" type="password" class="form-control cc-name valid">
                                    </div>

                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1"><strong>Confirm Password</strong> </label>
                                        <input name="confirmPassword" type="password" class="form-control cc-name valid">
                                    </div>


                                    <div>
                                      &nbsp;
                                    </div>

                                    <div>
                                        <button id="payment-button" type="submit" name="update" class="btn btn-lg btn-info btn-block">
                                          <span id="payment-button-amount">UPDATE</span>
                                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div> <!-- .card -->
            </div><!--/.col-->
        </div><!-- .animated -->
</div><!-- .content -->


<?php require('footer.php'); ?>
