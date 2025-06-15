<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prefume</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-dark sidebar text-white py-4">
                <div class="text-center mb-4"><h4>Prefume</h4></div>
                <ul class="nav flex-column px-3">
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('users.index') }}">Users</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('categories.index') }}">Categories</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('products.index') }}">Products</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('orders.index') }}">Orders</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('order_items.index') }}">Order_items</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('addresses.index') }}">Addresses</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('reviews.index') }}">Reviews</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('carts.index') }}">Carts</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('cart_items.index') }}">Cart_items</a></li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
