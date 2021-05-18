<!DOCTYPE html>

<?php
require_once('adminDB.php');
require_once('connectDB.php');
$error = '';
$errorDelete = '';

if (isset($_POST['but_submit_insert'])) {
    $target_dir = "Media/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $errorCheck = false;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check == false) {
        $error .= '<p class="error">File is not an image</p>';
        $errorCheck = true;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $error .= '<p class="error">File already exists</p>';
        $errorCheck = true;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 4000000) {
        $error .= '<p class="error">Sorry, your file is too large. 4MB is the maximum file size</p>';
        $errorCheck = true;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "jfif"
    ) {
        $error .= '<p class="error">Sorry, only JPG, JPEG, PNG & JFIF files are allowed.</p>';
        $errorCheck = true;
    }

    // Check if an error occured
    if ($errorCheck == true) {
        $error .= '<p class="error">Sorry, an error occured when uploading your file.</p>';
    } else {
        $imagePath = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        if (insertProduct($_POST["naam"], $_POST["beschrijving"], $_POST["prijs"], $imagePath, $_POST["categoryID"])) {
            if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file))
                $error .= '<p class="error">Record created successfully</p>';
        } else {
            $error .= '<p class="error">Sorry, an error occured when uploading your file.</p>';
        }
    }
}

if (isset($_POST['but_submit_delete'])) {
    $id = $_POST['Productnames'];

    $row = getProduct($id);

    $ImagePath = ($row["ImgPath"]);

    if (file_exists($ImagePath)) {
        unlink($ImagePath);

        $errorDelete = deleteData($id);
    } else {
        $errorDelete .= '<p class="error">Image does not exists.</p>';
    }
}
?>

<html>
<?php require_once('Logo&Nav.php'); ?>

<head>
    <link rel="stylesheet" href="/webdesign/Webshop/Style.css" type="text/css">
</head>

<body>

    <div class="Form">
        <h1> Welkom in het admin gedeelte </h1>
        <b>
            <?php echo $error
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <b> Een product in de database zetten </b> <br>
                <div class="form-group">
                    <label> Naam:</label>
                    <input type="text" name="naam" class="form-control" required />
                </div>
                <div class="form-group">
                    <label> Beschrijving:</label>
                    <input type="text" name="beschrijving" class="form-control" required />
                </div>
                <div class="form-group">
                    <label> Prijs:</label>
                    <input type="text" name="prijs" class="form-control" required />
                </div>
                <div class="form-group">
                    <label> CategoryID:</label>
                    <input type="text" name="categoryID" class="form-control" required />
                </div>
                <div class="form-group">
                    <label> Afbeelding:</label>
                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" required />
                </div>
                <div class="form-group">
                    <input type="submit" name="but_submit_insert" value="Toevoegen" id="but_submit_insert" />
                </div>
            </form>
        </b>


        <b>
            <?php echo $errorDelete
            ?>
            <form action="" method="POST">
                <b> Een product uit de database verwijderen </b> <br>
                <div class="form-group">
                    <?php showProducts(); ?>
                    <input type="submit" name="but_submit_delete" value="Delete record" id="but_submit_delete" />
                </div>
            </form>
        </b>

    </div>

    <div class="logout">
        <a href="/webdesign/Webshop/logout.php"><b>Log out</b></a>
    </div>

</body>

</html>