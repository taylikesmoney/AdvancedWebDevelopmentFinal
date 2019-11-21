<?php
require_once 'header.php';

$itemname = ($_POST['itemname']);

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM items WHERE Item_Name = '$itemname'";

if (mysqli_query($conn, $sql)) {
    echo "Thank you, your item has been removed from the directory.";
}
else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);

require_once 'footer.php';
