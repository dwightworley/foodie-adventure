<!--********************************************
* Foodie Adventure is developed and maintained *
* by Dwight R. Worley. Please request          *
* permission for reuse.                        *
************************************************
-->

<?php
session_start();
require_once("[ADD YOUR CONNECTION FILE HERE]");

if(isset($_SESSION['counties'])) { //CHECKS TO SEE IF COUNTIES ARE ALREADY SET IN THE CASE A USER RELOADS THE PAGE OR SELECTS THE 'CHOOSE AGAIN' BUTTON

$sessionstring = $_SESSION['counties'];
$meal = $_SESSION['meal'];

if ($meal = 'lunch') {

/*CREATES QUERY WHERE A RESTAURANT MEETING THE USER CRITERIA IS CHOSEN RANDOMLY. THE QUERY ACTUALLY SELECTS ALL RESTAURANTS THAT MEET THE CRITERIA, HOWEVER, RAND() ORDERS THE RESULTS RANDOMLY AND LIMIT 1 ONLY RETURNS ONE RESULT SO YOU END UP WITH A RANDOM SELECTION ON EACH PAGE LOAD. A GOOD ADDITION MIGHT BE AN ARRAY THAT HOLDS CHOICES PRESENTED TO THE USER SINCE A RANDOM CHOICE COULD MEAN THE USER SEES A RESULT MULTIPLE TIMES ON RELOADS */

$sql = "SELECT name, address, cuisine, website, lunch, dinner, menu, transportation, phone, coordinates, county FROM restaurantsfall2014 WHERE lunch = 'Yes' AND county IN $sessionstring ORDER BY RAND() LIMIT 1";
	$result = $con->query($sql);
	$row = $result->fetch_row();
	
	$name = $row[0];
	$newname = str_replace("&amp;", "%26", $name);
	$address = $row[1];
	$cuisine = $row[2];
	$website = $row[3];
	$lunch = $row[4];
	$dinner = $row[5];
	$menu = $row[6];
	$transportation = $row[7];
	$phone = $row[8];
	$coordinates = $row[9];
	$county = $row[10];


} // LUNCH SESSION

else {

$sql = "SELECT name, address, cuisine, website, lunch, dinner, menu, transportation, phone, coordinates, county FROM restaurantsfall2014 WHERE dinner = 'Yes' AND county IN $sessionstring ORDER BY RAND() LIMIT 1";
	$result = $con->query($sql);
	$row = $result->fetch_row();
	
	$name = $row[0];
	$newname = str_replace("&amp;", "%26", $name);
	$address = $row[1];
	$cuisine = $row[2];
	$website = $row[3];
	$lunch = $row[4];
	$dinner = $row[5];
	$menu = $row[6];
	$transportation = $row[7];
	$phone = $row[8];
	$coordinates = $row[9];
	$county = $row[10];


} // END OF SESSION DINNER


} //END OF SESSION COUNTIES



