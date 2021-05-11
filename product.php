<?php include_once ('connectDB.php'); ?>
<!DOCTYPE html>
<html>
        <body>
            <h1> Product Details </h1>
        
            <?php $id = $_GET['product'];
                $beschrijving = getProduct($id);?>
            <img src=<?php echo "/webdesign/Webshop/".($beschrijving["ImgPath"]) ?> 
                    width="500"
                    height="300"/>

            <div class="description">
                <?php echo ($beschrijving["productName"]) ?> <br>
                <?php echo ($beschrijving["productDescription"]) ?> <br>
                <?php echo ("Prijs: " . $beschrijving["productPrice"]) ?> <br>
            </div>
        </body>
</html>