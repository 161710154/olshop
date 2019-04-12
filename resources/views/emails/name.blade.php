<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<center><h1>Invoice Mozukai</h1></center>
<h2>{{$custom[0]->nama}}</h2>
<h3>{{$custom[0]->alamat}}</h3>
<h3>{{$custom[0]->no_tlp}}</h3>
<h3>{{$custom[0]->pengiriman}}</h3>
<h3>{{$custom[0]->pembayaran}}</h3>
<table>
  <tr>
    <th>Nama</th>
    <th>Harga</th>
    <th>Jumlah</th>
    <th>Total</th>
  </tr>
  @php 
   
    $total_all = 0;
  @endphp
  @foreach($name as $data)
  @php 
    $t_s = $data->jumlah_brg * $data->product->harga;
    $total_all = $total_all + $t_s;
  @endphp
	  <tr>
	    <td>{{$data->product->nama}}</td>
	    <td>{{number_format($data->product->harga,2,',','.')}}</td>
	    <td>{{$data->jumlah_brg}}</td>
	    <td>{{number_format($data->jumlah_brg * $data->product->harga,2,',','.')}}</td>
	  </tr>
	@endforeach
    <tr>
      <td colspan="4">{{$total_all}}</td>
    </tr>
</table>

</body>
</html>
