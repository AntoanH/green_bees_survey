<?php


if(isset($_POST['answers'])){
	include("connection.php");
	
	$answers=$_POST['answers'];
	$answersstring='';
	foreach($answers as $k=>$v){
		// if(!empty($answers[1])){
			
			
		// }
		$sql="INSERT into answers (`session_id`,`choice_id`,`input_value`) values ('".$answers[2]."','".$answers[0]."','".$answers[1]."');";
	}
	print_r($answers);
	
}

?>
	
	


