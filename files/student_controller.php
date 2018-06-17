<?php
session_start();

//include functions
include 'functions.php';

//connect to database
include 'connect.php';

if(isset($_POST['tool3_submit']))
{
  $x_y_val = $_POST['tool3'];
  $x_y_array = (explode(" ", $x_y_val));
  $x_value = $x_y_array[0];
  $y_value = $x_y_array[1];
    input_data($x_value, $y_value, 3);
    echo ("<script>
        alert('Thank You');
        window.location = 'student_controller.php';
        </script>");
}
elseif(isset($_POST['tool3_skip']))
{
    //input_data('NULL', 'NULL', 3);
    echo ("<script>
        alert('Thank You');
        window.location = 'student_controller.php';
        </script>");
}

elseif(isset($_POST['tool2_submit']))
{
    $x_y_val = $_POST['tool2'];
    $x_y_array = (explode(" ", $x_y_val));
    $x_value = $x_y_array[0];
    $y_value = $x_y_array[1];
    input_data($x_value, $y_value, 2);

    include 'tool_three.html.php';
}
elseif(isset($_POST['tool2_skip']))
{
    //input_data('NULL', 'NULL', 2);
    include 'tool_three.html.php';
}

elseif(isset($_POST['tool1_submit']))
{
    $x_y_val = $_POST['tool1'];
    $x_y_array = (explode(" ", $x_y_val));
    $x_value = $x_y_array[0];
    $y_value = $x_y_array[1];
    input_data($x_value, $y_value, 1);
    include 'tool_two.html.php';
}

elseif(isset($_POST['tool1_skip']))
{
    //input_data('NULL', 'NULL', 1);
    include 'tool_two.html.php';
}
elseif(isset($_POST['submit']))
{
    $lab_number = $_POST['lab_result'];
    $name = $_POST['name_result'];
    $password = clean_input($_POST['password_result']);
    //get student id for session
    $selectQuery = "SELECT student_id FROM student WHERE screen_name = '$name'";
    $id_result = $pdo->query($selectQuery);
    $id;
    foreach($id_result as $row)
    {
        $id = $row[0];
    }


    $correct_password = password_algorithm($lab_number);
    if($password === $correct_password)
    {
        //set session variables
        $_SESSION['student_id'] = $id;
        $_SESSION['lab_id'] = $lab_number;

        //set lab as completed
        $insert_statement = "INSERT INTO completion VALUES
            ($id, $lab_number);";
        $pdo->exec($insert_statement);

        //go to tool one
        include 'tool_one.html.php';
    }
    else
    {
        echo ("<script>
        alert('Incorrect Password');
        window.location = 'student_controller.php';
        </script>");
    }

}
elseif(isset($_POST['show_labs']))
{
    //create array of valid student id's
    $select_query = "SELECT student_id FROM student";
    $id_result = $pdo->query($select_query);
    $id_array = array();
    foreach($id_result as $row)
    {
        array_push($id_array, $row[0]);
    }
    //get and sanatise input
    $id_input = clean_input($_POST['id_result']);
    if(in_array($id_input, $id_array))
    {
        $id = $id_input;
    }
    else
    {
        echo ("<script>
        alert('Id not in database');
        window.location = 'student_controller.php';
        </script>");
    }

    //select the lab ids associated with the student id in the completion table
    $select_query = "SELECT lab_id FROM completion WHERE student_id = $id";
    $completed_lab_results = $pdo->query($select_query);

    //create array of all labs
    $select_query = "SELECT lab_id FROM lab";
    $labs_result = $pdo->query($select_query);
    $labs_array = array();
    foreach($labs_result as $row)
    {
        array_push($labs_array, $row[0]);
    }
    //create array of completed labs
    $completed_lab_array = array();
    foreach($completed_lab_results as $row)
    {
        array_push($completed_lab_array, $row[0]);
    }

    //create array of incomplete labs

    $labs_array = array_diff($labs_array, $completed_lab_array);


    include 'show_completed.html.php';
}
else
{
    $student_id = "";
    if(isset($_SESSION['student_id']))
    {
        $student_id = $_SESSION['student_id'];
    }

    //get student screen names for drop down list
    $select_query = "SELECT screen_name FROM student";
    $name_table = $pdo->query($select_query);

    //get labs for drop down box
    $select_query = "SELECT lab_id FROM lab";
    $lab_table = $pdo->query($select_query);

    include 'student_home.html.php';
}
?>
