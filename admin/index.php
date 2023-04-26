<!-- PHP -->
<?php
require '../function.php';
$page = 'home';
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
                        <h1 class="h3 mb-0 text-gray-800">Home</h1>
                    </div>
                    <form class="forms-sample" action="function.php" method="POST">
                        <div class="form-group mb-3">
                            <label class="form-label" for="fullname">Fullname</label>
                            <input class="form-control" type="text" id="fullname" name="fullname"
                                value="<?= $user_data['fullname'] ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="home_desc">Home Description</label>
                            <textarea class="form-control" id="home_desc" name="home_desc"><?= $user_data['home_desc'] ?></textarea>
                        </div>
                        <button type="submit" name="update-home" class="btn btn-success me-2">Update</button>
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