<?php
function getProduct($id) {
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
    $sql = "SELECT * from tblproducts WHERE id=".$id;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

    }
    else {
        echo "no results";
    }
    $conn->close();
    return $row;
}
?>