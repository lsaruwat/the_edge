<?php
include("connect.php");

?>

<h1>Pizza Places In <?php if(isset($_POST['city'])) echo $_POST['city'];?></h1>
<?php
	$sql = "SELECT Location_Sales_Volume_Actual FROM pizza_places WHERE PID=:PID";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":PID"=>$_POST['theId']));
	$row= $psql->fetch();
	$yourValue = $row[0];
	echo"<div class='current' id='total-value'>Your Annual Income <span class='win'>$" . $yourValue . "</span></div>";

	$sql = "SELECT Location_Employee_Size_Actual FROM pizza_places WHERE PID=:PID";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":PID"=>$_POST['theId']));
	$row= $psql->fetch();
	$yourEmployee = $row[0];
	echo"<div class='current' id='average-size'>Your Number Employees <span class='data'>" . $yourEmployee . "</span></div>";

	$sql = "SELECT SUM(Location_Sales_Volume_Actual) FROM pizza_places WHERE City=:city";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":city"=>$_POST['city']));
	$row= $psql->fetch();
	$totalValue = $row[0];
	echo"<div class='stat' id='total-value'>Total Market Value <span class='data'>$" . $totalValue . "</span></div>";

	$sql = "SELECT AVG(Years_In_Database) FROM pizza_places WHERE City=:city";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":city"=>$_POST['city']));
	$row= $psql->fetch();
	$avgAge = $row[0];
	echo"<div class='stat' id='average-age'>Average Lifespan: <span class='data'>" . $avgAge . "</span> Years as of Today</div>";

	$sql = "SELECT AVG(Location_Sales_Volume_Actual) FROM pizza_places WHERE City=:city";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":city"=>$_POST['city']));
	$row= $psql->fetch();
	$avgValue = floor($row[0]);
	echo"<div class='stat' id='average-value'>Average Annual Income <span class='data'>$" . $avgValue . "</span></div>";

	$sql = "SELECT AVG(Location_Sales_Volume_Actual) FROM pizza_places WHERE City=:city AND Type_Of_Business='Private'";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":city"=>$_POST['city']));
	$row= $psql->fetch();
	$avgLocal = floor($row[0]);
	echo"<div class='stat' id='average-value'>Average Non Corporate Annual Income <span class='data'>$" . $avgLocal . "</span></div>";

	$sql = "SELECT AVG(Location_Employee_Size_Actual) FROM pizza_places WHERE City=:city";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":city"=>$_POST['city']));
	$row= $psql->fetch();
	$avgEmployee = $row[0];
	echo"<div class='stat' id='average-size'>Average Number Employees <span class='data'>" . $avgEmployee . "</span></div>";

	$sql = "SELECT t1.totalPopulation 
			FROM county_population AS t1 
			INNER JOIN pizza_places AS t2 ON t1.county=t2.County 
			WHERE t2.City=:city";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":city"=>$_POST['city']));
	$row= $psql->fetch();
	$population = $row[0];
	echo"<div class='stat' id='population'>Projected Population 2015 <span class='data'>" . $population . "</span></div>";

	$sql = "SELECT COUNT(Location_Employee_Size_Actual) FROM pizza_places WHERE City=:city";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":city"=>$_POST['city']));
	$row= $psql->fetch();
	$number = $row[0];
	$saturation = $population/$number;
	echo"<div class='stat' id='population'>People per Business 2015 <span class='data'>" . $saturation . "</span></div>";

	$sql = "SELECT income FROM mesa_income WHERE periodyear=2013 AND inctype=2";
	$psql=$conn->prepare($sql);
	$psql->execute();
	$row= $psql->fetch();
	$income = $row[0];
	echo"<div class='stat' id='population'>Average Income Per Capita 2013 <span class='data'>$" . $income . "</span></div>";

	$sql = "SELECT t1.PID, t1.Company_Name, t2.PID, t2.rank 
			FROM pizza_places AS t1 
			INNER JOIN rank AS t2 ON t1.PID=t2.PID 
			WHERE t1.PID=:PID";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":PID"=>$_POST['theId']));
	$row= $psql->fetch();
	$rank = $row['rank'];
	$CompanyName = $row['Company_Name'];

	$sql = "SELECT COUNT(t1.City)
			FROM pizza_places AS t1
			INNER JOIN rank AS t2 ON t1.PID=t2.PID 
			WHERE t2.rank>:rank AND t1.City=:city AND t1.Type_Of_Business='Private'";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":rank"=>$rank, ":city"=>$_POST['city']));
	$row= $psql->fetch();
	$position = $row[0];
	echo"<div class='stat' id='population'>Local Businesses beating you <span class='data'>" . $position . "</span></div>";

	$sql = "SELECT COUNT(t1.City)
			FROM pizza_places AS t1
			INNER JOIN rank AS t2 ON t1.PID=t2.PID 
			WHERE t2.rank<:rank AND t1.City=:city AND t1.Type_Of_Business='Private'";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":rank"=>$rank, ":city"=>$_POST['city']));
	$row= $psql->fetch();
	$position2 = $row[0];
	echo"<div class='stat' id='population'>Local Businesses Your'e Beating <span class='data'>" . $position2 . "</span></div>";
	$total = $position + $position2 + 1;
	$percent_rank = substr($position/$total, 0, 5);
	echo"<div class='stat' id='population'>You are in the top <span class='data'>" . $percent_rank . "%</span></div>";

	echo "<div class='rank' id='your-rank'><h1>".$CompanyName . " Edge Rank <span class='rank'>" . $rank . "</span></h1></div>";

	echo "</div>";

	function rank($yourValue, $yourEmployee, $avgLocal, $avgEmployee)
	{
		$rank1 = $yourValue / $avgLocal * 100;
		$rank1 = $rank1 *($yourEmployee/$avgEmployee);
		$rank1 = floor($rank1);
		return $rank1;
	}

	?>