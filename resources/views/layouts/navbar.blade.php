<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
 
<div class = "col-lg-12 nav-whole">
	<div class = "col-lg-3 col-lg-offset-1 logo">
		<img src = "{{ URL::asset('image/logo-navbar.png')}}" class = "img navbar-logo">
	</div>
	<div class = "col-lg-6 col-lg-offset-2 nav-links">
		<ul>
			<li class = "link">Home</li>
			<li class = "link">Opportunities</li>
			<li class = "link">About</li>
			<li class = "link">Contact</li>
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
				<a href = "" class = "btn applynow-btn">Apply Now</a></li>
			</div>
		</ul>
	</div>
</div>