<?php include_once ('getCategoryDB.php'); ?>
<!DOCTYPE html>
<html>
        <body>
                <?php $id = $_GET['category']; ?>
                <?php include_once ('Logo&Nav.php'); ?>
                <?php getCategory($id); ?>
        </body>
</html>