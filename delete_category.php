<?php
require_once 'connect.php';
$conn = new Connect();
$db_link = $conn->connectToPDO();
if (isset($_GET['cid'])):
    $value = $_GET['cid'];
    $sqlSelect = "DELETE FROM `category` WHERE Cat_ID = ?";
    $stmt = $db_link->prepare($sqlSelect);
    $execute = $stmt->execute(array("$value"));
    if($execute){
        header("Location:category_management.php");
    }else{
        echo "Failed".$execute;
    }
endif;  
?>