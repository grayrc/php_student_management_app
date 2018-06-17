<?php
session_start();
//connect to database
include 'connect.php';

include 'functions.php';

if (isset($_POST['logout']))
{
    session_destroy();
    $_SESSION = array();
    exit;
}

if(isset($_POST['show_graph4']))
{
    //get tool and and whether x or y axis wanted
    $descriptor_array = explode(" ", $_POST['g4_descriptor_result']);
    $tool = $descriptor_array[0];
    $x_or_y = $descriptor_array[1];
    $student = $_POST['g4_student_result'];

    //select from database
    $select_query = " SELECT data.lab_id, data.$x_or_y
        FROM data JOIN student
        ON data.student_id = student.student_id
        WHERE student.screen_name = '$student'
        AND data.tool_id = $tool";
    $stmt = $pdo->prepare($select_query);
    $stmt->execute();
    $results_array = $stmt->fetchAll();


    echo $results_array[0][0];
    echo $results_array[0][1];
    echo $results_array[1][0];
    echo $results_array[1][1];

    include 'graph_four.html.php';
}
elseif(isset($_POST['show_graph3']))
{
    $descriptor_array = explode(" ", $_POST['g3_descriptor_result']);
    $tool = $descriptor_array[0];
    $x_or_y = $descriptor_array[1];

    //get all the labs
    $select_query = 'SELECT lab_id FROM lab';
    $stmt = $pdo->prepare($select_query);
    $stmt->execute();
    $labs = $stmt->fetchAll();
    
    //array to hold results
    $data_array = array();

    //get average response for each lab
    foreach($labs as $lab)
    {
        $select_query = "SELECT $x_or_y FROM data
            WHERE tool_id = $tool
            AND lab_id = $lab[0]";
        $stmt = $pdo->prepare($select_query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $total = 0.0;
        $count = 0;
        foreach($data as $value)
        {
            $total += $value[0];
            $count ++;
        }
        if($count != 0)
        {
            $average = $total / $count;
            array_push($data_array, array($lab[0], $average));
        }

    }
    //print_r($data_array);



    include 'graph_three.html.php';
}

elseif(isset($_POST['show_graph2']))
{
    $student_result = $_POST['g2_student_result'];

    $select_query = "SELECT x_value, y_value FROM data JOIN student
        ON student.student_id = data.student_id
        WHERE student.screen_name = '$student_result'
        AND data.tool_id = $_POST[g2_tool_result]";
    $stmt = $pdo->prepare($select_query);
    $stmt->execute();
    $results_table = $stmt->fetchAll();

    $x_y_results = array();

    foreach($results_table as $results)
    {
        array_push($x_y_results, array($results[0], $results[1]));
    }
    $select_query = "SELECT * FROM tool WHERE tool_id = $_POST[g2_tool_result]";
    $stmt = $pdo->prepare($select_query);
    $stmt->execute();
    $tool_data = $stmt->fetchAll();
    $tool_array = $tool_data[0];

    include 'graph_two.html.php';
}

elseif(isset($_POST['show_graph1']))
{

    $lab_result = $_POST['g1_lab_result'];
    $select_query = "SELECT x_value, y_value FROM data
        WHERE lab_id = $lab_result AND tool_id = $_POST[g1_tool_result]";
    $stmt = $pdo->prepare($select_query);
    $stmt->execute();
    $results_table = $stmt->fetchAll();

    $x_y_results = array();

    foreach($results_table as $results)
    {
        array_push($x_y_results, array($results[0], $results[1]));

    }

    $select_query = "SELECT * FROM tool WHERE tool_id = $_POST[g1_tool_result]";
    $stmt = $pdo->prepare($select_query);
    $stmt->execute();
    $tool_data = $stmt->fetchAll();
    $tool_array = $tool_data[0];
    

    include 'graph_one.html.php';
}

elseif(isset($_POST['show_all_completion']))
{
    //get labs for drop down boxes and tables
    $select_query = "SELECT lab_id FROM lab";
    $stmt = $pdo->prepare($select_query);
    $stmt->execute();
    $lab_table = $stmt->fetchAll();

    //get students for drop down boxes and tables
    $select_query = "SELECT student_id FROM student";
    $stmt = $pdo->prepare($select_query);
    $stmt->execute();
    $student_table = $stmt->fetchAll();



    $table_data = array();
    foreach($student_table as $row)
    {
        $row_data = array();

        //get students name from id
        $s_name = "";
        $select_query = "SELECT screen_name FROM student
          WHERE student_id = $row[0]";
        $s_name_result = $pdo->query($select_query);
        foreach ($s_name_result as $entry) {
          $s_name = $entry[0];
        }
        array_push($row_data, $s_name);
        foreach($lab_table as $col)
        {
            $select_query = ("SELECT * FROM completion
                WHERE student_id = '$row[0]'
                AND lab_id = '$col[0]'");

            $stmt = $pdo->prepare($select_query);
            $stmt->execute();

            $count = $stmt->rowCount();
            if($count > 0)
            {
                array_push($row_data, 'X');
            }
            else
            {
                array_push($row_data, '0');
            }
        }
        array_push($table_data, $row_data);
        //print_r($table_data);
    }

    include 'show_completion.html.php';
}

else
{
    //get labs for drop down boxes and tables
    $select_query = "SELECT lab_id FROM lab";
    $lab_table = $pdo->query($select_query);


    //get students for drop down boxes and tables
    $select_query = "SELECT screen_name FROM student";
    $stmt = $pdo->prepare($select_query);
    $stmt->execute();
    $student_table = $stmt->fetchAll();
    include 'admin_home.html.php';
}


?>
