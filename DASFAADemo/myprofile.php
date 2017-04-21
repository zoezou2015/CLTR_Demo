<!doctype html>

<?php
// page2.php

// session_start();

// echo 'Welcome to page #2<br />';

// echo $_SESSION['eid']; // green
// echo $_SESSION['animal'];   // cat
// echo date('Y m d H:i:s ', $_SESSION['time']);
// echo '<br>';

// You may want to use SID here, like we did in page1.php

    
    $servername = "localhost";
    $username="root"; 
    $password = "";
    
    // Create connection
    $SEARCH_EID = $_GET['id'];
    // echo "show search id: ".$SEARCH_EID;
    // $SEARCH_EID = 53;
    $db2 = new PDO("mysql:host=localhost;dbname=MyDemo;port:3306",$username, $password);
    $entity_results = $db2->query("SELECT * FROM `entity_table` WHERE eid = $SEARCH_EID");
    $entity_row = $entity_results->fetch(PDO::FETCH_ASSOC);
    $entity_name = $entity_row['name'];
    if($entity_row['title'] == ''){
      $entity_label = $entity_row['affiliation'];
    } else {
      $entity_label = $entity_row['affiliation'].' ('.$entity_row['title'].')';
    }
    
    $entity_dblp = $entity_row['dblp'];
    $entity_linkenid = $entity_row['linkedin'];
    $entity_homepage = $entity_row['homepage'];
    $entity_facebook = $entity_row['facebook'];
    
   

    // $relation_results = $db->query("SELECT name1, name2, score, notes FROM `relation_score` WHERE eid1 = $SEARCH_EID or eid2 = $SEARCH_EID");
    // $relation_row = $relation_results->fetch(PDO::FETCH_ASSOC);

    // $results = $db->query("SELECT * FROM `record_table` WHERE eid = $SEARCH_EID ORDER BY year ASC");
    // while($row = $results->fetch(PDO::FETCH_ASSOC)){
    //     $YEAR = $row['year'];
    //     $affiliation = $row['affiliation'];
    //     $title = $row['title'];
    //     if(strpos($affiliation,';') == true){
    //         $affiliation_split = explode(";", $affiliation);
    //         if(strpos($title,';') == true){
    //             $title_split = explode(";", $title);
    //             for ($counter = 0; $counter<count($affiliation_split); $counter++){
    //               // echo $affiliation_split[$counter],' (',$title_split[$counter],') <br>';
    //             }
    //         } 
    //     }
    // }
    // $results_year_max = $db->query("SELECT MAX(year) FROM `record_table` WHERE eid = 1");
    // $results_year_min = $db->query("SELECT MIN(year) FROM `record_table` WHERE eid = 1");
    // $max_year_row = $results_year_max->fetch(PDO::FETCH_ASSOC);
    // $min_year_row = $results_year_min->fetch(PDO::FETCH_ASSOC);

    // $NAME = $_SESSION['name'];
    // $MAX_YEAR= $max_year_row['MAX(year)'];
    // $MIN_YEAR = $min_year_row['MIN(year)'];
    

        
        
        
        
    
        
      //   while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
      //     $eid = $row['eid'];
      //     $name = $row['name'];
      //     $affiliation = $row['affiliation'];
      //     $title = $row['title'];
      //     if($title == ''){
      //     $_SESSION['eid'] = $eid;
      //     $_SESSION['']   = 'cat';
      //     $_SESSION['time']     = time();
        
      // } 
      


      // $summary_by_year = array();
      // $paper_by_year = array();
      // while($row = $results->fetch(PDO::FETCH_ASSOC)){
      //   $paper_summary = '';
      //   $summary = '';
      //   $YEAR = $row['year'];
      //   // echo $YEAR,'YEAR';
      //   $affiliation = $row['affiliation'];
      //   $title = $row['title'];
      //   $paper = $row['paper'];
      //   if(strpos($affiliation,';') == true){
      //       $summary_affiliation = '';
      //       $affiliation_split = explode(";", $affiliation);
      //       if(strpos($title,';') == true){
      //           $summary_title='';
      //           $title_split = explode(";", $title);
      //           for ($counter = 0; $counter<count($affiliation_split); $counter++){
      //             // echo $affiliation_split[$counter],' (',$title_split[$counter],') <br>';
      //             $summary = $summary.$affiliation_split[$counter].' ('.$title_split[$counter].')';
      //           }
      //       } 
      //   }
      //   else {
      //     $summary=$summary.$affiliation.' ('.$title.')';
      //   }
      //   $summary_by_year[$YEAR] = $summary;

      //   if(strpos($paper,';') == true){
      //       $paper_split = explode(";", $paper);        
      //       for($p_counter = 0; $p_counter<count($paper_split); $p_counter++){
      //             // echo $affiliation_split[$counter],' (',$title_split[$counter],') <br>';
      //             $paper_summary = $paper_summary.$paper_split[$p_counter].' <br>';
      //       }
      //       $paper_by_year[$YEAR] = $paper_summary;
      //   } else{
      //     $paper_by_year[$YEAR] = $paper;
      //   }
        
      // }
   
      
      // for($year_index = 1990;$year_index<2017;$year_index++){
      //   if(!array_key_exists($year_index,$summary_by_year)){
      //     $summary_by_year[$year_index] = '';
      //   }
      //   if(!array_key_exists($year_index, $paper_by_year)){
      //     $paper_by_year[$year_index] = '';
      //   }
      //   // echo "s",$year_index,$paper_by_year[$year_index],'<br>',$summary_by_year[$year_index]; 
      // }


