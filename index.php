<!--********************************************
* Foodie Adventure is developed and maintained *
* by Dwight R. Worley. Please request          *
* permission for reuse.                        *
************************************************
-->

<?php 
session_start(); //STARTS SESSION ON PAGE LOAD
$_SESSION = array(); //CLEARS OUT THE SESSION ARRAY WHEN USER RETURNS TO HOME PAGE FROM INITIAL SEARCH RESULTS
require_once("[ADD YOUR CONNECTION FILE HERE]");

//GET THE COUNTS OF RESTAURANTS BY COUNTY. BE SURE TO CHANGE THE TABLE AND COUNTY NAMES TO SUIT YOUR
//APPLICATION
$sql = "SELECT count(*) FROM restaurantsfall2014 WHERE county = 'Westchester'";
$result = $con->query($sql);
$row = $result->fetch_row();
$westchester = $row[0];

$sql = "SELECT count(county) FROM restaurantsfall2014 WHERE county = 'Rockland'";
$result = $con->query($sql);
$row = $result->fetch_row();
$rockland = $row[0];

$sql = "SELECT count(county) FROM restaurantsfall2014 WHERE county = 'Putnam'";
$result = $con->query($sql);
$row = $result->fetch_row();
$putnam = $row[0];

$sql = "SELECT count(county) FROM restaurantsfall2014 WHERE county = 'Dutchess'";
$result = $con->query($sql);
$row = $result->fetch_row();
$dutchess = $row[0];

$sql = "SELECT count(county) FROM restaurantsfall2014 WHERE county = 'Orange'";
$result = $con->query($sql);
$row = $result->fetch_row();
$orange = $row[0];

$sql = "SELECT count(county) FROM restaurantsfall2014 WHERE county = 'Ulster'";
$result = $con->query($sql);
$row = $result->fetch_row();
$ulster = $row[0];


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<title>Hudson Valley Foodie Adventure</title> 
		<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0" />


<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSS --> 
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="http://cdn.datatables.net/plug-ins/380cb78f450/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
<link href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" rel="stylesheet">
<link rel="stylesheet" href="css/social-likes_flat.css">

<!-- SCRIPTS --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="http://cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js"></script>
<script src="http://cdn.datatables.net/responsive/1.0.2/js/dataTables.responsive.min.js"></script>
<script src="http://cdn.datatables.net/plug-ins/380cb78f450/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script src="js/social-likes.min.js"></script>

<style>



#counties {
margin-top: 5px;
}

#foodform {
background-image: url("images/dinner2.jpg");

}

@media screen and (max-width: 530px) {

#foodform {
background-image: url("images/food2.jpg");

}




}





#logo {
margin-top: 5px;
}

#headtext {
font-weight: bold;
margin-top: 0;
margin-bottom: 10px;
font-size: 36px !important;
}

.socialbuttons {
margin-bottom: 10px;
}

@media screen and (min-width: 1025px) {

#mobilelabel {display: none;}


}

@media screen and (max-width: 1024px) {

#mobiledesktop {display: none; }


}

#hvrwpic {
padding: 5px;
padding-right: 0;
width: 150px
}

.footertext {
text-align: center;
}
</style>

</head>
<body>
<div class="container">
<h1 id="headtext">Hudson Valley Foodie Adventure</h1>
<div class="row-fluid">

<div class="socialbuttons">
<div class="social-likes" data-url="#" data-title="Step outside of your #comfortfood zone">
	<div class="facebook" title="Share link on Facebook">Facebook</div>
	<div class="twitter" data-via="lohud" title="Share link on Twitter">Twitter</div>
	<div class="plusone" title="Share link on Google+">Google+</div>
</div>
</div>
<div class="pull-right">
<a href="http://www.hudsonvalleyrestaurantweek.com/" target="_blank"><img src="images/hvrw.jpg" id="hvrwpic" class="img-responsive" title="Hudson Valley Restaurant Week"></a>
</div>

<p>Foodie Adventure randomly selects restaurants for you to visit during Fall 2014 <a href="http://www.hudsonvalleyrestaurantweek.com/" target="_blank"> Hudson Valley Restaurant Week</a> (Nov. 3-16). It's a fun way to explore the nearly 200 participating eateries that have three-course dinners for $29.95 and lunches for $20.95 (plus drinks, tax and tip). Select counties, choose lunch or dinner, and the app will dive through the various types of cuisine and locations throughout the region, serving up a single choice for you.</p>
<p>You can skip this and just peruse the complete list, but the random pick gives you super foodie cred (at least in our eyes). You never know what you'll get or where you'll be going. Step outside of your comfort food zone and enjoy!</p>


