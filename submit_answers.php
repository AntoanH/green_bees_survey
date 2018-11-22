<?php

error_reporting(4);
if(isset($_POST['results'])){
	include("connection.php");
	
	$answers=$_POST['results'];
	$answersstring='';
		// print_r($answers['answers']);exit;
	// print_r($answers);exit;
	// foreach($answers as $k=>$v){
		// if(!empty($answers[1])){
			
			
		// }
		if(!empty($answers['company_name'])) $company=$answers['company_name'];
		if($answers['current_question']>0) $completed=0;
		else $completed=1;
		$current_question=$answers['current_question'];
		
		// if(!empty($answers[4])) $question_number=$answers[0];
		if(strlen($answers['session_id'])==10){
			$session_id=$answers['session_id'];
			$sql="Select id from sessions where hash like '".$session_id."' limit 1;";
			// echo $sql;exit;
			if($res=$con->query($sql)){
			print_r($session_id);exit;
				if($res->num_rows==1){
					while ($row = $res->fetch_assoc()) {
						$session_id=$row['id'];
					}
				}
			}
		}else{
			$session_id=generateRandomString();
		
			$sql="INSERT into sessions (`hash`,`question_number`,`company_name`,`completed`) values ('".$session_id."','".$current_question."','".$company."',".$completed.");";
			// echo $sql;exit;
			$con->query($sql);
			$session_id=$con->insert_id;
		}
		
		
		// if($answers[1]) $sflag=1;
		foreach($answers['answers'] as $k=>$v){
			// print_r($v);exit;
			$sql="INSERT into answers (`session_id`,`question_number`, `choice_id`,`input_value`) values ('".$session_id."','".$v[1]."','".$v[0]."','".$v[2]."');";
		
			if($con->query($sql)){
				echo "Inserted successfully";
			}else{
				echo "Error: ".$con->error;
			}
		}
	// }
	// print_r($answers);
	
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
	
	


