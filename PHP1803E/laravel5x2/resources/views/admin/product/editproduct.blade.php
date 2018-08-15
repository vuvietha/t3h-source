@extends('admin.layout')
@section('content')
<div class="row">
	<div class="col-lg-12">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
	
</div>

<form action="{{ route('admin.product.handleedit',$info->id) }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="namePd">Name</label>
				<input type="text" id="namePd" name="namePd" class="form-control" value="{{ $info->namepd }}">
			</div>
			<div class="form-group">
				<label for="slcCat">Categories</label>
				<select class="form-control" name="catid" id="slcCat">
					@foreach($categories as $key => $cat)
					<option value="{{$cat->id}}" selected ="{{$cat->id == $info->catid ? 'selected' : ''}}">{{$cat->namecat}}</option>
					@endforeach
				</select>
				
			</div>
			<div class="form-group">
				<label for="slcSize">Sizes</label>
				<select class="form-control" name="sizeid" id="slcSize">
					@foreach($sizes as $key => $size)
					<option value="{{ $size->id }}" selected ="{{ $size->id == $info->sizeid ? 'selected' : ''}}">{{ $size->namesize }}</option>
					@endforeach
				</select>
				
			</div>
			<div class="form-group">
				<label for="pricePd">Price</label>
				<input type="text" id="pricePd" name="pricepd" class="form-control" value="{{ $info->pricepd }}">
			</div>
			<div class="form-group">
				<label for="salePd">Sale Off</label>
				<input type="text" id="salePd" name="saleoff" class="form-control" value="{{ $info->saleoff }}">
			</div>

		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="qtyPd">QTY</label>
				<input type="text" id="qtyPd" name="qtypd" class="form-control" value="{{ $info->qtypd }}">
			</div>
			<div class="form-group">
				<label for="imagePd">Image</label>
				<input type="file" id="imagePd" name="imagepd" class="form-control" value="{{$info->imagepd}}">
				<img src="{{ asset('uploads/images/'.$info->imagepd) }}" width="120" height="120" alt="">
			</div>
			<div class="form-group">
				<label for="despd">Description</label>
				<textarea  id="despd" name="despd" class="form-control" rows="8">{{ $info->despd }}</textarea>
			</div>
		</div>
		<div class="col-md-6 offset-md-3">
			<button type="submit" class="btn btn-primary btn-block">Update Product</button>
		</div>
		
	</div>


</form>



@endsection