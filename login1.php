<html>
<?php
$host="localhost";
$username="root";
$password="";
$database="emp_mgt";
//error_reporting(0);

//create Coonection
$conn = new mysqli($host,$username,$password,$database);

//check connection 
if ($conn->connect_error)
{
    die("Connection Failed....!" .$conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM euser WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

  
    
    if($result->num_rows == 1){

        echo"<script>alert('Login Successfully....!'); window.location.href='index.html';</script>";
    }
    else{
        echo"<script>alert('OOPS....! Invalid Username And Password....!');</script>";
    }
   

}

$conn->close()
?>
</html>