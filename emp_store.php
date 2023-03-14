<?php
session_start();
$connection = mysqli_connect("localhost","root","","test");

if(isset($_POST['save_multiple_data']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $date = $_POST['date'];
    $salary = $_POST['salary'];
    $session = "Admin";

    foreach($name as $index => $names)
    {
        $s_nanme = $names;
        $s_email = $email[$index];
        $s_mobile = $mobile[$index];
        $s_gender = $gender[$index];
        $s_date = $date[$index];
        $s_salary = $salary[$index];
        $s_session = $session;
        $query="INSERT INTO `emp`( `name`, `email`, `mobile`, `gender`, `date`, `salary`, `updateby`, `createby`, `editby`, `deleteby`) VALUES ('$s_nanme','$s_email','$s_mobile','$s_gender','$s_date','$s_salary','$s_session','$s_session','$s_session','$s_session')";
        $query_run = mysqli_query($connection , $query);
    }

    if($query_run)
    {
      
        header("Location: emp.php");
        exit(0);
    }
    else
    {
      
        header("Location: emp.php");
        exit(0);
    }
}
?>