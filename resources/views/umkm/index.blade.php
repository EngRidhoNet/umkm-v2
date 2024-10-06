@extends('layouts.umkm.app')

@section('title', 'Dashboard')

@section('content')
<section class="section dashboard">
    
    <div class="container mt-4">
    <h1 class="mb-4">UMKM Dashboard</h1>

    <div class="row mb-4">
        <div class="col-md-6">
            <input type="date" class="form-control" id="dateRange">
        </div>
        <div class="col-md-6">
            <select class="form-select" id="productSelect">
                <option value="all">All Products</option>
                <option value="product1">Product 1</option>
                <option value="product2">Product 2</option>
            </select>
        </div>
    </div>

    <div class="row mb-4">
        @php
        $cards = [
            ['title' => 'Total Revenue', 'value' => '$45,231.89', 'change' => '+20.1% from last month', 'icon' => '💰'],
            ['title' => 'Sales', 'value' => '+12,234', 'change' => '+19% from last month', 'icon' => '🛒'],
            ['title' => 'Active Now', 'value' => '+573', 'change' => '+201 since last hour', 'icon' => '👥'],
            ['title' => 'Growth', 'value' => '+25.8%', 'change' => '+4.3% from last month', 'icon' => '📈']
        ];
        @endphp

        @foreach($cards as $card)
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $card['title'] }} {{ $card['icon'] }}</h5>
                    <h2>{{ $card['value'] }}</h2>
                    <p class="card-text text-muted">{{ $card['change'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Monthly Sales</h5>
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Customer Growth</h5>
                    <canvas id="customerChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Top Selling Products</h5>
                    <p class="card-text">Your best performing products this month</p>
                    @php
                    $products = ['Product A', 'Product B', 'Product C'];
                    @endphp
                    @foreach($products as $index => $product)
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <p class="mb-0">{{ $product }}</p>
                            <small class="text-muted">{{ 1000 - $index * 200 }} sales</small>
                        </div>
                        <span>${{ number_format(5000 - $index * 1000) }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Recent Orders</h5>
                    <p class="card-text">Your latest orders</p>
                    @php
                    $orders = ['Order #1234', 'Order #1235', 'Order #1236'];
                    @endphp
                    @foreach($orders as $index => $order)
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <p class="mb-0">{{ $order }}</p>
                            <small class="text-muted">{{ date('Y-m-d') }}</small>
                        </div>
                        <span>${{ number_format(100 + $index * 50) }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



</section>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sales Chart
    var salesCtx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(salesCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Sales',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Customer Growth Chart
    var customerCtx = document.getElementById('customerChart').getContext('2d');
    var customerChart = new Chart(customerCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'New Customers',
                data: [65, 59, 80, 81, 56, 55],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
@endpush
@endsection
