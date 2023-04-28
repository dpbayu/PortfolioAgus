<?php
require '../function.php';
$id = $_GET['id'];
$sql = "DELETE FROM tbl_portfolio WHERE id = '$id'";
if (mysqli_query($db, $sql)) {
    header("Location: portfolio.php?success=Data success deleted");
    exit();
} else {
    header("Location: portfolio.php?failed=Data failed delete");
    exit();    
}
?>