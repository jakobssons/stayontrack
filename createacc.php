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
<form action="transfer.php" method="post">
    <label for="name">Name: </label>
    <input type="text" id="name" name="name" placeholder="Name">
   
    <label for="email">Email: </label>
    <input type="text" id="email" name="email" placeholder="Email address">
 
    <label for="password">New Password: </label>
    <input type="text" id="password" name="password" placeholder="New Password">

    <input type="submit" value="Login">
  </form>
  <h5>Create new account or <a href="index.php">login</a></h5>
</div>
 
<h4>Please Create New Account</h4>
 
</body>
</html>