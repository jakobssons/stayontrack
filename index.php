<?php
 
include_once 'config/db_config.php';
 
session_start();
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ... (your existing code for database connection)
 
    $conn = new mysqli($servername, $user, $upassword, $dbname);
 
    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
 
    $user = $conn->real_escape_string($_POST['email']);
    $upassword = $_POST['upassword']; // Plain text password
 
    // Modify the SQL query to retrieve user information
    $sql = "SELECT user, upassword FROM users_table WHERE email = '$user'";
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
 
            // Redirect to Money Transfer blockchain web app
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
  background-color: #FF007ACC;
}
 
div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

H4 {
  text-align: center;
  color: #0047AB;
}

h5 {
  text-align: center;
  color: black;
}

</style>
<body>
 
<h3>Stay on Track</h3>
 
<div>
<form action="chooseproject.php" method="post">
    <label for="user">User: </label>
    <input type="text" id="user" name="user" placeholder="Username">
   
    <label for="password">Password: </label>
    <input type="password" id="password" name="upassword" placeholder="Password">

    <input type="submit" value="Login">
  </form>
  <h5>Login or <a href="createacc.php">create new account</a></h5>
</div>

<h4>Please Login</h4>

</body>
</html>