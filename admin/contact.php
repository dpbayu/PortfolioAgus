<!-- PHP -->
<?php
require '../function.php';
$page = 'contact';
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
                        <h1 class="h3 mb-0 text-gray-800">Contact</h1>
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
                    <!-- About Start -->
                    <form class="forms-sample mb-5" action="function.php" method="POST">
                        <div class="row col-md-12 d-flex">
                            <div class="form-group mb-3 w-100">
                                <label class="form-label" for="residence">Residence</label>
                                <input class="form-control" type="text" id="residence" name="residence"
                                    value="<?= $user_data['residence'] ?>">
                            </div>
                            <div class="form-group mb-3 w-100">
                                <label class="form-label" for="phone">Phone</label>
                                <input class="form-control" type="text" id="phone" name="phone"
                                    value="<?= $user_data['phone'] ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" type="text" id="email" name="email"
                                    value="<?= $user_data['email'] ?>">
                            </div>
                        </div>
                        <button type="submit" name="update-contact" class="btn btn-success me-2">Update</button>
                    </form>
                    <!-- About End -->
                </div>
                <!-- Content End -->
            </div>
            <!-- Main Content End -->
            <!-- Footer Start -->
            <?php require 'partials/footer.php' ?>
            <!-- Footer End -->
        </div>
    </div>
</body>

</html>