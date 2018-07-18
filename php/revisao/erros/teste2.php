
<?php
//error handler function
function customError($errno, $errstr) {
  echo "<b>Error:</b> [$errno] $errstr";
  echo "Ending script";
  die();
}

//set error handler
set_error_handler("customError");

//trigger error
echo($test);
?> 