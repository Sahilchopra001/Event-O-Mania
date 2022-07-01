<?php

$full_name = $_POST['full_name'];
$email_id = $_POST['email_id'];
$password = $_POST['password'];


$conn = new mysqli('localhost','root','','contactus');

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into sign_up(full_name, email_id, password)
    values(?, ?, ?)");

    $stmt->bind_param("sss",$full_name, $email_id, $password);

    $stmt->execute();

    echo "<h1>Thanks $full_name for joining us</h1> <br> <h2>Your account has been successfully created</h2>";

    $stmt->close();
    $conn->close();
}
?>
