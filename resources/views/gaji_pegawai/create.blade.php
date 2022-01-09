@extends('layouts')

@section('content')
	<h1>Gaji Pegawai Individu</h1>
	@if(session('failed'))
			<div class="alert alert-danger">{{ session('failed') }}</div>
		@endif
	<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
		<form action="{{ route('gaji_pegawai.store') }}" method="POST">
			@csrf
			<div class="form-group">
				<label for="id_pegawai">Pilih Pegawai</label>
				<select class="form-control" id="id_pegawai" name="id_pegawai">
					<option>Pilih Pegawai</option>
					@foreach( $pegawai as $p )
					<option value="{{ $p->id }}">
						{{ $p->nama_pegawai }}
					</option>
					@endforeach
				</select>
			</div>

			<div id="table-akomodasi" class="table-responsive">
				
			</div>
		</form>
	</div>

	@push('js')
		<script>
			const APIURL = '{{ url("/") }}/'
			
			$('select[name="id_pegawai"]').on('change', function() {
				detailAkomodasi($(this).val())
			})

			function detailAkomodasi(id_pegawai) {

				$.ajax({
					url: APIURL+'api/get-pegawai',
					data: {
						'_token': '{{ csrf_token() }}',
						id_pegawai
					},
					method: "POST",
					dataType: "JSON",
					success: function(response) {
						let html = ""
						html = `
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Akomodasi</th>
										<th>Nilai Rupiah</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Gaji Pokok</td>
										<td>
											<input type="text" name="gaji_pokok" value="${response.data.total_gaji}" disabled>
										</td>
									</tr>
									<tr>
										<td>Tunjangan Lainnya</td>
										<td>
											<input type="text" name="tunjangan_lainnya" onchange="changeTotal()" value="0">
										</td>
									</tr>
									<tr>
										<td>Total Diterima</td>
										<td><input type="text" name="total_diterima" value=""></td>
									</tr>
								</tbody>
							</table>
							<button type="submit" class="btn btn-primary">Simpan</button>
						`
						$('#table-akomodasi').html(html)
						changeTotal()
					}
				})

			}

			function changeTotal() {
				let gaji_pokok = $('#table-akomodasi').find('input[name="gaji_pokok"]').val()
				let tunjangan_lainnya = $('#table-akomodasi').find('input[name="tunjangan_lainnya"]').val()
				let total_diterima = parseInt(gaji_pokok) + parseInt(tunjangan_lainnya)
				$('#table-akomodasi').find('input[name="total_diterima"]').val(total_diterima)
				return false
			}
		</script>
	@endpush
@endsection
