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
								
									<?php $user = Auth::guard('mitra')->user();?>
									{{ $user->nama }}
									<span class="user-level"></span>
									
								</span>
							</a>
							<div class="clearfix"></div>

						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a  href="{{ URL::route('mitra') }}">
								<i class="fas fa-home"></i>
								<span>Beranda</span>
								<!-- <span class="caret"></span> -->
							</a>
						</li>
						<li class="nav-item">
							<a  href="{{ URL::route('dataartikel') }}">
								<i class="fas fa-book-open"></i>
								<span>Data Artikel</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ URL::route('dataalumni') }}">
								<i class="fas fa-users"></i>
								<p>Tracer Alumni</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ URL::route('dataperusahaan') }}">
								<i class="fas fa-building"></i>
								<p>Data Perusahaan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ URL::route('datalowongan') }}">
								<i class="fas fa-briefcase"></i>
								<p>Data Lowongan</p>
							</a>
						</li>
						<li class="nav-item" >
							<a class="btn btn-sm btn-danger"  href="{{ url('mitrakeluar') }}">
								<i class="fas fa-door-open" style="color: white;"></i><p style="color: white;">Keluar</p></a>
						</li>
					</ul>
				</div>
			</div>
</div>