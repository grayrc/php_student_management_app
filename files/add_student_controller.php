<?php
session_start();

//include functions
include 'functions.php';
//connect to database
include 'connect.php';

if(isset($_POST['submit_new_student']))
{
    //get and sanatise data
    $student_id = clean_input($_POST['id_result']);
    $first_name = clean_input($_POST['first_name_result']);
    $last_name = clean_input($_POST['last_name_result']);
    //add new student to database
    $insert_statement = "INSERT INTO student VALUES
      (:student_id, :first_name, :last_name, :screen_name)";
    $screen_name = ($last_name . ", " . $first_name);
    $stmt = $pdo->prepare($insert_statement);
    $stmt->bindParam(':student_id', $student_id);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':screen_name', $screen_name);

    $stmt->execute();

    echo ("<script>
    alert('$first_name $last_name has been added to the database');
    window.location = 'admin_controller.php';
    </script>");

}
include 'add_student.html.php';
?>
