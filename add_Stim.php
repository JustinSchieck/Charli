<!--
@Author: Justin Schieck
@Date:   2017-01-25T14:22:03-05:00
@Email:  schieck91@gmail.com
# @Last modified by:   Justin Schieck
# @Last modified time: 2017-02-16T20:18:25-05:00
-->
<?php
$conn = new PDO ( "mysql:host=sql.computerstudi.es; dbname=gc200328630", 'gc200328630', 'hYLhvjna' );
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  // build the SQL statment
  $sql = 'SELECT * FROM Charli';
  // prepare, execute, and fetchAll
  $Charli = $conn->query( $sql );
  // count the rows
  $row_count = $Charli->rowCount();
  // close the DB connection
  $conn = null;
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Charli Prototype</title>
    <meta name="description" content="Charli Prototype">

    <!--My CSS-->
    <link rel="stylesheet" href="css/styles.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


    <!--personal js file-->



    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>

<body>
    <!--name of owner-->
    <!-- <form>
        First name:<br>
        <input type="text" name="firstname"><br> Last name:<br>
        <input type="text" name="lastname">
    </form> -->

<!-- <?php require 'navigation.php' ?> -->
    <div class="alert alert-danger">
        You must enter a Choice<br> </div>
    <div class="container">
        <h1 class="page-header">Add Stimuli, Threshold or Response</h1>
        <form method="post" action="process-form.php">
            <fieldset>
                <div class="form-group">
                    <label>Definition</label>
                    <input class="form-control" type="text" name="Value" placeholder="Name of Stim or Response" required >
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">

                            <!-- <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  Dropdown
                  <span class="caret"></span>
                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                </ul>
                            </div> -->
                            <div class="radio">
                                <label><input type="radio" name="Stim" value="Stimuli">Stimuli</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="Stim" value="Threshold">Threshold</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="Stim" value="Response">Response </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" class="button" type="submit">
    						<i class="fa fa-plus">Submit</i>
    					</button>
                </div>
            </fieldset>
        </form>
    </div>

    <img src="Charli_Example.png" alt="Charli" style="width:128px;height:128px;">
    <figcaption>
        <h2>Charli Here!</h2>
</figcaption>

<div class="container">
  <h1 class="page-header">Stimuli || Threshold || Response</h1>
  <?php if ( isset( $Charlis ) ): ?>
    <table class="table table-striped table-condensed table-hover">
      <thead>
        <tr>
          <th>Stim</th>
          <th>Response</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $Charlis as $Charli ): ?>
          <tr>
            <td><?= ($Charli['Stim']) ?></td>
            <td><?= ($Charli['Value']) ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  <?php endif ?>
</div>
        <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>



</html>
