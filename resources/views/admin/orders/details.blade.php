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
					<h3>{{ $order->order_number ?? '' }}: <span class="badge badge-warning">{{ $order->status }}</span></h3>
				</div>
			</div>
			<div class="card-body">
				<div>
					<h4>Custome Name</h4>
					<p>
						{{ $order['customer']->name ?? '' }}<br>
						{{ ucfirst($order['customer']['details']->address) ?? '' }}<br>
						{{ $order['customer']['details']->zip_code ?? '' }},
						{{ ucfirst($order['customer']['details']->city) ?? '' }},
						{{ ucfirst($order['customer']['details']->countrey) ?? '' }}<br>
						{{ $order['customer']['details']->phone ?? '' }}


					</p>
				</div>
				<div class="table-responsive">
					<table class="table table-sm table-bordered table-striped">
						<thead>
							<tr>
								<th></th>
								<th>Product</th>
								<th>Quantity</th>
								<th>Unit</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
							@if (isset($order['items']) && count($order['items']))
								@foreach ($order['items'] as $order_item)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $order_item['product']->name }}</td>
										<td>{{ $order_item->quantity }}</td>
										<td>$ {{ $order_item->unit_price }}</td>
										<td>$ {{ $order_item->total_price }}</td>
									</tr>
								@endforeach
							@endif
							<tr>
								<td class="text-right" colspan="4"><strong>Total:</strong></td>
								<td><strong>$ {{ $order->amount }}</strong></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection