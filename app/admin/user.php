<?php
  error_reporting(0);
  require('header.php');
  require_once('config/database.php');
  require_once('objects/User.php');

  $supervisorId = $_SESSION['userId'];
  $userType = $_SESSION['userType'];
  $userDept = $_SESSION['userDept'];

  // Initiate database connection
  $database = new DB();
  $db = $database->getConnection();

  // User object instance
  $user = new User($db);


  // Get redirect code from query string
  $userCreated = $_GET['m'];

  /**
   * Update user account status
   * @author Khairul Alam
   * @method edit
   */
   if (!empty($_GET['msg']) && !empty($_GET['id']))
   {
     $msg = $_GET['msg'];
     $id = $_GET['id'];
     $user->edit($id, $msg);
   }



  /**
   * User registration processing
   * @author Khairul Alam
   * @var [type]
   */
  if(isset($_POST['submit']))
  {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $userType = $_POST['role'];

    //check if email exists

    $stmt = $db->prepare("SELECT * FROM users WHERE userEmail=:userEmail");
    $stmt->execute(array(":userEmail" => $email));

    if ($stmt->rowCount() >= 1)
    {
      $emailExists = 'true';
    }

    // create record
    if (!isset($emailExists))
    {
      if ($user->create($name,$email,$password,$userType))
      {
        $userSuccess = 'true';
      } else
      {
        $userFailed = 'true';
      }
    }

  }

?>

<style media="screen">
  .form-control {
    font-size: 12px !important;
  }
</style>

<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">


        <div class="row">
          <div class="col-md-12">
            <?php if (isset($userSuccess)) { ?>
              <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> user account created successfully.
              </div>
            <?php } elseif (isset($emailExists)) { ?>
              <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sorry.</strong> email already exists.
              </div>
            <?php } ?>

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <strong>Create User</strong>
              </button>
              <hr>

              <div class="card">

                  <div class="card-body">
                      <table id="bootstrap-data-table" class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <th>Sl.</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Role</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>

                            <?php $i=1; foreach($user->showAll($userType, $userDept, $supervisorId) as $val) { ?>

                              <tr>
                                  <td><?php echo $i++; ?></td>
                                  <td><?php echo $val['userName']; ?></td>
                                  <td><?php echo $val['userEmail']; ?></td>
                                  <td><?php echo $val['userType']; ?></td>


                                  <?php if($val['userStatus'] == 'Active') { $msg = 'Inactive'; ?>
                                    <td><a onclick="return confirm('Are you sure?')" href="user.php?msg=<?php echo $msg; ?>&id=<?php echo $val['userId']; ?>" class="btn btn-outline-success btn-sm">Deactivate</a></td>
                                  <?php } else { $msg = 'Active'; ?>
                                    <td><a onclick="return confirm('Are you sure?')" href="user.php?msg=<?php echo $msg; ?>&id=<?php echo $val['userId']; ?>" class="btn btn-outline-success btn-sm">Activate</a></td>
                                  <?php  } ?>






                              </tr>

                            <?php } ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
        </div>

        <div class="row">

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-body">
                  <div class="modal-content">
                    <div class="card">

                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center text-uppercase"><strong>User Account</strong></h3>
                                    </div>
                                    <hr>
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1"><strong>Name</strong> </label>
                                            <input id="cc-payment" name="name" type="text" class="form-control" required>
                                        </div>

                                        <div class="form-group has-success">
                                            <label for="cc-name" class="control-label mb-1"><strong>Email</strong> </label>
                                            <input id="cc-name" name="email" type="email" class="form-control cc-name valid" required>
                                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                        </div>

                                        <div class="form-group has-success">
                                            <label for="cc-name" class="control-label mb-1"><strong>Password</strong> </label>
                                            <input id="cc-name" name="password" type="password" class="form-control cc-name valid" required>
                                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                        </div>

                                        <div class="form-group">
                                            <label for="select" class="form-control-label"><strong>Role</strong> </label>
                                            <select name="role" id="select" class="form-control" required>
                                                <option value="" selected><small><strong>Select Role</strong></small></option>

                                                <option value="CCC">Customer Care Center</option>
                                                <option value="SC">Sample Collector</option>
                                                <option value="OPSM">Operational Manager</option>
                                                <option value="MGM">Management</option>
                                                <option value="SU">Super User</option>


                                            </select>
                                        </div>

                                        <div>
                                          &nbsp;
                                        </div>

                                        <div>
                                            <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                              <span id="payment-button-amount">CREATE</span>
                                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            </button>
                                        </div>
                                    </rm>
                                </div>
                            </div>

                        </div>
                    </div> <!-- .card -->
                  </div>

                </div>

            </div>
          </div>
        </div>


        <div class="clearfix"></div>

<?php require('footer.php'); ?>
