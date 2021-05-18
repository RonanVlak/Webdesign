<!DOCTYPE html>
<?php
session_start();

if (isset($_SESSION['uname'])) {
    if ($_SESSION['uname'] == "admin") {
        header('Location: /webdesign/Webshop/admin.php');
    } else {
        header('Location: /webdesign/Webshop/login.php');
    }
}

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

$error = "";
if (isset($_POST['but_submit'])) {
    $uname = $_POST["naam"];
    $psswrd = $_POST["password"];

    if ($uname != "" && $password != "") {
        $sql = "SELECT * from tblusers WHERE Username='" . $uname . "'";

        $result = $conn->query($sql);
        if (!empty($result) && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($psswrd == $row['Password']) {
                $_SESSION['uname'] = $uname;
                if ($uname == "admin") {
                    header('Location: /webdesign/Webshop/admin.php');
                } else {
                    header('Location: /webdesign/Webshop/login.php');
                }
            } else {
                $error .= '<p class="error">Password is incorrect</p>';
            }
        } else {
            $error .= '<p class="error">There is no user with this username</p>';
        }
        $conn->close();
    } else {
        $error .= '<p class="error">Fields cannot be empty</p>';
    }
}

?>

<html>

<head>
    <?php include_once('Logo&Nav.php'); ?>
    <link rel="stylesheet" href="/webdesign/Webshop/Style.css" type="text/css">
</head>

<body>
    <div class="Form">
        <?php echo $error ?>
        <form action="" method="POST">
            <div class="form-group">
                <label> Naam:</label>
                <input type="text" name="naam" class="form-control" required />
            </div>
            <div class="form-group">
                <label> Passsword:</label>
                <input type="password" name="password" class="form-control" required />
            </div>
            <div class="form-group">
                <input type="submit" name="but_submit" value="Verzend" id="but_submit" />
            </div>
        </form>
    </div>
</body>

</html>