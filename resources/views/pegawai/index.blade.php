@extends('layouts')

@section('content')
	<div class="d-flex justify-content-between align-items-center">
		<h1>Data Pegawai</h1>
		<a href="{{ route('pegawai.create') }}" class="btn btn-primary">Tambah Data Pegawai</a>
	</div>
	@if(session('success'))
		<div class="alert alert-success">{{ session('success') }}</div>
	@endif
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Nama Pegawai</th>
					<th>Total Gaji Pegawai</th>
				</tr>
			</thead>
			<tbody>
				@foreach($pegawai as $p)
					<tr>
						<td>{{ AppHelper::get_first_name($p->nama_pegawai) }}</td>
						<td>Rp. {{ AppHelper::num_format($p->total_gaji) }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection