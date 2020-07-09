<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
 background-color:#248a8f;
}

#mySidenav a {
  position: absolute; 
  left: -10px; 
  transition: 0.3s;
  padding: 15px;
	  box-shadow: 0 5px 0 darkred;
  width: 150px; 
  text-decoration: none;
  font-size: 20px;
  color: white;
  border-radius: 0 5px 5px 0; 
}

#mySidenav a:hover {
  left: 25px;
}
#home {
  top:170px;
  background-color: black; 
}
#past {
  top:270px;
  background-color: black; 
}

#upcom {
  top: 390px;
  background-color:black; 
}

#search {
  top: 500px;
  background-color:black; 
}
.header {
	background-image: url(header.jpg);
	background-repeat: no-repeat;
	height: 150px;
	width: 100%;
	background-size:cover;
	}
	a {
    
  color: white;
  padding: 1em 1.5em;
  position: relative;
  text-decoration: none;
  text-transform: uppercase;
}

a:hover {
 color : #008CBA;
  cursor: pointer;
  }
a:active {
  top: 5px;
   border:2px red solid;

   #table1{
	padding :10px;
	top : 5px;
	border : 2px white solid;
	width:100px;
	height:50%;
		}
}
 table{
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;

}
table td, #flight th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}
.container{
	font-size:20px;
}
h2{
	color:white;
}
#box{
	width:200px;
	height:30px;
	
}
</style>
</head>

<body>

<div class="header"></div>
<div id="mySidenav" class="sidenav">
<a href="index.html" id="home">Home</a>
  <a href="past.php" id="past">Past Launches</a>
  <a href="upcoming.php" id="upcom">Upcoming Launches</a>
  <a href="#" id="search">Find Launches</a>
</div>



<div class="container" align="center">
<h2>Search the flight details</h2>
<form action="" method="GET">
<input type="text" placeholder="Type the flight number" name="search" id="box">
<input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
</form>
</div>
<div id="table1">
<div align="center">


<?php


$url3 = 'https://api.spacexdata.com/v3/launches';

$contents_past = file_get_contents($url3);
$contents_past = utf8_encode($contents_past);
//preg_match('/^.+[\n](.+)[\n]./', $contents_past, $matches);
if($contents_past!== false){
    
     
   $contents_past = json_decode($contents_past);

}
if(isset($_GET['search']) ){
$q = $_GET['search'];
//echo($q);
$temp = "<table>";
 

$temp .= "<tr><th>FLIGHT NUMBER</th>";
$temp .= "<th>MISSION NAME</th>";
$temp .= "<th>Launch Year</th></tr>";

			
		for($i = 0; $i < 75; $i++)
			{
				if($contents_past[$i]->flight_number == $q){
					
		$temp .= "<tr>";
		$temp .= "<td>" . $contents_past[$i]->flight_number. "</td>";
		$temp .= "<td>" . $contents_past[$i]->mission_name. "</td>";
			$temp .= "<td>" . $contents_past[$i]->launch_year."</td>";
		$temp .= "</tr>";
		break;
						
		}else{
			
			?>
			<p>("no records");</p>
			<?php
			}
			$temp .= "</table>";
	
echo($temp);
}

?>
</div>
</div>

</body>
</html>