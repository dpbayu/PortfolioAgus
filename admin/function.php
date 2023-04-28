<?php
require '../function.php';

// Update Home Page Start
if (isset($_POST['update-home'])) {
    $home_desc = mysqli_real_escape_string($db,$_POST['home_desc']);
    $query = "UPDATE tbl_user SET home_desc = '$home_desc' WHERE id = 1";
    $run = mysqli_query($db,$query);
    if ($run) {
        echo "<script>document.location.href = 'index.php?success=Succesfully updated!';</script>";
    }
}
// Update Home Page End

// Update About Page Start
if (isset($_POST['update-about'])) {
    $fullname = mysqli_real_escape_string($db,$_POST['fullname']);
    $job = mysqli_real_escape_string($db,$_POST['job']);
    $type_job = mysqli_real_escape_string($db,$_POST['type_job']);
    $birth_date = mysqli_real_escape_string($db,$_POST['birth_date']);
    $residence = mysqli_real_escape_string($db,$_POST['residence']);
    $about_desc = mysqli_real_escape_string($db,$_POST['about_desc']);
    $pdf_cv = $_FILES['pdf_cv']['name'];
    $extention_file	= array('pdf','docx');
    $text = explode('.', $pdf_cv);
    $extention = strtolower(end($text));
    $ukuran = $_FILES['pdf_cv']['size'];
    $file_tmp = $_FILES['pdf_cv']['tmp_name'];
    if (in_array($extention, $extention_file) === true) {
        if ($ukuran < 2044070) {
            move_uploaded_file($file_tmp, 'assets/file/'.$pdf_cv);
            $query = mysqli_query($db, "UPDATE tbl_user SET fullname = '$fullname', job = '$job., type_job = '$type_job', birth_date = '$birth_date', residence = '$residence', pdf_cv = '$pdf_cv' WHERE id = 1");
            if ($query) {
                echo "<script>window.location='about.php?success=Data successfuly updated!';</script>";
                exit();                
            } else {
                echo "<script>window.location='about.php?success=Data successfuly updated!';</script>";
                exit();                   
            }
        }
    }  else {
        $query = mysqli_query($db, "UPDATE tbl_user SET fullname = '$fullname', job = '$job', type_job = '$type_job', birth_date = '$birth_date', residence = '$residence', about_desc = '$about_desc' WHERE id = 1");
        if ($query) {
            echo "<script>window.location='about.php?success=Data successfuly updated!';</script>";
            exit();                          
        } else {
            echo "<script>window.location='about.php?success=Data successfuly updated!';</script>";
            exit();                          
        }
    }
}
// Update About Page End

// Add & Edit Service Start
if (isset($_POST['addService'])) {
    $title_service = trim(mysqli_real_escape_string($db, $_POST['title_service']));
    $desc_service = trim(mysqli_real_escape_string($db, $_POST['desc_service']));
    $img_service = $_FILES['img_service']['name'];
    move_uploaded_file($_FILES['img_service']['tmp_name'],"assets/img/$img_service");
    mysqli_query($db, "INSERT INTO tbl_service (id, title_service, desc_service, img_service) VALUES ('', '$title_service', '$desc_service', '$img_service')");
        echo "<script>window.location='about.php?success=Data successfuly added!';</script>";
} else if (isset($_POST['editService'])) {
    $id = $_POST['id'];
    $title_service = trim(mysqli_real_escape_string($db, $_POST['title_service']));
    $desc_service = trim(mysqli_real_escape_string($db, $_POST['desc_service']));
    $img_service = $_FILES['img_service']['name'];
    if ($img_service != '') {
        move_uploaded_file($_FILES['img_service']['tmp_name'],"assets/img/$img_service");
        mysqli_query($db, "UPDATE tbl_service SET title_service = '$title_service', desc_service = '$desc_service', img_service = '$img_service' WHERE id = '$id'");
        echo "<script>window.location='about.php?success=Data successfuly added!';</script>";
    } else {
        mysqli_query($db, "UPDATE tbl_service SET title_service = '$title_service', desc_service = '$desc_service' WHERE id = '$id'");
        echo "<script>window.location='about.php?success=Data successfuly added!';</script>";
    }
}
// Add & Edit Service End
?>