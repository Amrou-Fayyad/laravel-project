<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perfume Store - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
    <h1 class="text-center mb-4">Welcome to the Perfume Store</h1>

    <h4>Categories</h4>
    <div class="mb-4">
        @foreach($categories as $category)
            <span class="badge bg-primary me-2">{{ $category->name }}</span>
        @endforeach
    </div>

    <h4>Latest Perfumes</h4>
    <div class="row">
    @php
        $images = [
            'images/perfumes/perfume1.jpg',
            'images/perfumes/perfume2.jpg',
            'images/perfumes/perfume3.jpg',
            'images/perfumes/perfume4.jpg',
            'images/perfumes/perfume5.jpg',
            'images/perfumes/perfume6.jpg',
            'images/perfumes/perfume7.jpg',
            'images/perfumes/perfume8.jpg',
        ];
    @endphp


        @foreach($products as $index => $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                   <img src="{{ asset($images[$index % count($images)]) }}" class="card-img-top" alt="Perfume" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="text-success">${{ $product->price }}</p>
                        <a href="#" class="btn btn-sm btn-outline-dark">View Product</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
