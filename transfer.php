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
</style>
<body>
 
<h3>Money Transfer Blockchain Web App</h3>
 
<div>
<form action="blockchain.php" method="post">
    <label for="sender">Sender: </label>
    <input type="text" id="sender" name="sender" placeholder="Sender...">
   
    <label for="receiver">Receiver: </label>
    <input type="text" id="receiver" name="receiver" placeholder="Receiver...">
 
    <label for="amount">Amount: </label>
    <input type="text" id="amount" name="amount" placeholder="Amount...">

    <input type="submit" value="Submit">
  </form>
</div>
 
</body>
</html>