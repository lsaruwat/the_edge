<?php
include("connect.php");
if(isset($_POST['city']))
{
	$sql = "SELECT PID, Company_Name
			FROM pizza_places
			WHERE City=:city
			ORDER BY Company_Name ASC";
			$psql=$conn->prepare($sql);
			$psql->execute(array(':city'=> $_POST['city'] ));
			$row= $psql->fetchAll();
			foreach($row as $company)
			{
				echo "<option value=".$company['PID'].">". $company['Company_Name'] ."</option>";
			}
}
?>