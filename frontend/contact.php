<section id='contact' class='section contact-section border-d'>
    <div class='section-block contact-block'>
        <div class='container-fluid'>
            <div class='section-header'>
                <h2>Contact <strong class='color'>Me</strong></h2>
            </div>
            <div class='row'>
                <div class="col-md-8">
                    <div class="contact-form">
                        <form action="https://formsubmit.co/harwinto56@gmail.com" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="Message" rows="5" required></textarea>
                            </div>
                            <input type="hidden" name="_captcha" value="false">
                            <input type="hidden" name="_template" value="table">
                            <input type="hidden" name="_next" value="http://localhost/PortfolioAgus/#contact">
                            <button type="submit" class="btn-color btn-custom">Submit</button>
                        </form>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='contact-info-icons'>
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