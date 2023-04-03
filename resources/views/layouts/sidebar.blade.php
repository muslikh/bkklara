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
									<?php $user = Auth::guard('user')->user();?>
									{{ $user->nama }}
									<span class="user-level"></span>
									
								</span>
							</a>
							<div class="clearfix"></div>

						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a  href="{{ URL::route('home') }}">
								<i class="fas fa-home"></i>
								<span>Beranda</span>
								<!-- <span class="caret"></span> -->
							</a>
						</li>
						<li class="nav-item">
							<a  href="{{ URL::route('dataartikel') }}">
								<i class="fas fa-book-open"></i>
								<span>Data Artikel</span>
								<!-- <span class="caret"></span> -->
							</a>
						</li>
						<!-- <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li> -->
						<li class="nav-item">
							<a data-toggle="collapse" href="#master">
								<i class="fas fa-users"></i>
								<p>Data Alumni</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="master">
								<ul class="nav nav-collapse">
									<li class="{{ (request()->is('dataalumni')) ? 'active' : '' }}"> 
										<a href="{{ URL::route('dataalumni') }}">
											<span class="sub-item">Data Alumni</span>
										</a>
									</li>
									<li>
										<a href="{{ URL::route('dataregistrasi') }}">
											<span class="sub-item">Data Registrasi Alumni</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#perusahaan">
								<i class="fas fa-building"></i>
								<p>Data Perusahaan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="perusahaan">
								<ul class="nav nav-collapse">
									<li> 
										<a href="{{ URL::route('dataperusahaan') }}">
											<span class="sub-item">Data Perusahaan</span>
										</a>
										{{-- <a href="{{ URL::route('dataregistrasiperusahaan') }}">
											<span class="sub-item">Registrasi Perusahaan</span>
										</a> --}}
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#lowongan">
								<i class="fas fa-briefcase"></i>
								<p>Data Lowongan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="lowongan">
								<ul class="nav nav-collapse">
									<li> 
										<a href="{{ URL::route('datalowongan') }}">
											<span class="sub-item">Data Lowongan</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a  href="{{ URL::route('keterserapan') }}">
								<i class="fas fa-chalkboard-teacher"></i>
								<p>Data Keterserapan</p>
							</a>
						</li>
						<li class="nav-item">
							<a  href="{{ url('pengumuman') }}">
								<i class="fas fa-bullhorn"></i>
								<p>Pengumuman</p>
							</a>
						</li>
						
						<li class="nav-item">
							<a href="{{ URL::route('datalowongan') }}">
								<i class="fas fa-user"></i>
								<p>Data Admin</p>
							</a>
						</li>

						<li class="nav-item" >
							<a class="btn btn-sm btn-danger"  href="{{ url('adminkeluar') }}">
								<i class="fas fa-door-open" style="color: white;"></i><p style="color: white;">Keluar</p></a>
						</li>
					</ul>
					
				</div>
			</div>
</div>