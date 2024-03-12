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
 
<h3>Choose your project and give a log, whats done</h3>

<div>
<form action="blockchain.php" method="post">

    <label for="project">Choose a project:</label>
    <select name="project" id="project">
      <option value="FollowWeather">FollowWeather</option>
      <option value="Stay on Track">Stay on Track</option>
      <option value="Manga Panel Collection">Manga Panel Collection</option>
      <option value="Slot Machine Online">Slot Machine Online</option>
    </select>

    <label for="log">Log: </label>
    <input type="text" id="log" name="log" placeholder="Give a short log...">

    <input type="submit" value="Submit">
  </form>
</div>


<div>

</div>
 
</body>
</html>