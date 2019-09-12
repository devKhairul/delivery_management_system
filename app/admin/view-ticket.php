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
  $stmt = $db->prepare("SELECT * FROM orders WHERE orderId = :orderId");
  $stmt->execute(array(":orderId" => $rowId));

  $output .= '
      <div class="row">
           <div class="col-lg-12">';
      while($row = $stmt->fetch(PDO::FETCH_ASSOC))
      {
        $stmt = $db->prepare("SELECT statusId, statusName FROM status WHERE statusId = :orderId");
        $stmt->execute(array(":orderId"=>$row['status']));
        $tStatus = $stmt->fetch(PDO::FETCH_ASSOC);

           $output .= '
           <form method="POST" action="my-tickets.php">
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="ticketDescription" readonly>'.$row['remarks'].'</textarea>
              </div>
              <div class="form-group">
                <label>Requested By</label>
                <input type="text" name="ticketRequestedBy" class="form-control" value="'.$row['ticketRequestedBy'].'" readonly>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select name="ticketStatus" class="form-control" readonly>
                  <option value="'.$tStatus['statusId'].'" selected>'.$tStatus['statusName'].'</option>

                </select>
              </div>
              <input type="hidden" name="ticketId" value="'.$row['orderId'].'">

                <button type="submit" name="edit" class="btn btn-primary">Update</button>
            </form>';
        }
        $output .= "</div></div>";
        echo $output;


}

?>
