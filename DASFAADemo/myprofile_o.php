
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

    $db = new PDO("mysql:host=localhost;dbname=MyDemo;port:3306",$username, $password);
    $entity_results = $db->query("SELECT * FROM `entity_table` WHERE eid = $SEARCH_EID");
    $entity_row = $entity_results->fetch(PDO::FETCH_ASSOC);
    $entity_name = $entity_row['name'];
    $entity_label = $entity_row['affiliation'].' ('.$entity_row['title'].')';
    $entity_dblp = $entity_row['dblp'];
    $entity_linkenid = $entity_row['linkedin'];
    $entity_homepage = $entity_row['homepage'];
    $entity_facebook = $entity_row['facebook'];

    $relation_results = $db->query("SELECT name1, name2, score, notes FROM `relation_score` WHERE eid1 = $SEARCH_EID or eid2 = $SEARCH_EID");
    $relation_row = $relation_results->fetch(PDO::FETCH_ASSOC);

    $results = $db->query("SELECT * FROM `record_table` WHERE eid = $SEARCH_EID ORDER BY year ASC");
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
      


      $summary_by_year = array();
      $paper_by_year = array();
      while($row = $results->fetch(PDO::FETCH_ASSOC)){
        $paper_summary = '';
        $summary = '';
        $YEAR = $row['year'];
        // echo $YEAR,'YEAR';
        $affiliation = $row['affiliation'];
        $title = $row['title'];
        $paper = $row['paper'];
        if(strpos($affiliation,';') == true){
            $summary_affiliation = '';
            $affiliation_split = explode(";", $affiliation);
            if(strpos($title,';') == true){
                $summary_title='';
                $title_split = explode(";", $title);
                for ($counter = 0; $counter<count($affiliation_split); $counter++){
                  // echo $affiliation_split[$counter],' (',$title_split[$counter],') <br>';
                  $summary = $summary.$affiliation_split[$counter].' ('.$title_split[$counter].')';
                }
            } 
        }
        else {
          $summary=$summary.$affiliation.' ('.$title.')';
        }
        $summary_by_year[$YEAR] = $summary;

        if(strpos($paper,';') == true){
            $paper_split = explode(";", $paper);        
            for($p_counter = 0; $p_counter<count($paper_split); $p_counter++){
                  // echo $affiliation_split[$counter],' (',$title_split[$counter],') <br>';
                  $paper_summary = $paper_summary.$paper_split[$p_counter].' <br>';
            }
            $paper_by_year[$YEAR] = $paper_summary;
        } else{
          $paper_by_year[$YEAR] = $paper;
        }
        
      }
   
      
      for($year_index = 1990;$year_index<2017;$year_index++){
        if(!array_key_exists($year_index,$summary_by_year)){
          $summary_by_year[$year_index] = '';
        }
        if(!array_key_exists($year_index, $paper_by_year)){
          $paper_by_year[$year_index] = '';
        }
        // echo "s",$year_index,$paper_by_year[$year_index],'<br>',$summary_by_year[$year_index]; 
      }


?>




<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="mydist/jquery.timeliny.css" rel="stylesheet" type="text/css">

<title>CLTR Entity Details</title>
<link href="myAboutPageAssets/styles/aboutPageStyle.css" rel="stylesheet" type="text/css">

<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>

</head>

<body>
<!-- Header content -->
<header>
 <table width="1000" border="0" align="center">
  <tbody>
    <tr>
      <td>
  <div class="profileLogo"> 
    <!-- Profile logo. Add a img tag in place of <span>. -->
    <a href="https://google.com">
    <p class="logoPlaceholder"><img src="myimg/LogoCLTR.PNG" width="150" height="100" alt="sample logo"></a></p>
  </div>
  <!-- Identity details -->
  <section class="profileHeader">
    <h1><?php echo $entity_name;?></h1>
    <h3><?php echo $entity_label;?></h3>
    <aside class="socialNetworkNavBar">
    
    <!-- Linkedin  -->
        <!-- Add a Anchor tag with nested img tag here -->
   

    <?php 
    if($entity_facebook !==" "){
      // echo $entity_facebook;
      echo ' <div class="socialNetworkNav"> <a href="' . $entity_facebook . '"><img  src="myimg/Facebook_logo.png" alt="sample" width="50" height="50"></a></div>';
    } 
    if($entity_dblp !==" "){
      // echo $entity_dblp;
      echo '<div class="socialNetworkNav"><a href="' . $entity_dblp . '"><img src="myimg/Dblp_logo.png"  alt="sample" width="50" height="50"></a></div>';
    } 
    if($entity_linkenid !==" "){
      echo '
            <div class="socialNetworkNav"> 
            <a href="' . $entity_linkenid . '">
            <img src="myimg/LinkedIn_logo.png"  alt="sample" width="50" height="50"> </a></div>';
    } 
    if($entity_homepage !==" "){
     echo '
            <div class="socialNetworkNav"> 
            <a href="' . $entity_homepage . '"><img src="myimg/Home_logo.png"  alt="sample" width="50" height="50"> </a></div>';
    }

    ?>
  </aside>
  </section>
  <!-- Links to Social network accounts -->
