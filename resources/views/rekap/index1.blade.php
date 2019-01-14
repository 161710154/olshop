@extends('layouts.admin')
@section('content')
<h1><center>Rekap</center></h1>

<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<a class="btn btn-outline-primary" href=" {{ url('/') }}" "><i class="fa fa-file-text">&nbsp</i>Rekap</a>
				</div>
			</div>
<div class="panel-body">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah barang</th>
					<th>Total</th>
					<th colspan="1">Action</th>
				</tr>	
</thead>
<tbody>
	@php $no = 1; @endphp
	@foreach($custom as $data)
	<tr>
		<td> {{ $no++ }} </td>
		<td> {{ $data->alamat }} </td>
		<td> {{ $data->no_tlp }} </td>
		<td> {{ $data->Product->nama }}</td>
		<td> {{ $data->jumlah_brg }} </td>
        <td>

		<td>
							<form method="post" action="{{ route('custom.destroy',$data->id) }}">
								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i>Delete</button>
							</form>
						</td>
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