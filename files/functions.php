<?php

///                     ///
/// Password Algorithm  ///
///                     ///
function password_algorithm($lab_number){
    return $lab_number . "10";
}
//function to sanatize input
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = strip_tags($data);
    return $data;
}

//function to input tool data

function input_data($x_value, $y_value, $tool_id){
    include 'connect.php';
    try
    {
        $student_id = $_SESSION['student_id'];
        $lab_id = $_SESSION['lab_id'];

        $insert_statement = "INSERT INTO data VALUES
            ($lab_id, $tool_id, $student_id, $x_value, $y_value);";
        $pdo->exec($insert_statement);
    }
    catch (PDOException $e)
    {
        $error = 'inserting tool data';
        include 'error.html.php';
        exit();
    }

}



?>
