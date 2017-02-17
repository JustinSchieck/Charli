<?php
# @Author: Justin Schieck
# @Date:   2017-01-30T22:40:12-05:00
# @Email:  schieck91@gmail.com
# @Last modified by:   Justin Schieck
# @Last modified time: 2017-02-02T14:15:54-05:00


  /* VALIDATION */
  session_start();

  /* Step 1 - Create a flag variable to monitor validation state and an error message variable to hold the error messages */
  $validated = true;
  $error_msg = "";
  /* Step 2 - Assign all the variables from the $_POST associative array */


  /* Step 3 - Check if the required fields (first_name, and last_name) are empty */

  if(empty($_POST['fName'])){
  	$error_msg .= "You must post a first name!";
  	$validated = false;
  }else {
  	$_POST['fName'] = filter_var( $_POST['fName'], FILTER_SANITIZE_STRING );
  }
  if(empty($_POST['lName'])){
    $error_msg .= "You must post a last name!";
    $validated = false;
  }else {
    $_POST['lName'] = filter_var( $_POST['lName'], FILTER_SANITIZE_STRING );
  }

  /* Step 4 - Check the state of the validation flag and redirect the user with an error message if needed */
  /* HINT: don't forget to exit */
  if ($validated == true){
  /* Step 5 - Connect to the database */
  $conn = new PDO ( "mysql:host=sql.computerstudi.es; dbname=gc200328630", 'gc200328630', 'hYLhvjna' );
  $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  /* Step 6 - Build a SQL string to insert the new record in the table term1_users */
  $sql = 'INSERT INTO Charli_users (fName, lName, age) VALUES ( :fName, :lName, :age)';

  /* Step 7 - Prepare the SQL statement */
  $cmd = $conn->prepare( $sql );

  $fName = $_POST['fName'];
  $lName = $_POST['lName'];
  $age = $_POST['age'];

  /* Step 8 - Bind the values to the placeholders in the SQL statment */
  $cmd->bindParam(':fName', $fName, PDO::PARAM_STR, 50);
  $cmd->bindParam(':lName', $lName, PDO::PARAM_STR, 50);
  $cmd->bindParam(':age', $age, PDO::PARAM_INT, 2);

  /* Step 9 - Execute the SQL statement */
  $cmd -> execute();

  /* Step 10 - Close the connection */
  $conn = null;

  /* Step 11 - Redirect the user to the confirmed.php page with a success message */
  /* HINT: don't forget to exit */
  $_SESSION['message'] = "User was added successfully";
  header('Location: users.php');
  exit;

} else {
  header( 'Location: new_user.html' );
  exit;
}
?>
