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
            $query = mysqli_query($db, "UPDATE tbl_user SET fullname = '$fullname', job = '$job', type_job = '$type_job', birth_date = '$birth_date', residence = '$residence', pdf_cv = '$pdf_cv' WHERE id = 1");
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
        echo "<script>window.location='about.php?success=Data successfuly updated!';</script>";
    } else {
        mysqli_query($db, "UPDATE tbl_service SET title_service = '$title_service', desc_service = '$desc_service' WHERE id = '$id'");
        echo "<script>window.location='about.php?success=Data successfuly updated!';</script>";
    }
}
// Add & Edit Service End

// Add & Edit Skill Start
if (isset($_POST['addSkill'])) {
    $skill_name = trim(mysqli_real_escape_string($db, $_POST['skill_name']));
    $skill_bar = trim(mysqli_real_escape_string($db, $_POST['skill_bar']));
    mysqli_query($db, "INSERT INTO tbl_skill (id, skill_name, skill_bar) VALUES ('', '$skill_name', '$skill_bar')");
        echo "<script>window.location='about.php?success=Data successfuly added!';</script>";
} else if (isset($_POST['editSkill'])) {
    $id = $_POST['id'];
    $skill_name = trim(mysqli_real_escape_string($db, $_POST['skill_name']));
    $skill_bar = trim(mysqli_real_escape_string($db, $_POST['skill_bar']));
    mysqli_query($db, "UPDATE tbl_skill SET skill_name = '$skill_name', skill_bar = '$skill_bar' WHERE id = '$id'");
    echo "<script>window.location='about.php?success=Data successfuly updated!';</script>";
}
// Add & Edit Skill End

// Add & Edit Resume Start
if (isset($_POST['addResume'])) {
    $type_resume = trim(mysqli_real_escape_string($db, $_POST['type_resume']));
    $title_resume = trim(mysqli_real_escape_string($db, $_POST['title_resume']));
    $org_resume = trim(mysqli_real_escape_string($db, $_POST['org_resume']));
    $time_resume = trim(mysqli_real_escape_string($db, $_POST['time_resume']));
    $desc_resume = trim(mysqli_real_escape_string($db, $_POST['desc_resume']));
    mysqli_query($db, "INSERT INTO tbl_resume (id, type_resume, title_resume, org_resume, time_resume, desc_resume) VALUES ('', '$type_resume', '$title_resume', '$org_resume', '$time_resume', '$desc_resume')");
        echo "<script>window.location='resume.php?success=Data successfuly added!';</script>";
} else if (isset($_POST['editResume'])) {
    $id = $_POST['id'];
    $title_resume = trim(mysqli_real_escape_string($db, $_POST['title_resume']));
    $org_resume = trim(mysqli_real_escape_string($db, $_POST['org_resume']));
    $time_resume = trim(mysqli_real_escape_string($db, $_POST['time_resume']));
    $desc_resume = trim(mysqli_real_escape_string($db, $_POST['desc_resume']));
    mysqli_query($db, "UPDATE tbl_resume SET title_resume = '$title_resume', org_resume = '$org_resume', time_resume = '$time_resume', desc_resume = '$desc_resume' WHERE id = '$id'");
    echo "<script>window.location='resume.php?success=Data successfuly updated!';</script>";
}
// Add & Edit Resume End

// Add & Edit Portfolio Start
if (isset($_POST['addPortfolio'])) {
    $title_project = trim(mysqli_real_escape_string($db, $_POST['title_project']));
    $desc_project = trim(mysqli_real_escape_string($db, $_POST['desc_project']));
    $img_project = $_FILES['img_project']['name'];
    move_uploaded_file($_FILES['img_project']['tmp_name'],"assets/img/portfolio/$img_project");
    mysqli_query($db, "INSERT INTO tbl_portfolio (id, title_project, desc_project, img_project) VALUES ('', '$title_project', '$desc_project', '$img_project')");
        echo "<script>window.location='portfolio.php?success=Data successfuly added!';</script>";
} else if (isset($_POST['editPortfolio'])) {
    $id = $_POST['id'];
    $title_project = trim(mysqli_real_escape_string($db, $_POST['title_project']));
    $desc_project = trim(mysqli_real_escape_string($db, $_POST['desc_project']));
    $img_project = $_FILES['img_project']['name'];
    if ($img_project != '') {
        move_uploaded_file($_FILES['img_project']['tmp_name'],"assets/img/portfolio/$img_project");
        mysqli_query($db, "UPDATE tbl_portfolio SET title_project = '$title_project', desc_project = '$desc_project', img_project = '$img_project' WHERE id = '$id'");
        echo "<script>window.location='portfolio.php?success=Data successfuly updated!';</script>";
    } else {
        mysqli_query($db, "UPDATE tbl_portfolio SET title_project = '$title_project', desc_project = '$desc_project' WHERE id = '$id'");
        echo "<script>window.location='portfolio.php?success=Data successfuly updated!';</script>";
    }
}
// Add & Edit Portfolio End

// Update Contact Page Start
if (isset($_POST['update-contact'])) {
    $residence = mysqli_real_escape_string($db,$_POST['residence']);
    $phone = mysqli_real_escape_string($db,$_POST['phone']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $query = "UPDATE tbl_user SET residence = '$residence', phone = '$phone', email = '$email' WHERE id = 1";
    $run = mysqli_query($db,$query);
    if ($run) {
        echo "<script>document.location.href = 'contact.php?success=Succesfully updated!';</script>";
    }
}
// Update Contact Page End

// Update Profile Start
if (isset($_POST['update-profile'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $img_icon = $_FILES['img_icon']['name'];
    $imgtemp = $_FILES['img_icon']['tmp_name'];
    if ($imgtemp=='') {
        $q = "SELECT * FROM tbl_admin WHERE id = 1";
        $r = mysqli_query($db,$q);
        $d = mysqli_fetch_array($r);
        $img_icon = $d['img_icon'];
    }
    move_uploaded_file($imgtemp,"assets/img/$img_icon");
    if (empty($username)) {
        echo "Field still empty";
    } else {
            if (empty($password)) {
                $sql = "UPDATE tbl_admin SET username = '$username', img_icon = '$img_icon' WHERE id = 1";
                if (mysqli_query($db, $sql)) {
                    echo "<script>document.location.href = 'profile.php?success=Succesfully updated!';</script>";
                } else {
                    echo "Error";
                }
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql2 = "UPDATE tbl_admin SET username = '$username', password = '$hash' WHERE id = 1";
                if (mysqli_query($db, $sql2)) {
                    echo "<script>document.location.href = 'profile.php?success=Password succesfully updated!';</script>";
                } else {
                echo "error";
            }
        }
    }
}
// Update Profile End
?>