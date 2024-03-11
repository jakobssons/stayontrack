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
 
<h3>Choose your project and give a memo, whats done</h3>

<div>
<form action="blockchain.php" method="post">

    <input type="radio" id="project1" name="FollowWeather" value="project" />
    <label for="project1">FollowWeather</label>

    <input type="radio" id="project2" name="StayonTrack" value="project" />
    <label for="project2">Stay on Track</label>

    <input type="radio" id="project3" name="MangaPanelCollection" value="project" />
    <label for="project3">Manga Panel Collection</label>

    <input type="radio" id="project4" name="SlotMachineOnline" value="project" />
    <label for="project4">Slot Machine Online</label>

    <label for="memo">Memo: </label>
    <input type="text" id="memo" name="memo" placeholder="Give a short memo...">

    <input type="submit" value="Submit">
  </form>
</div>


<div>

</div>
 
</body>
</html>