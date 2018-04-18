<html>
 <head>
  <title>PHP Accessing Web Service</title>
  <style type="text/css">
    table, th, td {
      border: thin solid black;
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
   <h1>Welcome to Park@DCU real-time availability web service</h1>
<?php


    // Call the carpark webservice to get the spaces available for $_GET['carpark']
  /* YOUR CODE GOES HERE */
   if(!empty($_GET['carpark'])) 
   {
    $carpark = $_GET['carpark'];
	
	}
	else 
	{
	exit("No carpark submitted.");
	}

// Process the JSON and check for errors
  /* YOUR CODE GOES HERE */

   $url1="http://suzannelittle.pythonanywhere.com/carpark/$carpark/all";
   $json1 = file_get_contents($url1);
   
   $url2="http://suzannelittle.pythonanywhere.com/carpark/$carpark/disabled";
   $json2 = file_get_contents($url2);  

   $url3="http://suzannelittle.pythonanywhere.com/carpark/$carpark/ordinary";
   $json3 = file_get_contents($url3);   
	   
	   switch (json_last_error()) {
        case JSON_ERROR_NONE:
            echo 'Requested Information';
        break;
        case JSON_ERROR_DEPTH:
            echo ' - Maximum stack depth exceeded';
        break;
        case JSON_ERROR_STATE_MISMATCH:
            echo ' - Underflow or the modes mismatch';
        break;
        case JSON_ERROR_CTRL_CHAR:
            echo ' - Unexpected control character found';
        break;
        case JSON_ERROR_SYNTAX:
            echo ' - Syntax error, malformed JSON';
        break;
        case JSON_ERROR_UTF8:
            echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
        break;
        default:
            echo ' - Unknown error';
        break;
    }
   

  
  if ($url4==="http://suzannelittle.pythonanywhere.com/badpark/$carpark") 
   {
    $json_error = file_get_contents($url4);

    // Get the values for $error_num and $error_msg
    /* YOUR CODE GOES HERE */
	
	   $error_n = json_decode($json_error);
       $error_num=$error_n->error_num;
       $error_m = json_decode($json_error);
       $error_msg=$error_m->error_msg;
	   
	   
	

    echo "<!-- CA377 Error handling -->";
    echo "<p>Error: " . $error_num . " " . $error_msg;
 } 
 else {
    // Get the values for $carpark, $timestamp and $spaces
    /* YOUR CODE GOES HERE */
	
  echo "<h3>All Spaces</h3>";
   
   $time = json_decode($json1);
    $timestamp=$time->timestamp;
   $space = json_decode($json1);
    $spaces=$space->spaces_available;


	
   echo "<!-- CA377 Reading JSON -->";
   echo " <table>";
   echo "   <th>Carpark</th><th>Time</th><th>Space Type</th><th>Spaces</th>";
   echo "   <tr><td>" . $carpark . "</td><td>" . $timestamp . "</td><td>All</td><td>" . $spaces . "</td></tr>";
   echo "</table>";
  
   echo "<h3>Disabled Spaces</h3>";
   
   $time = json_decode($json2);
    $timestamp=$time->timestamp;
   $space = json_decode($json2);
    $spaces=$space->spaces_available;
   

	
   echo "<!-- CA377 Reading JSON -->";
   echo " <table>";
   echo "   <th>Carpark</th><th>Time</th><th>Space Type</th><th>Spaces</th>";
   echo "   <tr><td>" . $carpark . "</td><td>" . $timestamp . "</td><td>Disabled</td><td>" . $spaces . "</td></tr>";
   echo "</table>";
  
  echo "<h3>Ordinary Spaces</h3>";
   
  
     $time = json_decode($json3);
    $timestamp=$time->timestamp;
   $space = json_decode($json3);
    $spaces=$space->spaces_available;


	
   echo "<!-- CA377 Reading JSON -->";
   echo " <table>";
   echo "   <th>Carpark</th><th>Time</th><th>Space Type</th><th>Spaces</th>";
   echo "   <tr><td>" . $carpark . "</td><td>" . $timestamp . "</td><td>Ordinary</td><td>" . $spaces . "</td></tr>";
   echo "</table>";
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
