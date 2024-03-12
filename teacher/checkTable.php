<?php
    include("../config.php");

    $table="spm";
    function tableExists($pdo, $table) {

        // Try a select statement against the table
        // Run it in try-catch in case PDO is in ERRMODE_EXCEPTION.
        try {
            $result = $pdo->query("SELECT 1 FROM $table");
        } catch (Exception $e) {
            // We got an exception (table not found)
            return FALSE;
        }
    
        // Result is either boolean FALSE (no table found) or PDOStatement Object (table found)
        return $result !== FALSE;
    }
    if(tableExists($conn,$table)){
     echo"Success" ;
    }else{
     echo"Success no" ;

    }


    ?>