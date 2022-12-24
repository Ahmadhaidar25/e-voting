@extends('layout.user')
@section('content')
<div class="section-title">
	

</div>
@if ($errors = session('errors')) 
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
		<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
	</svg>
	&nbsp;
	<strong>Maaf anda sudah memilih kandidat dan tidak bisa memilih kandidat lebih dari satu</strong>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row mb-3 mt-3">
	<!-- Earnings (Monthly) Card Example -->
	@foreach($data as $x)
	<div class="col-xl-6 col-md-6 mb-4">
		<div class="card">
			<div class="container">
				<div class="row">
					<div class="col">
						<img src="{{url('foto_calon_ketua/'.$x->foto_ketua)}}" class="card-img-top mt-2" alt="...">
					</div>

					<div class="col">
						<img src="{{url('foto_calon_wakil_ketua/'.$x->foto_wakil)}}" class="card-img-top mt-2" alt="...">
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
				<form id="form-voting" action="{{url('/coblos/calon/'.$x->id)}}" method="post">
					<div class="d-grid gap-2">
						@csrf
						<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
						<input type="hidden" name="kandidat_id" value="{{$x->id}}">
						<button  class="btn btn-block text-white coblos" type="submit" 
						style="background: #C32E4B;">
						Coblos
					</button>

				</div>
			</form>
			<hr>

			<form id="form-voting" action="{{url('/like')}}" method="post">
				<div class="d-grid gap-2">
					@csrf
					<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
					<input type="hidden" name="kandidat_id" value="{{$x->id}}">
					<div class="d-grid gap-2 d-md-block">
						<button class="btn btn-danger" type="submit">
							<i class="bi bi-heart-fill"></i>&nbsp;Suka
						</button>
					</div>

				</div>
			</form>
			
			<a href="" class="text-secondary" data-bs-toggle="modal" data-bs-target="#detail-like-{{$x->id}}"><span id="likeCount">{{$x->like->count()}}</span>&nbsp;Suka</a> 
		</div>
	</div>
</div>
@endforeach
</div>

@foreach($data as $d)
<div class="modal fade" id="detail-like-{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-danger" id="exampleModalLabel">
					<i class="bi bi-heart-fill"></i>&nbsp;Suka
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				@foreach($d->like as $e)
						<div class="card mt-2">
							<div class="card-body">
								<h5 class="card-title">
									@if($e->user->foto==null)
									<img class="img-profile rounded-circle" src="{{url('template_user/img/user.jpg')}}" style="max-width: 40px">
									@else
									<img class="img-profile rounded-circle" 
									src="{{url('image_avatar/'.$e->user->foto)}}" style="max-width: 40px">

									@endif
									<small>{{$e->user->nama}}</small>
								</h5>
							</div>
						</div>
					
				@endforeach
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">
					Tutup
				</button>
				
			</div>
		</div>
	</div>
</div>
@endforeach

@endsection