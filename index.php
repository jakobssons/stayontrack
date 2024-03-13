<?php
 
 include_once 'config/db_config.php';
 session_start();
 
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $conn = new mysqli($servername, $user, $upassword, $dbname);
 
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }
 
     $user = $conn->real_escape_string($_POST['user']);
     $upassword = $_POST['upassword']; // Plain text password
 
     // Modify the SQL query to retrieve user information by username
     $sql = "SELECT user, upassword FROM users_table WHERE user = ?";
     $stmt = $conn->prepare($sql);
     $stmt->bind_param("s", $user);
     $stmt->execute();
     $result = $stmt->get_result();
 
     if ($result->num_rows > 0) {
         $row = $result->fetch_assoc();
 
         // Verify the password using password_verify
         if (password_verify($upassword, $row['upassword'])) {
             // Store user information in session
             $_SESSION['user'] = $row['user'];
 
             // Redirect to the index page after successful login
             header('Location: index.php');
             exit;
         } else {
             $access_denied_error = "Access denied. Incorrect password.";
         }
     } else {
         $access_denied_error = "Access denied. User not found.";
     }
 
    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
  <head>
  <title>StayOnTrack</title>
  </head>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
 
H3 {
  text-align: center;
  font-size: 40px;
  color: #0047AB;
}

input[type=submit] {
  width: 100%;
  background-color: #0047AB;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
 
input[type=submit]:hover {
  background-color: #000080;
}
 
.login {
  width: 50%;
  max-width: 500px;
  margin: 0 auto;
  border-radius: 20px;
  background-color: #f2f2f2;
  padding: 20px;
}

H4 {
  text-align: center;
  color: #0047AB;
}

.stay {
  display: flex;
  align-items: center;
  justify-content: center; /* Center content horizontally */
  text-align: center;
  border-radius: 0px;
  padding-bottom: 25px;
}

.stay img {
  margin: auto; /* Center horizontally */
  display: block; /* Remove any default spacing */
}

h5 {
  text-align: center;
  color: black;
}

body {
  background-image: url('taustakuva1.jpg');
  background-size: cover;
  background-position: center; 
}

</style>
<body>
 
<div id="stay" class="stay">
  <img src="stay.png" alt="logo" height="265px" width="265px">
</div>
 
<div id="login" class="login">
<h3>Login</h3>
<form action="chooseproject.php" method="post">
    <label for="user">User: </label>
    <input type="text" id="user" name="user" placeholder="Username">
   
    <label for="password">Password: </label>
    <input type="password" id="password" name="upassword" placeholder="Password">

    <input type="submit" value="Login">
  </form>
  <h5>Login or <a href="createacc.php">create new account</a></h5>
  <h4>Please Login</h4>
</div>


</body>
</html>