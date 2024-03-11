<?php
 
include_once 'config/db_config.php';
 
echo "<h1>Project Logs</h1>";

// Connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);
 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
// Fetch the current hash of the latest block
$sql = "SELECT current_hash FROM blockchain2_table ORDER BY block_index DESC LIMIT 1";
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
$sender = $_POST['sender'];
$receiver = $_POST['receiver'];
$amount = $_POST['amount'];
 
// Calculate the current hash
$current_hash = hash("sha256", $blockchain_index . $timestamp . $previous_hash . $data . $sender . $receiver . $amount);
 
// Insert data into the database
$sql = "INSERT INTO blockchain2_table (block_index, timestamp, previous_hash, current_hash, data, sender, receiver, amount)
        VALUES ('$blockchain_index', '$timestamp', '$previous_hash', '$current_hash', '$data', '$sender', '$receiver', '$amount')";
$result = mysqli_query($conn, $sql);
 
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
 
echo "<h1>Data inserted successfully!</h1>" . "<br>";
 
// Retrieve and display the blockchain from the database
$sql2 = "SELECT block_index, timestamp, previous_hash, current_hash, data, sender, receiver, amount FROM blockchain2_table";
$result2 = $conn->query($sql2);
 
// Styling the table
echo "<style>
    table {
        width: 75.5%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #f5f5f5;
        overflow-x: auto;
        display: block;
        border: 1px solid #ddd;
        margin-left:260px;
    }
 
 
    th, td {
        padding: 10px;
        border: 1px solid #ddd;
        white-space: nowrap;
        text-align: left;
        max-width: 430px;
        box-sizing: border-box;
    }
 
    td {
        font-size: 13px;
    }
 
    th {
        background-color: #f2f2f2;
        min-width: 105px;
        box-sizing: border-box;
    }
 
    tr:hover {
        background-color: #f5f5f5;
    }

    h1{
        text-align:center;
        color:#0047AB;
        font-size: 32px;
    }

</style>";

// Display the blockchain data in a table
echo "<table border='1'>";
echo "<tr>
        <th>Block Index</th>
        <th>Timestamp</th>
        <th>Previous Hash</th>
        <th>Current Hash</th>
        <th>Sender</th>
        <th>Receiver</th>
        <th>Amount</th>
      </tr>";
 
while ($row = mysqli_fetch_array($result2)) {
    echo "<tr>";
    echo "<td>" . $row['block_index'] . "</td>";
    echo "<td>" . $row['timestamp'] . "</td>";
    echo "<td>" . $row['previous_hash'] . "</td>";
    echo "<td>" . $row['current_hash'] . "</td>";
    echo "<td>" . $row['sender'] . "</td>";
    echo "<td>" . $row['receiver'] . "</td>";
    echo "<td>" . $row['amount'] . "</td>";
    echo "</tr>";
}
 
echo "</table>";
 
// Close the database connection
$conn->close();
 
?>
 