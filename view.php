<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Profile</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa; /* Light gray background */
    }
    .container {
      margin-top: 20px;
    }
    .card {
      margin-bottom: 20px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .card-header {
      background-color: #343a40;
      color: #ffffff;
      font-weight: bold;
    }
    .card-body {
      background-color: #ffffff;
    }
    .card-title {
      color: #343a40;
    }
    .btn-back {
      background-color: #343a40;
      color: #ffffff;
      border: none;
    }
    .btn-back:hover {
      background-color: #23272b;
    }
    <style>
    /* Custom styles for full page vertical navbar */
    body, html {
      height: 100%;
      overflow-x: hidden;
    }
    .navbar {
      height: 100%;
      width: 200px; /* Width of the vertical navbar */
      position: fixed;
      background-color: #343a40; /* Navbar background color */
    }
    .navbar-nav {
      width: 100%;
      font-size: 18px; /* Font size for navbar links */
    }
    .navbar-nav .nav-link {
      padding: 15px 20px; /* Padding for navbar links */
      color: #ffffff; /* Text color */
    }
    .navbar-nav .nav-link:hover {
      background-color: #495057; /* Hover background color */
    }
    .content {
      margin-left: 200px; /* Adjust content margin to accommodate navbar width */
      padding: 20px;
    }
  </style>
</head>
<body>
  <!--logo sathi cha column use kelay-->
  <div class="container text-center">
    <div class="row align-items-start">
      <div class="col">
      
      </div>
      <div class="col">
       <h2 style="color: brown;"> Employee  Management System..!<h2>
      </div>
      <div class="col">
       </div>
    </div>
  </div>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="fetch.php"sr-only>(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="register.html">Add Employee</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="https://docs.google.com/spreadsheets/d/1DVhLHGFcLz61vwe9V2pBt34D3JcQmVhsDir-8JxJk2g/edit?usp=sharing">Feedback</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="https://mail.google.com/mail/u/0/#inbox">Contact</a>
    </li>
  </ul>
</nav>


<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-header">
          Employee Profile
        </div>
        <div class="card-body">
          <?php
          // Database connection parameters
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "emp_mgt";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          // Get employee Id from URL parameter
          if (isset($_GET['id'])) {
            $employee_id = $_GET['id'];

            // SQL query to fetch employee details
            $sql = "SELECT * FROM euser WHERE id ='$employee_id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              echo "<h5 class='card-title'>Username: " . $row['username'] . "</h5>";
              echo "<p class='card-text'><strong>Email:</strong> " . $row['email'] . "</p>";
              echo "<p class='card-text'><strong>Password:</strong> " . $row['password'] . "</p>";
              echo "<p class='card-text'><strong>Gender:</strong> " . $row['gender'] . "</p>";
              echo "<p class='card-text'><strong>Skills:</strong> " . $row['skills'] . "</p>";
              echo "<p class='card-text'><strong>Country:</strong> " . $row['country'] . "</p>";
              echo "<p class='card-text'><strong>File:</strong> " . $row['file'] . "</p>";
            } else {
              echo "<p class='card-text'>Employee Not Found</p>";
            }

          }

          // Close connection
          $conn->close();
          ?>
        </div>
        <div class="card-footer text-muted">
          <a href="fetch.php" class="btn btn-back">Back to Employee List</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>
