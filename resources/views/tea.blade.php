<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <style>
        .product-details {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .product-details h1 {
            font-size: 1.8em;
            margin-bottom: 10px;
            color: #333;
        }

        .product-details p {
            margin-bottom: 10px;
            color: #666;
        }

        .product-details img {
            max-width: 100%;
            height: auto;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .product-details .price {
            font-weight: bold;
            color: #008000; 
        }
    </style>
</head>
<body>
    <div class="product-details">
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <p class="price">Price: P{{ $product->price }}</p>
        <img src="{{ asset($product->image_URL) }}" alt="{{ $product->name }}">
        {{-- ... etc. --}}
    </div>
</body>
</html>