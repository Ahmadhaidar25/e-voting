@extends('layout.admin')
@section('content')


<div class="container py-5">

	<div class="row">
		<div class="col-lg-4">
			<div class="card mb-4">
				<div class="card-body text-center">
					@if(Auth::user()->foto == null) 
					<img src="{{url('template_user/img/user.jpg')}}" alt="avatar"
					class="rounded-circle img-fluid" style="width: 150px;">
					@else
					<img src="{{url('image_avatar/'.auth()->user()->foto)}}" alt="avatar"
					class="rounded-circle img-fluid" style="width: 150px;">
					@endif
					<h5 class="my-3">{{Auth::user()->nama}}</h5>
					<form action="{{url('/ubah/foto')}}" method="POST" 
					enctype="multipart/form-data">
					@csrf
					<input type="file" class="form-control" name="foto">
					<div class="btn-group mt-2" role="group" style="float: right;">
						<button type="button" class="btn btn-danger">Batal</button>
						&nbsp;
						<button type="submit" class="btn btn-success">Simpan</button>
					</div>
				</form>


			</div>
		</div>

	</div>

	<div class="col-lg-8">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a data-toggle="tab" class="nav-link active" href="#bio">Biodata</a>
					</li>
					<li class="nav-item">
						<a data-toggle="tab"  class="nav-link" href="#reset">Ubah Password</a>
					</li>

				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content">
					<div id="bio" class="tab-pane active">
						<!--form untuk super admin-->
						<form action="{{url('/ubah/profil/')}}" method="post" enctype="multipart/form-data">
							@csrf

							<div class="row">
								<div class="col-sm-3">
									<p class="mb-0">Nama Lengkap</p>
								</div>
								<div class="col-sm-9">
									<input type="text" name="nama" class="form-control" 
									value="{{$get->nama}}">

								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<p class="mb-0">Username</p>
								</div>
								<div class="col-sm-9">
									<input type="text" name="username" class="form-control" 
									value="{{$get->username}}" readonly>

								</div>
							</div>

							<hr>
							<div class="row">
								<div class="col-sm-3">
									<p class="mb-0">Email</p>
								</div>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="email" 
									value="{{$get->email}}" aria-label="readonly input example" readonly>
									
								</div>
							</div>
							

							<hr>
							<div class="row">
								<div class="col-sm-3">
									<p class="mb-0">Jenis Kelamin</p>
								</div>
								<div class="col-sm-9">
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="jk"  
										value="L" {{$get->jk == 'L'? 'checked' : ''}}>
										<label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="jk" value="P"
										{{$get->jk == 'P'? 'checked' : ''}}>
										<label class="form-check-label">Perempuan</label>
									</div>

								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<p class="mb-0">No Telepon</p>
								</div>
								<div class="col-sm-9">
									<input type="text" name="no_tlp" class="form-control" value="{{$get->no_tlp}}">
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-3">
									<p class="mb-0">Alamat</p>
								</div>
								<div class="col-sm-9">
									<textarea class="form-control" name="alamat">{{$get->alamat}}</textarea>
								</div>
							</div>

							<hr>
							<div class="row">
								<div class="col-sm-3">
									<p class="mb-0">Role</p>
								</div>
								<div class="col-sm-9">
									@if($get->role==1)
									<div class="badge bg-success text-white" style="width: 6rem;">
										Admin
									</div>
									@endif

								</div>
							</div>
							<hr>

							<div class="btn-group" role="group" style="float: right;">
								<button type="button" class="btn btn-danger">Batal</button>
								&nbsp;
								<button type="submit" class="btn btn-success">Simpan</button>
							</div>	
						</form>
					</div>

					<!--ubah password-->
					<div id="reset" class="tab-pane fade">
						<form action="{{url('/ubah/password')}}" method="post" class="form">
							@method("put")
							@csrf
							<div class="mb-3">
								<label for="current_password" class="form-label">Password Lama</label>
								<input type="password" class="form-control @error('current_password') is-invalid @enderror" 
								name="current_password" id="current_password">

								@error('current_password')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>

							<div class="mb-3">
								<label for="password" class="form-label">Password Baru</label>
								<input type="password" class="form-control @error('password') is-invalid @enderror" 
								name="password" id="password">

								@error('password')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>

							<div class="mb-3">
								<label for="password_confirmation" class="form-label">Konfirmasi Password</label>
								<input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
								name="password_confirmation" id="password_confirmation">

								@error('password_confirmation')
								<div class="invalid-feedback">{{ $message }}</div>
								@enderror
							</div>


							<div class="d-grid gap-2 d-md-block" style="float: right;">
								<button type="reset" class="btn btn-danger">Batal</button>
								<button type="submit" class="btn btn-success text-white" type="button">
									Simpan
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


@endsection