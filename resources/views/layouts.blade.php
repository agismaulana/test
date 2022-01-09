<html>
	<head>
		<meta charset="utf-8">
		<title>Sistem Penggajian Pegawai</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		@stack('css')
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  	<a class="navbar-brand" href="#">Sistem Penggajian Pegawai</a>
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>

		  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		   	 	<ul class="navbar-nav ml-auto">
		      		<li class="nav-item active">
		        		<a class="nav-link" href="{{ route('pegawai.index') }}">Pegawai</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link " href="{{ route('gaji_pegawai.index') }}">Gaji Pegawai</a>
		      		</li>
		    	</ul>
		  	</div>
		</nav>
		<div class="container mt-3">
			@yield('content')
		</div>

		<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		@stack('js')
	</body>
</html>