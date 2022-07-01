<?php
session_start();
// check if the user is already logged in
if(isset($_SESSION['email_id']))     // check kya session me username already exits hai
{
    header("location: index.html");
    exit;    // baaki code taki execute na ho
}
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'contactus');

// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect with MySQL');
}


$email_id = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['email_id'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter email_id + password";
    }
    else{
        $email_id = trim($_POST['email_id']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, email_id, password FROM sign_up WHERE email_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_email_id);
    $param_email_id = $email_id;
    

    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $email_id, $hashed_password);  
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password , $hashed_password))
                        {      // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["email_id"] = $email_id;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to Ourwebsite
                            header("location: index.html");
                            
                        }
                    }
                }
            }
         }    
     }
?>
