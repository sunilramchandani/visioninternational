<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
 <!----------------------- DESKTOP NAVBAR ---------------------------------------->
<div class = "col-lg-12 col-md-12 nav-whole hidden-sm hidden-xs">
	<div class = "col-lg-3 col-lg-offset-1 col-md-3 logo">
		<a href="/"><img src = "{{ URL::asset('image/logo-navbar.png')}}" class = "img navbar-logo"></a>
	</div>
	<div class = "col-lg-7 col-lg-offset-1 col-md-9 nav-links">
		<ul>
			<a href ="/"></a><li class = "link">Home</li></a>
			<div class="dropdown">
				<button class="dropbtn">Opportunities</button>
				<div class="dropdown-content">
					<div class = "col-lg-6 col-md-6">
						<p class = "dropdown-content-header">United States</p>
						<a href="#">Work & Travel</a>
						<a href="/internshipcompany">Internship</a>
						<a href="#">Au Pair</a>
					</div>
					<div class = "col-lg-6 col-md-6">
						<p class = "dropdown-content-header">Australia</p>
						<a href="#">Internship</a>
						<a href="#">Skilled Migration</a>
					</div>
				</div>
			</div>
			<li class = "link">About</li>
			<a href="/contactus"><li class = "link">Contact</li></a>
			<div class="dropdown">
				<button class="dropbtn">Learn More</button>
				<div class="dropdown-content">
					<a href="#">News</a>
					<a href="#">Events</a>
					<a href="#">Blog</a>
					<a href="#">FAQ</a>
				</div>
			</div>
			<div class = "applynow-btn">
				<a href = "application" class = "btn applynow-btn">Apply Now</a>
			</div>
		</ul>
	</div>
</div>

<!----------------------- MOBILE NAVBAR ---------------------------------------->
<div class = "col-sm-12 col-xs-12 nav-whole hidden-lg hidden-md">
	<div class = "row">
		<div class = "col-sm-3 col-sm-offset-1 col-xs-3 logo">
			<img src = "{{ URL::asset('image/logo-navbar.png')}}" class = "img navbar-logo">
		</div>
		<div class = "col-sm-3 col-sm-offset-5 col-xs-3 col-xs-offset-5 nav-links">
			<ul>
				<div class = "applynow-btn">
					<a href = "application" class = "btn applynow-btn1">Apply Now</a>
				</div>
			</ul>
		</div>
	</div>
	<div class = "row text-center links-mobile">
		<ul>
			<div class="dropdown">
				<button class="dropbtn">Opportunities <span class="glyphicon glyphicon-triangle-bottom"></span> </button>
				<div class="dropdown-content">
					<div class = "col-sm-6 col-xs-6">
						<p class = "dropdown-content-header">United States</p>
						<a href="#">Work & Travel</a>
						<a href="#">Internship</a>
						<a href="#">Au Pair</a>
					</div>
					<div class = "col-sm-6 col-xs-6">
						<p class = "dropdown-content-header">Australia</p>
						<a href="#">Internship</a>
						<a href="#">Skilled Migration</a>
					</div>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">About <span class="glyphicon glyphicon-triangle-bottom"></span> </button>
			</div>
			<div class="dropdown">
				<button class="dropbtn">Contact <span class="glyphicon glyphicon-triangle-bottom"></span> </button>
			</div>
			<div class="dropdown">
				<button class="dropbtn">Learn More <span class="glyphicon glyphicon-triangle-bottom"></span> </button>
				<div class="dropdown-content">
					<a href="#">News</a>
					<a href="#">Events</a>
					<a href="#">Blog</a>
					<a href="#">FAQ</a>
				</div>
			</div>
		</ul>
	</div>
</div>