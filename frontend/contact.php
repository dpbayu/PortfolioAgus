<section id='contact' class='section contact-section border-d'>
    <div class='section-block contact-block'>
        <div class='container-fluid'>
            <div class='section-header'>
                <h2>Contact <strong class='color'>Me</strong></h2>
            </div>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='contact-info-icons d-flex border justify-content-around gap-5 pt-3'>
                        <div class='contact-info'>
                            <i class="bi bi-house fs-3"></i>
                            <p><?= $user['residence'] ?></p>
                        </div>
                        <div class='contact-info'>
                            <i class="bi bi-telephone fs-3"></i>
                            <p><?= $user['phone'] ?></p>
                        </div>
                        <div class='contact-info'>
                            <i class="bi bi-envelope fs-3"></i>
                            <p><?= $user['email'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>