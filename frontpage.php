<?php include_once('connectDB.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="frontpage.css" type="text/css">
</head>

<body>
    <?php for ($i = 1; $i <= 3; $i++) { ?>
        <div class="frontpageProducts">
            <?php $beschrijving = getProduct($i); ?>
            <?php $link = "product.php/?product=" . ($i) ?>
            <a href="<?php echo $link ?>"><img src=<?php echo ($beschrijving["ImgPath"]) ?> width="200" height="90" /> </a>

            <div class="description">
                <?php echo ($beschrijving["productName"]); ?> <br>
                <?php echo ("Prijs: " . $beschrijving["productPrice"]); ?> <br>
            </div>
        </div>
    <?php } ?>
</body>

</html>