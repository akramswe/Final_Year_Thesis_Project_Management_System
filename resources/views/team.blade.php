<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Our Team</title>
	<link href="welcome/images/logo1.png" rel="shortcut icon" type="image/png">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"></script>
<style type="text/css">
	body {
	background-color: #f4f4f4;
}


.box {
	border-radius: 150px;
	background:#fff;
	position:relative;
	overflow: hidden;
	text-align:center;
}
.box:before {
    position: absolute;
    content: '';
    left: 0px;
    top: 0px;
    width: 0px;
    height: 100%;
    border-radius: 150px;
    box-shadow: inset 0 0 25px rgba(0,0,0,0.30);
    transition: all 0.3s ease;
    background-image: linear-gradient(to right, #3c70a4 0%, #64b2cd 100%);
    
}
*, ::after, ::before {
    box-sizing: border-box;
    margin-left: auto;
    margin-top: auto;
}
.box:hover:before {
    width: 100%;
}
.box:hover .image-wrapper {
	padding:0;
}
.box:hover .box-desc {
	color:#fff;
}
.box:hover .social li a {
	background:#fff;
	background-image: none;
	color:#000;
}
.box:hover .social li a:hover {
	background:#1d1d1d;
	color:#fff;
}
.image-wrapper {
    position: relative;
	max-width: 210px;
    max-height: 210px;
	margin:0 auto;
    overflow: hidden;
    border-radius: 50%;
    padding: 15px;
    transition: all 0.5s ease;
    box-shadow: inset 0px 0px 20px rgba(0,0,0,0.20);
}
.image-wrapper img {
    border-radius: 50%;
    transition: all 500ms ease;
}
.box-desc {
	position:relative;
}
ul.social {
	padding:0;
}
ul.social li {
	display:inline-block;
	list-style-type:none;
}
ul.social li a {
	position:relative;
	width: 36px;
    height: 36px;
	background-image: linear-gradient(to right, #3c70a4 0%, #64b2cd 100%);
	display:inline-block;
	line-height:36px;
	border-radius:50%;
	color:#fff;
	transition: all .5s ease;
}

</style>
</head>
<body>
   <div class="container">
   	<br>
   	<h1 align="center" style="font-style: italic;">OUR DEVELOPMENT TEAM</h1>
   	<br>
	<div class="row vh-100 card_prf">
		<div class="col-sm-6 col-lg-3 my-auto">
			<div class="box shadow-sm p-4">
				<div class="image-wrapper mb-3">
					<img class="img-fluid" src="welcome/images/akram1.jpg" alt="..." />
				</div>
				<div class="box-desc">
					<h5>Washim Akram</h5>
					<p>Developer</p>
				</div>
				<ul class="social">
					<li><a href="https://www.facebook.com/akram1162"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="#"><i class="fab fa-instagram"></i></a></li>
					<li><a href="https://github.com/akramswe"><i class="fab fa-github"></i></a></li>
				</ul>
			</div>
		</div>
		<div class="col-sm-6 col-lg-3 my-auto">
			<div class="box shadow-sm p-4">
				<div class="image-wrapper mb-3">
					<img class="img-fluid" src="welcome/images/asif.jpg" alt="..." />
				</div>
				<div class="box-desc">
					<h5>Asif Khan Shakir</h5>
					<p>Project Manager</p>
				</div>
				<ul class="social">
					<li><a href="https://www.facebook.com/shakir1232"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="#"><i class="fab fa-instagram"></i></a></li>
					<li><a href="#"><i class="fab fa-github"></i></a></li>
				</ul>
			</div>
		</div>
		<div class="col-sm-6 col-lg-3 my-auto">
			<div class="box shadow-sm p-4">
				<div class="image-wrapper mb-3">
					<img class="img-fluid" src="welcome/images/shohel.jpg" alt="..." />
				</div>
				<div class="box-desc">
					<h5>Shohel Arman</h5>
					<p>Project Manager</p>
				</div>
				<ul class="social">
					<li><a href="https://www.facebook.com/shohel.amran.shuvo"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="#"><i class="fab fa-instagram"></i></a></li>
					<li><a href="#"><i class="fab fa-github"></i></a></li>
				</ul>
			</div>
		</div>
		<!-- <div class="col-sm-6 col-lg-3 my-auto">
			<div class="box shadow-sm p-4">
				<div class="image-wrapper mb-3">
					<img class="img-fluid" src="https://images.pexels.com/photos/555790/pexels-photo-555790.png" alt="..." />
				</div>
				<div class="box-desc">
					<h5>Jon Doe</h5>
					<p>FrontEnd Developer</p>
				</div>
				<ul class="social">
					<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="#"><i class="fab fa-instagram"></i></a></li>
					<li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
				</ul>
			</div>
		</div> -->
		
	</div>
</div>	
	
</body>
</html>