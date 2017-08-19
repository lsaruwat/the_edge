<?php
include("connect.php");

	$sql = "ALTER TABLE businesses ADD PID int FIRST";
	$psql=$conn->prepare($sql);
	$psql->execute();

	$sql = "SELECT `Company Name`, PID, Address, `Location Sales Volume Actual` FROM businesses ORDER BY 'Company Name' ASC";
	$psql=$conn->prepare($sql);
	$psql->execute();
	$row= $psql->fetchAll();
	$i=1;
	foreach($row as $business)
	{
		echo $business['Company Name'] . "</br>";
		$sql = "UPDATE businesses  SET PID=:PID WHERE `Address` = :address AND `Company Name`=:companyName ";
		$psql=$conn->prepare($sql);
		$psql->execute(array(":PID"=>$i, ":companyName"=>$business['Company Name'], ":address"=>$business['Address'] ));
	    $i++;
	}


	$sql = "SELECT `Location Sales Volume Actual`, PID FROM businesses";
	$psql=$conn->prepare($sql);
	$psql->execute();
	$row= $psql->fetchAll();

	foreach($row as $business)
	{
		echo $business['Location Sales Volume Actual'] . " ";
		$money2 = str_replace("$", "", $business['Location Sales Volume Actual']);
		$money2 = str_replace(",", "", $money2);
		echo $money2 . "</br>";

		$sql = "UPDATE businesses  SET `Location Sales Volume Actual`=:moneyVal WHERE PID= :PID";
		$psql=$conn->prepare($sql);
		$psql->execute(array(":PID"=>$business['PID'], ":moneyVal"=>$money2));
	}

?>