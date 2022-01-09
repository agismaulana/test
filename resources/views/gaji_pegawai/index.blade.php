@extends('layouts')

@section('content')
	<h1>Data Gaji Pegawai</h1>
	<div class="d-flex justify-content-between align-items-center mb-2">
		<input type="month" name="month" class="form-control col-3 month">
		<div class="d-flex">
			<a href="{{ route('gaji_pegawai.create') }}" class="btn btn-primary mr-2">Tambah Data Gaji Pegawai</a>
			<a href="{{ route('gaji_pegawai.create_batch') }}" class="btn btn-primary">Tambah Data Gaji Pegawai Batch</a>
		</div>
	</div>
	@if(session('message'))
		<div class="alert alert-success">{{ session('message') }}</div>
	@endif
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Waktu</th>
					<th>Nama Pegawai</th>
					<th>Total Diterima</th>
				</tr>
			</thead>
			<tbody>
				@foreach($gaji as $g)
					<tr data-time="{{ AppHelper::data_time($g->waktu) }}">
						<td>{{ AppHelper::time_format($g->waktu) }}</td>
						<td>{{ AppHelper::get_first_name($g->pegawai->nama_pegawai) }}</td>
						<td>Rp. {{ AppHelper::num_format($g->total_diterima) }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="col-lg-6">
		{{ $gaji->links() }}
	</div>

	@push('js')
		<script>
			$('input[name="month"]').on('change', function() {
				let time = $(this).val()
				$('table tbody tr').each(function() {
					$(this)[0].classList.add('d-none')
					$('table tbody').find(`tr[data-time="${time}"]`).removeClass('d-none')
					// $('table tbody').find(`tr[data-time="${time}"]`).addClass('d-table')
					console.log($('table tbody').find(`tr[data-time="${time}"]`))
				})
			})
		</script>
	@endpush

@endsection