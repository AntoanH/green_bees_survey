<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!doctype html>
<html>
<head>
<title>165Cteam Rating Survey Form</title>
<!-- meta-tags -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="165cteam rate rating review feedback" />
<!-- //meta-tags -->
<link href="//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet"> <!-- Font-awesome-CSS --> 
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/raccordion.css" />
    <script type="text/javascript">
        $(window).load(function () {
            $('#accordion-wrapper').raccordion({
                speed: 1000,
                sliderWidth: 700,
                sliderHeight: 300,
                autoCollapse: false
            });
			setTimeout(function(){
				$('#firstslide').addClass('active');
				$('#firstslide .caption').css('opacity',1);
			},1500);
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
	<h1>Rating Survey Form</h1>
	<div class="wrapper">
		<div id="accordion-wrapper">
            <div class="slide" onclick="openCity('expectation')">
                <img src="images/1.jpg" alt="image" />
				<div class="caption">
                    <div class="pricing">
							<div class="pricing-top green-top">
								<i class="fa fa-check-square-o" aria-hidden="true"></i>
							</div>
							<div class="pricing-bottom">
								<div class="pricing-bottom-bottom">
									<h2>How would you rate for our services</h2>
									<p>We are always trying to improve our services by your indispensable feedback. </p>
								</div>
								<div class="buy-button green-button">
								<ul>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
								</ul>
								</div>
							</div>
					</div>
                </div>
            </div>
            <div id="firstslide" class="slide slide-two-w3ls">
                <img src="images/3.jpg" alt="image" />
				<div class="caption">
					<form action="javascript:completeAndRedirect();" method="post">
                    <div id="expectation" class="pricing tabcontent">
					  	<div class="pricing-top blue-top">
								<h3>Expectation</h3>
							</div>
							<div class="pricing-bottom two">
								<div class="pricing-bottom-bottom">
									<div class="content-wthree2">
										<div class="grid-w3layouts1">
											<div class="w3-agile1">
												<label class="rating">Did 165Cteam meet your expectations?</label>
												<ul>
												<?php 
													// $alpha="abcdefghijklmnopqrstuvwxyz";
													// $alphacount=0;
													// for($i=5;$i>=1;$i--){
														
														// echo '
													// <li>
														// <input type="radio" id="'.substr($alpha,$alphacount,1).'-option" name="selector1">
														// <label for="'.substr($alpha,$alphacount++,1).'-option">
														// ';
														// for($j=0;$j<$i;$j++){
															// echo '
															// <i class="fa fa-star-o" aria-hidden="true"></i>
															// ';
														// }
														// echo '
														// </label>
														// <div class="check">';
														// if($i==4||$i==3) echo '<div class="inside"></div>';
														// echo '</div>
													// </li>
													// ';
													// }
													?><li>
														<input type="radio" id="a-option" name="selector1" onclick="setTimeout(function(){openCity('staff');},500)">
														<label for="a-option">
															Yes
														</label>
														<div class="check"></div>
													</li>
													<li>
														<input type="radio" id="b-option" name="selector1" onclick="setTimeout(function(){openCity('staff');},500)">
														<label for="b-option">
															No
														</label>
														<div class="check"><div class="inside"></div></div>
													</li>
													<li>
														<input type="radio" id="c-option" name="selector1" onclick="setTimeout(function(){openCity('staff');},500)">
														<label for="c-option">
															It exceeds my expectations
														</label>
														<div class="check"><div class="inside"></div></div>
													</li>
													
												</ul>
												<div class="clear"></div>
											</div>	
										</div>
									</div>
									<input type="button" onclick="openCity('staff')" id="nextbtn" value="Next"></button>
									<input type="submit" name="submit" id="submitfeedback" style="display:none" value="Send Feedback">
								
								</div>
							</div>
						</div>
						<div id="staff" class="pricing tabcontent">
					  	<div class="pricing-top blue-top">
								<h3>Staff Rating</h3>
							</div>
							<div class="pricing-bottom two">
								<div class="pricing-bottom-bottom">
									<div class="content-wthree2">
										<div class="grid-w3layouts1">
											<div class="w3-agile1">
												<label class="rating">Staff</label>
												<ul>
													<li>
														<input type="radio" id="d-option" name="selector2" onclick="setTimeout(function(){openCity('cleanliness');},500)">
														<label for="d-option">
															<i class="fa fa-star-o" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i> 
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</label>
														<div class="check"></div>
													</li>
													<li>
														<input type="radio" id="e-option" name="selector2" onclick="setTimeout(function(){openCity('cleanliness');},500)">
														<label for="e-option">
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i> 
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</label>
														<div class="check"><div class="inside"></div></div>
													</li>
													<li>
														<input type="radio" id="f-option" name="selector2" onclick="setTimeout(function(){openCity('cleanliness');},500)">
														<label for="f-option">
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i> 
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</label>
														<div class="check"><div class="inside"></div></div>
													</li>
													<li>
														<input type="radio" id="g-option" name="selector2" onclick="setTimeout(function(){openCity('cleanliness');},500)">
														<label for="g-option">
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i> 
														</label>
														<div class="check"></div>
													</li>
													<li>
														<input type="radio" id="h-option" name="selector2" onclick="setTimeout(function(){openCity('cleanliness');},500)">
														<label for="h-option">
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</label>
														<div class="check"></div>
													</li>
												</ul>
												<div class="clear"></div>
											</div>	
										</div>
									</div>
									<input type="button" onclick="openCity('cleanliness')" value="Next"></button>
									<input type="button" onclick="openCity('expectation')" style="background:grey" value="Previous"></button>
									

								</div>
							</div>
						</div>
						<div id="cleanliness" class="pricing tabcontent">
					  	<div class="pricing-top blue-top">
								<h3>Cleanliness Rating</h3>
							</div>
							<div class="pricing-bottom two">
								<div class="pricing-bottom-bottom">
									<div class="content-wthree2">
										<div class="grid-w3layouts1">
											<div class="w3-agile1">
												<label class="rating">Cleanliness</label>
												<ul>
													<li>
														<input type="radio" id="j-option" name="selector3" onclick="setTimeout(function(){openCity('valofmoney');},500)">
														<label for="j-option">
															<i class="fa fa-star-o" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i> 
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</label>
														<div class="check"></div>
													</li>
													<li>
														<input type="radio" id="k-option" name="selector3" onclick="setTimeout(function(){openCity('valofmoney');},500)">
														<label for="k-option">
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i> 
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</label>
														<div class="check"><div class="inside"></div></div>
													</li>
													<li>
														<input type="radio" id="l-option" name="selector3" onclick="setTimeout(function(){openCity('valofmoney');},500)">
														<label for="l-option">
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i> 
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</label>
														<div class="check"><div class="inside"></div></div>
													</li>
													<li>
														<input type="radio" id="m-option" name="selector3" onclick="setTimeout(function(){openCity('valofmoney');},500)">
														<label for="m-option">
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i> 
														</label>
														<div class="check"></div>
													</li>
													<li>
														<input type="radio" id="n-option" name="selector3" onclick="setTimeout(function(){openCity('valofmoney');},500)">
														<label for="n-option">
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</label>
														<div class="check"></div>
													</li>
												</ul>
												<div class="clear"></div>
											</div>	
										</div>
									</div>
									<input type="button" onclick="openCity('valofmoney')" value="Next"></button>
									<input type="button" onclick="openCity('staff')" style="background:grey" value="Previous"></button>
									

								</div>
							</div>
						</div>
						<div id="valofmoney" class="pricing tabcontent">
					  	<div class="pricing-top blue-top">
								<h3>Value of money</h3>
							</div>
							<div class="pricing-bottom two">
								<div class="pricing-bottom-bottom">
									<div class="content-wthree2">
										<div class="grid-w3layouts1">
											<div class="w3-agile1">
												<label class="rating">Value of money</label>
												<ul>
													<li>
														<input type="radio" id="o-option" name="selector4" onclick="setTimeout(function(){openCity('punctuality');},500)">
														<label for="o-option">
															<i class="fa fa-star-o" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i> 
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</label>
														<div class="check"></div>
													</li>
													<li>
														<input type="radio" id="p-option" name="selector4" onclick="setTimeout(function(){openCity('punctuality');},500)">
														<label for="p-option">
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i> 
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</label>
														<div class="check"><div class="inside"></div></div>
													</li>
													<li>
														<input type="radio" id="q-option" name="selector4" onclick="setTimeout(function(){openCity('punctuality');},500)">
														<label for="q-option">
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i> 
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</label>
														<div class="check"><div class="inside"></div></div>
													</li>
													<li>
														<input type="radio" id="r-option" name="selector4" onclick="setTimeout(function(){openCity('punctuality');},500)">
														<label for="r-option">
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i> 
														</label>
														<div class="check"></div>
													</li>
													<li>
														<input type="radio" id="s-option" name="selector4" onclick="setTimeout(function(){openCity('punctuality');},500)">
														<label for="s-option">
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</label>
														<div class="check"></div>
													</li>
												</ul>
												<div class="clear"></div>
											</div>	
										</div>
									</div>
									<input type="button" onclick="openCity('punctuality')" value="Next"></button>
									<input type="button" onclick="openCity('cleanliness')" style="background:grey" value="Previous"></button>
									
								</div>
							</div>
						</div>
						<div id="punctuality" class="pricing tabcontent">
					  	<div class="pricing-top blue-top">
								<h3>Punctuality Rating</h3>
							</div>
							<div class="pricing-bottom two">
								<div class="pricing-bottom-bottom">
									<div class="content-wthree2">
										<div class="grid-w3layouts1">
											<div class="w3-agile1">
												<label class="rating">Punctuality</label>
												<ul>
													<li>
														<input type="radio" id="t-option" name="selector5" onclick="setTimeout(function(){openCity('feedback');},500)">
														<label for="t-option">
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i> 
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</label>
														<div class="check"></div>
													</li>
													<li>
														<input type="radio" id="u-option" name="selector5" onclick="setTimeout(function(){openCity('feedback');},500)">
														<label for="u-option">
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i> 
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</label>
														<div class="check"><div class="inside"></div></div>
													</li>
													<li>
														<input type="radio" id="v-option" name="selector5" onclick="setTimeout(function(){openCity('feedback');},500)">
														<label for="v-option">
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i> 
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</label>
														<div class="check"><div class="inside"></div></div>
													</li>
													<li>
														<input type="radio" id="w-option" name="selector5" onclick="setTimeout(function(){openCity('feedback');},500)">
														<label for="w-option">
															<i class="fa fa-star-o" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i> 
														</label>
														<div class="check"></div>
													</li>
													<li>
														<input type="radio" id="x-option" name="selector5" onclick="setTimeout(function(){openCity('feedback');},500)">
														<label for="x-option">
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</label>
														<div class="check"></div>
													</li>
												</ul>
												<div class="clear"></div>
											</div>	
										</div>
									</div>
									<input type="button" onclick="openCity('feedback')" value="Next"></button>
									<input type="button" onclick="openCity('valofmoney')" style="background:grey" value="Previous"></button>
									

								</div>
							</div>
						</div>
						<div id="feedback" class="pricing tabcontent">
					  	<div class="pricing-top blue-top">
								<h3>Feedback</h3>
							</div>
							<div class="pricing-bottom two">
								<div class="pricing-bottom-bottom">
									<div class="content-wthree2">
										<div class="grid-w3layouts1">
											<div class="w3-agile1">
												<label class="rating">Your feedback</label>
												
													
												<div class="clear" style="height:10px"></div>
													<textarea rows="2" style="width:100%;max-width:100%;min-width:100%" id="feed1" placeholder="What did you like?"></textarea>
													<textarea rows="2" style="width:100%;max-width:100%;min-width:100%" id="feed2" placeholder="What didn't you like?"></textarea>
												<div class="clear" style="height:10px"></div>
											</div>	
										</div>
									</div>
									<input type="button" onclick="openCity('message')" value="Next"></button>
									<input type="button" onclick="openCity('punctuality')" style="background:grey" style="background:grey" value="Previous"></button>
									

								</div>
							</div>
						</div>
						<div id="message" class="pricing tabcontent">
					  	<div class="pricing-top blue-top">
								<h3>Message</h3>
							</div>
							<div class="pricing-bottom two">
								<div class="pricing-bottom-bottom">
									<div class="content-wthree2">
										<div class="grid-w3layouts1">
											<div class="w3-agile1">
											<input type="text" id="name" placeholder="Your Name" style="width: 100%;height: 25px;">
											<input type="text" id="email" placeholder="Your Email" style="width: 100%;height: 25px;">
											<input type="number" id="phone" placeholder="Your Phone number" style="width: 100%;height: 25px;">
												<label class="rating">Please enter your message</label>
												
													<textarea rows="4" style="width:100%;max-height:200px;max-width:100%;" id="message1" placeholder="Your message..."></textarea>
												<div class="clear" style="height:10px"></div>
											</div>	
										</div>
									</div>
									<input type="submit" value="Submit Feedback"></button>
									<input type="button" onclick="openCity('feedback')" style="background:grey" value="Previous"></button>
									

								</div>
							</div>
						</div>
						
						<div id="thankyou" class="pricing tabcontent">
					  	<div class="pricing-top blue-top">
								<h3>Thank you</h3>
							</div>
							<div class="pricing-bottom two">
								<div class="pricing-bottom-bottom">
									<div class="content-wthree2">
										<div class="grid-w3layouts1">
											<div class="w3-agile1">
											
												
											
												<label class="rating" style="padding-bottom: 30px;">Thank you for your review<br>Your Score is:</label>
												<label id="result" style="border-radius:20px;padding:10px;border:4px black solid;"></label>
													
												<div class="clear" style="height:10px"></div>
											</div>	
										</div>
									</div>
									

								</div>
							</div>
						</div>
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
	openCity('expectation');
	
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
		if($('#a-option').is(":checked"))expectation=6;
		else if($('#b-option').is(":checked"))expectation=2;
		else if($('#c-option').is(":checked"))expectation=10;
		else expectation=0;
			
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
			
		$.get("/inc/rating.php", { 'vals[]' : [expectation,staff,cleanliness,valofmoney,punctuality] , 'name': $('#name').val() , 'email': $('#email').val() , 'phone': $('#phone').val() , 'feedback1': $('#feed1').val() , 'feedback2': $('#feed2').val() , 'message': $('#message1').val() }
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
	
	<!--copyright-->
	<div class="w3ls-copyright">
		<p>© Copyright <a href="http://www.165cteam.com" target="_blank">165&#176;C-team</a> 2018</p>
	</div>
	<!--//copyright-->
</div>
<script src="js/jquery.raccordion.js" type="text/javascript"></script>
<script src="js/jquery.animation.easing.js" type="text/javascript"></script>
</body>
</html>
