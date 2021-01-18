<?php

function pform_project_buttonhtml() {
	$pform_tt=get_option('my_option_name');
	if(isset($pform_tt["pform_button_enabler"])){
	echo '<div class="pform_outer_layout"><div class="pform_outer_header">
          <h4 class="pform_outer_prompt">';
    echo $pform_tt["pformtitle1"];
    echo '</h4> <span class="pform_outer_close_icon"><i class="fa fa-window-close" aria-hidden="true"></i></span> </div>
									<form class="pform-contact-form pform-custom-form-style">
										<div class="pform-contact-form-success alert alert-success d-none mt-4">
											<strong>Success!</strong> Your message has been sent to us.
										</div>
										<div class="pform-contact-form-error alert alert-danger d-none mt-4">
											<strong>Error!</strong> There was an error sending your message.
											<span class="mail-error-message text-1 d-block"></span>
										</div>
										
										<div class="form-content">
											<div class="pform-form-control-custom">
												<input type="text" class="form-control" name="name" placeholder="Your Name *" data-msg-required="This field is required." id="name" required="" />
											</div>
											<div class="pform-form-control-custom">
												<input type="email" class="form-control" name="email" placeholder="Your Email *" data-msg-required="This field is required." id="email" required="" />
											</div>
											<div class="pform-form-control-custom">
												<input type="text" class="form-control" name="subject" placeholder="Subject *" data-msg-required="This field is required." id="subject" required="" />
											</div>
											<div class="pform-form-control-custom">
												<textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" placeholder="Message*" id="message" required="" aria-required="true"></textarea>
											</div>
											<center><input type="submit" id="myformsubmit-form" class="btn btn-quaternary text-color-light text-uppercase font-weight-semibold outline-none custom-btn-style-2 custom-border-radius-1" value="Submit" /></center>
										</div>
									</form></div><button class="PForm_button_form"><i class="fas fa-envelope fa-2x"></i></button>';
								}
}

add_action( 'wp_footer', 'pform_project_buttonhtml' );
