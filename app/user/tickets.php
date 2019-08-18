<?php
error_reporting(E_ALL);

require_once('header.php');
require_once('config/database.php');
require_once('objects/Ticket.php');

$userId = $_SESSION['userId'];
$userDept = $_SESSION['userDept'];
$supervisorId = $_SESSION['supervisorId'];

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
  $title = $_POST['title'];
  $description = $_POST['description'];
  $requestBy = $_POST['requestBy'];
  $requestDate = $_POST['requestDate'];
  $deadline = $_POST['deadline'];
  $taskSize = $_POST['taskSize'];
  $assigned = $_POST['assignedTo'];
  $status = $_POST['status'];
  $comment = $_POST['comment'];

  $stmt = $db->prepare("SELECT ticketNumber FROM tickets ORDER BY ticketId DESC LIMIT 1");
  $stmt->execute();
  $tNo = $stmt->fetch(PDO::FETCH_ASSOC);

  if (empty($tNo))
  {
    $ticketNo = "SFT000001";
  } else {
    $ticketNo = ++$tNo['ticketNumber'];
  }

  if ($ticket->create($supervisorId, $userDept, $title,$description,$requestBy,$requestDate,$deadline,$taskSize,$assigned,$status,$ticketNo,$comment))
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
  $stmt = $db->prepare("SELECT * FROM users WHERE userId = :userId");
  $stmt->execute(array("userId" => $userId));
  $userData = $stmt->fetchAll(PDO::FETCH_ASSOC);


  /**
   * Get task size list
   *
   */
   $stmt = $db->prepare("SELECT * FROM tasks_size");
   $stmt->execute();
   $tasksSize = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
                <strong>Success!</strong> ticket created successfully.
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
                  <h3 class="card-title"><strong>OPEN A TICKET</strong></h3>
                  <hr>
                  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="inputEmail4">Task Title</label>
                        <input type="text" name="title" class="form-control" id="inputEmail4" required>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="inputEmail4">Task Description</label>
                        <textarea id="inputEmail4" name="description" class="form-control" rows="5"></textarea>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Requested by</label> <small>-Enter Email Address-</small>
                        <input type="email" name="requestBy" class="form-control" id="inputPassword4" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputAddress">Request Date</label>
                        <input type="date" name="requestDate" class="form-control" id="inputAddress">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputAddress2">Task Deadline</label>
                        <input type="date" name="deadline" class="form-control" id="inputAddress2">
                      </div>
                    </div>


                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputState">Task Size</label>
                        <select name="taskSize" id="inputState" class="form-control" required>
                          <option selected>......</option>
                          <?php foreach ($tasksSize as $t) { ?>
                            <option value="<?php echo $t['tasksSizeId'] ?>"><?php echo $t['tasksSizeName']; ?></option>
                          <?php } ?>


                        </select>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="inputState">Assigned To</label>
                        <select name="assignedTo" id="inputState" class="form-control" required>
                          <option selected>......</option>

                          <?php foreach ($userData as $users) { ?>
                            <option value="<?php echo $users['userId']; ?>"><?php echo $users['userName']; ?></option>
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
                        <label for="comment">Comment</label>
                        <textarea id="comment" name="comment" class="form-control" rows="5"></textarea>
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
