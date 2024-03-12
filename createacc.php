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
 
    $user = $conn->real_escape_string($_POST['user']);
    $upassword = upassword_hash($_POST['upassword'], PASSWORD_DEFAULT); // Hash the password
 
    // Modify the SQL query to insert user information
    $sql = "INSERT INTO users_table (user, upassword) VALUES ('$user', '$upassword')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $user, $upassword);
    $result = $stmt->execute();
 
    if ($result) {
        // Redirect to index page after successful account creation
        header('Location: index.php');
        exit;
    } else {
        echo "Error: " . $stmt->error;
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
 
<h3>Create New Account</h3>
 
<div>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="user">User: </label>
    <input type="text" id="user" name="user" placeholder="Username">
 
    <label for="upassword">New Password: </label>
    <input type="password" id="upassword" name="upassword" placeholder="New Password">

    <input type="submit" value="Login">
  </form>
  <h5>Create new account or <a href="index.php">login</a></h5>
</div>
 
<h4>Please Create New Account</h4>

</body>
</html>