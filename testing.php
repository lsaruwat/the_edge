<?php
include("connect.php");

	$sql = "SELECT student.*, races.*, GPA.*, 300_level.*, 400_level.*, student_teaching.*, completion.* FROM student INNER JOIN races ON student.race_id = races.id INNER JOIN GPA ON GPA.student_id = student.id INNER JOIN 300_level ON 300_level.student_id = student.id INNER JOIN 400_level ON 400_level.student_id = student.id INNER JOIN student_teaching ON student_teaching.student_id = student.id INNER JOIN completion ON completion.student_id = student.id GROUP BY student_id";

	$psql=$conn->prepare($sql);
	$psql->execute();
	$row= $psql->fetchAll();
	var_dump($row);
?>