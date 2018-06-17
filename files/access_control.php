<?php
//session_start();

//include 'functions.php';

if (isset($_POST['logout']))
{
    session_destroy();
    $_SESSION = array();
    exit;
}

if (isset($_SESSION['user_name']))
{
    $user_name = $_SESSION['user_name'];
}

include 'connect.php';

//if it's not the case that authenticated has been and is true, and that the login hasn't been filled in:
if(!(isset($_SESSION['authenticated']) && $_SESSION['authenticated'])
    && !isset($_POST['user_name_result']))
{
    include 'admin_login.html.php';
    exit;
}
else
{
    if(isset($_POST['submit']))
    {
        //get and clean input from login form
        $user_name = clean_input($_POST['user_name_result']);
        $password = clean_input($_POST['password_result']);

        //query database for those values
        $select_query = "SELECT admin.user_name, admin.password
            FROM admin
            WHERE admin.user_name = :user_name";
        $stmt = $pdo->prepare($select_query);
        $stmt->bindParam(':user_name', $user_name);

        $stmt->execute();
        $row = $stmt->fetch();
        $count = $stmt->rowCount();

        if($count > 0)
        {
            $passhash = crypt($password, $row[1]);

            if( crypt($password, $row[1]) === $row[1])
            {
                $_SESSION['user_name'] = $user_name;
                $_SESSION['authenticated'] = true;
            }
            else
            {
                echo("Wrong Password");
                exit;
            }
        }
        else
        {
            echo "no such user";
            exit;
        }
    }
}
