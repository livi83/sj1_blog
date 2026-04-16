<?php
include 'partials/header.php';
?>

<section id="intro" class="bg-light padding-large">
  <div class="container">
    <div class="row">
      <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
        
        <div class="page-title text-center">
          <h2>Contact Us</h2>
          <div class="breadcum-items">
            <span class="item"><a href="home.php">Home /</a></span>
            <span class="item colored">Contact Us</span>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<section class="contact-information padding-large">
	<div class="container">
		<div class="row">
			<div class="col-md-6 mb-3">
				
				<h2>Get in Touch</h2>

				<div class="contact-detail d-flex flex-wrap mt-4">
					<div class="detail mr-6 mb-4">
						<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<ul class="list-unstyled list-icon">
							<li><p class="fw-bold"><span class="me-2">Phone:</span>+1650-243-0000</p></li>
							<li><p class="fw-bold"><span class="me-2">Email:</span><a href="mailto:info@yourcompany.com">info@yourcompany.com</a></p></li>
							<li><p class="fw-bold"><span class="me-2">Location:</span>North Melbourne VIC 3051, Australia</p></li>
						</ul>
					</div><!--detail-->

				</div><!--contact-detail-->
			</div><!--col-md-6-->

			<div class="col-md-6">
				
				<div class="contact-information">
					<h2>Send A Message</h2>
					<form name="contactform" action="contact.php" method="post" class="form-group contact-form mt-4">
						<div class="row">
					    	<div class="col-md-6">
								<input type="text" minlength="2" name="name" placeholder="Name" class="form-control" required>
							</div>
							<div class="col-md-6">
								<input type="email" name="email" placeholder="E-mail" class="form-control" required>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">

								<textarea class="form-control my-4" name="message" placeholder="Message" style="height: 150px;" required></textarea>

								<label>
								    <input type="checkbox" required>
								    <span class="label-body">I agree all the <a href="#">Terms and Conditions</a></span>
								</label>

								<div class="d-grid">
									<button type="submit" name="submit" class="button btn-bg-dark w-100 my-3">Submit</button>
								</div>
							</div>
						</div>
					</form>
          <?php
             if($_SERVER['REQUEST_METHOD']==='POST'){
                  $db = new Database();
                  $connection = $db->getConnection();
                  $contact = new Contact($connection, $_POST);
                  $contact->store();
             }
          ?>
				</div><!--contact-information-->

			</div><!--col-md-6-->

		</div>
	</div>
</section>

<section id="our-store" class="padding-large no-padding-top">
  <div class="container">
    <div class="row d-flex flex-wrap align-items-center">
      <div class="col-lg-6">
        <div class="image-holder mb-5">
          <img src="../assets/images/single-image.jpg" alt="our-store" class="img-fluid">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="locations-wrap">
          <div class="display-header">
            <h2>Our stores</h2>
            <p>You can also directly buy products from our stores.</p>
          </div>
          <div class="location-content d-flex flex-wrap mt-5">
            <div class="col-lg-6 col-sm-12">
              <div class="content-box text-dark pe-4 mb-5">
                <h3 class="card-title">Office</h3>
                <div class="contact-address pt-3">
                  <p>730 Glenstone Ave 65802, Springfield, US</p>
                </div>
                <div class="contact-number">
                  <p>
                    <a href="#">+123 987 321</a>
                  </p>
                  <p>
                    <a href="#">+123 123 654</a>
                  </p>
                </div>
                <div class="email-address">
                  <p>
                    <a href="mailto:info@yourcompany.com">info@yourcompany.com</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12">
              <div class="content-box">
                <h3 class="card-title">USA</h3>
                <div class="contact-address pt-3">
                  <p>730 Glenstone Ave 65802, Springfield, US</p>
                </div>
                <div class="contact-number">
                  <p>
                    <a href="#">+123 987 321</a>
                  </p>
                  <p>
                    <a href="#">+123 123 654</a>
                  </p>
                </div>
                <div class="email-address">
                  <p>
                    <a href="mailto:info@yourcompany.com">info@yourcompany.com</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="google-map">
	<div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://getasearch.com/fmovies"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:100%;}</style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style></div></div>
</section>
<?php
include 'partials/footer.php';
?>
