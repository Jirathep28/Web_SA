<?php

session_start();
require('dbconnect.php');

$errors = array();

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['id']);
    $password = mysqli_real_escape_string($conn, $_POST['pd']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        /*$password = password_hash($password,PASSWORD_BCRYPT);*//*PUN PUN CRADIT*/
        $query = "SELECT * from employees where id_emp = '$username' and pass_emp = '$password'";
        $result = mysqli_query($conn, $query);

       

        $objResult = mysqli_fetch_array($result);

        if ($objResult["type_emp"] == "EM") 
        {
            $_SESSION['id'] = $username;
            header("location: homeemployees.php");
        }
        else if ($objResult["type_emp"] == "HR") 
        {
            $_SESSION['id'] = $username;
            header("location: homeHR.php");
        }
        else if ($objResult["type_emp"] == "MN") 
        {
            $_SESSION['id'] = $username;
            header("location: Ma_home.php");
        }
        else if ($objResult["type_emp"] == "TN") 
        {
            $_SESSION['id'] = $username;
            header("location: homeemployeesTN.php");
        }
        else 
        {
            header("location: loginmain.php");
        }
    }
}

?>