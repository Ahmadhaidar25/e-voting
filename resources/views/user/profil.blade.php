@extends('layout.user')
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
						<button type="submit" class="btn btn-success">Simpan</button>
					</div>
				</form>


			</div>
		</div>

	</div>

	<div class="col-lg-8">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#profil" type="button" role="tab" aria-controls="home" aria-selected="true">Profil</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#reset" type="button" role="tab" aria-controls="profile" aria-selected="false">Ubah Password</button>
					</li>
					
				</ul>
			</div>


			<div class="card-body">
				<div class="tab-content">
					<div id="profil" class="tab-pane active">
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
									<p class="mb-0">Semester</p>
								</div>
								<div class="col-sm-9">
									<select class="form-control" name="semester">
										@if($get->semester==null)
										<option value="">--pilih--</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										

										@elseif($get->semester == 1)
										<option value="{{$get->semester}}" selected>{{$get->semester}}</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										@elseif($get->semester == 2)
										<option value="{{$get->semester}}" selected>{{$get->semester}}</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										@elseif($get->semester == 3)
										<option value="{{$get->semester}}" selected>{{$get->semester}}</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										@elseif($get->semester == 4)
										<option value="{{$get->semester}}" selected>{{$get->semester}}</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										@elseif($get->semester == 5)
										<option value="{{$get->semester}}" selected>{{$get->semester}}</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										@elseif($get->semester == 6)
										<option value="{{$get->semester}}" selected>{{$get->semester}}</option>
										<option value="7">7</option>
										<option value="8">8</option>
										@elseif($get->semester == 7)
										<option value="{{$get->semester}}" selected>{{$get->semester}}</option>
										<option value="8">8</option>
										@endif

										
									</select>
								</div>
							</div>

							<hr>
							<div class="row">
								<div class="col-sm-3">
									<p class="mb-0">Prodi</p>
								</div>
								<div class="col-sm-9">
									@if($get->prodi == null)
									<select class="form-control" name="prodi">
										<option value="" selected>Pilih</option>
										@foreach($prodi as $p)
										<option value="{{$p->nama_prodi}}">{{$p->nama_prodi}}</option>
										@endforeach
									</select>
									@else
									<input type="text" name="prodi" class="form-control" 
									value="{{$get->prodi}}" readonly>
									@endif
									
									
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

							<div class="btn-group" role="group" style="float: right;">
								<button type="button" class="btn btn-danger">Batal</button>
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
								<button type="submit" class="btn btn-success text-white">
									Ubah
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