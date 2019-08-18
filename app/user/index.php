
<?php

  require('header.php');

  $userId = $_SESSION['userId'];
  $userType = $_SESSION['userType'];

  /**
  * Fetch total tickets
  */
  $totalTicket = $db->query("SELECT count(*) FROM tickets WHERE ticketAssignedTo = $userId")->fetchColumn();

  /**
  * Fetch total complete tickets
  */
  $completeTickets = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '3' AND ticketAssignedTo = $userId")->fetchColumn();

  /**
  * Fetch total in progress tickets
  */
  $pendingTickets = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '2' AND ticketAssignedTo = $userId")->fetchColumn();

  /**
  * Fetch total not-started tickets
  */
  $waitingTickets = $db->query("SELECT count(*) FROM tickets WHERE ticketStatus = '1' AND ticketAssignedTo = $userId")->fetchColumn();


  /**
  * Fetch delayed tickets
  */
  $delayedTickets = $db->query("SELECT * FROM tickets WHERE ticketStatus = '4' AND ticketAssignedTo = $userId")->fetchAll();
?>

<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-box2"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span><?php echo $totalTicket; ?></span></div>
                                    <div class="stat-heading">Total</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-anchor"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span><?php echo $completeTickets; ?></span></div>
                                    <div class="stat-heading">Complete</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="pe-7s-alarm"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span><?php echo $pendingTickets; ?></span></div>
                                    <div class="stat-heading">In-progress</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="pe-7s-help1"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span><?php echo $waitingTickets; ?></span></div>
                                    <div class="stat-heading">Not Started</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Widgets -->

        <div class="clearfix"></div>

        <!-- Delayed Tickets -->
        <div class="orders">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Delayed Tickets </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th>Ticket Number</th>
                                            <th>Requested By</th>
                                            <th>Assigned To</th>
                                            <th>Request Date</th>
                                            <th>Deadline</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                    $s=0; foreach($delayedTickets as $dt) {

                                    $stmt = $db->prepare("SELECT userName FROM users WHERE userId = :ticketAssignedTo");
                                    $stmt->execute(array("ticketAssignedTo" => $dt['ticketAssignedTo']));

                                    $ticketAssignedName = $stmt->fetchAll(PDO::FETCH_ASSOC);


                                    $stmt = $db->prepare("SELECT statusName FROM status WHERE statusId = :ticketStatus");
                                    $stmt->execute(array("ticketStatus" => $dt['ticketStatus']));
                                    $tStatus = $stmt->fetchAll(PDO::FETCH_ASSOC);


                                    ?>

                                        <tr class=" pb-0">
                                            <td class="serial"><?php echo ++$s; ?></td>

                                            <td><?php echo $dt['ticketNumber']; ?></td>

                                            <td><?php echo $dt['ticketRequestedBy']; ?></td>

                                            <?php foreach ($ticketAssignedName as $tAssignName) { ?>
                                              <td>  <span class="name"><?php echo $tAssignName['userName']; ?></span> </td>

                                            <?php } ?>


                                            <td> <span class="product"><?php echo $dt['ticketReqDate']; ?></span> </td>

                                            <td><span><?php echo $dt['ticketDeadline']; ?></span></td>


                                            <?php foreach ($tStatus as $ts) { ?>
                                              <td>
                                                  <span class="badge badge-pending"><?php echo $ts['statusName']; ?></span>
                                              </td>
                                            <?php } ?>

                                        </tr>

                                    <?php } ?>

                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div> <!-- /.card -->
                </div>  <!-- /.col-lg-8 -->

            </div>
        </div>
        <!-- /.Delayed Tickets -->


<?php require('footer.php'); ?>
