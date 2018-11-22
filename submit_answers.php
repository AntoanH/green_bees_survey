<?php


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
		if(strlen($answers['session_id']==10)) $session_id=$answers['session_id'];
		else{
			$session_id=generateRandomString();
		
			$sql="INSERT into sessions (`hash`,`question_number`,`company_name`,`completed`) values ('".$session_id."','".$current_question."','".$company."',".$completed.");";
			if($con->query($sql)){
				
			}else{
				echo "Error0: ".$con->error;
			}
		}	
		
		// if($answers[1]) $sflag=1;
		foreach($answers['answers'] as $k=>$v){
			// print_r($v);exit;
			$sql="INSERT into answers (`session_id`,`choice_id`,`input_value`) values ('".$session_id."','".$v[0]."','".$v[1]."');";
		
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
	
	


