<?php
ob_start();
error_reporting(E_ALL);
require('header.php');
require_once('config/database.php');
require_once('objects/Ticket.php');

$userId = $_SESSION['userId'];
$userDept = $_SESSION['userDept'];
$userType = $_SESSION['userType'];

// Initiate database connection
$database = new DB();
$db = $database->getConnection();

// Ticket object instance
$ticket = new Ticket($db);

$stmt = $db->prepare("SELECT * FROM tickets WHERE ticketAssignedTo = :userId AND ticketStatus != 3");
$stmt->execute(array("userId" => $userId));
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);


/**
 * Edit Ticket
 * @author Khairul Alam
 *
 */

if (isset($_POST['edit']))
{
  $ticketId = $_POST['ticketId'];
  $ticketStatus = $_POST['ticketStatus'];

  if ($ticket->edit($ticketId, $ticketStatus))
  {
    $success = 'true';
    header("location: http://192.168.0.232/app/admin/my-tickets.php?msg=$success", true);

  } else {
    $failed = 'true';
  }
}

?>





<div class="content">
    <div class="animated fadeIn">
        <div class="row">
          <div class="col-md-12">
              <h1><strong>OPEN TICKETS</strong> </h1>
          </div>
        </div>
        <hr>

        <div class="row">
          <div class="col-md-12">
            <?php if (isset($_GET['msg']) && $_GET['msg'] == 'true') { ?>
              <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> ticket updated successfully.
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
          <div class="col-md-12">
              <div class="card">

                  <div class="card-body">
                      <table id="bootstrap-data-table" class="display table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <th>Sl. </th>
                                  <th>T. Number</th>
                                  <th>Requested By</th>
                                  <th>Request Date</th>
                                  <th>Deadline</th>
                                  <th>Size</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>

                            <?php $sl=0; foreach ($data as $ticket) {

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
                              $stmt = $db->prepare("SELECT * FROM users WHERE userId = :assignedTo");
                              $stmt->execute(array(":assignedTo" => $ticket['ticketAssignedTo']));
                              $tAssign = $stmt->fetchAll(PDO::FETCH_ASSOC);


                              ?>
                              <tr>
                                  <td><?php echo ++$sl; ?></td>
                                  <td><?php echo $ticket['ticketNumber']; ?></td>
                                  <td><?php echo $ticket['ticketRequestedBy']; ?></td>
                                  <td><?php echo $ticket['ticketReqDate']; ?></td>
                                  <td><?php echo $ticket['ticketDeadline']; ?></td>

                                  <td><?php foreach ($tSize as $t) {
                                    echo $t['tasksSizeName'];
                                  } ?></td>



                                  <td><?php foreach ($tStatus as $s) {
                                    echo $s['statusName'];
                                  } ?></td>
                                  <td>

                                    <input type="button" name="view" value="Edit" id="<?php echo $ticket['ticketId']; ?>" class="btn btn-sm btn-warning view_data"></input>

                                  </td>
                              </tr>
                            <?php } ?>


                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
        </div>

        <hr>

        <!--  complete tickets list -->

        <div class="row">
          <div class="col-md-12">
              <h1><strong>COMPLETE TICKETS</strong> </h1>
          </div>
        </div>
        <hr>

        <div class="row">
          <div class="col-md-12">
              <div class="card">

                  <div class="card-body">
                      <table id="bootstrap-data-table" class="display table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <th>Sl. </th>
                                  <th>T. Number</th>
                                  <th>Requested By</th>
                                  <th>Request Date</th>
                                  <th>Deadline</th>
                                  <th>Size</th>
                                  <th>Status</th>
                              </tr>
                          </thead>
                          <tbody>

                            <?php

                              $sl=0;

                              $sql = $db->prepare("SELECT * FROM tickets WHERE ticketAssignedTo = :userId AND ticketStatus = :ticketStatus");
                              $sql->execute(array(":userId" => $userId, ":ticketStatus" => '3'));
                              $tickets = $sql->fetchAll(PDO::FETCH_ASSOC);

                              foreach ($tickets as $ticket) {

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


                              ?>
                              <tr>
                                  <td><?php echo ++$sl; ?></td>
                                  <td><?php echo $ticket['ticketNumber']; ?></td>
                                  <td><?php echo $ticket['ticketRequestedBy']; ?></td>
                                  <td><?php echo $ticket['ticketReqDate']; ?></td>
                                  <td><?php echo $ticket['ticketDeadline']; ?></td>

                                  <td><?php foreach ($tSize as $t) {
                                    echo $t['tasksSizeName'];
                                  } ?></td>

                                  <td><?php foreach ($tStatus as $s) {
                                    echo $s['statusName'];
                                  } ?></td>

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

<!-- Bootstrap Modal View Ticket -->

<div id="singleTicket" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h4>Ticket Details</h4> </h5>
      </div>
      <div class="modal-body" id="ticket_detail">

      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>


<?php require('footer.php'); ob_end_flush(); ?>


<script type="text/javascript">
$(document).ready(function() {
  $('table.display').DataTable();
} );
</script>


<script>
  $(document).ready(function(){
      $('.view_data').click(function(){
           var rowId = $(this).attr("id");
           $.ajax({
                url:"view-ticket.php",
                method:"post",
                data:{rowId:rowId},
                success:function(data){
                     $('#ticket_detail').html(data);
                     $('#singleTicket').modal('show');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  $('#output').html('Bummer: there was an error!  Check the console for details.');
                  console.log(xhr.statusText);
                  console.log(textStatus);
                  console.log(error);
                }
           });
      });
  });



</script>
