@extends('admin.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Manage Orders</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
					<li class="breadcrumb-item">Manage Orders</li>
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
					<h3>Orders list</h3>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bodered table-striped">
						<thead>
							<tr>
								<th>Order no</th>
								<th>Customer name</th>
								<th>Customer email</th>
								<th>Order total</th>
								<th>Created</th>
								<th>Status</th>
								<th class="w-1">Actions</th>
							</tr>
						</thead>
						<tbody>
							@if (isset($orders) && count($orders))
								@foreach ($orders as $order)
									<tr>
										<td>{{ $order->order_number }}</td>
										<td>{{ $order['customer']->name }}</td>
										<td>{{ $order['customer']->email }}</td>
										<td>{{ $order->amount }}</td>
										<td>{{ date('d-m-Y',strtotime($order->created_at)) }}</td>
										<td><span class="badge badge-warning">{{ $order->status }}</span></td>
										<td>
											<a href="{{ route('admin.orders.details',$order->order_number) }}" class="btn btn-sm btn-info" title="Veiw details"><i class="fas fa-eye"></i></a>
										</td>
									</tr>
								@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection