<html>
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

</style>
</head>

<body>

<div class="header"></div>
<div id="mySidenav" class="sidenav">
<a href="index.html" id="home">Home</a>
  <a href="past.php" id="past">Past Launches</a>
  <a href="#" id="upcom">Upcoming Launches</a>
  <a href="samp.php" id="search">Search</a>
</div>

<div align="center">
<?php


$url3 = 'https://api.spacexdata.com/v3/launches/upcoming';

$contents_past = file_get_contents($url3);
$contents_past = utf8_encode($contents_past);
preg_match('/^.+[\n](.+)[\n]./', $contents_past, $matches);
if($contents_past!== false){
    
     
   $contents_past = json_decode($contents_past);
  
}





 
/*Initializing temp variable to design table dynamically*/
$temp = "<table>";
 
/*Defining table Column headers depending upon JSON records*/
$temp .= "<tr><th>FLIGHT NUMBER</th>";
$temp .= "<th>MISSION NAME</th>";
$temp .= "<th>DATE</th></tr>";
 
/*Dynamically generating rows & columns*/
for($i = 0; $i < 16 ; $i++)
{
$temp .= "<tr>";
$temp .= "<td>" . $contents_past[$i]->flight_number. "</td>";
$temp .= "<td>" . $contents_past[$i]->mission_name. "</td>";
$utc = $contents_past[$i]->launch_date_utc;
$time = strtotime($utc);
$value = date("d-m-Y", $time);
$temp .= "<td>" .$value."</td>";

$temp .= "</tr>";
}

$temp .= "</table>";
 

echo $temp;
?>
</div>
</body>
</html>