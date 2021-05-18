<?php include_once('connectDB.php'); ?>
<!DOCTYPE html>
<html>

<body>
        <?php include_once('Logo&Nav.php'); ?>

        <?php $id = $_GET['category']; ?>
        <?php $row = getCategory("SELECT * from tblproducts WHERE CategoryID=" . $id); ?>
</body>

</html>