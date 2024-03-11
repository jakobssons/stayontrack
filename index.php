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

</style>§
<body>
 
<h3>Stay on Track</h3>
 
<div>
<form action="chooseproject.php" method="post">
    <label for="user">User: </label>
    <input type="text" id="user" name="user" placeholder="Username">
   
    <label for="password">Password: </label>
    <input type="text" id="password" name="password" placeholder="Password">

    <input type="submit" value="Login">
  </form>
  <h5>Login or <a href="createacc.php">create new account</a></h5>
</div>
 
<h4>Please Login</h4>

</body>
</html>