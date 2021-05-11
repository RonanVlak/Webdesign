<!DOCTYPE html>
<html>

<?php
function getCategory($id) {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "webshop";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //Read database
    $sql = "SELECT * from tblproducts WHERE CategoryID=".$id;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
            $productID = $row["id"]?>
            
            <a href=<?php "product.php/?product=".$productID?>><img src=<?php echo "/webdesign/Webshop/".($row["ImgPath"]) ?> width="200" height="90" /> </a>
    
            <div class="description">
                <?php echo ($row["productName"]); ?> <br>
                <?php echo ("Prijs: " . $row["productPrice"]); ?> <br>
            </div> <?php
          
    }
    else {
        echo "Error, no results";
        die();
    }
    $conn->close();
}
?>

</html>