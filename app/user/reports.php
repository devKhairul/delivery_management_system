<?php
ob_start();
error_reporting(0);
require('header.php');
require_once('config/database.php');
require_once('objects/Ticket.php');

$userId = $_SESSION['userId'];
$userDept = $_SESSION['userDept'];
$userType = $_SESSION['userType'];

// Initiate database connection
$database = new DB();
$db = $database->getConnection();

/**
 * Get status list
 */
 $status = $db->query("SELECT * FROM status ORDER BY statusId DESC")->fetchAll();

/**
 * Get full user list
 */
 $users = $db->query("SELECT * FROM users WHERE userId = $userId")->fetchAll();


/**
 * Generate reports
 *
 */
 if (isset($_POST['loadData']))
 {
   $tStatus = $_POST['tStatus'];
   $user = $_POST['user'];
   $fromDate = $_POST['from_date'];
   $toDate = $_POST['to_date'];

   if (!empty($user))
   {
     $username = $db->query("SELECT userName FROM users WHERE userId = '$user'")->fetchColumn();
   }

    if (empty($fromDate) AND empty($toDate))
    {
      if ($tStatus == '*' AND $user == '*')
      {
        $allTickets = $db->query("SELECT count(*) FROM tickets WHERE ticketAssignedTo = $userId")->fetchColumn();
        $allComplete = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '3' AND ticketAssignedTo=$userId")->fetchColumn();
        $allInProgress = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '2' AND ticketAssignedTo=$userId")->fetchColumn();
        $allNotStarted = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '1' AND ticketAssignedTo=$userId")->fetchColumn();
        $allDelayed = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '4' AND ticketAssignedTo=$userId")->fetchColumn();
        $allBlocked = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '5' AND ticketAssignedTo=$userId")->fetchColumn();
        $allArray = $db->query("SELECT * FROM tickets WHERE ticketAssignedTo = $userId")->fetchAll();
      }

      elseif ($tStatus == '*' AND $user != '*')
      {
        $allTickets = $db->query("SELECT count(*) FROM tickets WHERE ticketAssignedTo = $user")->fetchColumn();
        $allComplete = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '3' AND ticketAssignedTo = $user")->fetchColumn();
        $allInProgress = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '2' AND ticketAssignedTo = $user")->fetchColumn();
        $allNotStarted = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '1' AND ticketAssignedTo = $user")->fetchColumn();
        $allDelayed = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '4' AND ticketAssignedTo = $user")->fetchColumn();
        $allBlocked = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '5' AND ticketAssignedTo = $user")->fetchColumn();
        $allArray = $db->query("SELECT * FROM tickets WHERE ticketAssignedTo = $user")->fetchAll();
      }
    } elseif (!empty($fromDate) AND !empty($toDate))
    {
      if ($tStatus == '*' AND $user == '*')
      {
        $allTickets = $db->query("SELECT count(*) FROM tickets WHERE ticketCreatedAt BETWEEN '$fromDate' AND '$toDate'")->fetchColumn();
        $allComplete = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '3' AND ticketCreatedAt BETWEEN '$fromDate' AND '$toDate'")->fetchColumn();
        $allInProgress = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '2' AND ticketCreatedAt BETWEEN '$fromDate' AND '$toDate'")->fetchColumn();
        $allNotStarted = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '1' AND ticketCreatedAt BETWEEN '$fromDate' AND '$toDate'")->fetchColumn();
        $allDelayed = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '4' AND ticketCreatedAt BETWEEN '$fromDate' AND '$toDate'")->fetchColumn();
        $allBlocked = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '5' AND ticketCreatedAt BETWEEN '$fromDate' AND '$toDate'")->fetchColumn();
        $allArray = $db->query("SELECT * FROM tickets WHERE ticketCreatedAt BETWEEN '$fromDate' AND '$toDate'")->fetchAll();
      }
      elseif ($tStatus == '*' AND $user != '*')
      {
        $allTickets = $db->query("SELECT count(*) FROM tickets WHERE ticketAssignedTo = $user AND ticketCreatedAt BETWEEN '$fromDate' AND '$toDate'")->fetchColumn();
        $allComplete = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '3' AND ticketAssignedTo = $user AND ticketCreatedAt BETWEEN '$fromDate' AND '$toDate'")->fetchColumn();
        $allInProgress = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '2' AND ticketAssignedTo = $user AND ticketCreatedAt BETWEEN '$fromDate' AND '$toDate'")->fetchColumn();
        $allNotStarted = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '1' AND ticketAssignedTo = $user AND ticketCreatedAt BETWEEN '$fromDate' AND '$toDate'")->fetchColumn();
        $allDelayed = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '4' AND ticketAssignedTo = $user AND ticketCreatedAt BETWEEN '$fromDate' AND '$toDate'")->fetchColumn();
        $allBlocked = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '5' AND ticketAssignedTo = $user AND ticketCreatedAt BETWEEN '$fromDate' AND '$toDate'")->fetchColumn();
        $allArray = $db->query("SELECT * FROM tickets WHERE ticketAssignedTo = $user AND ticketCreatedAt BETWEEN '$fromDate' AND '$toDate'")->fetchAll();
      }
    }

 }


?>

<style media="screen">
  .form-control {
    font-size: 12px !important;
  }
</style>



