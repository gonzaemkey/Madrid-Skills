<?php
        $connection = new mysqli("localhost", "root", "", "tienda");
        
        if ( $connection->errno ) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        } else {
            return $connection;
        }

?>