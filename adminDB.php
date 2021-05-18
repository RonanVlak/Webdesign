<?php

function insertProduct($naam, $beschrijving, $prijs, $Img, $CatID)
{
    $servername = "localhost";
    $username = "admin";
    $password = "wachtwoord123";
    $dbname = "webshop";
    $returnVal = false;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //Insert into database
    $sql = "INSERT INTO tblproducts( productName, productDescription,
    productPrice, ImgPath, CategoryID) 
    VALUES('$naam','$beschrijving','$prijs','$Img','$CatID')";
    if ($conn->query($sql)) {
        $returnVal = true;
    } else {
        $returnVal = false;
    }
    $conn->close();
    return $returnVal;
}

function showProducts()
{
    $servername = "localhost";
    $username = "admin";
    $password = "wachtwoord123";
    $dbname = "webshop";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, productName FROM tblProducts order by productName";
    $result = $conn->query($sql);

    echo '<select name="Productnames">'; 
    while ($row = $result->fetch_assoc()) { 

        echo '<option value="'.$row['id'].'">'.$row['productName'].'</option>';   
    }
    echo '</select>';
    $conn->close();
   
}

function deleteData($id) {
    $servername = "localhost";
    $username = "admin";
    $password = "wachtwoord123";
    $dbname = "webshop";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //Read database
    $sql = "DELETE FROM tblproducts WHERE id=" . $id;
    $result = '';

    if (!$conn->query($sql)) {
        $result = "Error, data was not deleted";
    } 
    else {
        $result = "Data deleted successfully";
    }
    $conn->close();
    return $result;
}
