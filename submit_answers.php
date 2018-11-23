<?php

error_reporting(4);
if(isset($_POST['results'])){
	include("connection.php");
	
	$answers=$_POST['results'];
	$answersstring='';
		if(!empty($answers['company_name'])) $company=$answers['company_name'];
		if($answers['current_question']>0) $completed=0;
		else $completed=1;
		$current_question=$answers['current_question'];
		
		if(strlen($answers['session_id'])==10){
			$session_id=$answers['session_id'];
			$sql="Select id from sessions where hash like '".$session_id."' limit 1;";
			if($res=$con->query($sql)){
				if($res->num_rows==1){
					while ($row = $res->fetch_assoc()) {
						$session_id_int=$row['id'];
					}
			if($answers['current_question']>0) $con->query("update sessions set question_number=".$answers['current_question']." where id=".$session_id_int);
				}
			}
		}else{
			$session_id=generateRandomString();
		
			$sql="INSERT into sessions (`hash`,`question_number`,`company_name`,`completed`) values ('".$session_id."','".$current_question."','".$company."',".$completed.");";
			$con->query($sql);
			$session_id_int=$con->insert_id;
		}
		
		foreach($answers['answers'] as $k=>$v){
			$sql="INSERT into answers (`session_id`,`question_number`, `choice_id`,`input_value`) values ('".$session_id_int."','".$v[1]."','".$v[0]."','".$v[2]."') ON DUPLICATE KEY UPDATE choice_id='".$v[0]."',input_value='".$v[2]."';";
			$con->query($sql);
		}
		echo $session_id;
	
}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
	
	


