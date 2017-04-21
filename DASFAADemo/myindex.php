

<?php
	//if($_GET['search_key'] == 'Search...' || $_GET['search_key'] == ' ' ){
	//	header('location: myindex.php');
	//}
	//if(isset($_GET['search_key']) && $_GET['search_key'] !== ' '){
		$servername = "localhost";
		$username="root"; 
		$password = "";

		// Create connection

		$db = new PDO("mysql:host=localhost;dbname=MyDemo;port:3306",$username, $password);
		// $SEARCH_VALUE = $_GET['search_key'];
		// $SEARCH_VALUE = "em";
	// 	$resultss = $db->query("SELECT * FROM entity_table WHERE lower(name) LIKE '%{$SEARCH_VALUE}%' OR upper(name) LIKE '%{$SEARCH_VALUE}%' OR name LIKE '%{$SEARCH_VALUE}%' ");

	// 	$row_count = $resultss->rowCount();

 // 		echo $row_count.'<br />';


	// // while ($row = $resultss->fetch(PDO::FETCH_ASSOC)) {
	// 	$row = $resultss->fetch(PDO::FETCH_ASSOC);
	// 	$row = $resultss->fetch(PDO::FETCH_ASSOC);

	// 	// $count = $count+1;
	// 	$eid = $row['eid'];
	// 	$name = $row['name'];
	// 	$affiliation = $row['affiliation'];
	// 	$title = $row['title'];
	// 	echo $eid.':name '.$name.'   aff:  '.$affiliation.'  title:  '.$title.'<br />';
					// echo '<h3><a href="' .'myprofile.php?id='.$eid.'<br />'.$row['eid'].'>'.$row['name'].'</a></h3><p>'.$row['affiliation']. '</p><br />';

					// if($title == ''){
						// echo '<h3><a href="' .'myprofile.php?id='.$eid.'>'.$name.'</a></h3><p>'.$affiliation. '</p><br />';
					// 	echo $name;
					// 	echo $affiliation;
					// } else {    				
					// 	echo '<h3><a href="' .'myprofile.php?id='.$eid.'">'.$name.'</a></h3><p>'.$affiliation.'('.$title.')'. '</p><br />';
					
					// }
				

?>

<html>
<title> Welcome to CLTR </title>


	<head>
		

		
		<center>

			<h1> Welcome to CLTR! </h1>
		
		<img src="myimg/LogoCLTR.png" alt="" style="width:240;height:150;">

		
		<link rel = "stylesheet" href = "mycss/myindex_style.css" />
		<script type="text/javascript">

			function active(){
				var searchBar = document.getElementById('searchBar');

				if (searchBar.value == 'Search...'){
					searchBar.value = ''
					searchBar.placeholder = 'Search...'
				}
			}

			function inactive(){
				var searchBar = document.getElementById('searchBar');

				if (searchBar.value == ''){
					searchBar.value = 'Search...'
					searchBar.placeholder = ''
				}
			}


		</script>
		<style>
			body {
					font-family: arial;
			}

			h3 {
				margin: 20px 0px 0px 0px;
				padding: 0;
			}

			p{
				margin:0;
				padding: 0;
			}

			a{
				margin: #000000;
				text-decoration: underline;
			}

			a: hover{
				color: #000000;	
				text-decoration: none;
			}
			.title_scroll {
 height: 50px;	
 overflow: hidden;
 position: relative;
}
		
		</style>
	</head>
	

	<body>
		<form action="myindex.php" method="GET" id="searchForm" />
			<input type="text" name="search_key" id ="searchBar" placeholder="" value="Search..." maxlength="25" autocomplete="off" onMouseDown ="active();" onBlur="inactive();" /><input type="submit" id="searchBtn" value="Go!"  />
			<br /> <br />
			Search By: &nbsp;<select name="filter" id = "filterBox">
				<option value="Name">Name</option>
				<option value="Organization">Organization</option>
				<!-- <option value="Paper_title">Paper Title</option> -->
			</select>
		</form>

		<?php
			//print_r($_GET);
			//print_r($_POST);
			if(!isset($_GET['search_key'])){
				
			}
			//if ($_GET['search_key'] !== ''){
			
			else{	
				$SEARCH_VALUE = $_GET['search_key'];
				$FILTER_VALUE = $_GET['filter'];
				// echo $_GET['filter'];
				if ($FILTER_VALUE == "Name"){
					$results = $db->query("SELECT * FROM entity_table WHERE lower(name) LIKE '%{$SEARCH_VALUE}%' OR upper(name) LIKE '%{$SEARCH_VALUE}%' OR name LIKE '%{$SEARCH_VALUE}%' ");
				}else if ($FILTER_VALUE == "Organization"){
					$results = $db->query("SELECT * FROM entity_table WHERE affiliation LIKE '%{$SEARCH_VALUE}%' OR lower(affiliation) LIKE '%{$SEARCH_VALUE}%' OR upper(affiliation) LIKE '%{$SEARCH_VALUE}%'");
				// }else if ($FILTER_VALUE == "Paper_title"){
				// 	$results = $db->query("SELECT * FROM entity_table WHERE UPPER(paper) LIKE '%{$SEARCH_VALUE}%' OR paper LIKE '%{$SEARCH_VALUE}%' OR LOWER(paper) LIKE '%{$SEARCH_VALUE}%'");
				}
				
				$row_count = $results->rowCount();
			?>
			<p><strong><?php echo $row_count;?></strong> results for <strong>'<?php echo $SEARCH_VALUE ?>'</strong></p>

			<?php
				
				// while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
				while($row = $results->fetch(PDO::FETCH_ASSOC)){
					
					// $count = $count+1;
					$eid = $row['eid'];
					$name = $row['name'];
					$affiliation = $row['affiliation'];
					$title = $row['title'];

					// echo $eid.': '.$name.' '.$affiliation.' '.$title.'<br />';
					// echo '<h3><a href="' .'myprofile.php?id='.$eid.'">'.$name.'</a></h3><p>'.$title. '</p><br />';
					
					if($title == ''){
						echo '<h3><a href="' .'myprofile.php?id='.$eid.'">'.$name.'</a></h3><p>'.$affiliation. '</p><br />';
						// echo $name;
						// echo $affiliation;
					} else {    				
						echo '<h3><a href="' .'myprofile.php?id='.$eid.'">'.$name.'</a></h3><p>'.$affiliation.'('.$title.')'. '</p><br />';
					
					}
				}
			}	
			


		?>
	</body>



	
</center>
</html>

<?php
		$db = null ;
	?>