</div>


<br>
<div class="row">
<div class="container">
<form class="form-horizontal" method="post" action="restaurant/" id="foodform">
<fieldset>

<div class="form-group">
  <label class="col-xs-4 control-label" id="mobilelabel" style="color: black">Select County</label>
  <label class="col-xs-4 control-label" id="mobiledesktop" style="color: black">Select County (hold CTRL to select more than one)</label>
  <div class="col-md-4" id="counties">
    <select id="county" name="county[]" class="form-control" multiple> <!-- ARRAY ALLOWS MULTIPLE COUNTIES TO BE SELECTED -->
		<option value="All">All</option>
		<option value="Westchester">Westchester</option>
		<option value="Rockland">Rockland</option>
		<option value="Putnam">Putnam</option>
		<option value="Orange">Orange</option>
		<option value="Dutchess">Dutchess</option>
		<option value="Ulster">Ulster</option>
    </select>
  </div>
</div>


<div class="form-group">
<label class="col-md-4 control-label sr-only">Choose lunch or dinner</label>
  <div class="col-md-8"> 
    <button type="submit" id="lunch" name="lunch" value='lunch' class="btn btn-primary" title="Get me lunch">Get me lunch!</button>
    <button type="submit" id="dinner" name="dinner" value='dinner' class="btn btn-success" title="Get me dinner">Get me dinner!</button>
  </div>
</div>

</fieldset>
</form>
</div>
</div>

<!-- USES DATATABLES.NET CODE IN RESTAURANTS.PHP TO CREATE RESPONSIVE TABLE SHOWING ALL RESTAURANTS IN DATABASE -->
<h3>Restaurant search</h3>
<p>Restaurants in database: <b>Westchester</b> - <?php echo $westchester; ?>, <b>Rockland</b> - <?php echo $rockland; ?>, <b>Putnam</b> - <?php echo $putnam; ?>, <b>Orange</b> - <?php echo $orange; ?>, <b>Dutchess</b> - <?php echo $dutchess; ?>, <b>Ulster</b> - <?php echo $ulster; ?>,  <b>Columbia</b> - 1, <b>Greenwich, Conn.</b> - 1
<p><small>Sort the list or search by name, type of cuisine, town and county. Deals may have restrictions so call restaurants to confirm.</small></p>

<table id="restaurants" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Cuisine</th>
                <th>County</th>
                <th>Menu</th>
				<th>Lunch</th>
                <th>Dinner</th>
				<th>Near train</th>
                <th>Web</th>
				<th>Address</th>
				<th>Phone</th>
				<th>Map</th>
            </tr>
        </thead>
 
        
    </table>
    <br>

<script>
$(document).ready(function() {
	
  //INITIALIZES DATA TABLE
    $('#restaurants').dataTable( {
			
        "processing": true,
        "serverSide": true,
        "ajax": "restaurants.php",
		"columnDefs": [ 
		
		
                { "visible": false, "targets": 9 },
            
		<!-- CHANGING ELEMENTS IN SELECTED COLUMNS TO IMAGE LINKS AND TELEPHONE LINKS -->
		{
    "targets": 3,
    "data": 3,
    "render": function ( data, type, full, meta ) {
	if (data) {
      return '<a href="'+data+' " target="_blank"><img src="/images/pdf.png" width="25" title="Read the menu"></a>';
	  }
	  else {
	  return 'Not available'; <!-- IF NULL SHOW THIS TEXT -->
	  }
    }
  },

  {
    "targets": 7,
    "data": 7,
    "render": function ( data, type, full, meta ) {
		
     if (data) {
      return '<a href="'+data+' " target="_blank"><img src="images/shortcut.png" width="25" title="Visit the website"></a>';
	  }
	  else {
	  return 'Not available'; <!-- IF NULL SHOW THIS TEXT -->
	  }
	  
    }
  },
  
  {
    "targets": 9,
    "data": 9,
    "render": function ( data, type, full, meta ) {
		
     if (data) {
      return '<a href="tel: '+data+' " > ' + data + '</a>';

	  }
	  else {
	  return ''; <!-- IF NULL SHOW THIS TEXT -->
	  }
	  
    }
  }, 
  
  
  {
    "targets": 10,
    "data": 10,
    "render": function ( data, type, full, meta ) {
		
     if (data) {
      return '<a href="'+data+' " target="_blank"><img src="images/map.png" width="25" title="View map"></a>';
	  }
	  else {
	  return ''; <!-- IF NULL SHOW THIS TEXT -->
	  }
	  
    }
  }



  ]
    } );
} );
</script>

</body>
</html>