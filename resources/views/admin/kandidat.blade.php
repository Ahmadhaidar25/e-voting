@extends('layout.admin')
@section('content')
<h1>Calon Kandidat</h1>
<p>Record : {{$record}}</p>
<button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</button>

<div class="row mb-3 mt-3">
	<!-- Earnings (Monthly) Card Example -->
	@foreach($data as $x)
	<div class="col-xl-6 col-md-6 mb-4">
		<div class="card">
			<div class="container">
				<div class="row">
					<div class="col">
						<img src="{{url('foto_calon_ketua/'.$x->foto_ketua)}}" class="card-img-top" alt="...">
					</div>

					<div class="col">
						<img src="{{url('foto_calon_wakil_ketua/'.$x->foto_wakil)}}" class="card-img-top" alt="...">
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col">
						<h5 class="card-title text-center">{{$x->nama_calon_ketua}}</h5>
					</div>
					<div class="col">
						<h5 class="card-title text-center">{{$x->nama_calon_wakil_ketua}}</h5>
					</div>
				</div>
				<hr>
				<div class="row text-center">
					<div class="col">
						Npm : {{$x->npm_calon_ketua}}
					</div>

					<div class="col">
						Npm : {{$x->npm_calon_wakil_ketua}}
					</div>
				</div>

				<div class="row text-center">
					<div class="col">
						Prodi : {{$x->prodi_ketua}}
					</div>

					<div class="col">
						Prodi : {{$x->prodi_wakil_ketua}}
					</div>
				</div>

				<hr>
				<span><strong>Visi:</strong></span>
				<p class="card-text">
					{{$x->visi}}
				</p>

				<span><strong>Misi:</strong></span>
				<p class="card-text">
					{{$x->misi}}
				</p>
			</div>

			<div class="card-body">
				<div class="btn-group float-right" role="group" aria-label="Basic mixed styles example">
					<a href="{{url('/edit/kandidat/'.$x->id)}}" class="btn btn-warning">
						Edit
						<span><i class="bi bi-pencil-square"></i></span>
					</a>
					<a href="{{url('/hapus/kandidat/'.$x->id)}}" class="btn btn-danger hapus">
						Hapus
						<span><i class="bi bi-trash"></i></span>
					</a>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Kandidat</h5>

			</div>
			<form action="{{url('/tambah/kandidat')}}" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					@csrf
					<div class="mb-3">
						<label class="form-label">Npm Calon ketua</label>
						<input type="text" class="form-control" name="npm_calon_ketua">
					</div>

					<div class="mb-3">
						<label class="form-label">Npm Calon Wakil ketua</label>
						<input type="text" class="form-control" name="npm_calon_wakil_ketua">
					</div>

					<div class="mb-3">
						<label class="form-label">Prodi Calon Ketua</label>
						<select class="form-control" name="prodi_ketua">
							<option value="">--pilih prodi--</option>
							@foreach($prodi1 as $x1)
							<option value="{{$x1->nama_prodi}}">{{$x1->nama_prodi}}</option>
							@endforeach
						</select>
					</div>

					<div class="mb-3">
						<label class="form-label">Prodi Calon Wakil Ketua</label>
						<select class="form-control" name="prodi_wakil_ketua">
							<option value="">--pilih prodi--</option>
							@foreach($prodi2 as $x2)
							<option value="{{$x2->nama_prodi}}">{{$x2->nama_prodi}}</option>
							@endforeach
						</select>
					</div>

					<div class="mb-3">
						<label class="form-label">Nama Calon Ketua</label>
						<input type="text" class="form-control" name="nama_calon_ketua">
					</div>

					<div class="mb-3">
						<label class="form-label">Nama Calon Wakil Ketua</label>
						<input type="text" class="form-control" name="nama_calon_wakil_ketua">
					</div>

					<div class="mb-3">
						<label class="form-label">Foto Calon Ketua</label>
						<input type="file" class="form-control" name="foto_ketua">
					</div>

					<div class="mb-3">
						<label class="form-label">Foto Calon Wakil Ketua</label>
						<input type="file" class="form-control" name="foto_wakil">
					</div>

					<div class="mb-3">
						<label class="form-label">Visi</label>
						<textarea class="form-control" name="visi"></textarea>
					</div>

					<div class="mb-3">
						<label class="form-label">Misi</label>
						<textarea class="form-control" name="misi"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection