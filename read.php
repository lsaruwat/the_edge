<?php
//error reporting

ini_set('display_errors',1); 
 error_reporting(E_ALL);
//
include("connect.php");

ini_set("auto_detect_line_endings", true);
read();
function read()
{

$myfile = fopen("Pizza_File.csv", "r") or die("Unable to open file!");
while(!feof($myfile))
{
	$file_array = fgetcsv($myfile);
	//var_dump($file_array);
	$money = str_replace("$","",$file_array[98]);
	$money = str_replace(",","",$money);
	echo $money;
	echo $file_array[98] . "</br>";
	/*$money = str_replace("$","",);
	$length = count($category);
	$i=1;
	$k=1;
	$j=1;

	for($y=0; $y<$length; $y++)
	{
		if($category[$y] == "Ayurvedic") $catid =1;
		if($category[$y] == "Chinese") $catid =2;
		if($category[$y] == "Native American") $catid =3;
		if($category[$y] == "European") $catid =4;
		if($category[$y] == "Endangered") $catid =5;
		if($category[$y] == "Medicinal Trees & Shrubs") $catid =6;
		if($category[$y] == "Medicianl Trees & Shrubs") $catid =6;
		if($category[$y] == "Medicinal Trees & Shurbs") $catid =6;
		if($category[$y] == "Pollinator") $catid =7;
		if($category[$y] == "California Native") $catid =8;
		if($category[$y] == "Culinary") $catid =9;
		if($category[$y] == "Perennial Vegetable") $catid =10;
		if($category[$y] == "Drought Tolerant") $catid =11;
		$cat_values = $j . "," . $k . "," . $catid;
		$cat_query_str = "INSERT INTO `cj25_virtuemart_product_categories`(`id`, `virtuemart_product_id`, `virtuemart_category_id`) VALUES (".$cat_values."); ";
		echo $cat_query_str;
		$j++;
	}*/
}
fclose($myfile);
}

?>