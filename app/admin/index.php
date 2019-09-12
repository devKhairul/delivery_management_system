<?php

  require('header.php');

  $userId = $_SESSION['userId'];
  $userType = $_SESSION['userType'];


  if ($userType == 'MGM' || 'OPSM')
  {
    /**
    * Fetch total orders
    */
    $totalTicket = $db->query("SELECT count(*) FROM orders")->fetchColumn();

    /**
    * Fetch total complete orders
    */
    $completeorders = $db->query("SELECT count(*) FROM orders WHERE status = '3'")->fetchColumn();

    /**
    * Fetch total in progress orders
    */
    $pendingorders = $db->query("SELECT count(*) FROM orders WHERE status = '2'")->fetchColumn();

    /**
    * Fetch total not-started orders
    */
    $waitingorders = $db->query("SELECT count(*) FROM orders WHERE status = '1'")->fetchColumn();


    /**
    * Fetch delayed orders
    */
    $delayedorders = $db->query("SELECT count(*) FROM orders WHERE status = '4'")->fetchColumn();


    /**
    * Fetch blocked orders
    */
    $blockedorders = $db->query("SELECT count(*) FROM orders WHERE status = '5'")->fetchColumn();


  } elseif ($userType == 'Supervisor') {
    /**
    * Fetch total orders
    */
    $totalTicket = $db->query("SELECT count(*) FROM orders WHERE userId = $userId AND ticketAssignedTo != $userId")->fetchColumn();

    /**
    * Fetch total complete orders
    */
    $completeorders = $db->query("SELECT count(*) FROM orders WHERE status = '3' AND userId = $userId AND ticketAssignedTo != $userId")->fetchColumn();

    /**
    * Fetch total in progress orders
    */
    $pendingorders = $db->query("SELECT count(*) FROM orders WHERE status = '2' AND userId = $userId AND ticketAssignedTo != $userId")->fetchColumn();

    /**
    * Fetch total not-started orders
    */
    $waitingorders = $db->query("SELECT count(*) FROM orders WHERE status = '1' AND userId = $userId AND ticketAssignedTo != $userId")->fetchColumn();


    /**
    * Fetch delayed orders
    */
    $delayedorders = $db->query("SELECT count(*) FROM orders WHERE status = '4' AND userId = $userId AND ticketAssignedTo != $userId")->fetchColumn();

    /**
    * Fetch blocked orders
    */
    $blockedorders = $db->query("SELECT count(*) FROM orders WHERE status = '5' AND userId = $userId AND ticketAssignedTo != $userId")->fetchColumn();

  }




?>


<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
          <div class="row">
            <div class="col-md-12">
              <h3><u>Hi</u> <strong><?php echo $_SESSION['userName']; ?></strong></h3>
            </div>
          </div>

          &nbsp;
          &nbsp;
          &nbsp;

          <?php



          ?>


          <!-- dashboard assigned orders  -->
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
                                      <div class="stat-text"><span><?php echo $totalTicket; ?></span></div>
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
                                      <div class="stat-text"><span><?php echo $completeorders; ?></span></div>
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
                                      <div class="stat-text"><span><?php echo $pendingorders; ?></span></div>
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
                                    <div class="stat-text"><span><?php echo $waitingorders; ?></span></div>
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
                                    <div class="stat-text"><span><?php echo $delayedorders; ?></span></div>
                                    <div class="stat-heading">Delayed orders</div>
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
                                    <div class="stat-text"><span><?php echo $blockedorders; ?></span></div>
                                    <div class="stat-heading">Blocked orders</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>

          <!-- row 2 end section -->
          <!-- /Widgets -->

          <!-- Delayed orders -->

          <?php /*

          <div class="orders">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="card">
                          <div class="card-body">
                              <h4 class="box-title">Delayed orders </h4>
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

                                      $s=0; foreach($delayedorders as $dt) {

                                      $stmt = $db->prepare("SELECT userName FROM users WHERE userId = :ticketAssignedTo");
                                      $stmt->execute(array("ticketAssignedTo" => $dt['ticketAssignedTo']));

                                      $ticketAssignedName = $stmt->fetchAll(PDO::FETCH_ASSOC);


                                      $stmt = $db->prepare("SELECT statusName FROM status WHERE statusId = :status");
                                      $stmt->execute(array("status" => $dt['status']));
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
          <!-- /.Delayed orders -->
          */

          ?>

        <div class="clearfix"></div>

<?php require('footer.php'); ?>
