<section id='about' class='section about-section border-d'>
    <div class='section-block about-block'>
        <div class='container-fluid'>
            <div class='section-header'>
                <h2>
                    I'm a <strong class='color'><?= $user['job'] ?></strong>
                </h2>
            </div>
            <div class='row'>
                <div class='col-md-4'>
                    <ul class='info-list'>
                        <li>
                            <strong>Name:</strong>
                            <span><?= $user['fullname']  ?></span>
                        </li>
                        <li>
                            <strong>Job:</strong>
                            <span><?= $user['type_job'] ?></span>
                        </li>
                        <li>
                            <strong>Age:</strong>
                            <span><?= $user['birth_date'] ?> Years</span>
                        </li>
                        <li>
                            <strong>Residence:</strong>
                            <span><?= $user['residence'] ?></span>
                        </li>
                    </ul>
                </div>
                <div class='col-md-8'>
                    <div class='about-text'>
                        <p><?= $user['about_desc'] ?></p>
                    </div>
                    <div class='about-btns'>
                        <a href='#' class='btn-custom btn-color'>
                            Download Resume
                        </a>
                        <a href='#' class='btn-custom btn-color'>
                            Hire Me
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Start -->
    <div class='section-block services-block'>
        <div class='container-fluid'>
            <div class='section-header'>
                <h2>My <strong class='color'>Services</strong></h2>
            </div>
            <div class='row'>
                <div class='col-md-4'>
                    <div class='service'>
                        <div class='icon'>
                            <i class='icon-basic-photo'></i>
                        </div>
                        <div class='content'>
                            <h4><?= $user['title_service'] ?></h4>
                            <p><?= $user['desc_service'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Servince End -->
    <!-- Skill Start -->
    <div class='section-block skills-block'>
        <div class='container-fluid'>
            <div class='section-header'>
                <h2>
                    My <strong class='color'>Skills</strong>
                </h2>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <div class='skill'>
                        <h4>HTML/CSS</h4>
                        <div class='bar'>
                            <div class='percent' style='width:85%;'></div>
                        </div>
                    </div>
                    <div class='skill'>
                        <h4>php</h4>
                        <div class='bar'>
                            <div class='percent' style='width:90%;'></div>
                        </div>
                    </div>
                    <div class='skill'>
                        <h4>jQuery</h4>
                        <div class='bar'>
                            <div class='percent' style='width:75%;'></div>
                        </div>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='skill'>
                        <h4>JavaScript</h4>
                        <div class='bar'>
                            <div class='percent' style='width:85%;'></div>
                        </div>
                    </div>
                    <div class='skill'>
                        <h4>WordPress</h4>
                        <div class='bar'>
                            <div class='percent' style='width:90%;'></div>
                        </div>
                    </div>
                    <div class='skill'>
                        <h4>SEO</h4>
                        <div class='bar'>
                            <div class='percent' style='width:75%;'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Skill End -->
    <!-- Pricing Start -->
    <div class='section-block pricing-block'>
        <div class='section-header'>
            <h2>My <strong class='color'>Pricing</strong></h2>
        </div>
        <div class='row'>
            <div class='col-md-4'>
                <div class='p-table'>
                    <div class='header'>
                        <h4>Basic</h4>
                        <div class='price'>
                            <span class='currency'>$</span>
                            <span class='amount'>19</span>
                            <span class='period'>/HR</span>
                        </div>
                    </div>
                    <ul class='items'>
                        <li>
                            App Designing
                        </li>
                        <li>
                            App Development
                        </li>
                        <li>
                            Web Development
                        </li>
                    </ul>
                    <a href='#' class='btn-custom btn-color'>
                        Choose This
                    </a>
                </div>
            </div>
            <div class='col-md-4'>
                <div class='p-table'>
                    <div class='header'>
                        <h4>Pro</h4>
                        <div class='price'>
                            <span class='currency'>$</span>
                            <span class='amount'>29</span>
                            <span class='period'>/HR</span>
                        </div>
                    </div>
                    <ul class='items'>
                        <li>
                            App Designing
                        </li>
                        <li>
                            App Development
                        </li>
                        <li>
                            Web Development
                        </li>
                    </ul>
                    <a href='#' class='btn-custom btn-color'>
                        Choose This
                    </a>
                </div>
            </div>
            <div class='col-md-4'>
                <div class='p-table'>
                    <div class='header'>
                        <h4>Gold</h4>
                        <div class='price'>
                            <span class='currency'>$</span>
                            <span class='amount'>39</span>
                            <span class='period'>/HR</span>
                        </div>
                    </div>
                    <ul class='items'>
                        <li>
                            App Designing
                        </li>
                        <li>
                            App Development
                        </li>
                        <li>
                            Web Development
                        </li>
                    </ul>
                    <a href='#' class='btn-custom btn-color'>
                        Choose This
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Pricing End -->
</section>