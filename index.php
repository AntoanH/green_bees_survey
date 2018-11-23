<!doctype html>

<html>
    <?php
    include_once('data.php');
    
    $old_answers = [];
    
    $session_id = "";
    $company_name = "";
    
    if (isset($_GET['s']) && strlen($_GET['s']) == 10) {
        $session_id = $_GET['s'];
        $con = mysqli_connect("51.75.249.227", "bee1", "12345", "green_it_survey") or die("Error " . mysqli_error($connection));
        if ($con->connect_errno) {
            die('Connect Error (' . $con->connect_errno . ') ' . $con->connect_error);
        }

        $sql = "Select s.id, s.company_name, a.question_number, a.choice_id, a.input_value from sessions s "
                . "left join answers a on s.id = a.session_id "
                . "where s.hash like '".$session_id."' order by a.question_number ASC;";
                //. " and s.question_number != 0;";
        if ($res = $con->query($sql)) {
            while ($row = $res->fetch_assoc()) {
				if($row['question_number']==1) $company_name=$row['company_name'];
                $old_answers[] = array($row['question_number'],$row['choice_id'],$row['input_value']);
            }
        }
    }

    ?>
    <head>
        <title>Survey of Green IT practices</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <script src="js/jquery.js"></script>

    </head>
    <body>

        <div class="content" id="Main-Content">
                            <form method="post">
                                <div id="userinfo" style="width:100%;position:fixed;top:0;text-align:center"><?php 
								if($session_id!="") echo "Welcome back ".$company_name.",<br>This is your shareable link:   http://51.75.249.227/?s=".$session_id;
								else echo "";?></div>
                                <div id="q1" class="pricing tabcontent" ><div class="pricing-top blue-top">
                                        <h3 id='category_name'>Your company</h3>
                                    </div>
                                                <div class="grid-w3layouts1" style="padding: 0 2em;background: #6b946db5 !important;
    padding: 2.5em 2em!important;">
                                                    <div class="w3-agile1">
                                                        <label class="rating" id='question_label'></label>
                                                        <ul id='choices_ul'>
                                                            
                                                        </ul>
                                                    </div>	
                                                </div>
                                            <input type="button" onclick="nextQuestion()" value="Next"></button>
                                    </div>
                            </form>
                        </div>
                   
				
            <script>
                $questions = <?php echo json_encode($questions); ?>;
                $answers = [];
                $company_name = "<?php echo $company_name; ?>";
                $current_question = "0";	
                $old_answers = <?php echo json_encode($old_answers); ?>;
				var first=true;
                if($company_name){
					$counter=$old_answers.length-1;
					
				}else{
					$counter=0;
				}
                function nextQuestion() {
					if($current_question>0){
						$selected_choice = $("#choices_ul").find("input:radio:checked");
						if($selected_choice.length>0){
							$choice_id = $($selected_choice).attr('choice_id');
							$value = null;
							if ($($selected_choice).attr('has_input') != 0) {
								$input = $($selected_choice).next();
								$value = $($input).val();
							}
							addAnswer($choice_id, $value);
								$next_question_number = $($selected_choice).attr('next_question');

								$next_question = getQuestionByNumber($next_question_number);
							
							if ($next_question === undefined || $next_question >= 88) {
								complete_survey();
							} else {
								if(setQuestion($next_question))
									++$counter;
							}
						}
					}else{
							if(first){
								first=false;
								if($counter>0)
									setQuestion(getQuestionByNumber($old_answers[$counter][0]));
								else
									setQuestion(getQuestionByNumber(1));
								var ele=document.createElement('input');
								ele.type ='button';
								ele.value ='Save and Share';
								ele.onclick=function(){saveAndShare();};
								$('.pricing').append(ele);
								ele=document.createElement('input');
								ele.type ='button';
								ele.value ='Previous';
								$(ele).css('border-radius', '0 0 10px 12px');
								ele.onclick=function(){prevQuestion();};
								$('.pricing').append(ele);
								++$counter;
							}
					}
				}
				function prevQuestion(){
					// console.log($answers);
					// $selected_choice = $("#choices_ul").find("input:radio:checked");
                    // $choice_id = $($selected_choice).attr('choice_id');
					// addAnswer($choice_id, $value);
					// if ($($selected_choice).attr('has_input') != 0) {
                        // $input = $($selected_choice).next();
                        // $value = $($input).val();
                    // }
					
					if($counter>0){
						
						if($old_answers.length > 0 && $old_answers.length > $counter){
							$next_question = getQuestionByNumber($old_answers[--$counter][0]);
						}else{
							if($old_answers.length > 0) 
								$next_question = getQuestionByNumber($answers[(--$counter)-$old_answers.length][1]);
							else
								$next_question = getQuestionByNumber($answers[--$counter][1]);
						}
                        setQuestion($next_question);
					}
				}
                function alreadyAnswered($choice_id) {
					
					if($old_answers.length > 0){
						$results = $.grep($old_answers, function (n, i) {
							return n[1] == $choice_id;
						});
						if($results.length==0){
							console.log($results);
							$results= $.grep($answers, function (n, i) {
								return n[0] == $choice_id;
								console.log($results);
							});
						}
					}else{
						$results= $.grep($answers, function (n, i) {
							return n[0] == $choice_id;
						});
						
					}
					return $results.length > 0 ? $results[0][2] : false;
                }

                function setQuestion($question) {
                    $current_question = $question['question_number'];

                    $('#category_name').html($question['category']);
                    $('#question_label').html($question['question']);

                    $ul = $("#choices_ul");
                    $ul.html('');
                    for ($choice_number = 0; $choice_number < $question['choices'].length; $choice_number++) {

                        $choice = $question['choices'][$choice_number];
                        
                        $selected = "";
                        
                        $old_value = alreadyAnswered($choice['id']);
							if($old_value || $old_value === "") {
                            $selected = "checked='checked'";
							$old_value= "value='"+$old_value+"'";
                        }
                        
                        $li = $("<li></li>");

                        if ($choice['input'] == "0") {
                            $radio = $("<input type='radio' id='o" + $choice_number + "' choice_id='" + $choice['id'] + "' has_input='0' next_question='" + $choice['next_question_number'] + "' name='s" + $question['question_number'] + "' "+$selected+">'");
                            $label = $("<label for='o" + $choice_number + "'>" + $choice['choice'] + "</label>");
                            $div = $("<div class='check'></div>");
                            $($li).append($radio);
                            $($li).append($label);
                            $($li).append($div);
                        } else {
                            $radio = $("<input type='radio' id='o" + $choice_number + "' choice_id='" + $choice['id'] + "' has_input='1' next_question='" + $choice['next_question_number'] + "' name='s" + $question['question_number'] + "' "+$selected+">'");
                            $input = $("<input id='input_choice' type='text' class='input_choices' oninput='enableInput(" + $choice_number + ")' id='os" + $choice['id'] + "' choice_id='" + $choice['id'] + "' placeholder='" + $choice['choice'] + "' "+$old_value+">");
                            $div = $("<div class='check'></div>");
                            $($li).append($radio);
                            $($li).append($input);
                            $($li).append($div);
                        }
                        $($ul).append($li);
                    }
					return true;
                }

                function enableInput($choice_id) {
                    $('#o' + $choice_id).prop("checked", "checked");
                }

                function addAnswer($choice_id, $value) {
					if($current_question!=0 && ($answers.length==0 || ($answers.length>0 && $current_question!=$answers[$answers.length-1][1]))){
						$answer = [];
						$answer[0] = $choice_id;
						$answer[1] = $current_question;
						$answer[2] = $value;
						$answers.push($answer);
					}
                }

                function getQuestionByNumber($question_id) {
                    return $.grep($questions, function (n, i) {
                        return n['question_number'] == $question_id;
                    })[0];
                }

                function complete_survey() {
                    $current_question = "0";
					
					$("#choices_ul").html('');
					$("#question_label").html('Thank you for taking your time to fill out this survey. All answers have been saved and will provide valuable insight about Green IT, good IT practices and resources regarding the environment.');
					$("input[type='button']").css("display","none");
					$('#category_name').html("End of Survey");
                    submit_survey();
                }

                function saveAndShare() {
					$selected_choice = $("#choices_ul").find("input:radio:checked");
                    $choice_id = $($selected_choice).attr('choice_id');

                    $value = null;
                    if ($($selected_choice).attr('has_input') != 0) {
                        $input = $($selected_choice).next();
                        $value = $($input).val();
                    }
					if($choice_id>0)
						addAnswer($choice_id, $value);
                    submit_survey();
                }

                function submit_survey() {
                    if ($company_name === null || $company_name.length < 2) {
                        $company_name = prompt("Please enter company name", "");
                        $results = [];

                        if ($company_name != null && $company_name.length > 1) {

                            $.post('submit_answers.php', {
                                results: {
                                    company_name: $company_name,
                                    current_question: $current_question,
                                    session_id: '<?php echo $session_id; ?>',
                                    answers: $answers
                                }
                            }, function (res) {
                                document.getElementById("userinfo").innerHTML="Welcome "+$company_name+",<br>This is your shareable link:  http://51.75.249.227/?s="+res+"";
                            });
                        }else{
							alert("Please submit again and provide a real company name");
						}
                    }else{
						 $.post('submit_answers.php', {
                                results: {
                                    company_name: $company_name,
                                    current_question: $current_question,
                                    session_id: '<?php echo $session_id; ?>',
                                    answers: $answers
                                }
                            }, function (res) {
                                document.getElementById("userinfo").innerHTML="Welcome "+$company_name+",<br>This is your shareable link:  http://51.75.249.227/?s="+res+"";
                            });
					}
                }

                    document.getElementById('q1').style.display = "block";
					setQuestion(getQuestionByNumber(0));
            </script>

        </div>
    </body>
</html>
