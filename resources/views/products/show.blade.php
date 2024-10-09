<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Product Details</h1>

        <div class="form-group">
            <label for="productName">Name:</label>
            <p>{{ $product->name }}</p>
        </div>

        <div class="form-group">
            <label for="productDescription">Description:</label>
            <p>{{ $product->description }}</p>
        </div>

        <div class="form-group">
            <label for="productImage">Image:</label>
            @if ($product->image)
                <img src="{{ asset('storage/images/' . $product->image) }}" alt="Product Image" style="max-width: 100px;">
            @else
                <p>No image available</p>
            @endif
        </div>

        <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Products List</a>
    </div>

    <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-sWF2ATbapPBStxZHOuh6Gd9p7e1lmtE/p1XrM4s2Ptxdeya1cQoV6taYvP6ZvcWA" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+ewo/m9WQg8E+txfEJ7/dFndaiG2FThO2zG" crossorigin="anonymous"></script>
</body>
</html>
