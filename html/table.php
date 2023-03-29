<?php
   include 'config.php'; // include database connection configuration file
    if($conn->connect_error){

        die('Connection Failed : ' .$conn->connect_error);


    }else{
        
        $sql = "SELECT * FROM uploads  ORDER BY id DESC";
        $result = mysqli_query($conn, $query);


    }

   
?>