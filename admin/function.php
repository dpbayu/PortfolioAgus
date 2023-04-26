<?php
require '../function.php';

// Update Home Page Start
if (isset($_POST['update-home'])) {
    // print_r($_POST);
    $fullname = mysqli_real_escape_string($db,$_POST['fullname']);
    $home_desc = mysqli_real_escape_string($db,$_POST['home_desc']);
    $query = "UPDATE tbl_user SET fullname = '$fullname', home_desc = '$home_desc' WHERE id = 1";
    $run = mysqli_query($db,$query);
    if ($run) {
        echo "<script>document.location.href = 'index.php?success=Succesfully updated!';</script>";
    }
}
// Update Home Page End
?>