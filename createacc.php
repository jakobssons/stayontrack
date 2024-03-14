<?php

// include_once 'config/db_config.php';
session_start();

/*

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli($servername, $user, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $user = $conn->real_escape_string($_POST['user']);
    $upassword = password_hash($_POST['upassword'], PASSWORD_DEFAULT); // Hash the password

    // Modify the SQL query to insert user information
    $sql = "INSERT INTO users_table (user, password) VALUES ('$user','$upassword')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user, $upassword);
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
*/
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
 
.acc {
  width: 50%;
  max-width: 500px;
  margin: 0 auto;
  border-radius: 20px;
  background-color: #f2f2f2;
  padding: 20px;
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

H4 {
  text-align: center;
  color: #0047AB;
}

h5 {
  text-align: center;
  color: black;
}

body {
  background-image: url('taustakuva4.jpg');
  background-size: cover;
  background-position: center; 
}

</style>
<body>
 
<div id="stay" class="stay">
  <img src="stay.png" alt="logo" height="265px" width="265px">
</div>
 
<div id="acc" class="acc">
<h3>Create New Account</h3>
<!--
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
-->
<form action="createacc.php" method="POST">
    <label for="user">User: </label>
    <input type="text" id="user" name="user" placeholder="Username">
 
    <label for="upassword">New Password: </label>
    <input type="password" id="upassword" name="upassword" placeholder="New Password">

    <input type="submit" value="Login">
  </form>
  <h5>Create new account or <a href="index.php">login</a></h5>
  <h4>Please Create New Account</h4>
</div>
 

</body>
</html>

<?php

include_once 'config/db_config.php';

$conn2 = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn2) {
  die("Connection failed: " . mysqli_connect_error());
}

// Määritä $upassword ennen sen käyttöä
$upassword = password_hash($upassword, PASSWORD_DEFAULT);

$sql2 = "INSERT INTO users_table (user, upassword) VALUES ('$user','$upassword')";
$result2 = mysqli_query($conn2, $sql2);
if (!$result2) {
  die("Query failed: " . mysqli_error($conn2));
}

$sql = 'SELECT * FROM users_table ORDER BY id DESC LIMIT 1';
$result = $conn2->query($sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC); // funktiokutsu
if(isset($row['id'])) {
  $current_id = $row['id'] + 1;
} else {
  $current_id = 1;
}

$conn2->close();
?>