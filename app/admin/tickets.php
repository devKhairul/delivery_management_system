<?php
error_reporting(E_ALL);

require_once('header.php');
require_once('config/database.php');
require_once('objects/Ticket.php');

$userId = $_SESSION['userId'];
$username = $_SESSION['userName'];

// Initiate database connection
$database = new DB();
$db = $database->getConnection();

// User object instance
$ticket = new Ticket($db);



/**
 * Ticket processing
 * @author Khairul Alam
 *
 */
if(isset($_POST['submit']))
{
  $clientName = $_POST['client_name'];
  $address = $_POST['address'];
  $phoneNumber = $_POST['phone_number'];
  $sampleCollectionDate = $_POST['sample_c_date'];
  $testName = $_POST['test_name'];
  $labName = $_POST['lab_name'];
  $status = $_POST['status'];
  $remarks = $_POST['remarks'];

  $stmt = $db->prepare("SELECT orderNumber FROM orders ORDER BY orderId DESC LIMIT 1");
  $stmt->execute();
  $tNo = $stmt->fetch(PDO::FETCH_ASSOC);

  if (empty($tNo))
  {
    $orderNumber = "ALAB0000001";
  } else {
    $orderNumber = ++$tNo['orderNumber'];
  }

  if ($ticket->create($userId,  $clientName,$address,$phoneNumber,$sampleCollectionDate, $testName,$labName,$status,$orderNumber,$remarks))
  {
    $success = 'true';
  } else {
    $failed = 'true';
  }


}

/**
 * Get status name list
 */
 $stmt = $db->prepare("SELECT * FROM status ORDER BY statusName ASC");
 $stmt->execute();
 $data = $stmt->fetchAll(PDO::FETCH_ASSOC);


 /**
  * Get assigned to name list
  */
  $stmt = $db->prepare("SELECT * FROM users");
  $stmt->execute();
  $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);


  /**
   * Get task size list
   *
   */
   $stmt = $db->prepare("SELECT * FROM labs");
   $stmt->execute();
   $labs = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<style media="screen">
  .form-control {
    font-size: 12px !important;
  }
  label {
    font-weight: bolder;
  }
</style>

<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">


        <div class="row">
          <div class="col-md-12">
            <?php if (isset($success) && $success == 'true') { ?>
              <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> order created successfully.
              </div>
            <?php } elseif (isset($failed)) { ?>
              <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sorry.</strong> something went wrong.
              </div>
            <?php } ?>

              <!-- Button trigger modal -->
              <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <strong>Create Ticket</strong>
              </button>
              <hr> -->

              <div class="card">

                <div class="card-body">
                  <h3 class="card-title"><strong>Place Order</strong></h3>
                  <hr>
                  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="inputEmail4">Client Name</label>
                        <input type="text" name="client_name" class="form-control" id="inputEmail4" required>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Address</label>
                        <input type="text" name="address" class="form-control" id="inputPassword4">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputAddress">Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" id="inputAddress" pattern="\d*" maxlength="11">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputAddress">Sample Collection Date</label>
                        <input type="date" name="sample_c_date" class="form-control" id="date" data-provide="datepicker">
                      </div>
                    </div>


                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputAddress2">Test Name</label>
                        <input type="text" name="test_name" class="form-control" id="inputAddress2">
                      </div>

                      <div class="form-group col-md-4">
                        <label for="inputState">Lab</label>
                        <select name="lab_name" id="inputState" class="form-control" required>
                          <option selected>......</option>
                          <?php foreach ($labs as $t) { ?>
                            <option value="<?php echo $t['labId'] ?>"><?php echo $t['labName']; ?></option>
                          <?php } ?>


                        </select>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="inputState">Status</label>
                        <select name="status" id="inputState" class="form-control" required>
                          <option selected>.....</option>

                          <?php foreach ($data as $status) { ?>
                            <option value="<?php echo $status['statusId'] ?>"><?php echo $status['statusName']; ?></option>
                          <?php }  ?>

                        </select>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="comment">Remarks <small>(optional)</small></label>
                        <textarea id="comment" name="remarks" class="form-control" rows="5"></textarea>
                      </div>
                    </div>

                    <!-- <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                          Check me out
                        </label>
                      </div>
                    </div> -->
                    <button type="submit" name="submit" class="btn btn-primary">GET GOING</button>
                  </form>
                </div>
              </div>
          </div>
        </div>

        <div class="clearfix"></div>


<?php require('footer.php'); ?>