</td>
      <td><img src="myimg/FocusedGraph.jpg"  alt="sample" width="360" height="300"></td>
    </tr>
  </tbody>
</table>
</header>
<!-- content -->
<section class="mainContent"> 
  <!-- Contact details -->
  <section class="section1">
    <h2 class="sectionTitle">Timeline</h2>
    <hr class="sectionTitleRule">
    <hr class="sectionTitleRule2">
    <div id="example"> 
    <div data-year="1990"><?php echo  $summary_by_year[1990];?></div>
    <div data-year="1991"><?php echo  $summary_by_year[1991];?></div>
    <div data-year="1992"><?php echo  $summary_by_year[1992];?></div>
    <div data-year="1993"><?php echo  $summary_by_year[1993];?></div>
    <div data-year="1994"><?php echo  $summary_by_year[1994];?></div>
    <div data-year="1995"><?php echo  $summary_by_year[1995];?></div>
    <div data-year="1996"><?php echo  $summary_by_year[1996];?></div>
    <div data-year="1997"><?php echo  $summary_by_year[1997];?></div>
    <div data-year="1998"><?php echo  $summary_by_year[1998];?></div>
    <div data-year="1999"><?php echo  $summary_by_year[1999];?></div>  
    <div data-year="2000"><?php echo  $summary_by_year[2000];?></div>
    <div data-year="2001"><?php echo  $summary_by_year[2001];?></div>
    <div data-year="2002"><?php echo  $summary_by_year[2002];?></div>
    <div data-year="2003"><?php echo  $summary_by_year[2003];?></div>
    <div data-year="2004"><?php echo  $summary_by_year[2004];?></div>
    <div data-year="2005"><?php echo  $summary_by_year[2005];?></div>
    <div data-year="2006"><?php echo  $summary_by_year[2006];?></div>
    <div data-year="2007"><?php echo  $summary_by_year[2007];?></div>
    <div data-year="2008"><?php echo  $summary_by_year[2008];?></div>
    <div data-year="2009"><?php echo  $summary_by_year[2009];?></div>
    <div data-year="2010"><?php echo  $summary_by_year[2010];?></div>
    <div data-year="2011"><?php echo  $summary_by_year[2011];?></div>
    <div data-year="2012"><?php echo  $summary_by_year[2012];?></div>
    <div data-year="2013"><?php echo  $summary_by_year[2013];?></div>
    <div data-year="2014"><?php echo  $summary_by_year[2014];?></div>
    <div data-year="2015"><?php echo  $summary_by_year[2015];?></div>
    <div data-year="2016" class="active"><?php echo $summary_by_year[2016];?></div>
</div>


<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="mydist/jquery.timeliny.js"></script>
<script>
$('#example').timeliny();
</script>
  </section>
  <!-- Previous experience details -->
  <section class="section2">
    <h2 class="sectionTitle">Details - 2016</h2>
    <hr class="sectionTitleRule">
    <hr class="sectionTitleRule2">
    <!-- First Title & company details  -->
    <article class="section2Content">
         <h2 class="sectionContentTitle">Affiliations</h2>
      <p class="sectionContent"> 
      <ul>
      	<li>Postdoctoral Researcher - University of Illinois at Urbana-Champaign</li>
		  <li>Visiting Researcher - University of Maryland</li>
      </ul>
      </p>
    <h2 class="sectionContentTitle">Relations</h2>
      <p class="sectionContent"> 
      <ul>
      	<li>Related People : <a href="">Jiawei Han</a>, <a href="">V.S. Subrahmanian</a></li>
		  <li>Mentees : <a href="">Yuan N J</a>, <a href="">Beutel A</a></li>
      </ul>   
      </p>
    </article>
    <article class="section2Content">
      <h2 class="sectionContentTitle">Activities</h2>
      <p class="sectionContent"> <ul>
      	<li><a href="">Jiang M</a>, <a href="">Cui P</a>, <a href="">Beutel A</a>,. Catching synchronized behaviors in large networks: A graph mining approach. ACM Transactions on Knowledge Discovery from Data (TKDD), 2016.</li>
  		<li><a href="">Jiang M</a>, <a href="">Faloutsos C</a>, <a href="">Han J</a>. CatchTartan: Representing and Summarizing Dynamic Multicontextual Behaviors.</li>
  		<li><a href="">Shang J</a>, <a href="">Jiang M</a>, <a href="">Tong W</a>,. DPPred: An Effective Prediction Framework with Concise Discriminative Patterns. arXiv preprint 2016.</li>
     	<li><a href="">Jiang M</a>, <a href="">Cui P</a>, <a href="">Beutel A</a>,. Inferring lockstep behavior from connectivity pattern in large graphs. Knowledge and Information Systems, 2016: 1-30.</li>
     	<li><a href="">Jiang M</a>, <a href="">Cui P</a>, <a href="">Yuan N J</a>,. Little Is Much: Bridging Cross-Platform Behaviors through Overlapped Crowds. Thirtieth AAAI Conference on Artificial Intelligence. 2016.</li>
      </ul> </p>
    </article>
    <!-- Second Title & company details  -->
    
    <!-- Replicate the above Div block to add more title and company details --> 
  </section>
  <!-- Links to expore your past projects and download your CV --></section>
</body>
</html>
<?php 
?>
