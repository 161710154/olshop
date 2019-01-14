@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-info">
			  <div class="panel-heading">
			  	<div class="panel-title pull-right"><a href="{{ route('customadmin.index') }}" class="btn-outline-warning"><i class="fa fa-chevron-circle-left">&nbsp</i>Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('customadmin.update',$customa->id) }}" method="post" enctype="multipart/form-data">
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">nama</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $customa->nama }}"  required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
			  			<label class="control-label">alamat</label>	
			  			<input type="text" name="alamat" class="form-control" value="{{ $customa->alamat }}"  required>
			  			@if ($errors->has('alamat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('no_tlp') ? ' has-error' : '' }}">
			  			<label class="control-label">no_tlp</label>	
			  			<input type="text" name="no_tlp" class="form-control" value="{{ $customa->no_tlp }}"  required>
			  			@if ($errors->has('no_tlp'))
                            <span class="help-block">
                                <strong>{{ $errors->first('no_tlp') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('product_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Product</label>	
			  			<select name="product_id" class="form-control">
			  				@foreach($product as $data)
			  				<option value="{{ $data->id }}" {{ $selectedproduct == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('product_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('product_id') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('ukuran') ? ' has-error' : '' }}">
			  			<label class="control-label">ukuran</label>	
			  			<input type="text" name="ukuran" class="form-control" value="{{ $customa->ukuran }}"  required>
			  			@if ($errors->has('ukuran'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ukuran') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('jumlah_brg') ? ' has-error' : '' }}">
			  			<label class="control-label">jumlah barang</label>	
			  			<input type="text" name="jumlah_brg" class="form-control" value="{{ $customa->jumlah_brg }}"  required>
			  			@if ($errors->has('jumlah_brg'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jumlah_brg') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('pembayaran') ? ' has-error' : '' }}">
			  			<label class="control-label">pembayaran</label>	
			  			<select class="form-control" name="pembayaran" required>
												<option>Bayar ditempat</option>
												<option>Transfer</option>
											</select>
			  			@if ($errors->has('pembayaran'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pembayaran') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('pengiriman') ? ' has-error' : '' }}">
			  			<label class="control-label">pengiriman</label>	
			  			<select class="form-control" name="pengiriman" required>
												<option>JNE</option>
												<option>J&T</option>
												<option>Indah Cargo</option>
												<option>Lega Paket</option>
											</select>
			  			@if ($errors->has('pengiriman'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pengiriman') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-outline-primary">
			  			<i class="fa fa-save">&nbsp</i>Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection