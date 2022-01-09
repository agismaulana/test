@extends('layouts')

@section('content')
	<h1>Tambah Pegawai</h1>
	@if(session('failed'))
		<div class="alert alert-danger">{{ session('failed') }}</div>
	@endif
	<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
		<form action="{{ route('pegawai.store') }}" method="POST">
			@csrf
			<div class="form-group">
				<label for="nama_pegawai">Nama Pegawai</label>
				<input type="text" id="nama_pegawai" name="nama_pegawai" class="form-control" placeholder="e.g John Doe" maxlength="10" value="{{ old('nama_pegawai') }}">
				@error('nama_pegawai')
		        	<small class="text-danger">
		        		{{ $message }}
		        	</small>
		        @enderror
			</div>
			<div class="form-group">
				<label for="total_gaji">Total gaji</label>
				<input type="integer" name="total_gaji" placeholder="e.g 4000000 - 10000000" class="form-control">
				@error('total_gaji')
		        	<small class="text-danger">
		        		{{ $message }}
		        	</small>
		        @enderror
			</div>
			<button type="submit" class="btn btn-primary">Simpan</button>
	 	</form>
	</div>

@endsection