
			@guest
					<div class="copyright ml-auto">
						Copyright &copy 2020, made with <i class="fa fa-heart heart text-danger"></i> by <a href="###">Me</a>
					</div>
			@else
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="#">
									#
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									#
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									#
								</a>
							</li>
						</ul>
					</nav>

					<div class="copyright ml-auto">
						<p class="p-small" style="color: black;font-size:18px;"> @php echo"Copyright © 2020 - ".(int)date('Y') @endphp, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://muslikh.my.id">Me</a> , Template by <a href="https://inovatik.com">Inovatik</a> </p>
					</div>
				</div>
			</footer>
			@endguest