<?php
include 'access_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Delete Student</title>

<meta name="description" content="tool to delete student from database">

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
          Delete Student
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

          <label for="student_name">
            Name
          </label>
          <select class="form-control" id="student_name" name="name_result">
            <option label="empty"></option>
            <?php
              foreach($name_table as $row)
              {
                echo("<option value='$row[0]'>$row[0]</option>");
              }
            ?>
          </select>

        <div class="form-group padding-graph-button">
          <button type="submit" class="btn btn-default" name="delete_student">
            Delete Student
          </button>
        </div>
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
