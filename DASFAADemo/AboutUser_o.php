<!doctype html>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="dist/jquery.timeliny.css" rel="stylesheet" type="text/css">

<title>CLTR Entity Details</title>
<link href="AboutPageAssets/styles/aboutPageStyle.css" rel="stylesheet" type="text/css">

<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
<script type="text/javascript" src="./vis.min.js"></script>
    <link href="./vis.min.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
        #mynetwork {
            width: 500px;
            height: 400px;
            border: 1px solid lightgray;
        }
		#table, td {
			border: 1px solid black;
		}
    </style>
<link href='https://fonts.googleapis.com/css?family=Playfair+Display:700,900|Fira+Sans:400,400italic' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
</head>

<body>
<!-- Header content -->
<header>
  <div class="profileLogo"> 
    <!-- Profile logo. Add a img tag in place of <span>. -->
    <p class="logoPlaceholder"><img src="LogoCLTR.PNG" width="150" height="100" alt="sample logo"></p>
  </div>
  <!-- Identity details -->
  <section class="profileHeader">
    <h1>Meng Jiang</h1>
    <h3>Postdoctoral Research Associate at University of Illinois at Urbana-Champaign</h3>
    <aside class="socialNetworkNavBar">
    <div class="socialNetworkNav"> 
      <!-- Add a Anchor tag with nested img tag here --> 
      <img src="LinkedIn_logo.png" alt="sample" width="50" height="50"> </div>
    <div class="socialNetworkNav"> 
      <!-- Add a Anchor tag with nested img tag here --> 
      <img src="Facebook_logo.png"  alt="sample" width="50" height="50"> </div>
    <div class="socialNetworkNav"> 
      <!-- Add a Anchor tag with nested img tag here --> 
      <img src="Dblp_logo.png"  alt="sample" width="50" height="50"> </div>
    <div class="socialNetworkNav"> 
      <!-- Add a Anchor tag with nested img tag here --> 
      <img src="Home_logo.png"  alt="sample" width="50" height="50"> </div>
  </aside>
  </section>
  <!-- Links to Social network accounts -->
</header>
<table align="center" border="0" width="1200">
  <tbody>
  <tr>
	      <td valign="middle" align="center" width="500"><div id="mynetwork"></div>

<script type="text/javascript">
    // create an array with nodes
	<?php 
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dasfaa_demo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	$sql = "SELECT * FROM relational_info WHERE Source_CID = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo "var nodes = new vis.DataSet([";
	echo "{id: 1, label: 'Alon Y. Halevy'}";
    while($row = $result->fetch_assoc()) {
		echo ",{id: ".$row["Sink_CID"].", label: '".$row["Sink_Name"]."'}";
    }
	
	echo "]);";
} else {
    echo "0 results";
}
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
	echo "var edges = new vis.DataSet([";
    while($row = $result->fetch_assoc()) {
		echo "{from: 1, to: ".$row["Sink_CID"]."},";
    }
	
	echo "]);";
} else {
    echo "0 results";
}
	//$conn->close();
?>
    // create an array with edges


    // create a network
    var container = document.getElementById('mynetwork');

    // provide the data in the vis format
    var data = {
        nodes: nodes,
        edges: edges
    };
    var options = {};

    // initialize your network!
    var network = new vis.Network(container, data, options);
</script>
</td>
<td style="vertical-align:top" align="center" width="700">

<!-- content -->
<section class="cd-horizontal-timeline">
	<div class="timeline">
		<div class="events-wrapper">
			<div class="events">
				<ol>
					<?php 
						$sql = "SELECT * FROM record_table WHERE PID = 53 ORDER BY YEAR";
						$result = $conn->query($sql);
						echo '<li><a href="#0" data-date="01/01/1997" class="selected">1997</a></li>';
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								echo '<li><a href="#0" data-date="01/01/'.$row["YEAR"].'" >'.$row["YEAR"].'</a></li>';
							}
						} else {
							echo "0 results";
						}
					?>
				</ol>

				<span class="filling-line" aria-hidden="true"></span>
			</div> <!-- .events -->
		</div> <!-- .events-wrapper -->
			
		<ul class="cd-timeline-navigation">
			<li><a href="#0" class="prev inactive">Prev</a></li>
			<li><a href="#0" class="next">Next</a></li>
		</ul> <!-- .cd-timeline-navigation -->
	</div> <!-- .timeline -->

	<div class="events-content">
		<ol>
			<?php 
				$sql = "SELECT * FROM record_table WHERE PID = 53 ORDER BY YEAR";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo '<li data-date="01/01/'.$row["YEAR"].'">';
						echo '<h4>'.$row["JOBTITLE"].'</h4>';
						echo '<em>'.$row["COMPANY"].'</em>';
						$tok = strtok($row["DESCRIPTION"], ";");
						echo '<p>';
						while ($tok !== false) {
							echo $tok;
							$tok = strtok(";");
						}
						echo '</p>';
						echo '</li>';
					}
				} else {
					echo "0 results";
				}
				$conn->close();
			?>
		</ol>
	</div> <!-- .events-content -->
</section>
	
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
	</td>
	</tr>
  </tbody>
</table>
</body>
</html>