<div class="content">
    <div class="animated fadeIn">
        <div class="row">
          <div class="col-md-12">
              <h1><strong>Generate Reports</strong> </h1>
          </div>
        </div>

        <hr>

        <div class="row">
          <div class="col-md-12">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="form-row">
                <div class="col-md-3">
                  <label><strong>Ticket Status</strong></label>
                  <select name="tStatus" class="form-control" required>
                    <option value="*">All</option>

                  </select>
                </div>

                <div class="col-md-3">
                  <label><strong>Users</strong></label>
                  <select name="user" class="form-control" required>
                    <option value="*">All</option>

                    <?php foreach ($users as $user) { ?>
                      <option value="<?php echo $user['userId']; ?>"><?php echo $user['userName']; ?></option>
                    <?php } ?>

                  </select>
                </div>

                <div class="col-md-3">
                  <label><strong>From</strong></label>
                  <input type="date" class="form-control" name="from_date">
                </div>

                <div class="col-md-3">
                  <label><strong>To</strong></label>
                  <input type="date" class="form-control" name="to_date">
                </div>
              </div>
            </div>
          </div>

          &nbsp;

          <div class="row col-md-12">
            <button type="submit" name="loadData" class="btn btn-primary">Load</button>
          </div>
        </form>

        <hr>

        <!-- dashboard assigned tickets  -->

        <div class="row">
          <div class="col-md-12">
            <h3><u>REPORT OF</u> <small style="color:blue;"><?php echo strtoupper($username); ?></small></h3>
          </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-box2"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span><?php echo $allTickets; ?></span></div>
                                    <div class="stat-heading">Total</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-anchor"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span><?php echo $allComplete; ?></span></div>
                                    <div class="stat-heading">Complete</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="pe-7s-alarm"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span><?php echo $allInProgress; ?></span></div>
                                    <div class="stat-heading">In-progress</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- row 2 -->
        <div class="row">
          <div class="col-lg-4 col-md-4">
              <div class="card">
                  <div class="card-body">
                      <div class="stat-widget-five">
                          <div class="stat-icon dib flat-color-4">
                              <i class="pe-7s-help1"></i>
                          </div>
                          <div class="stat-content">
                              <div class="text-left dib">
                                  <div class="stat-text"><span><?php echo $allNotStarted; ?></span></div>
                                  <div class="stat-heading">Not Started</div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-lg-4 col-md-4">
              <div class="card">
                  <div class="card-body">
                      <div class="stat-widget-five">
                          <div class="stat-icon dib flat-color-4">
                              <i class="pe-7s-refresh"></i>
                          </div>
                          <div class="stat-content">
                              <div class="text-left dib">
                                  <div class="stat-text"><span><?php echo $allDelayed; ?></span></div>
                                  <div class="stat-heading">Delayed Tickets</div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-lg-4 col-md-4">
              <div class="card">
                  <div class="card-body">
                      <div class="stat-widget-five">
                          <div class="stat-icon dib flat-color-4">
                              <i class="pe-7s-attention"></i>
                          </div>
                          <div class="stat-content">
                              <div class="text-left dib">
                                  <div class="stat-text"><span><?php echo $allBlocked; ?></span></div>
                                  <div class="stat-heading">Blocked Tickets</div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>

        <!-- row 2 end section -->


        <hr>

        <div class="row">
          <div class="col-md-12">
              <div class="card">

                  <div class="card-body">
                      <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <th>Sl. </th>
                                  <th>T. Number</th>
                                  <th>Description</th>
                                  <th>Requested By</th>
                                  <th>Request Date</th>
                                  <th>Deadline</th>
                                  <th>Size</th>
                                  <th>Assigned To</th>
                                  <th>Status</th>
                                  <!-- <th>Action</th> -->
                              </tr>
                          </thead>
                          <tbody>

                            <?php $sl=0; foreach ($allArray as $ticket) {

                              /**
                               * Get name of status
                               */
                              $stmt = $db->prepare("SELECT * FROM status WHERE statusId = :status");
                              $stmt->execute(array(":status" => $ticket['ticketStatus']));
                              $tStatus = $stmt->fetchAll(PDO::FETCH_ASSOC);


                              /**
                               * Get name of task size
                               */
                              $stmt = $db->prepare("SELECT * FROM tasks_size WHERE tasksSizeId = :ticketSize");
                              $stmt->execute(array(":ticketSize" => $ticket['ticketSize']));
                              $tSize = $stmt->fetchAll(PDO::FETCH_ASSOC);

                              /**
                               * Get name of assigned user
                               */
                              $stmt = $db->prepare("SELECT * FROM users WHERE userId = :userId");
                              $stmt->execute(array(":userId" => $ticket['userId']));
                              $tAssign = $stmt->fetchAll(PDO::FETCH_ASSOC);


                              ?>
                              <tr>
                                  <td><?php echo ++$sl; ?></td>
                                  <td><?php echo $ticket['ticketNumber']; ?></td>
                                  <td><?php echo $ticket['ticketDescription']; ?></td>
                                  <td><?php echo $ticket['ticketRequestedBy']; ?></td>
                                  <td><?php echo $ticket['ticketReqDate']; ?></td>
                                  <td><?php echo $ticket['ticketDeadline']; ?></td>

                                  <td><?php foreach ($tSize as $t) {
                                    echo $t['tasksSizeName'];
                                  } ?></td>

                                  <td><?php foreach ($tAssign as $name) {
                                    echo $name['userName'];
                                  } ?></td>

                                  <td><?php foreach ($tStatus as $s) {
                                    echo $s['statusName'];
                                  } ?></td>
                                  <!-- <td>

                                    <input type="button" name="view" value="Edit" id="<?php //echo $ticket['ticketId']; ?>" class="btn btn-sm btn-warning view_data"></input>

                                  </td> -->
                              </tr>
                            <?php } ?>


                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>



<div class="clearfix"></div>



<?php require('footer.php'); ob_end_flush(); ?>
