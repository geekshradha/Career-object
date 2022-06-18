<?php
	require_once("classes/bugsfunny.php"); 
	require_once("function.php");
	if(!empty($_POST["answer"]) && !empty($_POST["time"]) && !empty($_POST["id"])){
		calculate_marks($_POST["id"],$_POST["answer"],$_POST["time"]);
		echo json_encode(["answer"=>$_POST["answer"],"id"=>$_POST["id"],"time"=>$_POST["time"]]);
	}
?>