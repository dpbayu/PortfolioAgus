<!-- PHP -->
<?php
require '../function.php';
$page = 'resume';
$user = "SELECT * FROM tbl_resume";
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
                    <!-- Service Start -->
                    <div class='section-block services-block'>
                        <div class='container-fluid'>
                            <div class='row d-flex justify-content-center'>
                                <!-- Education Start -->
                                <div class="col-md-6">
                                    <h4>My Education</h4>
                                    <div class='section-block timeline-block'>
                                        <div class='container-fluid'>
                                            <ul class='timeline'>
                                                <?php 
                                                    $query_education = "SELECT * FROM tbl_resume";
                                                    $run_education = mysqli_query($db,$query_education);
                                                    while ($education = mysqli_fetch_array($run_education)) {
                                                    if ($education['type_resume'] == 'e'){
                                                ?>
                                                <li>
                                                    <div class='timeline-content'>
                                                        <h4><?= $education['org_resume'] ?></h4>
                                                        <em>
                                                            <span><?= $education['title_resume'] ?></span>
                                                            <span><?= $education['time_resume'] ?></span>
                                                        </em>
                                                        <p><?= $education['desc_resume'] ?></p>
                                                        <button type="button" class="btn btn-warning"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editEducation<?= $education['id'] ?>">
                                                            Edit
                                                        </button>
                                                        <a onclick="return confirm('Are you sure delete this data ?')"
                                                            href="deleteResume.php?id=<?= $education['id'] ?>"
                                                            class="btn btn-danger">
                                                            Delete
                                                        </a>
                                                    </div>
                                                </li>
                                                <!-- Edit Modal Education Start -->
                                                <div class="modal fade" id="editEducation<?= $education['id'] ?>"
                                                    tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <form action="function.php" method="POST">
                                                        <?php
                                                            $id = @$_GET['id'];
                                                        ?>
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="editModalLabel">
                                                                        Modal title</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group col-12">
                                                                        <div class="form-group mb-3 w-100">
                                                                            <label class="form-label"
                                                                                for="title_resume">Title
                                                                                Education</label>
                                                                            <input type="hidden" class="form-control"
                                                                                name="id"
                                                                                value="<?= $education['id'] ?>">
                                                                            <input class="form-control" type="text"
                                                                                id="title_resume" name="title_resume"
                                                                                placeholder="Title Education"
                                                                                value="<?= $education['title_resume'] ?>">
                                                                        </div>
                                                                        <div class="form-group mb-3 w-100">
                                                                            <label class="form-label"
                                                                                for="org_resume">Org
                                                                                Education</label>
                                                                            <input class="form-control" type="text"
                                                                                id="org_resume" name="org_resume"
                                                                                placeholder="Org Education"
                                                                                value="<?= $education['org_resume'] ?>">
                                                                        </div>
                                                                        <div class="form-group mb-3 w-100">
                                                                            <label class="form-label"
                                                                                for="time_resume">Time
                                                                                Education</label>
                                                                            <input class="form-control" type="text"
                                                                                id="time_resume" name="time_resume"
                                                                                placeholder="Time Education"
                                                                                value="<?= $education['time_resume'] ?>">
                                                                        </div>
                                                                        <div class="form-group mb-3 w-100">
                                                                            <label class="form-label"
                                                                                for="desc_resume">Description
                                                                                Service</label>
                                                                            <input class="form-control" type="text"
                                                                                id="desc_resume" name="desc_resume"
                                                                                placeholder="Description Education"
                                                                                value="<?= $education['desc_resume'] ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary"
                                                                        name="editResume">Save changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- Edit Modal Education End -->
                                                <?php
                                                }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Education End -->
                                <!-- Professional Start -->
                                <div class="col-md-6">
                                    <h4>My Professional</h4>
                                    <div class='section-block timeline-block'>
                                        <div class='container-fluid'>
                                            <ul class='timeline'>
                                                <?php 
                                                    $query_professional = "SELECT * FROM tbl_resume";
                                                    $run_professional = mysqli_query($db,$query_professional);
                                                    while ($professional = mysqli_fetch_array($run_professional)) {
                                                    if ($professional['type_resume'] == 'p') {
                                                ?>
                                                <li>
                                                    <div class='timeline-content'>
                                                        <h4><?= $professional['org_resume'] ?></h4>
                                                        <em>
                                                            <span><?= $professional['title_resume'] ?></span>
                                                            <span><?= $professional['time_resume'] ?></span>
                                                        </em>
                                                        <p><?= $professional['desc_resume'] ?></p>
                                                        <button type="button" class="btn btn-warning"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editProfessional<?= $professional['id'] ?>">
                                                            Edit
                                                        </button>
                                                        <a onclick="return confirm('Are you sure delete this data ?')"
                                                            href="deleteResume.php?id=<?= $professional['id'] ?>"
                                                            class="btn btn-danger">
                                                            Delete
                                                        </a>
                                                    </div>
                                                </li>
                                                <!-- Edit Modal professional Start -->
                                                <div class="modal fade" id="editProfessional<?= $professional['id'] ?>"
                                                    tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <form action="function.php" method="POST">
                                                        <?php
                                                            $id = @$_GET['id'];
                                                        ?>
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="editModalLabel">
                                                                        Modal title</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group col-12">
                                                                        <div class="form-group mb-3 w-100">
                                                                            <label class="form-label"
                                                                                for="title_resume">Title
                                                                                professional</label>
                                                                            <input type="hidden" class="form-control"
                                                                                name="id"
                                                                                value="<?= $professional['id'] ?>">
                                                                            <input class="form-control" type="text"
                                                                                id="title_resume" name="title_resume"
                                                                                placeholder="Title professional"
                                                                                value="<?= $professional['title_resume'] ?>">
                                                                        </div>
                                                                        <div class="form-group mb-3 w-100">
                                                                            <label class="form-label"
                                                                                for="org_resume">Org
                                                                                professional</label>
                                                                            <input class="form-control" type="text"
                                                                                id="org_resume" name="org_resume"
                                                                                placeholder="Org professional"
                                                                                value="<?= $professional['org_resume'] ?>">
                                                                        </div>
                                                                        <div class="form-group mb-3 w-100">
                                                                            <label class="form-label"
                                                                                for="time_resume">Time
                                                                                professional</label>
                                                                            <input class="form-control" type="text"
                                                                                id="time_resume" name="time_resume"
                                                                                placeholder="Time professional"
                                                                                value="<?= $professional['time_resume'] ?>">
                                                                        </div>
                                                                        <div class="form-group mb-3 w-100">
                                                                            <label class="form-label"
                                                                                for="desc_resume">Description
                                                                                Service</label>
                                                                            <input class="form-control" type="text"
                                                                                id="desc_resume" name="desc_resume"
                                                                                placeholder="Description professional"
                                                                                value="<?= $professional['desc_resume'] ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary"
                                                                        name="editResume">Save changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- Edit Modal Education End -->
                                                <?php
                                                }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Professional End -->
                                <!-- Resume End -->
                            </div>
                        </div>
                    </div>
                    <!-- Add Resume Start -->
                    <form class="forms-sample my-3" action="function.php" method="POST" enctype="multipart/form-data">
                        <div class="row col-md-12 d-flex">
                            <div class="col-sm-12 d-sm-block gap-5">
                                <div class="form-group mb-3 w-100">
                                    <label>Select Type</label><br>
                                    <select name="type_resume" class="form-control">
                                        <option value="e">Education</option>
                                        <option value="p">Professional</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3 w-100">
                                    <label class="form-label" for="title_resume">Title Resume</label>
                                    <input class="form-control" type="text" id="title_resume" name="title_resume"
                                        placeholder="Title Resume">
                                </div>
                                <div class="form-group mb-3 w-100">
                                    <label class="form-label" for="org_resume">Org Resume</label>
                                    <input class="form-control" type="text" id="org_resume" name="org_resume"
                                        placeholder="Org Resume">
                                </div>
                                <div class="form-group mb-3 w-100">
                                    <label class="form-label" for="time_resume">Time Resume</label>
                                    <input class="form-control" type="text" id="time_resume" name="time_resume"
                                        placeholder="Time Resume">
                                </div>
                                <div class="form-group mb-3 w-100">
                                    <label class="form-label" for="desc_resume">Description Resume</label>
                                    <input class="form-control" type="text" id="desc_resume" name="desc_resume"
                                        placeholder="Description Resume">
                                </div>
                                <button class="btn btn-success" type="submit" name="addResume">Add Resume</button>
                            </div>
                        </div>
                    </form>
                    <!-- Add Resume End -->
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