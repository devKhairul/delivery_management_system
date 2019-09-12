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

  public function create($userId,$clientName,$address,$phoneNumber,$sampleCollectionDate,$testName,$labName,$status,$orderNumber,$remarks)
  {

      try
      {
        $stmt = $this->conn->prepare("INSERT INTO orders (orderNumber, userId, clientName, address, phoneNumber, collectionDate, testName, labName, status, remarks) VALUES (:orderNumber, :userId, :clientName, :address, :phoneNumber, :collectionDate, :testName, :labName, :status, :remarks)");
        $stmt->bindParam(":orderNumber", $orderNumber);
        $stmt->bindParam(":userId", $userId);
        $stmt->bindParam(":clientName", $clientName);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":phoneNumber", $phoneNumber);
        $stmt->bindParam(":collectionDate", $sampleCollectionDate);
        $stmt->bindParam(":testName", $testName);
        $stmt->bindParam(":labName", $labName);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":remarks", $remarks);

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
   * Edit user account
   * @author Khairul Alam
   * @method edit
   * @param  [type] $id [description]
   * @return [type]     [description]
   */

   public function edit($ticketId, $ticketStatus)
   {

     try
     {
       $stmt = $this->conn->prepare("UPDATE tickets SET ticketStatus=:ticketStatus WHERE ticketId=:ticketId");
       $stmt->bindparam(":ticketId", $ticketId);
       $stmt->bindParam(":ticketStatus", $ticketStatus);

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

    public function showAll()
    {
      try {

          $stmt = $this->conn->prepare("SELECT * FROM orders");
          $stmt->execute();

          $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
          return $data;
        }

      catch (Exception $e) {
        echo $e->getMessage();
      }


    }



}
