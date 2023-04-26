<section id='resume' class='section resume-section border-d'>
    <div class='section-block timeline-block'>
        <div class='container-fluid'>
            <div class='section-header'>
                <h2>My <strong class='color'>Education</strong></h2>
            </div>
            <ul class='timeline'>
                <?php 
                    $query_education = "SELECT * FROM tbl_resume";
                    $run_education = mysqli_query($db,$query_education);
                    while ($education = mysqli_fetch_array($run_education)){
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
                    </div>
                </li>
                <?php
                }
                }
                ?>
            </ul>
        </div>
    </div>
    <!-- Education End -->
    <!-- Experience Start -->
    <div class='section-block timeline-block'>
        <div class='container-fluid'>
            <div class='section-header'>
                <h2>My <strong class='color'>Experience</strong></h2>
            </div>
            <ul class='timeline'>
                <?php 
                    $query_education = "SELECT * FROM tbl_resume";
                    $run_education = mysqli_query($db,$query_education);
                    while ($education = mysqli_fetch_array($run_education)){
                    if ($education['type_resume'] == 'p'){
                ?>
                <li>
                    <div class='timeline-content'>
                        <h4><?= $education['org_resume'] ?></h4>
                        <em>
                            <span><?= $education['title_resume'] ?></span>
                            <span><?= $education['time_resume'] ?></span>
                        </em>
                        <p><?= $education['desc_resume'] ?></p>
                    </div>
                </li>
                <?php
                }
                }
                ?>
            </ul>
        </div>
    </div>
    <!-- Experience End -->
    <!-- Testimonial Start -->
    <div class='section-block testimonials-block'>
        <div class='container-fluid'>
            <div class='section-header'>
                <h2>My <strong class='color'>Clients</strong></h2>
            </div>
            <div class='testimonials-slider'>
                <div class='testimonial'>
                    <div class='icon'>
                        <i class='ion-quote'></i>
                    </div>
                    <p>
                        Ei constituam theophrastus per, sea dolorum disputationi in, vel menandri suavitate
                        similique in. Vide assum conceptam eum et. Has postulant vul putate eu. Pro justo
                        aliquando prodesset at.
                    </p>
                    <div class='author'>
                        <h4>Jake Doe</h4>
                        <span>CEO at Company</span>
                    </div>
                </div>
                <div class='testimonial'>
                    <div class='icon'>
                        <i class='ion-quote'></i>
                    </div>
                    <p>
                        Ei constituam theophrastus per, sea dolorum disputationi in, vel menandri suavitate
                        similique in. Vide assum conceptam eum et. Has postulant vul putate eu. Pro justo
                        aliquando prodesset at.
                    </p>
                    <div class='author'>
                        <h4>Jake Doe</h4>
                        <span>CEO at Company</span>
                    </div>
                </div>
                <div class='testimonial'>
                    <div class='icon'>
                        <i class='ion-quote'></i>
                    </div>
                    <p>
                        Ei constituam theophrastus per, sea dolorum disputationi in, vel menandri suavitate
                        similique in. Vide assum conceptam eum et. Has postulant vul putate eu. Pro justo
                        aliquando prodesset at.
                    </p>
                    <div class='author'>
                        <h4>Jake Doe</h4>
                        <span>CEO at Company</span>
                    </div>
                </div>
                <div class='testimonial'>
                    <div class='icon'>
                        <i class='ion-quote'></i>
                    </div>
                    <p>
                        Ei constituam theophrastus per, sea dolorum disputationi in, vel menandri suavitate
                        similique in. Vide assum conceptam eum et. Has postulant vul putate eu. Pro justo
                        aliquando prodesset at.
                    </p>
                    <div class='author'>
                        <h4>Jake Doe</h4>
                        <span>CEO at Company</span>
                    </div>
                </div>
                <div class='testimonial'>
                    <div class='icon'>
                        <i class='ion-quote'></i>
                    </div>
                    <p>
                        Ei constituam theophrastus per, sea dolorum disputationi in, vel menandri suavitate
                        similique in. Vide assum conceptam eum et. Has postulant vul putate eu. Pro justo
                        aliquando prodesset at.
                    </p>
                    <div class='author'>
                        <h4>Jake Doe</h4>
                        <span>CEO at Company</span>
                    </div>
                </div>
                <div class='testimonial'>
                    <div class='icon'>
                        <i class='ion-quote'></i>
                    </div>
                    <p>
                        Ei constituam theophrastus per, sea dolorum disputationi in, vel menandri suavitate
                        similique in. Vide assum conceptam eum et. Has postulant vul putate eu. Pro justo
                        aliquando prodesset at.
                    </p>
                    <div class='author'>
                        <h4>Jake Doe</h4>
                        <span>CEO at Company</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
</section>