<!-- PHP -->
<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require '../function.php';
$page = 'portfolio';
$user = "SELECT * FROM tbl_user, tbl_portfolio";
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
                        <h1 class="h3 mb-0 text-gray-800">Resume</h1>
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
                    <!-- Portfolio Start -->
                    <section id='portfolio' class='section portfolio-section border-d'>
                        <div class='section-block portfolio-block'>
                            <div class='container-fluid'>
                                <div class="row">
                                    <?php 
                                        $query_portfolio = "SELECT * FROM tbl_portfolio ORDER BY id DESC";
                                        $run_portfolio = mysqli_query($db,$query_portfolio);
                                        while ($portfolio = mysqli_fetch_array($run_portfolio)) {
                                    ?>
                                    <div class="col-md-4 mb-3">
                                        <img src="assets/img/portfolio/<?= $portfolio['img_project'] ?>" width="100%">
                                        <h4><?= $portfolio['title_project'] ?></h4>
                                        <p><?= $portfolio['desc_project'] ?></p>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editPortfolio<?= $portfolio['id'] ?>">
                                            Edit
                                        </button>
                                        <a onclick="return confirm('Are you sure delete this data ?')"
                                            href="deletePortfolio.php?id=<?= $portfolio['id'] ?>"
                                            class="btn btn-danger">
                                            Delete
                                        </a>
                                    </div>
                                    <!-- Edit Modal Portfolio Start -->
                                    <div class="modal fade" id="editPortfolio<?= $portfolio['id'] ?>" tabindex="-1"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <form action="function.php" method="POST" enctype="multipart/form-data">
                                            <?php
                                                $id = @$_GET['id'];
                                            ?>
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editModalLabel">
                                                            Modal title</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group col-12">
                                                            <div class="form-group mb-3 w-100">
                                                                <input type="hidden" class="form-control" name="id"
                                                                    value="<?= $portfolio['id'] ?>">
                                                                <input type="file" class="form-control"
                                                                    name="img_project">
                                                                <img src="assets/img/portfolio/<?= $portfolio['img_project'] ?>" width="100%">
                                                            </div>
                                                            <div class="form-group mb-3 w-100">
                                                                <label class="form-label" for="title_project">Title
                                                                    Project</label>
                                                                <input class="form-control" type="text"
                                                                    id="title_project" name="title_project"
                                                                    placeholder="Title Project"
                                                                    value="<?= $portfolio['title_project'] ?>">
                                                            </div>
                                                            <div class="form-group mb-3 w-100">
                                                                <label class="form-label" for="desc_project">Description
                                                                    Project</label>
                                                                <input class="form-control" type="text"
                                                                    id="desc_project" name="desc_project"
                                                                    placeholder="Description Project"
                                                                    value="<?= $portfolio['desc_project'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary"
                                                            name="editPortfolio">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Edit Modal Portfolio End -->
                                    <?php 
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Portfolio Start -->
                    <!-- Add Portfolio Start -->
                    <form class="forms-sample my-3" action="function.php" method="POST" enctype="multipart/form-data">
                        <div class="row col-md-12 d-flex">
                            <div class="col-sm-12 d-sm-block gap-5">
                                <div class="form-group mb-3 w-100">
                                    <label class="form-label" for="title_project">Title Project</label>
                                    <input class="form-control" type="text" id="title_project" name="title_project"
                                        placeholder="Title Project">
                                </div>
                                <div class="form-group mb-3 w-100">
                                    <label class="form-label" for="desc_project">Description Project</label>
                                    <input class="form-control" type="text" id="desc_project" name="desc_project"
                                        placeholder="Description Project">
                                </div>
                                <div class="form-group mb-3 w-100">
                                    <label class="form-label" for="img_project">Image Project</label>
                                    <input type="file" class="form-control" id="img_project" name="img_project">
                                </div>
                                <button class="btn btn-success" type="submit" name="addPortfolio">Add Project</button>
                            </div>
                        </div>
                    </form>
                    <!-- Add Portfolio End -->
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