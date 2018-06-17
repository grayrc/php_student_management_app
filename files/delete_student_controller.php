<?php
session_start();

//include functions
include 'functions.php';
//connect to database
include 'connect.php';

if(isset($_POST['delete_student']))
{
  $name = clean_input($_POST['name_result']);
  $delete_statment = "DELETE FROM student
  WHERE screen_name = '$name'";
  $pdo->exec($delete_statment);

  echo ("<script>
  alert('$name has been deleted from the database');
  window.location = 'admin_controller.php';
  </script>");
}

else {
  //get student screen names for drop down list
  $select_query = "SELECT screen_name FROM student";
  $name_table = $pdo->query($select_query);

  include 'delete_student.html.php';
}
 ?>