else {	 //IF COUNTIES ARE NOT SET, I.E. THIS IS NOT A PAGE RELOAD, RUN THIS
	
if ($_POST['lunch'] || $_POST['dinner']) { //CHECKS IF EITHER BUTTON WAS PRESSED

$counties = array_values($_POST['county']); //PULL COUNTY NAMES INTO LOCAL ARRAY
$count = count($counties); //GET NUMBER OF COUNTIES IN ARRAY

if ($_POST['lunch']) {
$_SESSION['meal'] = 'lunch';
}
else {
$_SESSION['meal'] = 'dinner';
} 

$mycounties = array();
for ($x=0; $x<$count; $x++) {  
  
  $mycounties[$x] = $counties[$x];
  
}

if (!$counties) { //IF THE USER CLICKS A BUTTON WITHOUT CHOOSING ANY COUNTIES THE COUNTY STRING IS SET TO THIS AND SAVED IN SESSION
$string = "('Westchester','Rockland','Putnam','Dutchess','Ulster', 'Orange')";
$_SESSION["counties"] = $string;
}

//SETS THE STRING VARIABLE BASED ON THE NUMBER OF COUNTIES SELECTED

if ($count == 1) {
$countyone = $mycounties[0];
if ($countyone == "All") { //IF USER SELECTS 'ALL' BY ITSELF OR WITH ONE OR MORE COUNTIES, ALL COUNTIES ARE ADDED
$string = "('Westchester','Rockland','Putnam','Dutchess','Ulster', 'Orange')";
$_SESSION["counties"] = $string;

}

else {

$string = "('$countyone')";
filter_var($string, FILTER_SANITIZE_STRING); //SANITIZE USER INPUT
$_SESSION["counties"] = $string;

}

}

if ($count == 2) {
$countyone = $mycounties[0];
$countytwo = $mycounties[1];
if ($countyone == "All") {
$string = "('Westchester','Rockland','Putnam','Dutchess','Ulster', 'Orange')";
$_SESSION["counties"] = $string;
}

else {

$string = "('$countyone', '$countytwo')";
filter_var($string, FILTER_SANITIZE_STRING);
$_SESSION["counties"] = $string;

}

}

if ($count == 3) {
$countyone = $mycounties[0];
$countytwo = $mycounties[1];
$countythree = $mycounties[2];
if ($countyone == "All") {
$string = "('Westchester','Rockland','Putnam','Dutchess','Ulster', 'Orange')";
$_SESSION["counties"] = $string;
}

else {

$string = "('$countyone', '$countytwo','$countythree')";
filter_var($string, FILTER_SANITIZE_STRING);
$_SESSION["counties"] = $string;

}

}

if ($count == 4) {
$countyone = $mycounties[0];
$countytwo = $mycounties[1];
$countythree = $mycounties[2];
$countyfour = $mycounties[3];
if ($countyone == "All") {
$string = "('Westchester','Rockland','Putnam','Dutchess','Ulster', 'Orange')";
$_SESSION["counties"] = $string;
}

else {

$string = "('$countyone', '$countytwo','$countythree','$countyfour')";
filter_var($string, FILTER_SANITIZE_STRING);
$_SESSION["counties"] = $string;
}

}

if ($count == 5) {
$countyone = $mycounties[0];
$countytwo = $mycounties[1];
$countythree = $mycounties[2];
$countyfour = $mycounties[3];
$countyfive = $mycounties[4];
if ($countyone == "All") {
$string = "('Westchester','Rockland','Putnam','Dutchess','Ulster', 'Orange')";
$_SESSION["counties"] = $string;
}

else {

$string = "('$countyone', '$countytwo','$countythree','$countyfour','$countyfive')";
filter_var($string, FILTER_SANITIZE_STRING);
$_SESSION["counties"] = $string;


}

}

if ($count == 6) {
$countyone = $mycounties[0];
$countytwo = $mycounties[1];
$countythree = $mycounties[2];
$countyfour = $mycounties[3];
$countyfive = $mycounties[4];
$countysix = $mycounties[5];
if ($countyone == "All") {
$string = "('Westchester','Rockland','Putnam','Dutchess','Ulster', 'Orange')";
$_SESSION["counties"] = $string;
}

else {

$string = "('$countyone', '$countytwo','$countythree','$countyfour','$countyfive', '$countysix')";
filter_var($string, FILTER_SANITIZE_STRING);
$_SESSION["counties"] = $string;
}


}

if ($count == 7) {

$string = "('Westchester','Rockland','Putnam','Dutchess','Ulster', 'Orange')";
$_SESSION["counties"] = $string;
}
		
	
	if ($_POST['lunch']) {
	
	$meal = 'lunch';
	
	$sql = "SELECT name, address, cuisine, website, lunch, dinner, menu, transportation, phone, coordinates, county FROM restaurantsfall2014 WHERE lunch = 'Yes' AND county IN $string ORDER BY RAND() LIMIT 1";
	$result = $con->query($sql);
	$row = $result->fetch_row();
	
	$name = $row[0];
	$newname = str_replace("&amp;", "%26", $name);
	$address = $row[1];
	$cuisine = $row[2];
	$website = $row[3];
	$lunch = $row[4];
	$dinner = $row[5];
	$menu = $row[6];
	$transportation = $row[7];
	$phone = $row[8];
	$coordinates = $row[9];
	$county = $row[10];
	
	}
	
	
	 if ($_POST['dinner']) {
	
	$meal = 'dinner';
	
	$sql = "SELECT name, address, cuisine, website, lunch, dinner, menu, transportation, phone, coordinates, county FROM restaurantsfall2014 WHERE dinner = 'Yes' AND county IN $string ORDER BY RAND() LIMIT 1";
	$result = $con->query($sql);
	$row = $result->fetch_row();
	
	$name = $row[0];
	$newname = str_replace("&amp;", "%26", $name);
	$address = $row[1];
	$cuisine = $row[2];
	$website = $row[3];
	$lunch = $row[4];
	$dinner = $row[5];
	$menu = $row[6];
	$transportation = $row[7];
	$phone = $row[8];
	$coordinates = $row[9];
	$county = $row[10];
	
	} 
}

else {

 header('location: http://data.lohud.com/foodieadventure');

}	
	
	}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<title>Foodie Adventure</title>
		<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0" />

    <!-- CSS --> 
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<link rel="stylesheet" href="../css/social-likes_flat.css">

