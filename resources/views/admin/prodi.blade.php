@extends('layout.admin')
@section('content')
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col">
				<div class="container">
					<button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modal" style="float: right;">Tambah</button>
				</div>
			</div>

			
		</div>
		<div class="table-responsive p-3">
			<table class="table table-bordered mt-2" id="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Prodi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				
				
				<tbody>
					@php $no=1; @endphp
					@foreach($data as $x)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$x->nama_prodi}}</td>
						<td>
							<div class="btn-group" role="group" aria-label="Basic mixed styles example">
								<a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit-{{$x->id}}">Edit</a>
								&nbsp;
								<a href="{{url('/hapus/prodi/'.$x->id)}}" class="btn btn-danger del">Hapus</a>
							</div>
						</td>
					</tr>
					
					@endforeach
				</tbody>
			</table>

		</div>
	</div>
</div>


<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Prodi</h5>
				
			</div>
			<div class="container">
				@if ($errors = session('errors')) 
				<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
					<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
						<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
					</svg>
					&nbsp;
					<strong>Prodi tidak boleh kosong</strong>
					<a href="" class="text-white" data-bs-dismiss="alert" aria-label="Close">
						<i class="bi bi-x-lg"></i>
					</a>
				</div>
				@endif
			</div>
			<form action="{{url('/tambah/prodi')}}" method="post">
				<div class="modal-body">
					@csrf
					<div class="mb-3">
						<label class="form-label">Prodi</label>
						<input type="text" class="form-control" name="nama_prodi[]">
					</div>
					<div class="btn-group" role="group" aria-label="Basic mixed styles example">
						<button type="button" class="btn btn-success add-prodi">+</button>
						&nbsp;
						<button type="button" class="btn btn-danger remove">-</button>
					</div>
					<div id="tambah_inputan">

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



@foreach($data as $e)
<div class="modal fade" id="edit-{{$e->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Prodi</h5>
				
			</div>
			<form action="{{url('/update/prodi/'.$e->id)}}" method="post">
				<div class="modal-body">
					@csrf
					<div class="mb-3">
						<label class="form-label">Prodi</label>
						<input type="text" class="form-control" name="nama_prodi" value="{{$e->nama_prodi}}">
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
@endforeach
@endsection