<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/webdesign/Webshop/Style.css" type="text/css">
</head>

<body>

    <?php
    function getProduct($id)
    {
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
        $sql = "SELECT * from tblproducts WHERE id=" . $id;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "no results";
            die();
        }
        $conn->close();
        return $row;
    }

    function getCategory($query)
    {
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
        $sql = $query;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <div class="Category">
                    <?php $link = "/webdesign/Webshop/product.php/?product=" . ($row["id"]); ?>
                    <a href="<?php echo $link ?>"><img src=<?php echo "/webdesign/Webshop/" . ($row["ImgPath"]) ?> width="200" height="90" /> </a>

                    <div class="description">
                        <?php echo ($row["productName"]); ?> <br>
                        <?php echo ("Prijs: " . $row["productPrice"]); ?> <br>
                    </div>
                </div>
    <?php
            }
        } else {
            echo "Error, no results";
            die();
        }
        $conn->close();
        return $row;
    }


    ?>


</body>

</html>