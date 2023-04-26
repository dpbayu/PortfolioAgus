<section id='portfolio' class='section portfolio-section border-d'>
    <div class='section-block portfolio-block'>
        <div class='container-fluid'>
            <div class='section-header'>
                <h2>My <strong class='color'>Works</strong></h2>
            </div>
            <ul class='portfolio-items'>
                <?php 
                $query_portfolio = "SELECT * FROM tbl_portfolio ORDER BY id DESC";
                $run_portfolio = mysqli_query($db,$query_portfolio);
                while ($portfolio = mysqli_fetch_array($run_portfolio)) {
                ?>
                <li>
                    <div class='inner'>
                        <img src='assets/img/portfolio/FFXV.jpg' alt="img-portfolio">
                        <div class='overlay'>
                            <a href='#popup-1' class='view-project'>
                                View Project
                            </a>
                            <!--Project Popup Start -->
                            <div id='popup-1' class='popup-box zoom-anim-dialog mfp-hide'>
                                <figure>
                                    <!--Project Popup Image Start-->
                                    <img src='assets/img/portfolio/FFXV.jpg' alt="img-portfolio">
                                    <!--Project Popup Image End-->
                                </figure>
                                <div class='content'>
                                    <!--Project Popup Title Start-->
                                    <h4>
                                        <?= $portfolio['project_title'] ?>
                                    </h4>
                                    <!--Project Popup Title End-->
                                    <!--Project Popup Description Start-->
                                    <p><?= $portfolio['project_desc'] ?></p>
                                    <!--Project Popup Description End-->
                                </div>
                            </div>
                            <!--Project Popup End -->
                        </div>
                    </div>
                </li>
                <?php 
                }
                ?>
            </ul>
        </div>
    </div>
</section>