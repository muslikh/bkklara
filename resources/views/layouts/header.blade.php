
<div class="main-header">
	<!-- Logo Header -->
	<div class="logo-header" data-background-color="dark3">
		
		<a href="{{ url('/') }}" class="logo">
			<img src="{{ asset('assets/img/sister.png') }}" alt="navbar brand" class="navbar-brand">
		</a>
		<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon">
				<i class="icon-menu"></i>
			</span>
		</button>
		<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
		<div class="nav-toggle">
			<button class="btn btn-toggle toggle-sidebar">
				<i class="icon-menu"></i>
			</button>
		</div>
	</div>
	<!-- End Logo Header -->
	<!-- Navbar Header -->
	<nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark3">

		<div class="container-fluid">
		
			<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

				{{-- @guest
					<li class="nav-item"><a href="{{ route('login') }}">Login</a></li>
					<!-- <li><a href="{{ route('register') }}">Register</a></li> -->
				@else --}}
				{{-- <li class="nav-item dropdown hidden-caret">
					<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
						<div class="avatar-sm">
							<img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
						</div>
					</a> --}}
					{{-- <ul class="dropdown-menu dropdown-user animated fadeIn">
						<div class="dropdown-user-scroll scrollbar-outer">
							<li>
								<div class="user-box">
									<div class="avatar-lg"><img src="" alt="image profile" class="avatar-img rounded"></div> 
									<div class="u-text">
										
										<p class="text-muted">hello</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
									</div>
								</div>
							<li>
								<div class="dropdown-divider"></div> <!-- Authentication Links -->
								<a class="dropdown-item" href="#">My Profile</a>
								<a class="dropdown-item" href="#">Account Setting</a> 
								<div class="dropdown-divider"></div>
								<a class="dropdown-item btn-danger" href="{{ url('keluar') }}"
									onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
									Logout
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</div>
					</ul> --}}
				{{-- </li> --}}
				{{-- @endguest --}}
			</ul>
		</div>
	</nav>
	<!-- End Navbar -->
</div>