?>



<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="mydist/jquery.timeliny.css" rel="stylesheet" type="text/css">

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

	<link rel="stylesheet" href="mycss/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="mycss/style.css"> <!-- Resource style -->
	<script src="myjs/modernizr.js"></script> <!-- Modernizr -->
</head>

<body>
<!-- Header content -->
<header>
  <div class="profileLogo"> 
    <!-- Profile logo. Add a img tag in place of <span>. -->
    <p class="logoPlaceholder"><img src="myimg/LogoCLTR.PNG" width="150" height="100" alt="sample logo"></p>
  </div>
  <!-- Identity details -->
  <section class="profileHeader">
    <h1><?php echo $entity_name;?></h1>
    <h3><?php echo $entity_label;?></h3>
    <aside class="socialNetworkNavBar">
    <?php 
    if($entity_facebook !==""){
      // echo $entity_facebook;
      echo ' <div class="socialNetworkNav"> <a href="' . $entity_facebook . '"><img  src="myimg/Facebook_logo.png" alt="sample" width="50" height="50"></a></div>';
    } 
    if($entity_dblp !==""){
      // echo $entity_dblp;
      echo '<div class="socialNetworkNav"><a href="' . $entity_dblp . '"><img src="myimg/Dblp_logo.png"  alt="sample" width="50" height="50"></a></div>';
    } 
    if($entity_linkenid !==""){
      echo '
            <div class="socialNetworkNav"> 
            <a href="' . $entity_linkenid . '">
            <img src="myimg/LinkedIn_logo.png"  alt="sample" width="50" height="50"> </a></div>';
    } 
    if($entity_homepage !==""){
     echo '
            <div class="socialNetworkNav"> 
            <a href="' . $entity_homepage . '"><img src="myimg/Home_logo.png"  alt="sample" width="50" height="50"> </a></div>';
     
    } else {
      echo ' ';
    }

    ?>
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

	$connection_results = $db2->query("SELECT * FROM `relation_score` WHERE eid1 = $SEARCH_EID");
 //    $entity_row = $entity_results->fetch(PDO::FETCH_ASSOC);
	// $sql = "SELECT * FROM relation_table WHERE eid1 = SEARCH_EID";
	// $result = $conn->query($sql);
  $row_num = $connection_results->rowCount();
  if ($row_num> 0){
    // output data of each row
	echo "var nodes = new vis.DataSet([";
	echo "{id: ".$SEARCH_EID.", label:'".$entity_name. "'}";
    while($row = $connection_results->fetch(PDO::FETCH_ASSOC)) {
		echo ",{id: ".$row["eid2"].", label: '".$row["name2"]."'}";
    }
	
	echo "]);";
} else {
    echo "0 results";
}
	// $result = $conn->query($sql);
  $connection_results = $db2->query("SELECT * FROM `relation_score` WHERE eid1 = $SEARCH_EID");
  $row_num = $connection_results->rowCount();
	if ($row_num> 0) {
    // output data of each row
	echo "var edges = new vis.DataSet([";
    // $color = "red";
    while($row = $connection_results->fetch(PDO::FETCH_ASSOC)) {
		echo "{from:".$SEARCH_EID.", to: ".$row["eid2"].",color:{color:'".$row['color']."'}},";
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
    //var network = new vis.Network(container, data, options);
    var options = {interaction:{hover:true}};
    var network = new vis.Network(container, data, options);

    network.on("click", function (params) {
        //params.event = "[original event]";
        //document.getElementById('eventSpan').innerHTML = '<h2>Click event:</h2>' + JSON.stringify(params, null, 4);
        if(params.nodes.length==1){
          window.location.href = "http://localhost/DASFAADemo/myprofile.php?id=".concat(params.nodes);
        }
        
    });
</script>
</td>
<td style="vertical-align:top" align="left" width="700">

<!-- content -->
<section class="cd-horizontal-timeline">
	<div class="timeline">
		<div class="events-wrapper">
			<div class="events">
				<ol>
					<?php 

						$results = $db2->query("SELECT * FROM `record_table` WHERE eid = $SEARCH_EID ORDER BY year ASC");    
						// $sql = "SELECT * FROM record_table WHERE eid = 53 ORDER BY year";
						// $result = $conn->query($sql);
						//echo '<li><a href="#0" data-date="01/01/1997" class="selected">1997</a></li>';
						$row_count = $results->rowCount();
            $loop_count = 0;
						if ($row_count  > 1) {
							// output data of each row
							$row = $results->fetch(PDO::FETCH_ASSOC);

							echo '<li><a href="#0" data-date="01/01/'.$row["year"].'" class="selected">'.$row["year"].'</a></li>';
              $next_year=$row["year"]+1;
              while($row = $results->fetch(PDO::FETCH_ASSOC)) {
                  echo '<li><a href="#0" data-date="01/01/'.$row["year"].'" >'.$row["year"].'</a></li>';
                  
              }
              
              
						} elseif ($row_count == 1) {
              $row = $results->fetch(PDO::FETCH_ASSOC);

              echo '<li><a href="#0" data-date="01/01/'.$row["year"].'" class="selected">'.$row["year"].'</a></li>';
              $next_year=$row["year"]+1;

              echo '<li><a href="#0" data-date="01/01/'.$next_year.'" >'.$next_year.'</a></li>';
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
				// $sql = "SELECT * FROM record_table WHERE PID = 53 ORDER BY YEAR";
				// $result = $conn->query($sql);
				
        $results = $db2->query("SELECT * FROM `record_table` WHERE eid = $SEARCH_EID ORDER BY year ASC");    
				$row_count = $results->rowCount();
        if ($row_count  > 1) {
					// output data of each row

					while($row = $results->fetch(PDO::FETCH_ASSOC)) {
						echo '<li data-date="01/01/'.$row["year"].'">';

            $affiliation = $row['affiliation'];
            $title = $row['title'];
            if(strpos($affiliation,';') == true){
              echo  "<font size=6>"."Affiliation"."</font>"; 
                $affiliation_split = explode(";", $affiliation);
                if(strpos($title,';') == true){
                    $title_split = explode(";", $title);
                    for ($counter = 0; $counter<count($affiliation_split); $counter++){
                      echo '<h4>'.$affiliation_split[$counter],' (',$title_split[$counter],') <br>'.'</h4>';
                    }
                } 
            } else{
              echo  "<font size=6>"."Affiliation"."</font>"; 
              if($title == ''){
                 echo '<h4>'.$affiliation,' <br>'.'</h4>';   
              } else {
                echo '<h4>'.$affiliation,' (',$title,') <br>'.'</h4>';  
              } 
            }

          $paper = $row['paper'];

          if(strpos($paper,';') == true){

            echo  "<font size=6>"."Contributions"."</font>"; 
            // echo '<h3> Paper <br>'.'</h3>'; 
            $paper_split = explode(";", $paper);
            for ($counter = 0; $counter<count($paper_split); $counter++){
              echo '<h4>'.$paper_split[$counter],' <br>'.'</h4>';
            }
           
          } else{
            if($paper !== ''){

            echo  "<font size=6>"."Contributions"."</font>"; 

              // echo '<h3> Paper <br>'.'</h3>';       
                echo '<h4>'.$paper,' <br>'.'</h4>';  

            }
             // $next_year=$row["year"]+1;
          }
          
          $relations = $row['relation'];

          if(strpos($relations,',') == true){

            echo  "<font size=6>"."Related Persons"."</font>"; 
            // echo '<h3> Paper <br>'.'</h3>'; 
            $relations_split = explode(",", $relations);
            for ($counter = 0; $counter<count($relations_split); $counter++){
              echo '<h4>'.$relations_split[$counter],' <br>'.'</h4>';
            }     
          } else{
            if($relations !== ''){
            echo  "<font size=6>"."Related Persons"."</font>"; 
              // echo '<h3> Paper <br>'.'</h3>';       
                echo '<h4>'.$relations,' <br>'.'</h4>';  
            } 
          }

	
						echo '</p>';
						echo '</li>';
					}
				} elseif ($row_count == 1) {
            $row = $results->fetch(PDO::FETCH_ASSOC);
           
            echo '<li data-date="01/01/'.$row["year"].'">';

            $affiliation = $row['affiliation'];
            $title = $row['title'];
            if(strpos($affiliation,';') == true){
              echo  "<font size=6>"."Affiliation"."</font>"; 
                $affiliation_split = explode(";", $affiliation);
                if(strpos($title,';') == true){
                    $title_split = explode(";", $title);
                    for ($counter = 0; $counter<count($affiliation_split); $counter++){
                      echo '<h4>'.$affiliation_split[$counter],' (',$title_split[$counter],') <br>'.'</h4>';
                    }
                } 
            } else{
              echo  "<font size=6>"."Affiliation"."</font>"; 
              if($title == ''){
                 echo '<h4>'.$affiliation,' <br>'.'</h4>';   
              } else {
                echo '<h4>'.$affiliation,' (',$title,') <br>'.'</h4>';  
              }
                
            }

          $paper = $row['paper'];

          if(strpos($paper,';') == true){

            echo  "<font size=6>"."Contributions"."</font>"; 
            // echo '<h3> Paper <br>'.'</h3>'; 
            $paper_split = explode(";", $paper);
            for ($counter = 0; $counter<count($paper_split); $counter++){
              echo '<h4>'.$paper_split[$counter],' <br>'.'</h4>';
            }     
          } else{
            if($paper !== ''){
            echo  "<font size=6>"."Contributions"."</font>"; 
              // echo '<h3> Paper <br>'.'</h3>';       
                echo '<h4>'.$paper,' <br>'.'</h4>';  
              }
            } 

          $relations = $row['relation'];

          if(strpos($relations,',') == true){

            echo  "<font size=6>"."Related Persons"."</font>"; 
            // echo '<h3> Paper <br>'.'</h3>'; 
            $relations_split = explode(",", $relations);
            for ($counter = 0; $counter<count($relations_split); $counter++){
              echo '<h4>'.$relations_split[$counter],' <br>'.'</h4>';
            }     
          } else{
            if($relations !== ''){
            echo  "<font size=6>"."Related Persons"."</font>"; 
              // echo '<h3> Paper <br>'.'</h3>';       
                echo '<h4>'.$relations,' <br>'.'</h4>';  
            } 
          }

       

             $next_year = $row["year"]+1;
            echo '<li data-date="01/01/'.$next_year.'">';
             $affiliation = $row['affiliation'];
            $title = $row['title'];
            if(strpos($affiliation,';') == true){
              echo  "<font size=6>"."Affiliation"."</font>"; 
                $affiliation_split = explode(";", $affiliation);
                if(strpos($title,';') == true){
                    $title_split = explode(";", $title);
                    for ($counter = 0; $counter<count($affiliation_split); $counter++){
                      echo '<h4>'.$affiliation_split[$counter],' (',$title_split[$counter],') <br>'.'</h4>';
                    }
                } 
            } else{
              echo  "<font size=6>"."Affiliation"."</font>"; 
              if($title == ''){
                 echo '<h4>'.$affiliation,' <br>'.'</h4>';   
              } else {
                echo '<h4>'.$affiliation,' (',$title,') <br>'.'</h4>';  
              }
                
            }

            


            echo '</p>';
            echo '</li>';
          }        
        else {
					echo "0 results";
				} 
				$db2=null;
			?>
		</ol>
	</div> <!-- .events-content -->
</section>
	
<script src="myjs/jquery-2.1.4.js"></script>
<script src="myjs/jquery.mobile.custom.min.js"></script>
<script src="myjs/main.js"></script> <!-- Resource jQuery -->
	</td>
	</tr>
  </tbody>
</table>
</body>
</html>
