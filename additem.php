<?php
session_start();
require_once 'header.php';

echo "<h3>Add an item to the marketplace</h3>";
echo "<div>";

$numuseritems = queryMysql("SELECT COUNT(*) c FROM items WHERE Username = '$user'");
$row = $numuseritems->fetch_assoc();
$numuseritems->close();
printf("Hi $user, you currently have %d items up for trade.<br>\n", $row['c']);
echo '<br>Add a new item here:';
?>

<form action="insert.php" method="post">
Item name:        <input type="text" name = "field1" /><br/>
Item description: <input type="text" name = "field2" /><br/>
Trade for:        <input type="text" name = "field3" /><br/>
Username:         <input type="text" name = "field4" value = "<?php echo $user;?>"/><br/>
<input type="submit" />
</form>

<?php
//////////////////////////////////////////////////////////////////////////////////////////////////
echo "<br>";
echo "Enter a Username to retrieve user and pass:";
echo "<form method='post'>
    <input type='text' name='name' />
    <input type='submit' name='Submit' value='Submit' />
</form>";

$name_bad = $_POST['name'];

// user input that uses SQL Injection
//$name_bad = "'OR 1 OR '";
///////////////////////////////////////////////////////////////////////////////////////
$result = queryMysql("SELECT * FROM members WHERE user = '$name_bad'");
$all_property = array();  //declare an array for saving property

//showing property
echo '<br>';
echo '<table class="data-table">
       <tr class="data-heading">';  //initialize table tag
while ($property = mysqli_fetch_field($result)) {
   echo '<td>' . $property->name . '</td>';  //get field name for header
   array_push($all_property, $property->name);  //save those to array
}
echo '</tr>'; //end tr tag

//showing all data
while ($row = mysqli_fetch_array($result)) {
   echo "<tr>";
   foreach ($all_property as $item) {
       echo '<td>' . $row[$item] . '</td>'; //get items using property value
   }
   echo '</tr>';
}
echo "</table>";


echo <<<_END
    </div><br>
_END;

require_once 'footer.php';
?>
