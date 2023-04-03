<div class="sidebar sidebar-style-2  bg-dark3">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span style="color: white">
									
									<?php $user = Auth::guard('alumni')->user();?>
									{{ $user->nama }}
									<span class="user-level"></span>
									
								</span>
							</a>
							<div class="clearfix"></div>

						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a  href="{{ URL::route('alumni') }}">
								<i class="fas fa-home"></i>
								<span>Beranda</span>
								<!-- <span class="caret"></span> -->
							</a>
						</li>
						{{-- <li class="nav-item">
							<a  href="{{ URL('artikel') }}">
								<i class="fas fa-book-open"></i>
								<span>Data Artikel</span>
								<!-- <span class="caret"></span> -->
							</a>
						</li> --}}
						<li class="nav-item">
							<a href="{{ url('dataku') }}/{{ $user->id }}">
								<i class="fas fa-users"></i>
								<p>Data Pribadiku</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('lamaranku') }}/{{ $user->id }}">
								<i class="fas fa-users"></i>
								<p>Data Lamaranku</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('listlowongan') }}">
								<i class="fas fa-briefcase"></i>
								<p>Data Lowongan</p>
							</a>
						</li>
						<li class="nav-item" >
							<a class="btn btn-sm btn-danger"  href="{{ url('alumnikeluar') }}">
								<i class="fas fa-door-open" style="color: white;"></i><p style="color: white;">Keluar</p></a>
						</li>
						
					</ul>
					
				</div>
			</div>
</div>