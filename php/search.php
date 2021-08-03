<?php 
    session_start();
    include_once "config.php";

    $userId = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM users WHERE NOT unique_id = {$userId} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%')";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found!';
    }
    echo $output;
?>