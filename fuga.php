<?php
// First Commit or change
//DB Connection Details

$host="localhost";
$username="root";
$password="";
$database="emp_mgt";
error_reporting(0);

//create Coonection
$conn = new mysqli($host,$username,$password,$database);

//check connection 
if ($conn->connect_error)
{
    die("Connection Failed....!" .$conn->connect_error);
}

    if($_SERVER["REQUEST_METHOD"]=="POST")
     {
      
        $username= $_POST["username"];
        $email= $_POST["email"];
        $password= $_POST["password"];
        $gender= $_POST["gender"];
        $skills= implode(', ', $_POST['skills']); //convert string into array
        $country= $_POST["country"];
 
       
         $target_dir = "image/";
         $target_file = $target_dir . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'].$target_file);
        //move_uploaded_file($_FILES[file][tmp_name].$target_file);
        $sql="INSERT INTO euser ( username,email,password,gender,skills,country,file)VALUES('$username', '$email','$password','$gender','$skills','$country','$target_file')";

        if($conn->query($sql) === TRUE)
        {
            echo "Registration Successfully......!";
        }
        else {
            echo "Error: "  . $sql . "<br>" . $conn->error;
        }
}


$conn->close();
?>
