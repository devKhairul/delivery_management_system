<?php


class Ticket
{

  public $conn;


/**
 * Initiate DB connection
 * @author Khairul Alam - khairul@sajida.org
 * @method __construct
 * @param  [type]      $db [description]
 */

  public function __construct($db)
  {
    $this->conn = $db;
  }

/**
 * Create new ticket
 * @method create
 */

 public function create($userId,$userDept,$title,$description,$requestBy,$requestDate,$deadline,$taskSize,$assigned,$status,$ticketNo)
 {

     try
     {
       $stmt = $this->conn->prepare("INSERT INTO tickets (ticketNumber, userId, userDept, ticketDescription, ticketRequestedBy, ticketReqDate, ticketDeadline, ticketSize, ticketAssignedTo, ticketStatus, ticketComment) VALUES (:ticketNumber, :userId, :userDept, :ticketDescription, :ticketRequestedBy, :ticketReqDate, :ticketDeadline, :ticketSize, :ticketAssignedTo, :ticketStatus, :ticketComment)");
       $stmt->bindParam(":ticketNumber", $ticketNo);
       $stmt->bindParam(":userId", $userId);
       $stmt->bindParam(":userDept", $userDept);
       $stmt->bindParam(":ticketDescription", $description);
       $stmt->bindParam(":ticketRequestedBy", $requestBy);
       $stmt->bindParam(":ticketReqDate", $requestDate);
       $stmt->bindParam(":ticketDeadline", $deadline);
       $stmt->bindParam(":ticketSize", $taskSize);
       $stmt->bindParam(":ticketAssignedTo", $assigned);
       $stmt->bindParam(":ticketStatus", $status);
       $stmt->bindParam(":ticketComment", $comment);

       if ($stmt->execute())
       {
         return true;
       }
     }
     catch(Exception $e)
     {
      echo $e->getMessage();
     }

   }

  /**
   * Edit ticket
   * @author Khairul Alam
   * @method edit
   * @param  [type] $id [description]
   * @return [type]     [description]
   */

  public function edit($ticketId, $ticketStatus)
  {

    try
    {
      $now = date('Y-m-d H:i:s', time());
      $stmt = $this->conn->prepare("UPDATE tickets SET ticketStatus=:ticketStatus, ticketUpdatedAt = :ticketUpdatedAt WHERE ticketId=:ticketId");
      $stmt->bindparam(":ticketId", $ticketId);
      $stmt->bindParam(":ticketStatus", $ticketStatus);
      $stmt->bindparam(":ticketUpdatedAt", $now);

      if ($stmt->execute())
      {
        return true;
      }

    }
    catch(Exception $e)
    {
      echo $e->getMessage();
    }

  }


  /**
   * List of all users
   * @author Khairul Alam
   * @method showAll
   * @return [array]
   */

    public function showAll($id)
    {
      $stmt = $this->conn->prepare("SELECT * FROM tickets WHERE ticketAssignedTo = :userId AND ticketStatus != 3");
      $stmt->execute(array(":userId" => $id));

      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $data;

    }



}
