@extends('layout.admin')
@section('content')
<h1>Edit Calon Kandidat</h1>
<div class="row mb-3 mt-3">
	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-6 col-md-6 mb-4">
		<div class="card mt-5">
			<div class="container">
				<div class="row">
					<div class="col">
						<img src="{{url('foto_calon_ketua/'.$edit->foto_ketua)}}" class="card-img-top" alt="...">
					</div>

					<div class="col">
						<img src="{{url('foto_calon_wakil_ketua/'.$edit->foto_wakil)}}" class="card-img-top" alt="...">
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col">
						<h5 class="card-title text-center">{{$edit->nama_calon_ketua}}</h5>
					</div>
					<div class="col">
						<h5 class="card-title text-center">{{$edit->nama_calon_wakil_ketua}}</h5>
					</div>
				</div>
				<hr>
				<div class="row text-center">
					<div class="col">
						Npm : {{$edit->npm_calon_ketua}}
					</div>

					<div class="col">
						Npm : {{$edit->npm_calon_wakil_ketua}}
					</div>
				</div>

				<div class="row text-center">
					<div class="col">
						Prodi : {{$edit->prodi_ketua}}
					</div>

					<div class="col">
						Prodi : {{$edit->prodi_wakil_ketua}}
					</div>
				</div>

				<hr>
				<span><strong>Visi:</strong></span>
				<p class="card-text">
					{{$edit->visi}}
				</p>

				<span><strong>Misi:</strong></span>
				<p class="card-text">
					{{$edit->misi}}
				</p>
			</div>
		</div>
	</div>

	<div class="col-xl-6 col-md-6 mb-4">
		<form action="{{url('/update/kandidat/'.$edit->id)}}" method="post" enctype="multipart/form-data">
			<div class="btn-group" role="group">
				<a href="{{url('kandidat')}}" class="btn btn-danger">Kembali</a>
				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
			<div class="card mt-2">
				<div class="card-body">

					@csrf
					<div class="mb-3">
						<label class="form-label">Npm Calon ketua</label>
						<input type="text" class="form-control" name="npm_calon_ketua"
						value="{{$edit->npm_calon_ketua}}">
					</div>

					<div class="mb-3">
						<label class="form-label">Npm Calon Wakil ketua</label>
						<input type="text" class="form-control" name="npm_calon_wakil_ketua"
						value="{{$edit->npm_calon_wakil_ketua}}">
					</div>

					<div class="mb-3">
						<label class="form-label">Prodi Calon Ketua</label>
						<select class="form-control" name="prodi_ketua">
							<option selected value="{{$edit->prodi_ketua}}">{{$edit->prodi_ketua}}</option>
							@foreach($prodi1 as $x1)
							<option value="{{$x1->nama_prodi}}">{{$x1->nama_prodi}}</option>
							@endforeach
						</select>
					</div>

					<div class="mb-3">
						<label class="form-label">Prodi Calon Wakil Ketua</label>
						<select class="form-control" name="prodi_wakil_ketua">
							<option selected value="{{$edit->prodi_wakil_ketua}}">
								{{$edit->prodi_wakil_ketua}}
							</option>
							@foreach($prodi2 as $x2)
							<option value="{{$x2->nama_prodi}}">{{$x2->nama_prodi}}</option>
							@endforeach
						</select>
					</div>

					<div class="mb-3">
						<label class="form-label">Nama Calon Ketua</label>
						<input type="text" class="form-control" name="nama_calon_ketua"
						value="{{$edit->nama_calon_ketua}}">
					</div>

					<div class="mb-3">
						<label class="form-label">Nama Calon Wakil Ketua</label>
						<input type="text" class="form-control" name="nama_calon_wakil_ketua"
						value="{{$edit->nama_calon_wakil_ketua}}">
					</div>

					<div class="mb-3">
						<label class="form-label">Edit Calon Ketua</label>
						<input type="file" class="form-control" name="foto_ketua">
					</div>

					<div class="mb-3">
						<label class="form-label">Edit Calon Wakil Ketua</label>
						<input type="file" class="form-control" name="foto_wakil">
					</div>

					<div class="mb-3">
						<label class="form-label">Visi</label>
						<textarea class="form-control" name="visi">
							{{$edit->visi}}
						</textarea>
					</div>

					<div class="mb-3">
						<label class="form-label">Misi</label>
						<textarea class="form-control" name="misi">
							{{$edit->misi}}
						</textarea>
					</div>
					
				</form>
			</div>
		</div>
		
	</div>
	
</div>
@endsection