<!--

php for creating or resetting a database of students from a csv file

Author: Richard Gray
Date: 18/10/2017
-->

<?php

//connect to database
include 'connect.php';

try
{
    //delete tables if they exist
    $dropQuery = "
    DROP TABLE IF EXISTS data;
    DROP TABLE IF EXISTS tool;
    DROP TABLE IF EXISTS completion;
    DROP TABLE IF EXISTS student;
    DROP TABLE IF EXISTS lab;
    DROP TABLE IF EXISTS admin;
    ";
    $pdo->exec($dropQuery);
}
catch (PDOException $e)
{
    $error = 'Deleting existing tables failed';
    include 'error.html.php';
    exit();
}

try
{
    ini_set('auto_detect_line_endings',TRUE);
    //read students csv file
    $csv = fopen("class_list.csv", "r");
    //print_r (fgetcsv($csv));
    $students_array = array();
    //echo fgetcsv($csv);
    //$i = 0;
    $next = array(1, 'a', 'a', 'a');
    while(!feof($csv))
    {
    //    echo $i;
    //    $i ++;
        //$student_entry =
        //echo $student_entry[0];
        $students_array[] = $next;
        $next = fgetcsv($csv);
    }
    fclose($csv);

}
catch (PDOException $e)
{
    $error = 'reading classList.csv file failed';
    include 'error.html.php';
    exit();
}

//create table for students
try
{
    $createStatement = "CREATE TABLE student
    (
        student_id VARCHAR(20) PRIMARY KEY,
        first_name VARCHAR(20) NOT NULL,
        last_name VARCHAR(20) NOT NULL,
        screen_name VARCHAR(30) NOT NULL
        )Engine = InnoDB;";
        $pdo->exec($createStatement);
}
catch (PDOException $e)
{
    $error = 'Creating student table failed';
    include 'error.html.php';
    exit();
}

//insert data into student table
try
{
    $insertStatement = "INSERT INTO student VALUES
        (:student_id, :first_name, :last_name, :screen_name)";
    $stmt = $pdo->prepare($insertStatement);
    $stmt->bindParam(':student_id', $student_id);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':screen_name', $screen_name);
    foreach($students_array as $student_entry)
    {
        $student_id = $student_entry[0];
        $first_name = $student_entry[2];
        $last_name = $student_entry[1];
        $screen_name = ($last_name . ", " . $first_name);
        ;
        $stmt->execute();
    }
}
catch (PDOException $e)
{
    $error = 'filling student table failed';
    include 'error.html.php';
    exit();
}

//create tool table
try
{
    $createStatement ="CREATE TABLE tool
    (
        tool_id INT(3) PRIMARY KEY,
        title VARCHAR(50) NOT NULL,
        north_label VARCHAR(50) NOT NULL,
        south_label VARCHAR(50) NOT NULL,
        east_label VARCHAR(50) NOT NULL,
        west_label VARCHAR(50) NOT NULL
    )Engine = InnoDB;";
    $pdo->exec($createStatement);
}
catch (PDOException $e)
{
    $error = 'creating tool table failed';
    include 'error.html.php';
    exit();
}

//fill tool table
try
{
    $insertStatement = "INSERT INTO tool VALUES
        (1, 'Difficulty and interest', 'hard', 'easy', 'interesting', 'boring'),
        (2, 'Novelty and plan', 'content new', 'content familiar', 'clear plan', 'no plan'),
        (3, 'Improvement and satisfaction', 'improved', 'not improved', 'satisfied', 'not satisfied');";
    $pdo->exec($insertStatement);
}
catch (PDOException $e)
{
    $error = 'filling tool table failed';
    include 'error.html.php';
    exit();
}

//create lab table

try
{
    $createStatement = "CREATE TABLE lab
    (
    lab_id INT(3) PRIMARY KEY
    )Engine = InnoDB;";
    $pdo->exec($createStatement);
}
catch (PDOException $e)
{
    $error = 'creating lab table failed';
    include 'error.html.php';
    exit();
}

//enter lab data
try
{
    $insertStatement = "INSERT INTO lab VALUES
        (2),
        (4),
        (6),
        (8),
        (10),
        (11),
        (17),
        (19),
        (20),
        (23)
        ";
    $pdo->exec($insertStatement);
}
catch (PDOException $e)
{
    $error = 'filling tool table failed';
    include 'error.html.php';
    exit();
}

//create data table
try
{
    $createStatement ="CREATE TABLE data
    (
        lab_id INT(3) NOT NULL,
        tool_id INT(3) NOT NULL,
        student_id VARCHAR(20) NOT NULL,
        x_value INT(3),
        y_value INT(3),
        PRIMARY KEY (lab_id, tool_id, student_id),
        FOREIGN KEY (tool_id) REFERENCES tool(tool_id) ON DELETE CASCADE,
        FOREIGN KEY (student_id) REFERENCES student(student_id) ON DELETE CASCADE
    )Engine = InnoDB;";

    $pdo->exec($createStatement);
}


catch (PDOException $e)
{
    $error = 'creating data table failed';
    include 'error.html.php';
    exit();
}

//create completion table
try
{
    $createStatement ="CREATE TABLE completion
    (
        student_id VARCHAR(20) NOT NULL,
        lab_id INT(3) NOT NULL,
        PRIMARY KEY (student_id, lab_id)
    )Engine = InnoDB;";

    $pdo->exec($createStatement);
}
catch (PDOException $e)
{
    $error = 'creating completion table failed';
    include 'error.html.php';
    exit();
}

//create admin table
try
{
    $createStatement ="CREATE TABLE admin
    (
        admin_id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(20) NOT NULL,
        last_name VARCHAR(20) NOT NULL,
        user_name VARCHAR(20) NOT NULL,
        password VARCHAR(200) NOT NULL
    )Engine = InnoDB;";

    $pdo->exec($createStatement);
}
catch (PDOException $e)
{
    $error = 'creating admin table failed';
    include 'error.html.php';
    exit();
}

//insert Dale into admin table
try
{
    //get password hash
    $cost = 10;
    $salt = strtr(base64_encode(random_bytes(16)), '+', '.');
    $salt = sprintf("$2a$%02d$", $cost) . $salt;
    $hash = crypt("minttimtams", $salt);

    $insert_statement = "INSERT INTO admin VALUES
        (null, 'Dale', 'Parsons', 'dale', :password)";
    $stmt = $pdo->prepare($insert_statement);
    $stmt->bindParam(':password', $hash);
    $stmt->execute();
}
catch (PDOException $e)
{
    $error = 'adding user to admin table failed';
    include 'error.html.php';
    exit();
}
