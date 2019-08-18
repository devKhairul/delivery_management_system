<?php
ob_start();
error_reporting(E_ALL);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

require('header.php');
require_once('config/database.php');
require_once('objects/Ticket.php');


$userName = $_SESSION['userName'];
$userId = $_SESSION['userId'];
$userDept = $_SESSION['userDept'];
$userType = $_SESSION['userType'];

// Initiate database connection
$database = new DB();
$db = $database->getConnection();

// Ticket object instance
$ticket = new Ticket($db);

$data = $ticket->showAll($userId);


/**
 * Edit Ticket
 * @author Khairul Alam
 *
 */

if (isset($_POST['edit']))
{
  $ticketId = $_POST['ticketId'];
  $ticketStatus = $_POST['ticketStatus'];
  $email = $_POST['ticketRequestedBy'];

  if ($ticket->edit($ticketId, $ticketStatus))
  {
    $success = 'true';
    header("location: http://182.163.98.68/app/user/tickets-list.php?msg=$success", true);

    if ($ticketStatus == 3)
    {
      $mail = new PHPMailer(true);

      try {
          //Server settings
          $mail->SMTPDebug = 2;                                       // Enable verbose debug output
          $mail->isSMTP();                                            // Set mailer to use SMTP
          $mail->Host       = "ssl://smtp.gmail.com";   // Specify main and backup SMTP servers
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = 'sajida.ticketapp@gmail.com';                     // SMTP username
          $mail->Password   = 'SajidaDev2019';                               // SMTP password
          $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
          $mail->Port       = 465;                                    // TCP port to connect to


          //Recipients
          $mail->setFrom('sajida.ticketapp@gmail.com', 'Support Ticket Confirmation - Sajida Foundation');
          $mail->addAddress($email);     // Add a recipient

          // Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'IT Support Ticket';
          // $mail->Body    = "<html>'$userName' has completed your support request. Have you received what you asked for? Please confirm by clicking on Yes or No. <br><a href='http://182.163.98.68/confirmation.php?tid=$ticketId&uid=$userId&r=yes'>Yes</a><br><a href='http://182.163.98.68/confirmation.php?tid=$ticketId&uid=$userId&r=no'>No</a></html>";

          $mail->Body = '

          <!doctype html>
          <html>
            <head>
              <meta name="viewport" content="width=device-width">
              <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
              <title>Simple Transactional Email</title>
              <style>
              /* -------------------------------------
                  INLINED WITH htmlemail.io/inline
              ------------------------------------- */
              /* -------------------------------------
                  RESPONSIVE AND MOBILE FRIENDLY STYLES
              ------------------------------------- */
              @media only screen and (max-width: 620px) {
                table[class=body] h1 {
                  font-size: 28px !important;
                  margin-bottom: 10px !important;
                }
                table[class=body] p,
                      table[class=body] ul,
                      table[class=body] ol,
                      table[class=body] td,
                      table[class=body] span,
                      table[class=body] a {
                  font-size: 16px !important;
                }
                table[class=body] .wrapper,
                      table[class=body] .article {
                  padding: 10px !important;
                }
                table[class=body] .content {
                  padding: 0 !important;
                }
                table[class=body] .container {
                  padding: 0 !important;
                  width: 100% !important;
                }
                table[class=body] .main {
                  border-left-width: 0 !important;
                  border-radius: 0 !important;
                  border-right-width: 0 !important;
                }
                table[class=body] .btn table {
                  width: 100% !important;
                }
                table[class=body] .btn a {
                  width: 100% !important;
                }
                table[class=body] .img-responsive {
                  height: auto !important;
                  max-width: 100% !important;
                  width: auto !important;
                }
              }

              /* -------------------------------------
                  PRESERVE THESE STYLES IN THE HEAD
              ------------------------------------- */
              @media all {
                .ExternalClass {
                  width: 100%;
                }
                .ExternalClass,
                      .ExternalClass p,
                      .ExternalClass span,
                      .ExternalClass font,
                      .ExternalClass td,
                      .ExternalClass div {
                  line-height: 100%;
                }
                .apple-link a {
                  color: inherit !important;
                  font-family: inherit !important;
                  font-size: inherit !important;
                  font-weight: inherit !important;
                  line-height: inherit !important;
                  text-decoration: none !important;
                }
                #MessageViewBody a {
                  color: inherit;
                  text-decoration: none;
                  font-size: inherit;
                  font-family: inherit;
                  font-weight: inherit;
                  line-height: inherit;
                }
                .btn-primary table td:hover {
                  background-color: #34495e !important;
                }
                .btn-primary a:hover {
                  background-color: #34495e !important;
                  border-color: #34495e !important;
                }
              }
              </style>
            </head>
            <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
              <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
                <tr>
                  <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
                  <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
                    <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

                      <!-- START CENTERED WHITE CONTAINER -->

                      <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

                        <!-- START MAIN CONTENT AREA -->
                        <tr>
                          <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                              <tr>
                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                                  <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hi there,</p>
                                  <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Your IT support ticket has been marked as "Complete" by <b>'.$userName.'</b>. Your feedback is important for us to help improve our delivery of service. Please click on "Yes" if you have received what you asked for. Please click on "No" otherwise.</p>
                                  <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
                                    <tbody>
                                      <tr>
                                        <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                                          <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                            <tbody>
                                              <tr>
                                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #3498db; border-radius: 5px; text-align: center;"> <a href="http://182.163.98.68/confirmation.php?tid='.$ticketId.'&uid='.$userId.'&r=yes" target="_blank" style="display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;">Yes</a> </td>

                                                <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #3498db; border-radius: 5px; text-align: center;"> <a href="http://182.163.98.68/confirmation.php?tid='.$ticketId.'&uid='.$userId.'&r=no" target="_blank" style="display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;">No</a> </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>

                      <!-- END MAIN CONTENT AREA -->
                      </table>

                      <!-- START FOOTER -->
                      <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                          <tr>
                            <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                              <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Sajida Foundation</span>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <!-- END FOOTER -->

                    <!-- END CENTERED WHITE CONTAINER -->
                    </div>
                  </td>
                  <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
                </tr>
              </table>
            </body>
          </html>

          ';

          $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

          $mail->send();
          echo 'Message has been sent';
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
    }
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
                                  <th>Description</th>
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

        &nbsp;
        <hr>
        &nbsp;


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
