<html>
 <head>
	
<style>

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





.slider {
	width: 1024px;
	margin: 2em auto;
	
}

.slider-wrapper {
	width: 100%;
	height: 400px;
	position: relative;
}

.slide {
	float: left;
	position: absolute;
	width: 100%;
	height: 100%;
	opacity: 0;
	transition: opacity 3s linear;
}

.slider-wrapper > .slide:first-child {
	opacity: 1;
}









/* Style the list */
ul.tab {
    list-style-type: none;
    margin: 10px;
    padding: 15px;
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #1f3d7a;
    text-align: center;
    
}

/* Float the list items side by side */
ul.tab li {float: left;}

/* Style the links inside the list items */
ul.tab li a {
    display: inline-block;
    color: #F0F8FF;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 17px;
    margin-left:50px;
}

/* Change background color of links on hover */
ul.tab li a:hover {background-color: #6666ff;}

/* Create an active/current tablink class */
ul.tab li a:focus, .active {background-color: 6666ff;}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}




</style>

</head> 
<body>

 <script src="function.js"></script>











<ul id="nav">
            <li><a href="index.php"><img src="https://www4.dcu.ie/sites/default/files/DCU-logo-main_1.png" alt="DCU"></a></li>
            <li><a href="index.php" title="return to front page">Home</a></li>
            <li><a href="about.php" title="learn more about us">About</a></li>
            
</ul>

<br>
<br>

<div class="slider" id="main-slider"><!-- outermost container element -->
	<div class="slider-wrapper"><!-- innermost wrapper element -->
		<img src="https://connected.dcu.ie/sites/default/files/styles/homepage_slideshow/public/DCU-0737-Update.jpg?itok=UY_2CedI" alt="First" class="slide" /><!-- slides -->
		<img src="http://www.oldstone.ie/wp-content/uploads/2013/02/St-Patricks-2.jpg" alt="Second" class="slide" />
		<img src="http://www.industryandbusiness.ie/wp-content/uploads/2015/12/innovation-campus-DCU.jpg" alt="Third" class="slide" />
	</div>
</div>	

<center><h1>Welcome</h1>

 <h2>Search for the informtion you require here</h2><center>

 <ul class="tab">
  <li><a href="javascript:void(0)" class="tablinks" onclick="openStatus(event, 'Availability')">Available spaces</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openStatus(event, 'Facility')">Choose by facility</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openStatus(event, 'Time')">Choose by time</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openStatus(event, 'Type')">Types of spaces in carpark</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openStatus(event, 'History')">Occupancy History<a><li>
</ul>

<div id="Availability" class="tabcontent">

<form action="webservice.php" method="get">
<p>Select a carpark:
    <select name="carpark">
      <option value="creche">Creche</option>
      <option value="alpha">DCU Alpha</option>
      <option value="multistory">Multistory</option>
      <option value="invent">Invent</option>
      <option value="stpats">St.Pats</option>
      <option value="library">Library</option>
    </select>
  </p>
   <input name="query" value="carpark" type="hidden"/>
  <input type="submit">
</form>
</div>

<div id="Facility" class="tabcontent">
  <h3>Choose by facility</h3>
<form action="database.php" method="get">
  <p>Select carpark for facility:
    <select name="facility">
      <option value="helix">Helix</option>
      <option value="business">Business</option>
      <option value="main reception">Main reception</option>
      <option value="creche">Creche</option>
      <option value="1838">1838</option>
      <option value="invent">Invent</option>
      <option value="library">Library</option>
      <option value="gardens">Gardens</option>
      <option value="sports grounds">Sports grounds</option>
      <option value="met eireann">Met Eireann</option>
    </select>
  </p>
  <input name="query" value="q1" type="hidden"/>
  <input type="submit">
</form>
  
</div>

<div id="Time" class="tabcontent">
  <h3>Choose by time</h3>
<form action="database.php" method="get">
  <p>Select a time:
    <select name="time">
      <option value="7">7am</option>
      <option value="8">8am</option>
      <option value="9">9am</option>
      <option value="7">7am</option>
      <option value="8">8am</option>
      <option value="9">9am</option>
      <option value="10">10am</option>
      <option value="11">11am</option>
      <option value="12">12pm</option>
      <option value="13">13pm</option>
      <option value="14">14pm</option>
      <option value="15">15pm</option>
      <option value="16">16pm</option>
      <option value="17">17pm</option>
      <option value="18">18pm</option>
      <option value="19">19pm</option>
      <option value="20">20pm</option>
      <option value="21">21pm</option>
</select>
  </p>
   <input name="query" value="q4" type="hidden"/>
  <input type="submit">
</form>

</div>

<div id="Type" class="tabcontent">
  <h3>Types of spaces in carpark</h3>
<form action="database.php" method="get">
  <p>Select campus:
    <select name="campus">
      <option value="Glasnevin">Glasnevin</option>
      <option value="DCU Alpha">DCU Alpha</option>
      <option value="St Pats">St Pats</option>
    </select>
	</p>
   <input name="query" value="q2" type="hidden"/>
   <input type="submit">
</form>
  
</div>

<div id="History" class="tabcontent">
  <h3>Occupancy history at time</h3>
<form action="database.php" method="get">
  <p>Select a carpark:
    <select name="carpark">
      <option value="creche">Creche</option>
      <option value="dcualpha">DCU Alpha</option>
      <option value="multistorey">Multistory</option>
      <option value="invent">Invent</option>
      <option value="stpats">St.Pats</option>
      <option value="library">Library</option>
    </select>
  </p>
  
</form>

<form action="database.php" method="get">
  <p>Select a time:
    <select name="time2">
      <option value="7">7am</option>
      <option value="8">8am</option>
      <option value="9">9am</option>
      <option value="7">7am</option>
      <option value="8">8am</option>
      <option value="9">9am</option>
      <option value="10">10am</option>
      <option value="11">11am</option>
      <option value="12">12pm</option>
      <option value="13">13pm</option>
      <option value="14">14pm</option>
      <option value="15">15pm</option>
      <option value="16">16pm</option>
      <option value="17">17pm</option>
      <option value="18">18pm</option>
      <option value="19">19pm</option>
      <option value="20">20pm</option>
      <option value="21">21pm</option>
</select>
  </p>
   <input name="query" value="q3" type="hidden"/>
  <input type="submit">
</form>
  
</div>





</center>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</body>
</html>
