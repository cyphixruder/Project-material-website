<?php

echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">';
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>';
echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>';
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>';

function showNotif($message, $type) {
  echo "<h5 style='visibility: hidden'>$message.' '.$type</h5>";
   // PHP code
   echo '
     <script>
      function customNotify(message, type) {
        $.bootstrapGrowl(message, {
          ele: "body",
          type: type,
          offset: {from: "top", amount: 20},
          align: "center", // ("left", "right", or "center")
          width: 300, // (integer, or "auto")
          delay: 4000,
          allow_dismiss: true,
          stackup_spacing: 10 // spacing between consecutively stacked growls.
        }); 
      }
     </script>
    ';

   // Call the JavaScript function from PHP
   echo '<script>';
   echo 'customNotify("'.$message.'", "'.$type.'");';
   echo '</script>';
}
    // Call the PHP function
    // showNotif('holla')
    
?>