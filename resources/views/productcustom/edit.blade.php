@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-info">
			  <div class="panel-heading">
			  	<div class="panel-title pull-right"><a href="{{ route('productcustom.index') }}" class="btn-outline-warning"><i class="fa fa-chevron-circle-left">&nbsp</i>Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('productcustom.update',$productcustom->id) }}" method="post" enctype="multipart/form-data">
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">nama</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $productcustom->nama }}"  required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('deskripsi') ? ' has-error' : '' }}">
			  			<label class="control-label">deskripsi</label>	
			  			<textarea id="text" type="text" name="deskripsi" class="ckeditor" value="{{ $productcustom->deskripsi }}" required></textarea>
			  			@if ($errors->has('deskripsi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('deskripsi') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('harga') ? ' has-error' : '' }}">
			  			<label class="control-label">harga</label>	
			  			<input type="text" name="harga" class="form-control" value="{{ $productcustom->harga }}"  required>
			  			@if ($errors->has('harga'))
                            <span class="help-block">
                                <strong>{{ $errors->first('harga') }}</strong>
                            </span>
                        @endif
			  		</div>


					<div class="form-group {{ $errors->has('gambar') ? ' has-error' : '' }}">
			  			<label class="control-label col-md-3 col-sm-3 col-xs-3  ">Gambar</label>
			  			<div class="col-md-9 pr-1">	
			  			<input type="file" name="gambar" class="form-control" value="{{ $productcustom->gambar }}"  required>
			  			@if (isset($productcustom) && $productcustom->gambar)
                                            <p>
                                                <br>
                                            <img src="{{ asset('/assets/images/avatar/'.$productcustom->gambar) }}" style="width:100px; height:100px;" alt="">
                                            </p>
                            <span class="help-block">
                                <strong>{{ $errors->first('gambar') }}</strong>

                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('kategori_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Kategori</label>	
			  			<select name="kategori_id" class="form-control">
			  				@foreach($kategori as $data)
			  				<option value="{{ $data->id }}" {{ $selectedKategori == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama_kategori }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('kategori_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kategori_id') }}</strong>
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
	<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
</div>
@endsection