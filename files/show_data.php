<?php
//connect to database
include 'connect.php';

//select data from all tables
try
{
    $selectQuery = "SELECT * FROM student";
    $student_table = $pdo->query($selectQuery);

    $selectQuery = "SELECT * FROM tool";
    $tool_table = $pdo->query($selectQuery);

    $selectQuery = "SELECT * FROM data";
    $data_table = $pdo->query($selectQuery);

    $selectQuery = "SELECT * FROM completion";
    $completion_table = $pdo->query($selectQuery);

    $selectQuery = "SELECT * FROM lab";
    $lab_table = $pdo->query($selectQuery);

    $selectQuery = "SELECT * FROM admin";
    $admin_table = $pdo->query($selectQuery);
}
catch (PDOException $e)
{
    $error = 'reading data from tables failed';
    include 'error.html.php';
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Completion Table</h2>
    <table>
        <thead>
            <tr>
                <th>Admin Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>User Name</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($admin_table as $row)
                {
                    echo("
                        <tr>
                            <td>$row[0]</td>
                            <td>$row[1]</td>
                            <td>$row[2]</td>
                            <td>$row[3]</td>
                            <td>$row[4]</td>
                        </tr>
                    ");
                }
            ?>
        </tbody>
    </table>
    <h2>Completion Table</h2>
    <table>
        <thead>
            <tr>
                <th>Student Id</th>
                <th>Lab ID</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($completion_table as $row)
                {
                    echo("
                        <tr>
                            <td>$row[0]</td>
                            <td>$row[1]</td>
                        </tr>
                    ");
                }
            ?>
        </tbody>
    </table>
    <h2>Data Table</h2>
    <table>
        <thead>
            <tr>
                <th>Lab Id</th>
                <th>Tool ID</th>
                <th>Student ID</th>
                <th>X Value</th>
                <th>Y Value</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($data_table as $row)
                {
                    echo("
                        <tr>
                            <td>$row[0]</td>
                            <td>$row[1]</td>
                            <td>$row[2]</td>
                            <td>$row[3]</td>
                            <td>$row[4]</td>
                        </tr>
                    ");
                }
            ?>
        </tbody>
    </table>
        <h2>Lab Table</h2>
    <table>
        <thead>
            <tr>
                <th>Lab Number</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($lab_table as $row)
                {
                    echo("
                        <tr>
                            <td>$row[0]</td>
                        </tr>
                    ");
                }
            ?>
        </tbody>
    </table>
    <h2>Student Table</h2>
    <table>
        <thead>
            <tr>
                <th>Student ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Screen Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($student_table as $row)
                {
                    echo("
                        <tr>
                            <td>$row[0]</td>
                            <td>$row[1]</td>
                            <td>$row[2]</td>
                            <td>$row[3]</td>
                        </tr>
                    ");
                }
            ?>
        </tbody>
    </table>
    <h2>Tool Table</h2>
    <table>
        <thead>
            <tr>
                <th>Tool Number</th>
                <th>Title</th>
                <th>North Label</th>
                <th>South Label</th>
                <th>East Label</th>
                <th>West Label</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($tool_table as $row)
                {
                    echo("
                        <tr>
                            <td>$row[0]</td>
                            <td>$row[1]</td>
                            <td>$row[2]</td>
                            <td>$row[3]</td>
                            <td>$row[4]</td>
                            <td>$row[5]</td>
                        </tr>
                    ");
                }
            ?>
        </tbody>
    </table>

</body>
</html>