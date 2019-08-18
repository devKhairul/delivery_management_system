<?php
error_reporting(0);
require_once('config/database.php');
require_once('objects/Ticket.php');

// Initiate database connection
$database = new DB();
$db = $database->getConnection();

$rowId = $_POST['rowId'];
//$editId = $_POST['editId'];


if (isset($_POST['rowId']))
{
  $stmt = $db->prepare("SELECT * FROM tickets WHERE ticketId = :rowId");
  $stmt->execute(array(":rowId" => $rowId));

  // $output .= '
  //     <div class="table-responsive">
  //          <table class="table table-bordered">';
  //     while($row = $stmt->fetch(PDO::FETCH_ASSOC))
  //     {
  //       $stmt = $db->prepare("SELECT statusName FROM status WHERE statusId = :ticketId");
  //       $stmt->execute(array(":ticketId"=>$row['ticketStatus']));
  //       $tStatus = $stmt->fetch(PDO::FETCH_ASSOC);
  //
  //          $output .= '
  //               <tr>
  //                    <td width="30%"><label><strong>Ticket Number</strong></label></td>
  //                    <td width="70%">'.$row["ticketNumber"].'</td>
  //               </tr>
  //               <tr>
  //                    <td width="30%"><label><strong>Ticket Description</strong></label></td>
  //                    <td width="70%">'.$row["ticketDescription"].'</td>
  //               </tr>
  //               <tr>
  //                    <td width="30%"><label><strong>Ticket Requested By</strong></label></td>
  //                    <td width="70%">'.$row["ticketRequestedBy"].'</td>
  //               </tr>
  //               <tr>
  //                    <td width="30%"><label><strong>Ticket Deadline</strong></label></td>
  //                    <td width="70%">'.$row["ticketDeadline"].'</td>
  //               </tr>
  //               <tr>
  //                    <td width="30%"><label><strong>Ticket Status</strong></label></td>
  //                    <td width="70%">'.$tStatus["statusName"].'</td>
  //               </tr>
  //               ';
  //       }
  //       $output .= "</table></div>";
  //       echo $output;


  $output .= '
      <div class="row">
           <div class="col-lg-12">';
      while($row = $stmt->fetch(PDO::FETCH_ASSOC))
      {
        $stmt = $db->prepare("SELECT statusId, statusName FROM status WHERE statusId = :ticketId");
        $stmt->execute(array(":ticketId"=>$row['ticketStatus']));
        $tStatus = $stmt->fetch(PDO::FETCH_ASSOC);

           $output .= '
           <form method="POST" action="my-tickets.php">
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="ticketDescription" readonly>'.$row['ticketDescription'].'</textarea>
              </div>
              <div class="form-group">
                <label>Requested By</label>
                <input type="text" name="ticketRequestedBy" class="form-control" value="'.$row['ticketRequestedBy'].'" readonly>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select name="ticketStatus" class="form-control" readonly>
                  <option value="'.$tStatus['statusId'].'" selected>'.$tStatus['statusName'].'</option>
                  <option value="1">Not Started</option>
                  <option value="2">In Progress</option>
                  <option value="3">Complete</option>
                  <option value="4">Delayed</option>
                  <option value="5">Blocked</option>
                </select>
              </div>
              <input type="hidden" name="ticketId" value="'.$row['ticketId'].'">

                <button type="submit" name="edit" class="btn btn-primary d-none">Update</button>
            </form>';
        }
        $output .= "</div></div>";
        echo $output;


}

?>
