@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Product</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
					<li class="breadcrumb-item">Product</li>
					<li class="breadcrumb-item active">Add</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<div class="card-title">
					<h3>Add New Product</h3>
				</div>
			</div>
			<div class="card-body">
				<form method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="name">SKU <span class="text-danger">*</span></label>
							<div class="input-group">                                   
								<input type="text" class="form-control @error('sku') is-invalid @enderror"
								id="sku" placeholder="Product SKU" name="sku" value="{{ old('sku') }}"
								autocomplete="off">
							</div>
							@error('sku')
							<div class="text-danger text-bold">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-sm-6">
							<label for="name">Name <span class="text-danger">*</span></label>
							<div class="input-group">                                   
								<input type="text" class="form-control @error('name') is-invalid @enderror"
								id="name" placeholder="Product Name" name="name" value="{{ old('name') }}"
								autocomplete="off">
							</div>
							@error('name')
							<div class="text-danger text-bold">{{ $message }}</div>
							@enderror
						</div>

						<div class="form-group col-sm-4">
							<label for="name">Price <span class="text-danger">*</span></label>
							<div class="input-group">                                   
								<input type="text" class="form-control @error('regular_price') is-invalid @enderror"
								id="regular_price" placeholder="Product Price" name="regular_price" value="{{ old('price') }}"
								autocomplete="off">
							</div>
							@error('regular_price')
							<div class="text-danger text-bold">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-sm-4">
							<label for="discount">Discount <small>(in percent %)</small></label>
							<div class="input-group">                                   
								<input type="text" class="form-control"
								id="name" placeholder="Discount in Percent(%)" name="discount" value="{{ old('discount') }}"
								autocomplete="off">
							</div>
						</div>
						<div class="form-group col-sm-4">
							<label for="discount">Total stock <span class="text-danger">*</span></label>
							<div class="input-group">                                   
								<input type="text" class="form-control @error('total_stock') is-invalid @enderror"
								id="total_stock" placeholder="Total Stock" name="total_stock" value="{{ old('total_stock') }}"
								autocomplete="off">
							</div>
							@error('total_stock')
							<div class="text-danger text-bold">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-sm-6">
							<label for="category">Category <span class="text-danger">*</span></label>
							<div class="input-group">                                   
								<select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
									<option value="">Select Category</option>
									@foreach($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>
									@endforeach
								</select>
							</div>
							@error('category_id')
							<div class="text-danger text-bold">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-sm-6">
							<label for="image">Image <span class="text-danger">*</span></label>
							<div class="input-group">
								<input type="file" class="form-control" id="image" name="image[]"
								multiple="multiple" accept=".png, .jpg, .jpeg">
							</div>
						</div>
						<div class="form-group col-sm-12">
							<label for="description">Description</label>
							<textarea class=" form-control textarea" id="description" name="description"
							placeholder="Place some text here"
							style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
						</div>
						<div class="form-group col-sm-6">
							<label>is featured?</label>
							<input type="checkbox" name="featured" value="1">
						</div>
						<div class="form-group col-sm-6">
							<button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection
