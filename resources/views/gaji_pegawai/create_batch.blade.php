@extends('layouts')

@section('content')
	<h1>Gaji Pegawai Batch</h1>
	@if(session('failed'))
		<div class="alert alert-danger">
			{{ session('failed') }}
		</div>
	@endif
	<div id="table-batch" class="table-responsive">
		<form action="{{ route('gaji_pegawai.store_batch') }}" method="POST">
			@csrf
			<table id="table" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Nama Pegawai</th>
						<th>Gaji Pokok</th>
						<th>Tunjangan Lainnya</th>
						<th>Total Diterima</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>

	@push('js')
		<script>
			let html = "";
			let name = "";
			@foreach($pegawai as $p)
				name = "{{ $p->nama_pegawai }}"

				html += `
					<tr id="{{ $p->id }}" data-id="{{ $p->id }}">
						<input type="hidden" name="id_pegawai[]" value="{{ $p->id }}">
						<td>${name.split(' ')[0]}</td>
						<td><input type="text" class="form-control gaji_pokok_{{ $p->id }}" name="gaji_pokok[]" value="{{ $p->total_gaji }}" readonly></td>
						<td><input type="text" class="form-control tunjangan_lainnya_{{ $p->id }}" name="tunjangan_lainnya[]" value="0" onchange="changeTotal({{ $p->id }})"></td>
						<td><input type="text" class="form-control total_diterima_{{ $p->id }}" name="total_diterima[]" value="0" readonly></td>
					</tr>
					
				`

			@endforeach
			$('tbody').html(html)
			@foreach($pegawai as $s)
				changeTotal({{ $s->id }})
			@endforeach

			function changeTotal(id) {
				let total_gaji = $(`#table tbody tr[data-id="${id}"]`).find('input[name="gaji_pokok[]"]').val()
				let tunjangan_lainnya = $(`#table tbody tr[data-id="${id}"]`).find('input[name="tunjangan_lainnya[]"]').val()

				let total_diterima = parseInt(total_gaji) + parseInt(tunjangan_lainnya)

				$(`#table-batch`).find(`tr[data-id="${id}"]`).find('input[name="total_diterima[]"]').val(total_diterima)
			}
		</script>
	@endpush
@endsection