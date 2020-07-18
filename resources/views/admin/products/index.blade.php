@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Products</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Manage Products</li>
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
                <div class="card-tool">
                    <h3>Products list
                        <a href="{{ route('admin.product.add') }}" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add Product</a>
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm dataTable" id="dataTable">
                        <thead>
                            <tr>
                                <th class="w-1">Img</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Discounted Price</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $key => $value)
                            <tr>
                                <td>
                                 <span class="avatar avatar-lg" style="background-image: url({{ $value->featured_image }})"></span>
                             </td>
                             <td>{{ $value->name }}</td>
                             <td>{{ $value->category->name }}</td>
                             <td class="text-center">{{ $value->regular_price }} <small>USD</small></td>
                             <td class="text-center">
                                {{ $value->discount ?? '' }} {{ $value->discount ? '%' : '' }}
                            </td>
                            <td class="text-center">
                                {{ $value->discounted_price ?? '' }} <small>{{ $value->discounted_price ? 'USD' : '' }}</small>
                            </td>
                            <td>{{ $value->total_stock }}</td>
                            <td>
                                <a href="{{ route('admin.product.edit',$value->slug) }}" class="btn btn-primary btn-sm edit"><i class="fas fa-edit"></i></a> |
                                {{-- <a href="javascirpt::void(0)" data-href="{{ route('delete.user',$value->id) }}" class="btn btn-danger btn-flat btn-sm erase"><i class="fas fa-trash"></i></a> --}}
                                {{-- <a href="" class="btn btn-danger btn-sm erase" data-id="{{$value->id}}"><i class="fas fa-trash"></i></a> --}}
                                <a class="btn btn-danger btn-sm forceDelete" data-href="{{ route('admin.product.delete',['slug'=>$value->slug]) }}" data-msg="This product will be deleted permanent!" href="javascript:void(0)"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@push('script')
<script type="text/javascript">
    $(document).on('click','.forceDelete',function(e){
        e.preventDefault();
        var href=$(this).attr('data-href');
        var del_msg=$(this).attr('data-msg');
        $('#yes_button').attr('href',href);
        $('#del_msg').text(del_msg);
        $('#deleteModal').modal('show');
    });
</script>
@endpush