<!-- SCRIPTS --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="../js/social-likes.min.js"></script>

        <style type="text/css">
		html { height: 100% }
		body { height: 50%;  }
		#map-canvas { height: 100%; margin-bottom:25px;}
            
          h1 { font-size: 24px; }
            h2 { font-size: 18px; }
			#main { padding-right: 15px; }
            
        </style>

        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript">
        //<![CDATA[
         
        var map;
       
        var center = new google.maps.LatLng(<?php echo $coordinates ?>);
		
         
        function init() {

        //TURNS OFF POIs ON MAP
		var styles = [
 		 {
   		 "featureType": "poi",
    		 "stylers": [
      			{ "visibility": "off" }
  			  ]
 			 }
			]


		var styledMap = new google.maps.StyledMapType(styles,
    			{name: "Styled Map"});
             
            var mapOptions = {
                zoom:15,
                center: center,
		   mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
            }
	};

				
             
            map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

	 	map.mapTypes.set('map_style', styledMap);
		  map.setMapTypeId('map_style');

	

			<!-- CONTENT FOR THE INFOWINDOW -->
			var contentString = '<div id="content">'+
					'<div id="siteNotice">'+
					'</div>'+
					'<h5 id="firstHeading" class="firstHeading"><?php echo $name ?></h5>'+
					'<b>Tweet it:</b> <a href="https://twitter.com/share?url=http://data.lohud.com/foodieadventure&text=I am headed to <?php echo $meal ?> at <?php echo $newname ?> in <?php echo $county ?> for %23HVRW! It&#39;s my @lohud %23Foodie Adventure! @ValleyTable" target="_blank"><img src="../images/32-twitter.png" width="20" title="Tweet your dining plans"></a>'+														'<div id="bodyContent">'+
					'<b>Cuisine: </b><?php echo $cuisine ?><br> ' +
					'<b>Address: </b><?php echo $address ?><br>' +
					'<b>Phone: </b><a href="tel:<?php echo $phone ?>"><?php echo $phone ?></a><br> ' +
					'<b>Lunch? </b> <?php echo $lunch ?> | <b>Dinner? </b> <?php echo $dinner ?> <br> ' +
					'<?php if(empty($menu)) { echo "";} else { echo "<b>Menu: </b><a href=$menu target=_blank>Tap for PDF</a><br>" ;} ?>' +
					'<b>Near train:</b> <?php echo $transportation ?><br> ' +
					'<?php if(empty($website)) { echo "";} else { echo "<b>Web: </b><a href=$website target=_blank>$website</a><br>" ;} ?>' +									
					'</div>'+
					'</div>';
			
			<!-- CREATE THE INFOWINDOW AND PASS THE CONTENT TO IT -->
			var infowindow = new google.maps.InfoWindow({
			content: contentString,
			maxWidth: 185
			});
			
			<!-- CREATE AND POSITION THE MARKER -->
            var marker = new google.maps.Marker({
			map: map, 
            position: center,
			title: 'Restaurant Week Selection'
            				
            });
			
			<!-- OPEN INFOWINDOW AND PAN MAP -->
			infowindow.open(map,marker);
			map.panBy(0, -140);

			google.maps.event.addListener(marker, 'click', function() {
			infowindow.open(map,marker);
});
	
			
        }
		
		google.maps.event.addDomListener(window, 'load', initialize);
        //]]>
        </script>
<style>
#logo {
	margin-top: 5px;
}

#headtext {
	font-style: bold;
	margin-top: 0;
	margin-bottom: 10px;
	font-size: 36px !important;
}

.socialbuttons {
	margin-bottom: 10px;
}

#hvrwpic {
	padding: 5px;
	width: 150px
}

.footertext {
	text-align: center;
}
</style>

    </head>
    <body onload="init();">
		<div class="container">
		<div class="row">
		<div class="col-xs-12">
        <h1 id="headtext">Hudson Valley Foodie Adventure</h1>
		
			<div class="socialbuttons">
			<div class="social-likes" data-url="#" data-title="Step outside of your #comfortfood zone">
			<div class="facebook" title="Share link on Facebook">Facebook</div>
			<div class="twitter" data-via="lohud" title="Share link on Twitter">Twitter</div>
			<div class="plusone" title="Share link on Google+">Google+</div>
</div>
</div>

<div class="pull-right">
<a href="http://www.hudsonvalleyrestaurantweek.com/" target="blank"><img src="../images/hvrw.jpg" id="hvrwpic" class="img-responsive" title="Hudson Valley Restaurant Week"></a>
</div>

		<p>Your Foodie Adventure will take you to <b><?php echo $name ?></b> for <?php echo $meal ?>! Deals may have restrictions so call to confirm.</p>
		<button type="button" value="Reload page" title="Reload page" onClick="location.href='[ENTER LINK TO INDEX FILE IN RESTAURANT FOLDER]'" class="btn btn-primary btn-xs">Choose again</button>
		<button type="button" value="Start over" title="Start over" onclick="location.href='[ENTER LINK TO HOME INDEX FILE]'" class="btn btn-success btn-xs">Start over</button>
		<br><br>
         <section id="main">
            <div id="map_canvas" style="width: 100%; height: 350px;"></div>
        </section>
		<br>

</div>
</div>
</div>
         
    </body>
</html>
