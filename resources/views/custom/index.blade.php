@extends('layouts.admin')
@section('content')
<h1><center>custom</center></h1>

<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<a class="btn btn-outline-primary" href=" {{ url('/') }}" "><i class="fa fa-file-text">&nbsp</i>Pesan Lagi</a>
				</div>
			</div>
<div class="panel-body">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Alamat</th>
					<th>No Telepon</th>
					<th>Product yang dipesan</th>
					<th>Jumlah Barang yang dipesan</th>
					<th>Pembayaran</th>
					<th>Pengiriman</th>
					<th>Tanggal Pemesanan</th>
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
		<td> {{ $data->pembayaran }} </td>
		<td> {{ $data->pengiriman }} </td>
        <td> {{ date('M j, Y', strtotime($data->created_at)) }}</td>

        <td>
		<a class="btn btn-outline-primary" href=" {{ url('rekap/'.$data->id)}} "><i class="fa fa-file-text">&nbsp</i>Rekap</a>
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