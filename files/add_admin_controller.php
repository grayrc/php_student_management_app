<?php
session_start();
//include functions
include 'functions.php';
//connect to database
include 'connect.php';
if(isset($_POST['submit_new_admin']))
{
  $first_name = clean_input($_POST['first_name_result']);
  $_SESSION['first_name'] = $first_name;
  $last_name = clean_input($_POST['last_name_result']);
  $_SESSION['last_name'] = $last_name;
  $user_name = clean_input($_POST['user_name_result']);
  $_SESSION['user_add_name'] = $user_name;
  $password = clean_input($_POST['password_result']);
  $retype_password = clean_input($_POST['password_retype']);
  if($password != $retype_password)
  {
    echo ("<script>
    alert('passwords do not match');
    window.location = 'add_admin_controller.php';
    </script>");
  }
  $password_check = "((?=.*[a-z]+)(?=.*[A-Z]+)(?=.*[0-9]+)(.{8,}))";
  //$password_check = "(^[a-zA-Z\-]{2,}$)";

  if(!preg_match($password_check, $password))
  {
    echo ("<script>
    alert('password does not reach requirements');
    window.location = 'add_admin_controller.php';
    </script>");

  }
  else
  {
    //get password hash
    $cost = 10;
    $salt = strtr(base64_encode(random_bytes(16)), '+', '.');
    $salt = sprintf("$2a$%02d$", $cost) . $salt;
    $hash = crypt($password, $salt);

    //add to database
    $insert_statement = "INSERT INTO admin VALUES
        (null, :first_name, :last_name, :user_name, :password)";
    $stmt = $pdo->prepare($insert_statement);
    $stmt->bindParam(':password', $hash);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':user_name', $user_name);
    $stmt->execute();

    //provide feedback and return to main screen
    echo ("<script>
    alert('$first_name $last_name has been added to the database');
    window.location = 'admin_controller.php';
    </script>");

  }

}
else {
  include 'add_admin.html.php';
}

?>
