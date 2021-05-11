<?php include_once('connectDB.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="frontpage.css" type="text/css">
</head>

<body>
    <div class="Product1">
        <?php $beschrijving = getProduct(1); ?>
        <a href="product.php/?product=1"><img src=<?php echo ($beschrijving["ImgPath"]) ?> width="200" height="90" /> </a>

        <div class="description">
            <?php echo ($beschrijving["productName"]); ?> <br>
            <?php echo ("Prijs: " . $beschrijving["productPrice"]); ?> <br>
        </div>
    </div>

    <div class="Product2">
        <?php $beschrijving = getProduct(2); ?>
        <a href="product.php/?product=2"><img src=<?php echo ($beschrijving["ImgPath"]) ?> width="200" height="90" /> </a>

        <div class="description">
            <?php echo ($beschrijving["productName"]); ?> <br>
            <?php echo ("Prijs: " . $beschrijving["productPrice"]); ?> <br>
        </div>
    </div>

    <div class="Product3">
        <?php $beschrijving = getProduct(3); ?>
        <a href="product.php/?product=3"><img src=<?php echo ($beschrijving["ImgPath"]) ?> width="200" height="90" /> </a>

        <div class="description">
            <?php echo ($beschrijving["productName"]); ?> <br>
            <?php echo ("Prijs: " . $beschrijving["productPrice"]); ?> <br>
        </div>
    </div>
</body>

</html>