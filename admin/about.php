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
                    <!-- About Start -->
                    <form class="forms-sample mb-5" action="function.php" method="POST" enctype="multipart/form-data">
                        <div class="row col-md-12 d-flex">
                            <div class="col-sm-12 d-sm-block col-md-6 gap-5">
                                <div class="form-group mb-3 w-100">
                                    <label class="form-label" for="fullname">Fullname</label>
                                    <input class="form-control" type="text" id="fullname" name="fullname"
                                        value="<?= $user_data['fullname'] ?>">
                                </div>
                                <div class="form-group mb-3 w-100">
                                    <label class="form-label" for="job">Job</label>
                                    <input class="form-control" type="text" id="job" name="job"
                                        value="<?= $user_data['job'] ?>">
                                </div>
                                <div class="form-group mb-3 w-100">
                                    <label class="form-label" for="type_job">Job Type</label>
                                    <select class="form-control" name="type_job" id="type_job">
                                        <option value="Full Time"
                                            <?= $user_data['type_job'] == "Full Time" ? "selected" : '' ?>>Full Time
                                        </option>
                                        <option value="Part Time"
                                            <?= $user_data['type_job'] == "Part Time" ? "selected" : '' ?>>Part Time
                                        </option>
                                        <option value="Freelance"
                                            <?= $user_data['type_job'] == "Freelance" ? "selected" : '' ?>>Freelance
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group mb-3 w-100">
                                    <label class="form-label" for="birth_date">Birth Date</label>
                                    <input class="form-control" type="date" id="birth_date" name="birth_date"
                                        value="<?= date('Y-m-d',strtotime($user_data["birth_date"])) ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="residence">Residence</label>
                                    <input class="form-control" type="text" id="residence" name="residence"
                                        value="<?= $user_data['residence'] ?>">
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label class="form-label" for="about_desc">About Description</label>
                                <textarea class="form-control" id="about_desc"
                                    name="about_desc"><?= $user_data['about_desc'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pdf_cv">Upload CV</label>
                            <input type="file" class="form-control file-upload-info" id="pdf_cv" name="pdf_cv"
                                placeholder="Upload PDF">
                        </div>
                        <button type="submit" name="update-about" class="btn btn-success me-2">Update</button>
                    </form>
                    <!-- About End -->
                    <!-- Service Start -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Service</h1>
                    </div>
                    <div class='section-block services-block'>
                        <div class='container-fluid'>
                            <div class='row d-flex justify-content-center'>
                                <?php
                                    $id = @$_GET['id'];
                                    $query_service = "SELECT * FROM tbl_service";
                                    $run_service = mysqli_query($db,$query_service);
                                    while ($service = mysqli_fetch_array($run_service)) {
                                ?>
                                <div class='col-md-4 mb-3 d-flex justify-content-center'>
                                    <div class='service w-100 border p-3'>
                                        <div class='icon'>
                                            <img src="assets/img/<?= $service['img_service'] ?>" width="45%"
                                                height="45%">
                                        </div>
                                        <div class='content'>
                                            <h4><?= $service['title_service'] ?></h4>
                                            <p><?= $service['desc_service'] ?></p>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editService<?= $service['id'] ?>">
                                                Edit
                                            </button>
                                            <a onclick="return confirm('Are you sure delete this data ?')"
                                                href="deleteService.php?id=<?= $service['id'] ?>"
                                                class="btn btn-danger">
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Modal Service Start -->
                                <div class="modal fade" id="editService<?= $service['id'] ?>" tabindex="-1"
                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                    <form action="function.php" method="POST" enctype="multipart/form-data">
                                        <?php
                                            $id = @$_GET['id'];
                                            $sql_service = mysqli_query($db, "SELECT * FROM tbl_service WHERE id = '$id'");
                                            $data = mysqli_fetch_array($sql_service);
                                        ?>
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group col-12">
                                                        <div class="form-group mb-3 w-100">
                                                            <input type="hidden" class="form-control" name="id"
                                                                value="<?= $service['id'] ?>">
                                                            <input type="file" class="form-control" name="img_service">
                                                            <img src="assets/img/<?= $service['img_service'] ?>"
                                                                style="width: 400px; height: 250px; margin:10px">
                                                        </div>
                                                        <div class="form-group mb-3 w-100">
                                                            <label class="form-label" for="title_service">Title
                                                                Service</label>
                                                            <input class="form-control" type="text" id="title_service"
                                                                name="title_service" placeholder="Title Service"
                                                                value="<?= $service['title_service'] ?>">
                                                        </div>
                                                        <div class="form-group mb-3 w-100">
                                                            <label class="form-label" for="desc_service">Description
                                                                Service</label>
                                                            <input class="form-control" type="text" id="desc_service"
                                                                name="desc_service" placeholder="Description Service"
                                                                value="<?= $service['desc_service'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        name="editService">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Edit Modal Service End -->
                                <?php 
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- Add Service Start -->
                    <form class="forms-sample mb-5" action="function.php" method="POST" enctype="multipart/form-data">
                        <div class="row col-md-12 d-flex">
                            <div class="col-sm-12 d-sm-block gap-5">
                                <div class="form-group mb-3 w-100">
                                    <label class="form-label" for="title_service">Title Service</label>
                                    <input class="form-control" type="text" id="title_service" name="title_service"
                                        placeholder="Title Service">
                                </div>
                                <div class="form-group mb-3 w-100">
                                    <label class="form-label" for="desc_service">Description Service</label>
                                    <input class="form-control" type="text" id="desc_service" name="desc_service"
                                        placeholder="Description Service">
                                </div>
                                <div class="form-group mb-3 w-100">
                                    <label class="form-label" for="img_service">Logo Service</label>
                                    <input type="file" class="form-control" id="img_service" name="img_service">
                                </div>
                                <button class="btn btn-success" type="submit" name="addService">Add Service</button>
                            </div>
                        </div>
                    </form>
                    <!-- Add Service End -->
                    <!-- Skill Start -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Skill</h1>
                    </div>
                    <div class='section-block skills-block'>
                        <div class='container-fluid'>
                            <div class='row'>
                                <?php
                                    $id = @$_GET['id'];
                                    $query_skill = "SELECT * FROM tbl_skill";
                                    $run_skill = mysqli_query($db,$query_skill);
                                    while ($skill = mysqli_fetch_array($run_skill)) {
                                ?>
                                <div class='col-md-6 mb-3'>
                                    <div class='skill'>
                                        <h4><?= $skill['skill_name'] ?></h4>
                                        <div class='bar'>
                                            <div class='percent' style='width:<?= $skill['skill_bar'] ?>%;'></div>
                                        </div>
                                        <div class="my-3">
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editSkill<?= $skill['id'] ?>">
                                                Edit
                                            </button>
                                            <a onclick="return confirm('Are you sure delete this data ?')"
                                                href="deleteSkill.php?id=<?= $skill['id'] ?>" class="btn btn-danger">
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Modal Skill Start -->
                                <div class="modal fade" id="editSkill<?= $skill['id'] ?>" tabindex="-1"
                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                    <form action="function.php" method="POST">
                                        <?php
                                            $id = @$_GET['id'];
                                            $sql_skill = mysqli_query($db, "SELECT * FROM tbl_skill WHERE id = '$id'");
                                            $data = mysqli_fetch_array($sql_skill);
                                        ?>
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group col-12">
                                                        <div class="form-group mb-3 w-100">
                                                            <input type="hidden" class="form-control" name="id"
                                                                value="<?= $skill['id'] ?>">
                                                            <label class="form-label" for="skill_name">Skill
                                                                Name</label>
                                                            <input class="form-control" type="text" id="skill_name"
                                                                name="skill_name" placeholder="Skill Name"
                                                                value="<?= $skill['skill_name'] ?>">
                                                        </div>
                                                        <div class="form-group mb-3 w-100">
                                                            <label class="form-label" for="skill_bar">Skill Bar</label>
                                                            <input class="form-control" type="text" id="skill_bar"
                                                                name="skill_bar" placeholder="Skill Bar"
                                                                value="<?= $skill['skill_bar'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="editSkill">Save
                                                        changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Edit Modal Skill End -->
                                <?php 
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- Add Service Start -->
                    <form class="forms-sample mb-5" action="function.php" method="POST">
                        <div class="row col-md-12 d-flex">
                            <div class="col-sm-12 d-sm-block gap-5">
                                <div class="form-group mb-3 w-100">
                                    <label class="form-label" for="skill_name">Skill Name</label>
                                    <input class="form-control" type="text" id="skill_name" name="skill_name"
                                        placeholder="Skill Name">
                                </div>
                                <div class="form-group mb-3 w-100">
                                    <label class="form-label" for="skill_bar">Skill Bar</label>
                                    <input class="form-control" type="text" id="skill_bar" name="skill_bar"
                                        placeholder="1-9" maxlength="3" pattern="[0-9]+">
                                </div>
                                <button class="btn btn-success" type="submit" name="addSkill">Add Skill</button>
                            </div>
                        </div>
                    </form>
                    <!-- Add Skill End -->
                    <!-- Skill End -->
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