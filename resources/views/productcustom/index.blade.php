@extends('layouts.admin')
@section('content')
<h1><center>Product</center></h1>

<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title pull-right"><a href="{{ route('productcustom.create') }}" class="btn-outline-warning"><i class="fa fa-plus-square">&nbsp</i> Add </a>
				</div>
			</div>
<div class="panel-body">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Deskripsi</th>
					<th>Harga</th>
					<th>Gambar</th>
					<th>Kategori</th>
					<th colspan="3">Action</th>
				</tr>	
</thead>
<tbody>
	@php $no = 1; @endphp
	@foreach($productcustom as $data)
	<tr>
		<td> {{ $no++ }} </td>
		<td> {{ $data->nama }} </td>
		<td><p> {!! $data->deskripsi !!} </p></td>
		<td> {{ $data->harga }} </td>
		<td><img src="{{ asset('assets/images/avatar/'.$data->gambar.'') }}" style="max-width: 80px;"></td>
		<td><p>{{ $data->Kategori->nama_kategori }}</p></td>
	<td>
		<a class="btn btn-outline-primary" href=" {{ route('productcustom.edit',$data->id)}} "><i class="fa fa-file-text">&nbsp</i>Edit</a>
	</td>
	<td>
							<form method="post" action="{{ route('productcustom.destroy',$data->id) }}">
								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i>Delete</button>
							</form>
						</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection