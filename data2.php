<?php
include("connect.php");
/*
	$sql = "SELECT Location Sales Volume Actual FROM businesses WHERE PID=:PID";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":PID"=>$_POST['theId']));
	$row= $psql->fetch();
	$yourValue = $row[0];
	

	$sql = "SELECT Location Employee Size Actual FROM businesses WHERE PID=:PID";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":PID"=>$_POST['theId']));
	$row= $psql->fetch();
	$yourEmployee = $row[0];
	
*/
	$sql = "SELECT SUM('Location Sales Volume Actual') FROM businesses WHERE City=:city";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":city"=>$_POST['city']));
	$row= $psql->fetch();
	$totalValue = $row[0];
	

	$sql = "SELECT AVG(Years In Database) FROM businesses WHERE City=:city";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":city"=>$_POST['city']));
	$row= $psql->fetch();
	$avgAge = round($row[0]);
	
/*
	$sql = "SELECT AVG(Location Sales Volume Actual) FROM businesses WHERE City=:city";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":city"=>$_POST['city']));
	$row= $psql->fetch();
	$avgValue = floor($row[0]);
	

	$sql = "SELECT AVG(Location Sales Volume Actual) FROM businesses WHERE City=:city AND Type Of Business='Private'";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":city"=>$_POST['city']));
	$row= $psql->fetch();
	$avgLocal = floor($row[0]);
	

	$sql = "SELECT AVG(Location Employee Size Actual) FROM businesses WHERE City=:city";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":city"=>$_POST['city']));
	$row= $psql->fetch();
	$avgEmployee = substr($row[0],0,5);
	

	$sql = "SELECT t1.totalPopulation, t2.County
			FROM county population AS t1 
			INNER JOIN businesses AS t2 ON t1.county=t2.County 
			WHERE t2.City=:city";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":city"=>$_POST['city']));
	$row= $psql->fetch();
	$population = $row[0];
	$county = $row[1];
	

	$sql = "SELECT COUNT(Location Employee Size Actual) FROM businesses WHERE City=:city";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":city"=>$_POST['city']));
	$row= $psql->fetch();
	$number = $row[0];
	$saturation = $population/$number;
	

	$sql = "SELECT income FROM mesa income WHERE periodyear=2013 AND inctype=2";
	$psql=$conn->prepare($sql);
	$psql->execute();
	$row= $psql->fetch();
	$income = $row[0];
	

	$sql = "SELECT t1.PID, t1.Company Name, t2.PID, t2.rank 
			FROM businesses AS t1 
			INNER JOIN rank AS t2 ON t1.PID=t2.PID 
			WHERE t1.PID=:PID";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":PID"=>$_POST['theId']));
	$row= $psql->fetch();
	$rank = $row['rank'];
	$CompanyName = $row['Company Name'];

	$sql = "SELECT COUNT(t1.City)
			FROM businesses AS t1
			INNER JOIN rank AS t2 ON t1.PID=t2.PID 
			WHERE t2.rank>:rank AND t1.City=:city AND t1.Type Of Business='Private'";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":rank"=>$rank, ":city"=>$_POST['city']));
	$row= $psql->fetch();
	$position = $row[0];
	

	$sql = "SELECT COUNT(t1.City)
			FROM businesses AS t1
			INNER JOIN rank AS t2 ON t1.PID=t2.PID 
			WHERE t2.rank<:rank AND t1.City=:city AND t1.Type Of Business='Private'";
	$psql=$conn->prepare($sql);
	$psql->execute(array(":rank"=>$rank, ":city"=>$_POST['city']));
	$row= $psql->fetch();
	$position2 = $row[0];
	
	$total = $position + $position2 + 1;
	$percent rank = substr($position/$total, 0, 5);
	$yourShare = substr($total / $yourValue, 0, 5);
	$avgShare = substr($total / $avgValue, 0, 5);
	$yourRevEmploy = round($yourValue / $yourEmployee);
	$avgRevEmploy = round($avgValue / $avgEmployee);

	echo "<div class='info-container'>
			<div class='company-info'>
				<div id='ranking'>
					<h1>" . $rank . "</h1>
				</div>
				<div id='secondary-info'>
					<h2>" . $CompanyName . "</h2>
					<p>Local businesses your'e beating:<span>" . $position . "</span></p>
					<p>Local businesses beating you:<span>" . $position2 . "</span></p>
				</div>
			</div>
		</div>";
	echo "<div class='info-container2'>
			<div class='company-info2'>
				<div class='block' id='block1'>
					<p>You are located in " . $county . " County</p>
					<p class='slanted'>Projected Population: <span>" . $population . "</span></p>
				</div>
				<div class='block' id='block2'>
					<p>Avg Business Lifespan:<span>" . $avgAge . " years</span></p>
					<p>Total Market Value:<span>$" . $totalValue . "</span></p>
				</div>
			</div>
		</div>";
	echo "<div class='info-container3'>
			<div class='company-info3'>
				<div class='block' id='block1'>
					<div id='labels'>
						<div class='stats-compare'>
						<p>avg annual income</p>
						<p>employees</p>
						<p>market share</p>
						<p>revenue per employee</p>
						<p>revenue per sq ft</p>
						</div>
						<p>you are in the top " . $percent rank . "%</p>
					</div>
				</div>
				<div class='block' id='block2'>
					<div id='your-stats'>
						<p class='title'>your business</p>
						<div class='stats-compare'>
						<p>$" . $yourValue . "</p>
						<p>" . $yourEmployee . "</p>
						<p>" . $yourShare . "%</p>
						<p>$" . $yourRevEmploy . "</p>
						<p>$" . $yourRevEmploy . "</p>
						</div>
					</div>
					<div id='their-stats'>
						<p class='title'>competition</p>
						<div class='stats-compare'>
						<p>$" . $avgValue . "</p>
						<p>" . $avgEmployee . "</p>
						<p>" . $avgShare . "%</p>
						<p>$" . $avgRevEmploy . "</p>
						<p>$" . $avgRevEmploy . "</p>
						</div>
					</div>
				</div>

			</div>
		</div>";
	/*
	echo"<div class='current' id='total-value'>Your Annual Income <span class='win'>$" . $yourValue . "</span></div>";
	echo"<div class='current' id='average-size'>Your Number Employees <span class='data'>" . $yourEmployee . "</span></div>";
	echo"<div class='stat' id='total-value'>Total Market Value <span class='data'>$" . $totalValue . "</span></div>";
	echo"<div class='stat' id='average-age'>Average Lifespan: <span class='data'>" . $avgAge . "</span> Years as of Today</div>";
	echo"<div class='stat' id='average-value'>Average Annual Income <span class='data'>$" . $avgValue . "</span></div>";
	echo"<div class='stat' id='average-value'>Average Non Corporate Annual Income <span class='data'>$" . $avgLocal . "</span></div>";
	echo"<div class='stat' id='average-size'>Average Number Employees <span class='data'>" . $avgEmployee . "</span></div>";
	echo"<div class='stat' id='population'>Projected Population 2015 <span class='data'>" . $population . "</span></div>";
	echo"<div class='stat' id='population'>People per Business 2015 <span class='data'>" . $saturation . "</span></div>";
	echo"<div class='stat' id='population'>Average Income Per Capita 2013 <span class='data'>$" . $income . "</span></div>";
	echo"<div class='stat' id='population'>Local Businesses beating you <span class='data'>" . $position . "</span></div>";
	echo"<div class='stat' id='population'>Local Businesses Your'e Beating <span class='data'>" . $position2 . "</span></div>";
	echo"<div class='stat' id='population'>You are in the top <span class='data'>" . $percent rank . "%</span></div>";
	echo "<div class='rank' id='your-rank'><h1>".$CompanyName . " Edge Rank <span class='rank'>" . $rank . "</span></h1></div>";
	echo "</div>";
	*/
	echo"<div class='stat' id='total-value'>Total Market Value <span class='data'>$" . $totalValue . "</span></div>";

	function rank($yourValue, $yourEmployee, $avgLocal, $avgEmployee)
	{
		$rank1 = $yourValue / $avgLocal * 100;
		$rank1 = $rank1 *($yourEmployee/$avgEmployee);
		$rank1 = floor($rank1);
		return $rank1;
	}

	?>