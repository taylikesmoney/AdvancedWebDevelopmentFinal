<?php
require_once 'header.php';

$field1 = ($_POST['field1']);
$field2 = ($_POST['field2']);
$field3 = ($_POST['field3']);

queryMysql("INSERT INTO items VALUES('$field1', '$field2', '$field3')");

echo '<p>Thank you, your item has been added to the directory.</p>';

require_once 'footer.php';
