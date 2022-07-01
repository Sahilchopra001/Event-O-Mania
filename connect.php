<?php


$event_data = $_POST['event_data'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$msg = $_POST['msg'];


$conn = new mysqli('localhost','root','','contactus');

if($conn->connect_error){
    die('Connection Failed : '
    .$conn->connect_error);

}else{
    $stmt = $conn->prepare("insert into contact_us(event_data, first_name, last_name, email, phone, msg)
    values(?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssis",$event_data, $first_name, $last_name, $email, $phone, $msg);

    $stmt->execute();

    echo "Our authorities will contact you soon";

    $stmt->close();
    $conn->close();
}
?>