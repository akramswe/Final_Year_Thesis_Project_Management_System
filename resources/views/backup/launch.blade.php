<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Software Engineering E-token</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->
	<!--/Style-CSS -->
	<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="all" />
	<!--//Style-CSS -->
	<!-- font-awesome-icons -->
	<link href="assets/css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome-icons -->
</head>

<body>
	<section class="coming-61-w3l-vv-soon">
		<!-- /coming-61-w3l-vv-section -->
		<div class="coming-61-w3l-vv-mian">
			<div class="wrapper">
				<div class="coming-61-w3l-vv-top">
					<div class="coming-61-w3l-vv-info">
						<h1>We Are Launching Soon</h1>
						<h1>E-token System</h1>

						<ul class="counter-inner">
							<li><span id="days"></span>days</li>
							<li><span id="hours"></span>Hours</li>
							<li><span id="minutes"></span>Minutes</li>
							<li><span id="seconds"></span>Seconds</li>
						</ul>

						<form action="#" method="GET" class="d-flex coming-form">
							<input type="email" placeholder="" required="required">
							<button type="submit">Get Notify</button>
						</form>

					</div>

				</div>
				<div class="social-coming-soon">

					<div class="social-coming-button">
						<p class="copy-footer">© 2019 Launch . All rights reserved | Design by
							Washim Akram</p>
					</div>
					<div class="social-coming-icons">
						<a href="#" title="Facebook" class="footer-fb"><span class="fa fa-facebook"
								aria-hidden="true"></span></a>
						<a href="#" title="Twitter" class="footer-tw"><span class="fa fa-twitter"
								aria-hidden="true"></span></a>
						<a href="#" title="Google Plus" class="footer-gg"><span class="fa fa-google-plus"
								aria-hidden="true"></span></a>
						<a href="#" title="Linkedin" class="footer-lin"><span class="fa fa-linkedin"
								aria-hidden="true"></span></a>
					</div>
				</div>
			</div>
		</div>
		<script src="assets/js/jquery-3.3.1.min.js"></script>
		<script>
			const second = 1000,
				minute = second * 60,
				hour = minute * 60,
				day = hour * 24;

			let countDown = new Date('Nov 9, 2019 00:00:00').getTime(),
				x = setInterval(function () {

					let now = new Date().getTime(),
						distance = countDown - now;

					document.getElementById('days').innerText = Math.floor(distance / (day)),
						document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
						document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
						document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

					//do something later when date is reached
					//if (distance < 0) {
					//  clearInterval(x);
					//  'IT'S MY BIRTHDAY!;
					//}

				}, second)
		</script>
	</section>


</body>

</html>