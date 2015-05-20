<?php
require 'config.php';
     
    try {
    	//$q = intval($_GET['q']);
     
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
         if($_GET['s'] == '') $sth = $db->query("SELECT * FROM locations ");
        else $sth = $db->query("SELECT * FROM locations where name='".$_GET['s']."' ");
        $locations = $sth->fetchAll();
         
        echo json_encode( $locations );
         
    } catch (Exception $e) {
        echo $e->getMessage();
    }

?>