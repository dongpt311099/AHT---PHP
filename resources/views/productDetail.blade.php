<html lang="en">
<head>
    <title>De_1</title>
    <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/productDetail.css') }}">

</head>

<body>
    <div class="wrapper">
    
        <div class="product-img">
            <img src="/{{$product->img}}" height="420" width="327">
        </div>
        <div class="product-info">
            <div class="product-text">
                <h1>{{$product->name}}</h1>
                <p>{{$product->description}}</p>
            </div>
            <div class="product-price-btn">
                <p><span>Price:</span> {{$product->salePrice}}</p>
                <button type="button">Add to cart</button>
            </div>
        </div>
    
    </div>

</body>

</html>