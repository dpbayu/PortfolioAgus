<!-- PHP -->
<?php
require '../function.php';
$page = 'about';
$user = "SELECT * FROM tbl_user";
$run = mysqli_query($db,$user);
$user_data = mysqli_fetch_array($run);
?>
<!-- PHP -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require 'partials/head.php' ?>
<!-- Head End -->

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar Start -->
        <?php require 'partials/sidebar.php' ?>
        <!-- Sidebar End -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content Start -->
            <div id="content">
                <!-- Topbar Start -->
                <?php require 'partials/topbar.php' ?>
                <!-- Topbar End -->
                <!-- Content Start -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">About</h1>
                    </div>
                    <?php
                    if (isset($_GET['success'])) {
                        $msg = $_GET['success'];
                        echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>'.$msg.'</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    if (isset($_GET['failed'])) {
                        $msg = $_GET['failed'];
                        echo '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>'.$msg.'</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    }
                    ?>
                    <form class="forms-sample" action="function.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label class="form-label" for="fullname">Fullname</label>
                            <input class="form-control" type="text" id="fullname" name="fullname"
                                value="<?= $user_data['fullname'] ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="job">Job</label>
                            <input class="form-control" type="text" id="job" name="job"
                                value="<?= $user_data['job'] ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="type_job">Job Type</label>
                            <select class="form-control" name="type_job" id="type_job">
                                <option value="Full Time" <?= $user_data['type_job'] == "Full Time" ? "selected" : '' ?>>Full Time</option>
                                <option value="Part Time" <?= $user_data['type_job'] == "Part Time" ? "selected" : '' ?>>Part Time</option>
                                <option value="Freelance" <?= $user_data['type_job'] == "Freelance" ? "selected" : '' ?>>Freelance</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="birth_date">Birth Date</label>
                            <input class="form-control" type="date" id="birth_date" name="birth_date"
                                value="<?= date('Y-m-d',strtotime($user_data["birth_date"])) ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="residence">Residence</label>
                            <input class="form-control" type="text" id="residence" name="residence"
                                value="<?= $user_data['residence'] ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="about_desc">About Description</label>
                            <textarea class="form-control" id="about_desc"
                                name="about_desc"><?= $user_data['about_desc'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pdf_cv">Upload CV</label>
                            <input type="file" class="form-control file-upload-info" id="pdf_cv" name="pdf_cv"
                                placeholder="Upload PDF">
                        </div>
                        <button type="submit" name="update-about" class="btn btn-success me-2">Update</button>
                    </form>
                </div>
                <!-- Content End -->
            </div>
            <!-- Main Content End -->
            <!-- Logout Modal Start-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.html">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Logout Modal End-->
            <!-- Footer Start -->
            <?php require 'partials/footer.php' ?>
            <!-- Footer End -->
        </div>
    </div>
</body>

</html>