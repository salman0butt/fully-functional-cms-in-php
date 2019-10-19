<?php require_once 'includes/top.php';?>
</head>

<body>
   <?php require_once 'includes/header.php';?>
    <div class="jumbotron">
        <div class="container">
            <div id="details" class="animated fadeInLeft">
                <h1>Contact<span> Us</span></h1>
                <p>We are available 24/7/365 Feel Free to Contact us.</p>
            </div>
        </div>
        <img src="img/top-image.jpg" alt="Top image">
    </div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <div class="row">
                      <div class="col-md-12"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3362.639286439052!2d74.06224681512988!3d32.56247090220104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391f1aef524b412b%3A0x59c7a43b7f578444!2sGujrat+Railway+Station!5e0!3m2!1sen!2s!4v1557319529456!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
                      <div class="col-md-12 contact-form">
                        <h2>Contact Form</h2>
                        <hr>
                          <form action="">
                              <div class="form-group">
                                  <label for="full-name">Full Name*:</label>
                                  <input type="text" id="full-name" class="form-control" placeholder="Full Name">
                              </div>
                               <div class="form-group">
                                  <label for="email">Email*:</label>
                                  <input type="text" id="email" class="form-control" placeholder="email">
                              </div>
                               <div class="form-group">
                                  <label for="website">Website:</label>
                                  <input type="text" id="website" class="form-control" placeholder="Full Name">
                              </div>
                               <div class="form-group">
                                  <label for="message">Message:</label>
                                  <textarea id="msg" rows="10" class="form-control" placeholder="Your message should be here.."></textarea>
                                  
                              </div>
                              <input type="submit" name="submit" value="submit" class="btn btn-primary">
                          </form>
                      </div>
                  </div>

                  </div>

                <div class="col-md-4">
                  <?php require_once 'includes/sidebar.php';?>
                </div>
            </div>
        </div>
    </section>
    <?php require_once 'includes/footer.php';?>