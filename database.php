<html>
 <head>
  <title>PHP Accessing Web Service</title>
  <style type="text/css">
    table, th, td {
      border: thin solid black;
    }
    p.sql {
      font-family: monospace;
    }
body {background-color: beige;}
#nav, #nav ul
{
    background-color:#1f3d7a;
    color:#1f3d7a;
    margin:0;
    padding:0;
    list-style:none;
    text-align:center;
    font-weight: bold;
    margin-bottom: 10px;
    width: 100%;
    height:40px;
}
#nav li
{
    background-color:#1f3d7a;
    color:#1f3d7a;
    float:left;
    text-align:center;
	padding: 5px;
}
#nav li a
{
    background-color:#F0F8FF;
    display:block;
    padding:20px;
}
#nav li a:link, #nav li a:visited
{
    background-color:#F0F8FF;
    color:#1f3d7a;
    display:block;
    padding:10px;
    text-decoration:none;
	}
#nav li a:hover
{
    background-color:#e6e6ff;
    color:#000;
}
  </style>
 </head>
 <body>
<center>

 <ul id="nav">
            <li><a href="index.php"><img src="https://www4.dcu.ie/sites/default/files/DCU-logo-main_1.png" alt="DCU"></a></li>
            <li><a href="index.php" title="return to front page">Home</a></li>
            <li><a href="about.php" title="learn more about us">About</a></li>
            
</ul>
   <h1>Welcome! Here is the information you require</h1>

<?php
/* Make connection to your database on student.computing.dcu.ie here */
/* YOUR CODE GOES HERE */
$con = mysql_connect("student.computing.dcu.ie", "user5877" , "pw9145");
mysql_select_db("project34", $con);

/* Identify which query number has been called */
$queryNumber = $_GET['query'];
switch ($queryNumber) {  // What is a switch statement? - http://php.net/manual/en/control-structures.switch.php
  case "q1":
    
    /* First make the SQL string using the $_GET['facility'] value, then call the database to get the answer */
    /* YOUR CODE GOES HERE */
	$facility = $_GET['facility'];
	
	$SQL1 = "SELECT Name FROM General_Data WHERE Nearby_facilities LIKE '%$facility%'";
	$result1 = mysql_query($SQL1, $con);
    // This example output table is for query 1,
    // the other queries will have different numbers of columns and rows and different headings
   
   echo "<table>";
   echo "   <th>Carparks close to " . $facility . "</th>";
   while ( $db_field = mysql_fetch_assoc($result1) ) {
       echo "<tr><td><center>" . $db_field['Name'] . "</center></tr></td>";
     }
   echo "</table>";
   
    break;
  case "q2":
   
    /* YOUR CODE GOES HERE */

	$campus = $_GET['campus']; 

  
  if ($campus == 'Glasnevin')
     {
      $SQL2a = "SELECT SUM(Number_of_spaces), SUM(Number_of_disabled_spaces) FROM `General_Data` WHERE Campus = '$campus' ";
	        $result2a = mysql_query($SQL2a, $con);
           
           echo "<table>";
           echo "   <th>" . $campus . ": Spaces</th><th>" . $campus . ": Disabled Spaces</th>";
           while ( $db_field = mysql_fetch_assoc($result2a) ) {
           echo "<tr><td><center>" . $db_field['SUM(Number_of_spaces)'] . "</center></td><td><center>" . $db_field['SUM(Number_of_disabled_spaces)'] . "</center></td></tr>";
     
   echo "</table>";
}
}
else {


 $SQL2b = "SELECT Number_of_spaces, Number_of_disabled_spaces FROM General_Data WHERE Campus = '$campus'";

	
      $result2b = mysql_query($SQL2b, $con);
           
           echo "<table>";
           echo "   <th>" . $campus . ": Spaces</th><th>" . $campus . ": Disabled Spaces</th>";
           while ( $db_field = mysql_fetch_assoc($result2b) ) {
           echo "<tr><td><center>" . $db_field['Number_of_spaces'] . "</center></td><td><center>" . $db_field['Number_of_disabled_spaces'] . "</center></td></tr>";
     
   echo "</table>";
}
}  
	
    break;
  case "q3":
    
    /* YOUR CODE GOES HERE */
	        $carpark = $_GET['carpark'];
			$time2 = $_GET['time2'];
			
			echo "<br>";
			
	$SQL3 = ("SELECT Car_Park_Name, ROUND(SUM(time_$time2)/count(time_$time2)) AS average FROM creche ORDER BY time_$time2");
	$result3 = mysql_query($SQL3, $con);
	
	$int=intval($time2);
	
	if ($int < 12)
	{
  	 	
    	echo "<table>";
    	echo "   <th>Carpark</th><th>Average Occupancy at $time2:00am</th>";
    	while ( $db_field = mysql_fetch_assoc($result3) ) {
        echo "<tr><td>" . $db_field['Car_Park_Name'] . "<td><center>" . $db_field['average']."%</center></td></tr>";
      }
    echo "</table>"; 
	}
	else 
	{
	  		
    	echo "<table>";
    	echo "   <th>Carpark</th><th>Average Occupancy at $time2:00pm</th>";
    	while ( $db_field = mysql_fetch_assoc($result3) ) {
        echo "<tr><td>" . $db_field['Car_Park_Name'] . "<td><center>" . $db_field['average']."% </center></td></tr>";
      }
    echo "</table>"; 
	}
	
	
    break;
  case "q4":
    
    /* YOUR CODE GOES HERE */
	$time = $_GET['time'];
	
		$SQL4 = ("SELECT Campus, Name From General_Data WHERE Opening_hour <= '$time' AND Closing_hour > '$time'");
	$result4 = mysql_query($SQL4, $con);
	
  	 	
    	echo "<table>";
    	echo "   <th>Campus</th><th>Carparks Open</th>";
    	while ( $db_field = mysql_fetch_assoc($result4) ) {
        echo "<tr><td><center>" . $db_field['Campus'] . "</center><td><center>" . $db_field['Name']. "</center></td></tr>";
      }
    echo "</table>";
    break;
}



 ?>
 <br>
 <br>
 <br>
 <img src = "http://www.martingmolony.com/wp-content/uploads/2015/11/dcu-entrance.jpg">
 <h3>Thank you for using our App!!</h3>
</center>


  </body>
 </html>
