<!DOCTYPE html>
<html>
<head>
  <title>StayOnTrack</title>
</head>
<body>
<div>
<h1>Project Logs</h1>
<h1>Data inserted successfully!</h1>
</div>
<?php

include_once 'config/db_config.php';

// Connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
// Fetch the current hash of the latest block
$sql = "SELECT current_hash FROM proju_table ORDER BY block_index DESC LIMIT 1";
$result = $conn->query($sql);
 
// Initialize the previous hash based on existing blocks or set a default value
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $previous_hash = $row['current_hash'];
} else {
    // If there are no existing blocks, set an initial hash (genesis hash)
    $previous_hash = 'genesis_hash';  // You can customize this initial value
}
 
// Get input data
$blockchain_index = 0;  // You need to determine how to get the block_index
$timestamp = date("Y-m-d H:i:sa");
$data = $_POST['data'];
$user = $_POST['user'];
$upassword = $_POST['upassword'];
$project = $_POST['project'];
$log = $_POST['log'];

// Calculate the current hash
$current_hash = hash("sha256", $blockchain_index . $timestamp . $previous_hash . $data . $user . $project . $log);
 
// Insert data into the database
$sql = "INSERT INTO proju_table (block_index, timestamp, previous_hash, current_hash, data, user, project, log)
        VALUES ('$blockchain_index', '$timestamp', '$previous_hash', '$current_hash', '$data', '$user', '$project', '$log')";
$result = mysqli_query($conn, $sql);
 
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Retrieve and display the blockchain from the database
$sql2 = "SELECT timestamp, user, project, log FROM proju_table";
$result2 = $conn->query($sql2);
 
// Styling the table
echo "<style>
    table {
        width: 35.75%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #f5f5f5;
        overflow-x: auto;
        display: block;
        border: 1px solid #ddd;
        margin-left:260px;
        overflow-x:auto;
        margin: 20px auto;
        border-color: black;
    }
 

    th, td {
        padding: 10px;
        border: 1,75px solid #ddd;
        white-space: nowrap;
        text-align: left;
        max-width: 430px;
        box-sizing: border-box;
        border-color: black;
    }
 
    td {
        font-size: 13px;
    }
 
    th {
        background-color: #f2f2f2;
        min-width: 105px;
        box-sizing: border-box;
        border-color: black;
        color:#0047AB;
    }
 
    tr:hover {
        background-color: #f5f5f5;
    }

    h1{
        text-align:center;
        color:#0047AB;
        font-size: 32px;
    }

    h4{
        text-align:center;
        color:#0047AB;
        font-size: 16px;
    }
    
    h3{
        text-align:center;
        color:#0047AB;
    }
    
    body {
        background-image: url('taustakuva4.jpg');
        background-size: cover;
        background-position: center; 
      }
    
      div {  
        width: 100%;
        max-width: 665px;
        margin: 0 auto;
        border-radius: 20px;
        background-color: #f2f2f2;
        padding: 10px;
      }
      
</style>";

// Display the blockchain data in a table
echo "<table border='1'>";
echo "<tr>
        <th>Timestamp</th>
        <th>User</th>
        <th>Project</th>
        <th>Log</th>
      </tr>";
 
while ($row = mysqli_fetch_array($result2)) {
    echo "<tr>";
    echo "<td>" . $row['timestamp'] . "</td>";
    echo "<td>" . $row['user'] . "</td>";
    echo "<td>" . $row['project'] . "</td>";
    echo "<td>" . $row['log'] . "</td>";
    echo "</tr>";
}
 
echo "</table>";


// Close the database connection
$conn->close();
 
?>
<div>
<H3><a href="index.php">Kirjaudu ulos ja palaa aloitussivulle</a></h3>
</div>
</body>
</html>