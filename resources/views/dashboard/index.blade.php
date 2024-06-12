@extends('dashboard.app')

@section('content')
<div class="container-fluid">
    <h1 class="text-center m-5">Overview</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Products</h5>
                    <p class="card-text">{{ $totalProducts }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Orders</h5>
                    <p class="card-text">{{ $totalOrders }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('sidebar')
<!-- You can add sidebar-specific content here if needed -->
@endsection
