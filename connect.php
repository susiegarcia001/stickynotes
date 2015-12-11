<?php
    // /* Database config */
    
    $db_host		= 'localhost';
    $db_user		= 'susieq0101';
    $db_pass		= '';
    $db_database	= 'postit';
    
    // /* End config */
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_database) or die(mysqli_error());
?>