@extends('layouts.main')

@section('content')
						<div class="page-header">
							<ul class="breadcrumbs">
								<li class="nav-home">
									<a href="#">
										<i class="flaticon-home"></i> | Beranda
									</a>
								</li>
								<li class="separator">
									<i class="flaticon-right-arrow"></i>
								</li>
							</ul>
                        </div>
                        
<div class="container ">
    <div class="row">
        <div class="col-md">
            <div class="panel panel-default">

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                 <div class="container">
                    <div class="row">
                        
						{{-- <div class="col-md-3">
							<div class="card card-dark bg-primary-gradient">
								<div class="card-body pb-0">
									<!-- <div class="h1 fw-bold float-right">+5%</div> -->
									<h2 class="mb-2">17</h2>
									<p>Total Siswa Aktif</p>
									<div class="pull-in sparkline-fix chart-as-background">
										<div id="lineChart"><canvas width="327" height="70" style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas></div>
									</div>
								</div>
							</div>
                        </div> --}}
                        
						{{-- <div class="col-md-3">
							<div class="card card-dark bg-secondary-gradient">
								<div class="card-body pb-0">
									<!-- <div class="h1 fw-bold float-right">+5%</div> -->
									<h2 class="mb-2">17</h2>
									<p>Total Guru</p>
									<div class="pull-in sparkline-fix chart-as-background">
										<div id="lineChart"><canvas width="327" height="70" style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas></div>
									</div>
								</div>
							</div>
                        </div> --}}
                        

						{{-- <div class="col-md-3">
							<div class="card card-dark bg-secondary-gradient">
								<div class="card-body pb-0">
									<!-- <div class="h1 fw-bold float-right">+5%</div> -->
									<h2 class="mb-2">17</h2>
									<p>Total Mata Pelajaran</p>
									<div class="pull-in sparkline-fix chart-as-background">
										<div id="lineChart"><canvas width="327" height="70" style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas></div>
									</div>
								</div>
							</div>
                        </div> --}}

						{{-- <div class="col-md-3">
							<div class="card card-dark bg-secondary-gradient">
								<div class="card-body pb-0">
									<!-- <div class="h1 fw-bold float-right">+5%</div> -->
									<h2 class="mb-2">17</h2>
									<p>Total Kelas</p>
									<div class="pull-in sparkline-fix chart-as-background">
										<div id="lineChart"><canvas width="327" height="70" style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas></div>
									</div>
								</div>
							</div>
                        </div> --}}
                        
                        <!-- Awal Pengumuman -->
						<div class="col-lg">
                            
                            <div class="card ">
                                <div class="card-header  bg-dark3">
									<i class="fas fa-bullhorn"></i> Pengumuman
                                </div>
                                <div class="card-body  bg-dark3">
                                    @foreach($pengumunan as $data)
									<ol class="activity-feed">
										<li class="feed-item feed-item-secondary">
											<div class="d-flex">
												{{ $data->judul_pengumuman }}
												<div class="d-flex ml-auto align-items-center">
													<h5 class="text-info fw-bold">{{ $data->tgl_pengumuman }}</h5>
												</div>
											</div>
											<span class="text">{{ $data->isi_pengumuman }}</span>
										</li>
									</ol>	
									@endforeach
								</div>
                            </div>
                        </div>    
                        <!-- Akhir Pengumuman -->

                        {{-- <!-- Awal Pesan -->
						<div class="col-md-4">
							<div class="card">
								<div class="card-body">
									<div class="card-title fw-mediumbold">Pesan</div>
									<div class="card-list">
										<div class="item-list">
											<div class="avatar">
												<img src="#" alt="..." class="avatar-img rounded-circle">
											</div>
											<div class="info-user ml-3">
												<div class="username">Nama Dia</div>
												<div class="status">Isis PEsan DIa</div>
											</div>
											<button class="btn btn-default">
												<span class="btn-label">
													<i class="fa flaticon-message"></i>
												</span>
												Balas
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <!-- Akhir Pesan --> --}}

            </div>
        </div>
    </div>
</div>

@endsection
