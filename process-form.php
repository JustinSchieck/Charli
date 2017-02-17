<?php
# @Author: Justin Schieck
# @Date:   2017-01-27T14:15:30-05:00
# @Email:  schieck91@gmail.com
# @Last modified by:   Justin Schieck
# @Last modified time: 2017-02-02T14:15:56-05:00
	session_start();

	  $error_msg = "";
		// set a flag variable
		$validated = true;

// check if the form has been submitted
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	// check if any of the required fields are empty
	if ( empty($_POST['Stim']) ) {
		$error_msg .= "You must enter a Stimuli.";
		$validated = false;
	} else {
		$Stim = $_POST['Stim'];
	}
} else {
	// form was submitted in error
	$error_msg .= "Please fill out the form first.";
	$validated = false;
}


if ( $validated == true ) {
$conn = new PDO("mysql:host=sql.computerstudi.es; dbname=gc200328630",'gc200328630','hYLhvjna');
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


		$sql = 'INSERT INTO Charli (Stim, Value) VALUES ( :Stim, :Value)';
		// create a command object and fill the parameters with the form values
		$cmd = $conn->prepare($sql);

		$Stim = $_POST['Stim'];
	  $Value = $_POST['Value'];

		// $cmd->bindParam(':fName', $fName, PDO::PARAM_STR, 15);
		// $cmd->bindParam(':lName', $lName, PDO::PARAM_STR, 15);
		$cmd->bindParam(':Stim', $Stim, PDO::PARAM_STR, 20);
    $cmd->bindParam(':Value', $Value, PDO::PARAM_STR, 100);

		// execute the command
		$cmd->execute();
		// disconnect from the database
		$conn = null;



		$_SESSION['message'] = "User was added successfully";
		  header('Location: add_Stim.html');
		  exit;
		} else {
	// return user to form with an error message
	$_SESSION['fail'] = $error_msg;
	header( "Location: add_Stim.html" );

	// $_SESSION['message'] = "User was added successfully";
	// 	header('Location: index.php');
	// 	exit;
	// } else {
	// // return user to form with an error message
	// $_SESSION['fail'] = $error_msg;
	// header( "Location: index.php" );
	//
	// }
}

		?>
