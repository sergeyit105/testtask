<?php
session_start();
    if (!empty($_SESSION['login'] and $_SESSION['password'])){
        echo ("You are already logined");
           echo("<html><head><meta    http-equiv='Refresh' content='0;    URL=brdrm.php'></head></html>");
    }
    else {
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    if (empty($login) or empty($password)) 
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }

    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $login = trim($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $password = trim($password);

    include_once("bd.php");
    $link = mysqli_connect($host, $user, $passworddb, $database) or die("Ошибка " . mysqli_error($link));
    $query1 = "SELECT * FROM users WHERE login ='$login' AND password='$password'";
    $result1 = mysqli_query($link, $query1);
    $myrow1    = mysqli_fetch_array($result1, MYSQLI_BOTH);
    if (empty($myrow1['id'])){
        exit ("Error");
    }

    else {
        $_SESSION['password']= $_POST["password"]; 
        $_SESSION['login']= $_POST["login"]; 
        setcookie("login",    $_POST["login"], time()+9999999);
        setcookie("password",    $_POST["password"], time()+9999999);
        header('Location: http://localhost/JunePHP/brdrm.php');
         }
    }
   
    ?>