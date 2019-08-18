<?php


class UserSession
{
  public $conn;

/**
 * DB Initiation
 * @author Khairul Alam
 * @method __construct
 * @param  [type]      $db [description]
 */

  public function __construct($db)
  {
    $this->conn = $db;
  }

/**
 * User Login
 * @author Khairul Alam
 * @method login
 * @param  [string] $email
 * @param  [string] $password
 * @return [boolean] true
 */

  public function login($email,$password)
  {
    try
    {
      $stmt = $this->conn->prepare("SELECT * FROM users WHERE userEmail=:userEmail LIMIT 1");
      $stmt->execute(array(":userEmail" => $email));
      $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($stmt->rowCount() > 0)
      {
        if (password_verify($password, $userRow['userPassword']))
        {

          $_SESSION['userId'] = $userRow['userId'];
          return $_SESSION['userId'];
        }
        else
        {
          return false;
        }
      }
    }
    catch (Exception $e)
    {
      echo $e->getMessage();
    }
  }

  /**
   * Get specific user data
   * @author Khairul Alam - khairul@sajida.org
   * @method show
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function show($id)
  {

  }

  /**
   * Authenticate user login
   * @author Khairul Alam - khairul@sajida.org
   * @method isLoggedIn
   * @return boolean    [description]
   */

  public function isLoggedIn()
  {
    if (isset($_SESSION['userId']))
    {
      return true;
    }
  }



  /**
   * Location redirect
   * @author Khairul Alam - khairul@sajida.org
   * @method redirect
   * @param  [string]   $url [description]
   * @return [type]        [description]
   */
  public function redirect($url)
  {
    header("location:$url");
  }




}
