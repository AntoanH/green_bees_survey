<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!doctype html>

<html>
    <?php
    $questions = [];
    
    $session_id = null;
    
    if(isset($_GET['s']) && strlen($_GET['s']) == 10) {
        $session_id = $_GET['s'];
    }
    
    $con = mysqli_connect("51.75.249.227", "bee1", "12345", "green_it_survey") or die("Error " . mysqli_error($connection));
    if ($con->connect_errno) {
        die('Connect Error (' . $con->connect_errno . ') ' . $con->connect_error);
    }

    $sql = "Select *,choices.id as choice_id from questions left join choices on questions.question_number=choices.question_number
			left join categories on questions.category_id=categories.id
			left join relations on choices.id=relations.id_choice;";
    if ($res = $con->query($sql)) {

        $question = [];
        $choices = [];
        $choice = [];
        $temp = "0";
        while ($row = $res->fetch_assoc()) {
            if ($row['question_number'] != $temp) {
                $temp = $row['question_number'];
                if (!empty($choices) > 0) {
                    $question['choices'] = $choices;
                }
                if (!empty($question)) {
                    $questions[] = $question;
                }
                $question = [];
                $choices = [];
                $question['question_number'] = $row['question_number'];
                $question['question'] = $row['question'];
                $question['category_id'] = $row['category_id'];
                $question['category'] = $row['category'];
                $question['sub_category'] = $row['sub_category'];
            }
            $choice = [];
            $choice['id'] = $row['choice_id'];
            $choice['choice'] = $row['choice'];
            $choice['input'] = $row['input'];
            $next_question = is_null($row['next_question_number']) ? intval($row['question_number']) + 1 : $row['next_question_number'];
            $choice['next_question_number'] = $next_question;
            $choices[] = $choice;
        }
        if (isset($_GET['debug'])) {
            echo "<pre>";
            var_dump($questions);
            echo "</pre>";
        }
    } else {
        echo "ERROR " . $con->error;
        exit;
    }
    ?>
    <head>
        <title>Survey of Green IT practices</title>
        <!-- meta-tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <meta name="keywords" content="survey, organization, design4green, best practices" />
        <!-- //meta-tags -->
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <script src="js/jquery-2.1.4.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/raccordion.css" />
        <script type="text/javascript">
            $(window).load(function () {
                $('#firstslide').addClass('active');
                $('#firstslide .caption').css('opacity', 1);
            });
        </script>
    </head>
    <body>

        <div class="content" id="Main-Content">
            <div class="wrapper">
                <div id="accordion-wrapper">
                    <div id="firstslide" class="slide slide-two-w3ls">
                        <div class="caption">
                            <form action="javascript:completeAndRedirect();" method="post">
                                <div id="q0" class="pricing tabcontent">
                                    <div class="pricing-top blue-top" >
                                        <h3 id="category">Green IT Survey</h3>
                                    </div>
                                    <div class="pricing-bottom two">
                                        <div class="pricing-bottom-bottom">
                                            <div class="content-wthree2">
                                                <div class="grid-w3layouts1">
                                                    <div class="w3-agile1">
                                                        <label class="rating">
                                                            <p>The purpose of this survey is to evaluate the impact of companies in terms of setting up eco-design digital services.<br></p>
                                                            <p>Thank you for your interest in providing valuable insight about Green IT and good IT practices regarding the environment.<br></p>
                                                            <p>Please take your time to answer all the questions under your scope and you may share the link with your co-wprkers, at any time.</p>
                                                        </label>

                                                        <div class="clear"></div>
                                                    </div>	
                                                </div>
                                            </div>
                                            <input type="button" onclick="openCity('q1')" id="nextbtn" value="Next"></button>
                                            <input type="submit" name="submit" id="submitfeedback" style="display:none" value="Send Feedback">

                                        </div>
                                    </div>
                                </div>
                                <div id="q1" class="pricing tabcontent"><div class="pricing-top blue-top">
                                        <h3 id='category_name'>Your company</h3>
                                    </div>
                                    <div class="pricing-bottom two">
                                        <div class="pricing-bottom-bottom">
                                            <div class="content-wthree2">
                                                <div class="grid-w3layouts1">
                                                    <div class="w3-agile1">
                                                        <label class="rating" id='question_label'><?php echo $questions[0]['question'] ?></label>
                                                        <ul id='choices_ul'>
                                                            <?php for ($i = 0; $i < count($questions[0]['choices']); $i++) { ?>
                                                                <li>
                                                                    <input type="radio" id="o<?php echo $i; ?>" choice_id="<?php echo $questions[0]['choices'][$i]['id']; ?>" next_question="2" name="s<?php echo $questions[0]['question_number']; ?>">
                                                                    <label for="o<?php echo $i; ?>">
                                                                        <?php echo $questions[0]['choices'][$i]['choice']; ?>
                                                                    </label>
                                                                    <div class="check"></div>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                        <div class="clear"></div>
                                                    </div>	
                                                </div>
                                            </div>
                                            <input type="button" onclick="nextQuestion()" value="Next"></button>
                                            <!--<input type="button" onclick="openCity('q0')" style="background:grey" value="Previous"></button>-->
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $questions = <?php echo json_encode($questions); ?>;
                $answers = [];
                $company_name = "";

                function nextQuestion() {
                    $selected_choice = $("#choices_ul").find("input:radio:checked");
                    $choice_id = $($selected_choice).attr('choice_id');

                    $value = null;

                    if ($($selected_choice).attr('has_input') != 0) {
                        $input = $($selected_choice).next();
                        $value = $($input).val();
                    }

                    addAnswer($choice_id, $value);

                    $next_question_number = $($selected_choice).attr('next_question');

                    $next_question = getQuestionByNumber($next_question_number);

                    if ($next_question === undefined) {
                        submit_survey();
                    } else {
                        setQuestion($next_question);
                    }
                }

                setQuestion(getQuestionByNumber(87));

                function setQuestion($question) {
                    $('#category_name').html($question['category']);
                    $('#question_label').html($question['question']);

                    $ul = $("#choices_ul");
                    $ul.html('');

                    for ($choice_number = 0; $choice_number < $question['choices'].length; $choice_number++) {

                        $choice = $question['choices'][$choice_number];
                        $li = $("<li></li>");

                        if ($choice['input'] == "0") {
                            $radio = $("<input type='radio' id='o" + $choice_number + "' choice_id='" + $choice['id'] + "' has_input='0' next_question='" + $choice['next_question_number'] + "' name='s" + $question['question_number'] + "'>'");
                            $label = $("<label for='o" + $choice_number + "'>" + $choice['choice'] + "</label>");
                            $div = $("<div class='check'></div>");
                            $($li).append($radio);
                            $($li).append($label);
                            $($li).append($div);
                        } else {
                            $radio = $("<input type='radio' id='o" + $choice_number + "' choice_id='" + $choice['id'] + "' has_input='1' next_question='" + $choice['next_question_number'] + "' name='s" + $question['question_number'] + "'>'");
                            $input = $("<input id='input_choice' type='text' oninput='enableInput(" + $choice_number + ")' id='os" + $choice['id'] + "' choice_id='" + $choice['id'] + "' name='ss" + $question['question_number'] + "' placeholder='" + $choice['choice'] + "' style='border: 0;padding: 10px;border-radius: 6px;float: left;margin-left: 45px;'>");
                            $div = $("<div class='check'></div>");
                            //$label = $("<label for='o"+$choice_number+"'>"+$choice['choice']+"</label>");
                            $($li).append($radio);
                            $($li).append($input);
                            $($li).append($div);
                        }
                        $($ul).append($li);
                    }
                }

                function enableInput($choice_id) {
                    console.log($choice_id);
                    // $('#o'+$choice_id).attr("checked","");
                    $('#o' + $choice_id).prop("checked", "checked");
                }

                function addAnswer($choice_id, $value) {
                    $answer = [];
                    $answer[0] = $choice_id;
                    $answer[1] = $value;
                    $answers.push($answer);
                }

                function getQuestionByNumber($question_id) {
                    return $.grep($questions, function (n, i) {
                        return n['question_number'] == $question_id;
                    })[0];
                }

                function submit_survey() {
                    if ($company_name ===    null || $company_name.length < 2) {
                        $company_name = prompt("Please enter company name", "");

                        if ($company_name != null && $company_name.length > 1) {
                            $results[0] = $company_name;
                            $results[1] = true;
                            $results[2] = <?php echo $session_id; ?>;
                            $results[3] = $answers;
                            
                            $.post('submit_answers.php', {
                               'results' : $results 
                            }, function(res) {
                                console.log(res);
                            });
                        }
                    }
                }

                function saveAndShare() {
                    
                }

                function openCity(cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    // evt.currentTarget.className += " active";
                }

                // Get the element with id="defaultOpen" and click on it
                openCity('q0');

            </script>

        </div>
        <script src="js/jquery.raccordion.js" type="text/javascript"></script>
        <script src="js/jquery.animation.easing.js" type="text/javascript"></script>
    </body>
</html>
