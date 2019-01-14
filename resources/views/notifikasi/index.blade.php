@extends('layouts.admin')
@section('content')
<h1><center>Custom Admin</center></h1>

<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
				</div>
			</div>
<div class="panel-body">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama custom</th>
					<th>Alamat</th>
					<th>No Telepon</th>
					<th>Product yang dipesan</th>
					<th>Ukuran</th>
					<th>Jumlah barang yang dipesan</th>
					<th>Pembayaran</th>
					<th>Pengiriman</th>
					<th>Tanggal Pemesanan</th>
					<th colspan="3">Action</th>
				</tr>	
</thead>
<tbody>
	@php $no = 1; @endphp
	@foreach($customNotif as $data)
	<tr>
		<td> {{ $no++ }} </td>
		<td> {{ $data->nama}} </td>
		<td> {{ $data->alamat }} </td>
		<td> {{ $data->no_tlp }} </td>
		<td> {{ $data->Product->nama }}</td>
		<td> {{ $data->ukuran }} </td>
		<td> {{ $data->jumlah_brg }} </td>
		<td> {{ $data->pembayaran }} </td>
		<td> {{ $data->pengiriman }} </td>
        <td> {{ date('M j, Y', strtotime($data->created_at)) }}</td>

	<td>
							    @if($data->status == 0)
                                <form action="{{ route('custom.publish',$data->id) }}" method="post">
                                    @csrf
                                    <button class="btn btn-info" type="submit">Read</button>
                                </form>
                                @endif 
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