<?php require_once VIEWS_PATH . "/User/includes/header.php"; ?>

<!-- MAIN Content START -->
<div class="pricing-header px-3 py-3 pt-md-3 pb-md-2 mx-auto text-center">
	<h2 class="display-4 mb-0 contact-title">Contact Me</h2>
	<p class="text-muted">LET'S KEEP IN TOUCH</p>
	<hr class="border-top mb-3">
</div>

<!-- Success Message -->
<div class="container-fluid" id="success">
	<div class="card card-body bg-light">
		<form action="<?php echo APPURL . '/contact/check'; ?>" id="contactForm" class="form-contact" method="POST">
			<div class="form-group">
				<label for="subject">Subject *</label>
				<input type="text" id="subject" name="subject" class="form-control" value="<?php echo $data['subject']; ?>">
				<span class="invalid-feedback" id="subject_error"></span>
			</div>
			<div class="form-group">
				<label for="name">Name *</label>
				<input type="text" id="name" name="name" class="form-control" value="<?php echo $data['name']; ?>">
				<span class="invalid-feedback" id="name_error"></span>
			</div>
			<div class="form-group">
				<label for="email">Email *</label>
				<input type="email" id="userEmail" name="userEmail" class="form-control" value="<?php echo $data['userEmail']; ?>">
				<span class="invalid-feedback" id="userEmail_error"></span>
			</div>
			<div class="form-group">
				<label for="message">Message *</label>
				<textarea name="message" id="message" class="form-control" cols="30" rows="5"><?php echo $data['message']; ?></textarea>
				<span class="invalid-feedback" id="message_error"></span>
			</div>
			<div class="form-group">
				<div class="g-recaptcha" id="recaptcha" data-sitekey="6Lce2tMUAAAAALnc0MWLei1FqYNoQnXZmEUftZTl"></div>
				<small class="text-danger" id="recaptcha_error"></small>
			</div>
			<div class="form-group">
				<button type="button" id="submit" name="submit" class="btn btn-block btn-success" onclick="contactFormAction()">SEND <i class="fas fa-paper-plane ml-1"></i></button>
			</div>
		</form>
	</div>
</div>
<!-- MAIN Content END -->

<!-- Google reCAPTCHA widget START -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!-- Google reCAPTCHA widget END -->

<!-- Ajax START -->
<script src="<?php echo APPURL; ?>/public/js/contact.js"></script>
<!-- Ajax END -->

<?php require_once VIEWS_PATH . "/User/includes/footer.php"; ?>