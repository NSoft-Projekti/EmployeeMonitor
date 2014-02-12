<html>
<head>
    <meta charset="utf-8">
    <title>Employee Monitor</title>

    <!--<link type="text/css" href="../assets/css/administration.css" rel="stylesheet"/>  --> 
    <link type="text/css" href="../assets/css/time.css" rel="stylesheet"/>
</head>
<body>

<div class="container">
    <div class="header">
        <ul class="sos">

            <li class="sos"><a class="sos" href="UpdateEmployee.php">Personal information</a></li>
            <li class="sos"> <a class="sos" href="newfile.php">Working time review</a></li>
            <li class="sos"> <a class="sos" href="../includes/functions/logout.php">Log out</a></li>

        </ul>
    </div>


     <div class="time"> 

<?php
	/*
		Place code to connect to your DB here.
	*/
	 include '../includes/indeks.php';	// include your code to connect to DB.
	 session_start();
	 $curUsername = $_SESSION['Username'];
	 $query = "SELECT * FROM employees WHERE Username = '$curUsername'";
	 $result = mysql_query($query) or die (mysql_error());
	 $row = mysql_fetch_array ( $result );
	 $currEmpId=$row['EmployeeID'];
	$tbl_name="employeerooms";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE EmployeeID = '$currEmpId'";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "Time.php"; 	//your file name  (the name of this file)
	$limit = 13; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT LogTime,LoggedIn, RoomID FROM $tbl_name WHERE EmployeeID = '$currEmpId' LIMIT $start, $limit";
	$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">previous</a>";
		else
			$pagination.= "<span class=\"disabled\">previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next </a>";
		else
			$pagination.= "<span class=\"disabled\">next </span>";
		$pagination.= "</div>\n";		
	}
?>

	<?php
	
	
	if(mysql_num_rows($result) > 0)
	{
		//$output="";
		echo "<table class='Table' >";
	
		echo "<tr>";
		echo "<th >" . "Time" . "</th>";
		echo "<th>" . "Status" . "</th>";
		echo "<th>" . "Room" . "</th>";
		echo "</tr>";
	
		while($raw_results = mysql_fetch_array($result))
	
		{
				
			//echo ($raw_results['LogTime'].$raw_results['LoggedIn'].$raw_results['RoomID']."<br><br>");
			
			echo "<tr >";
			echo "<td>" .htmlspecialchars($raw_results['LogTime'] ). "</td>";
			echo "<td>" .htmlspecialchars($raw_results['LoggedIn'] ). "</td>";
			echo "<td>" .htmlspecialchars($raw_results['RoomID'] ). "</td>";
			echo "</tr>";
			
		}
	
	
	
		echo "</table> ";
	}
	
		
	?>

<?=$pagination?>
 </div> 
</div>

</body>
</html>