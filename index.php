<?php
session_start();
require_once 'header.php';

echo "<h3 onclick='this.innerHTML = \"Welcome to $clubstr - the best social networking and item trading hub on the internet.\"'>Welcome to $clubstr.</h3>";
echo "<div>";

if ($loggedin) 
    echo " $user, you are logged in";
else           
    echo 'Please sign up, or log in if you\'re already a member. Join one of the most rapidly growing and advanced social networks available today - your friends are already here.';

echo <<<_END
    </div><br>
_END;

require_once 'footer.php';
?>t