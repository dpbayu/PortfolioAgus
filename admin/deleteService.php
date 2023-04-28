<?php
require '../function.php';
$id = $_GET['id'];
$sql = "DELETE FROM tbl_service WHERE id = '$id'";
if (mysqli_query($db, $sql)) {
    header("Location: about.php?success=Data success deleted");
    exit();
} else {
    header("Location: about.php?failed=Data failed delete");
    exit();    
}
?>