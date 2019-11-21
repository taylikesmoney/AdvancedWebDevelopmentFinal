<?php
session_start();
require_once 'header.php';

echo "<h3>Remove an item from the marketplace</h3>";
echo "<div>";

$numuseritems = queryMysql("SELECT COUNT(*) c FROM items WHERE Username = '$user'");
$row = $numuseritems->fetch_assoc();
$numuseritems->close();

printf("Hi $user, you currently have %d items up for trade.<br>\n", $row['c']);

$result = queryMysql("SELECT * FROM items WHERE Username = '$user'");
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

echo '<br>Which item would you like to remove?';
echo '<form action="remove.php" method="post">
     Item name: <input type="text" name = "itemname" /><br/>
     <input type="submit" />
     </form>';

echo <<<_END
    </div><br>
_END;

require_once 'footer.php';
?>
