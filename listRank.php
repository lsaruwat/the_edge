<?php
include("connect.php");
if(isset($_POST['city']))
{

	$sql = "SELECT t1.PID, t1.Company_Name, t1.Location_Sales_Volume_Actual, t1.Location_Employee_Size_Actual ,t1.County, t1.Type_Of_Business, t2.PID, t2.rank
			FROM pizza_places AS t1 
			INNER JOIN rank AS t2 ON t1.PID=t2.PID 
			WHERE t1.City=:city AND t1.Type_Of_Business='Private'
			ORDER BY t2.rank DESC";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":city"=>$_POST['city']));
	$row= $psql->fetchAll();

	//var_dump($row);
	$i=1;
	foreach($row as $pizza)
	{
		//$money = str_replace("$", "" ,$pizza['Location_Sales_Volume_Actual']);
		//$money2 = str_replace(",", "",$money);
		/*$PID = $pizza['PID'];
		$sql = "SELECT COUNT(PID) FROM pizza_places WHERE Location_Sales_Volume_Actual>:yourValue";
		$psql=$conn->prepare($sql);
		$psql->execute(array(":yourValue"=>$yourValue));
		$row= $psql->fetch();
		$position = $row[0];*/
		//$currRank = rank($pizza['Location_Sales_Volume_Actual'],$pizza['Location_Employee_Size_Actual'],$avgLocal, $avgEmployee);

				echo "<div id='list'>
						<p class='list-number'>#" . $i . "</p>
						<p class='list-name'>" . $pizza['Company_Name'] . "</p>
						<p class='list-revenu'> IYR  $" .$pizza['Location_Sales_Volume_Actual']."</p>
						<p class='list-rank'>Rank  ". $pizza['rank'] ."</p>
					</div>";
	    //$sql = "INSERT INTO rank (PID, rank) VALUES (:PID, :rank)";
		//$psql=$conn->prepare($sql);
		//$psql->execute(array(":PID"=>$PID, ":rank"=>$currRank));
	    $i++;
	}
}
?>