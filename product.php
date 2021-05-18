<?php include_once('connectDB.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/webdesign/Webshop/Style.css" type="text/css">
</head>

<body>
    <?php include_once('Logo&Nav.php'); ?>
    <div class="Product">
        <h1> Product Details </h1>

        <?php $id = $_GET['product'];
        $beschrijving = getProduct($id); ?>
       
        <img src=<?php echo "/webdesign/Webshop/" . ($beschrijving["ImgPath"]) ?> width="500" height="300" />

        <div class="description">
            <?php echo ($beschrijving["productName"]) ?> <br>
            <?php echo ($beschrijving["productDescription"]) ?> <br>
            <?php echo ("Prijs: " . $beschrijving["productPrice"]) ?> <br>
        </div>
    </div>
</body>

</html>