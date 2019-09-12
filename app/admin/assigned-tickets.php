<?php
ob_start();
error_reporting(E_ALL);
require('header.php');
require_once('config/database.php');
require_once('objects/Ticket.php');

$userId = $_SESSION['userId'];
$userType = $_SESSION['userType'];

// Initiate database connection
$database = new DB();
$db = $database->getConnection();

// Ticket object instance
$order = new Ticket($db);

$data = $order->showAll();


/**
 * Edit Ticket
 * @author Khairul Alam
 *
 */

if (isset($_POST['edit']))
{
  $orderId = $_POST['ticketId'];
  $orderStatus = $_POST['ticketStatus'];

  if ($order->edit($orderId, $orderStatus))
  {
    $success = 'true';
    header("location: http://192.168.0.232/app/user/tickets-list.php?msg=$success", true);

  } else {
    $failed = 'true';
  }
}

?>





<div class="content">
    <div class="animated fadeIn">
        <div class="row">
          <div class="col-md-12">
              <h1><strong>Orders</strong> </h1>
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
                      <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <th>Sl. </th>
                                  <th>Order Number</th>
                                  <th>Client Name</th>
                                  <th>Address</th>
                                  <th>Phone Number</th>
                                  <th>Test Name</th>
                                  <th>Lab Name</th>
                                  <th>Collection Date</th>
                                  <th>Status</th>
                                  <th>Remarks</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>

                            <?php $sl=0; foreach ($data as $order) {

                              /**
                               * Get name of status
                               */
                              $stmt = $db->prepare("SELECT * FROM status WHERE statusId = :status");
                              $stmt->execute(array(":status" => $order['status']));
                              $orderStatus = $stmt->fetchAll(PDO::FETCH_ASSOC);


                              /**
                               * Get name of task size
                               */
                              $stmt = $db->prepare("SELECT * FROM labs WHERE labId = :labId");
                              $stmt->execute(array(":labId" => $order['labName']));
                              $labName = $stmt->fetchAll(PDO::FETCH_ASSOC);

                              ?>
                              <tr>
                                  <td><?php echo ++$sl; ?></td>
                                  <td><?php echo $order['orderNumber']; ?></td>
                                  <td><?php echo $order['clientName']; ?></td>
                                  <td><?php echo $order['address']; ?></td>
                                  <td><?php echo $order['phoneNumber']; ?></td>
                                  <td><?php echo $order['testName']; ?></td>

                                  <td><?php foreach ($labName as $t) {
                                    echo $t['labName'];
                                  } ?></td>

                                  <td><?php echo $order['collectionDate']; ?></td>

                                  <td><?php foreach ($orderStatus as $s) {
                                    echo $s['statusName'];
                                  } ?></td>

                                  <td><?php echo $order['remarks']; ?></td>


                                  <td>
                                    <input type="button" name="view" value="Details" id="<?php echo $order['orderId']; ?>" class="btn btn-sm btn-info view_data"></input>
                                  </td>
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
        <h5 class="modal-title" id="exampleModalLabel"><h4>Order Details</h4> </h5>
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
