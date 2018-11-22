<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!doctype html>

<html>
<?php
	$con = mysqli_connect("51.75.249.227", "bee1", "12345", "green_it_survey") or die("Error " . mysqli_error($connection));
	if ($con->connect_errno) {
		die('Connect Error (' . $con->connect_errno . ') '. $con->connect_error);
	}
	
	$sql="Select * from questions left join choices on questions.question_number=choices.question_number
			left join categories on questions.category_id=categories.id
			left join relations on choices.id=relations.id_choice;";
	if($res=$con->query($sql)){
		while($row = $res->fetch_assoc()){
			// echo "ID: " . $row["ID"]. " - Name: " . $row["name"]. "<br>";
			// print_r($row);echo "<br>";
		// exit;
			$questions[]=$row;
		}
		// exit;
	}else{
		echo "ERROR ".$con->error;exit;
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
            // $('#accordion-wrapper').raccordion({
                // speed: 10,
                // sliderWidth: 350,
                // sliderHeight: 300,
                // autoCollapse: false
            // });
			// setTimeout(function(){
				$('#firstslide').addClass('active');
				$('#firstslide .caption').css('opacity',1);
			// },1500);
        }); 
    </script>
	<style>
	.wrapper1 {
  width: 100px; /* Set the size of the progress bar */
  height: 100px;
  position: absolute; /* Enable clipping */
  clip: rect(0px, 100px, 100px, 50px); /* Hide half of the progress bar */
}
/* Set the sizes of the elements that make up the progress bar */
.circle {
  width: 80px;
  height: 80px;
  border: 10px solid green;
  border-radius: 50px;
  position: absolute;
  clip: rect(0px, 50px, 100px, 0px);
}
/* Using the data attributes for the animation selectors. */
/* Base settings for all animated elements */
div[data-anim~=base] {
  -webkit-animation-iteration-count: 1;  /* Only run once */
  -webkit-animation-fill-mode: forwards; /* Hold the last keyframe */
  -webkit-animation-timing-function:linear; /* Linear animation */
}

.wrapper1[data-anim~=wrapper] {
  -webkit-animation-duration: 0.01s; /* Complete keyframes asap */
  -webkit-animation-delay: 3s; /* Wait half of the animation */
  -webkit-animation-name: close-wrapper; /* Keyframes name */
}

.circle[data-anim~=left] {
  -webkit-animation-duration: 6s; /* Full animation time */
  -webkit-animation-name: left-spin;
}

