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
 
H4 {
  text-align: center;
  font-size: 25px;
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

.choose {
  width: 50%;
  max-width: 500px;
  margin: 0 auto;
  border-radius: 20px;
  background-color: #f2f2f2;
  padding: 20px;
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

<div id="choose" class="choose">
<h4>Choose your project and give a log, whats done</h4>
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