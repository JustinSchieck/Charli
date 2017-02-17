<?php
# @Author: Justin Schieck
# @Date:   2017-01-31T01:46:30-05:00
# @Email:  schieck91@gmail.com
# @Last modified by:   Justin Schieck
# @Last modified time: 2017-02-02T14:55:47-05:00



  session_start();


  /* Step 1 - Connect to the database */
  $conn = new PDO( "mysql:host=sql.computerstudi.es; dbname=gc200328630", 'gc200328630', 'hYLhvjna' );
  $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  // Build the SQL sentence
  $sql = 'SELECT fName, lName, age FROM Charli_users';
  /* Step 2 - Prepare, Execute, and Fetch the results and store them in a variable named $users */

  $cmd = $conn->prepare($sql);
  $cmd->execute();
  $Charli_users = $cmd->fetchAll();

  // count the results
    $row_count = $cmd->rowCount();

  /* Step 3 - Close the connection */
  $conn = null;
?>

<!DOCTYPE HTML>
<html lang="en">

  <head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O" crossorigin="anonymous">
    <title>Charli's Users</title>
  </head>

  <body>

    <?php if ( !empty($_SESSION['fail']) ): ?>
          <div class="alert alert-danger"><?= $_SESSION['fail'] ?></div>
        <?php endif ?>
        <?php if ( !empty($_SESSION['success']) ): ?>
          <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
        <?php endif ?>
        <?php session_unset(); ?>

    <div class="container">


      <?php if ( $row_count > 0 ): ?>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ( $Charli_users as $Charli_user ): ?>
            <tr>
              <td><a href="#"><?= $Charli_user['fName'] ?></a></td>
              <td><a href="#"><?= $Charli_user['lName'] ?></a></td>
              <td><a href="#"><?= $Charli_user['age'] ?></a></td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php else: ?>
      <div class="alert alert-warning">
        No User to display.
      </div>
      <?php endif ?>
    </div>

    <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>

</html>
