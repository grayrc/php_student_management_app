<?php
include 'access_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Add Administrator</title>

<meta name="description" content="tool to add new administrator to database">

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

</head>
<body>

<div class="container-fluid">
<div class="row">
<div class="col-md-12">
  <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6 content">
      <div class="page-header">
        <h1>
          Add New Administrator
          <button class="btn btn-default pull-right" name="home" onclick="window.location = 'admin_controller.php'">
            Home
          </button>
        </h1>
      </div>
      <?php
        $self = htmlspecialchars ($_SERVER['PHP_SELF']);
        echo("<form action = '$self' method = 'POST'>");
      ?>
      <fieldset>
        <div class="form-group">

          <label for="first_name">
            First Name
          </label>

          <input class="form-control" id="first_name" name="first_name_result"
          <?php if(isset($_SESSION['first_name']))
            {
              echo "value='$_SESSION[first_name]'";
            }?>
            required>
          <label for="last_name">
            Last Name
          </label>
          <input class="form-control" id="last_name" name="last_name_result"
            <?php if(isset($_SESSION['last_name']))
            {
              echo "value='$_SESSION[last_name]'";
            }?>
            required>

          <label for="user_name">
            User Name
          </label>
          <input class="form-control" id="user_name" name="user_name_result" 
          <?php if(isset($_SESSION['user_add_name']))
            {
              echo "value='$_SESSION[user_add_name]'";
            }?>
            required>
          <label for="password">
            Password <br> (must contain at least 8 characters, at least one upper case letter, at least one lower case letter, and at least one number)
          </label>
          <input class="form-control" id="password" name="password_result" type="password" required>

          <label for="password_retype">
            Retype Password
          </label>
          <input class="form-control" id="password_retype" name="password_retype" type="password" required>
        </div>

        <div class="form-group padding-graph-button">
          <button type="submit" class="btn btn-default" name="submit_new_admin">
            Submit
          </button>
        </div>
       
      </fieldset>
      </form>
      </div>
    </div>
    <div class="col-md-3">
    </div>
  </div>
</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
