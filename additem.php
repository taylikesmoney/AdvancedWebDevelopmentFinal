<?php
session_start();
require_once 'header.php';

echo "<h3>Add an item to the marketplace</h3>";
echo "<div>";

if ($loggedin) {
    echo "$user, you are logged in, and currently have xxx items up for trade.";

         '<form action="insert.php" method="post">
         Item name: <input type="text" name = "field1" /><br/>
         Item description: <input type="text" name = "field2" /><br/>
         Trade for: <input type="text" name = "field3" /><br/>
         <input type="submit" />
         </form>';
       }

else
    echo 'Please sign up or log in if you wish to add an item
     to the marketplace.';



echo <<<_END
    </div><br>
_END;

require_once 'footer.php';
?>