.circle[data-anim~=right] {
  -webkit-animation-duration: 3s; /* Half animation time */
  -webkit-animation-name: right-spin;
}
/* Rotate the right side of the progress bar from 0 to 180 degrees */
@-webkit-keyframes right-spin {
  from {
    -webkit-transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(180deg);
  }
}
/* Rotate the left side of the progress bar from 0 to 360 degrees */
@-webkit-keyframes left-spin {
  from {
    -webkit-transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(360deg);
  }
}
/* Set the wrapper clip to auto, effectively removing the clip */
@-webkit-keyframes close-wrapper {
  to {
    clip: rect(auto, auto, auto, auto);
  }
}
</style>
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
						
						<?php
						$temp=0;
							// for($i=0;$i<count($questions);++$i){
								// print_r($questions);exit;
								$categorynb=0;
							for($i=0;$i<1000;$i++){
								// print_r($questions[$i]);echo "<br>";
								$qn=$questions[$i]['question_number'];
								// echo $qn.'<br>'.$temp.'<br>';exit;
								if($temp!=$qn){
									$temp=$qn;
									if($qn>1){
										echo '</ul>
												<div class="clear"></div>
											</div>	
										</div>
									</div>
									<input type="button" onclick="openCity(\'q'.($qn).'\')" value="Next"></button>
									<input type="button" onclick="openCity(\'q'.($qn-2).'\')" style="background:grey" value="Previous"></button>
								</div>
							</div>
						</div>';
									}
								// echo $questions[$i]['sub_category'];exit;
									echo '<div id="q'.($qn).'" class="pricing tabcontent">';
									// if($categorynb!=$questions[$i]['category_id']){
										$categorynb=$questions[$i]['category_id'];
										echo '<div class="pricing-top blue-top">
												<h3>'.$questions[$i]['category'] .
										( empty($questions[$i]['sub_category']) ? '' : ' - '.$questions[$i]['sub_category'] ) .
										'</h3>
											</div>';
									// }
									echo '
											<div class="pricing-bottom two">
												<div class="pricing-bottom-bottom">
													<div class="content-wthree2">
														<div class="grid-w3layouts1">
															<div class="w3-agile1">
																<label class="rating">'.$questions[$i]['question'].'</label>
																<ul>
																';
																
									if($questions[$i]['input'] == 0)
										echo '<li>
											<input type="radio" id="o'.$i.'" name="s'.$qn.'">
											<label for="o'.$i.'">
												'.$questions[$i]['choice'].'
											</label>
											<div class="check"></div>
										</li>';
										else
											echo '<li>
													<input type="text" id="o'.$i.'" name="o'.$i.'" placeholder="'.( strlen($questions[$i]['choice'])==0 ? 'Your message here' : $questions[$i]['choice'] ).'" style="border: 0;padding: 10px;border-radius: 6px;float: left;margin-left: 45px;">
												</li>';
								}else{
									if($questions[$i]['input'] == 0)
										echo '<li>
												<input type="radio" id="o'.$i.'" name="s'.$qn.'">
												<label for="o'.$i.'">
													'.$questions[$i]['choice'].'
												</label>
												<div class="check"></div>
											</li>';
									else
										echo '<li>
												<input type="text" id="o'.$i.'" name="o'.$i.'" placeholder="'.( strlen($questions[$i]['choice'])==0 ? 'Your message here' : $questions[$i]['choice'] ).'" style="border: 0;padding: 10px;border-radius: 6px;float: left;margin-left: 45px;">
											</li>';
								}
							}
							// foreach($questions as $k=>$v){
								// echo $k.": ";print_r($v);echo "<br>";
							// }
							// exit;
						?>
						
						</form>
                </div>
            </div>
        </div>
    </div>
	<script>
	function next(){
		console.log('next');
		
		
		
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
	
	function completeAndRedirect(){
		console.log('completeAndRedirect');
		console.log($('#a-option').is(":checked"));
		console.log($('#b-option').is(":checked"));
		console.log($('#c-option').is(":checked"));
		console.log($('#d-option').is(":checked"));
		console.log($('#e-option').is(":checked"));
		console.log($('#f-option').is(":checked"));
		console.log($('#g-option').is(":checked"));
		console.log($('#h-option').is(":checked"));
		console.log($('#j-option').is(":checked"));
		console.log($('#k-option').is(":checked"));
		if($('#a-option').is(":checked"))introduction=6;
		else if($('#b-option').is(":checked"))introduction=2;
		else if($('#c-option').is(":checked"))introduction=10;
		else introduction=0;
			
		if($('#d-option').is(":checked"))staff=10;
		else if($('#e-option').is(":checked"))staff=8;
		else if($('#f-option').is(":checked"))staff=6;
		else if($('#g-option').is(":checked"))staff=4;
		else if($('#h-option').is(":checked"))staff=2;
		else staff=0;
			
		if($('#j-option').is(":checked"))cleanliness=10;
		else if($('#k-option').is(":checked"))cleanliness=8;
		else if($('#l-option').is(":checked"))cleanliness=6;
		else if($('#m-option').is(":checked"))cleanliness=4;
		else if($('#n-option').is(":checked"))cleanliness=2;
		else cleanliness=0;
		
		if($('#o-option').is(":checked"))valofmoney=10;
		else if($('#p-option').is(":checked"))valofmoney=8;
		else if($('#q-option').is(":checked"))valofmoney=6;
		else if($('#r-option').is(":checked"))valofmoney=4;
		else if($('#s-option').is(":checked"))valofmoney=2;
		else valofmoney=0;
			
		if($('#t-option').is(":checked"))punctuality=10;
		else if($('#u-option').is(":checked"))punctuality=8;
		else if($('#v-option').is(":checked"))punctuality=6;
		else if($('#w-option').is(":checked"))punctuality=4;
		else if($('#x-option').is(":checked"))punctuality=2;
		else punctuality=0;
			
		$.get("/inc/rating.php", { 'vals[]' : [introduction,staff,cleanliness,valofmoney,punctuality] , 'name': $('#name').val() , 'email': $('#email').val() , 'phone': $('#phone').val() , 'feedback1': $('#feed1').val() , 'feedback2': $('#feed2').val() , 'message': $('#message1').val() }
				,function(result){
					$('#result').text(result);
					if(result<2) $('#result').css("background","white");
					else if(result<4) $('#result').css("background","red");
					else if(result<6) $('#result').css("background","orange");
					else if(result<8) $('#result').css("background","yellow");
					else if(result<=10) $('#result').css("background","green");
					// if(result==10) $('#result').css("background","green");
					openCity('thankyou');
					console.log(result);
				});
	}
	
	</script>
	
</div>
<script src="js/jquery.raccordion.js" type="text/javascript"></script>
<script src="js/jquery.animation.easing.js" type="text/javascript"></script>
</body>
</html>
