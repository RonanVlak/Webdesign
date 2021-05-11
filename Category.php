<?php include_once('getCategoryDB.php'); ?>
<!DOCTYPE html>
<html>

<head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/webdesign/Webshop/Style.css" type="text/css">
</head>

<body>
        <?php include_once('Logo&Nav.php'); ?>
        <div class="Category">
                <?php $id = $_GET['category']; ?>
                <?php $row = getCategory($id); ?>
                <?php $link = "/webdesign/Webshop/product.php/?product=".($row["id"]); ?>
                <a href="<?php echo $link ?>"><img src=<?php echo "/webdesign/Webshop/" . ($row["ImgPath"]) ?> width="200" height="90" /> </a>

                <div class="description">
                        <?php echo ($row["productName"]); ?> <br>
                        <?php echo ("Prijs: " . $row["productPrice"]); ?> <br>
                </div>
        </div>
</body>

</html>