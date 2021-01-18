<?php

function pform_output_htmlfile(){
    $pform_tt=get_option('my_option_name');
	echo '<section class="section section-no-border bg-color-primary h-100 m-0">
							<div class="row justify-content-end m-0">
								<div class="col-half-section col-half-section-right mr-3">
									
									<h2 class="text-color-quaternary text-uppercase font-weight-extra-bold">';
									echo $pform_tt["pformtitle2"]; 
									echo '</h2>
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
											<input type="submit" id="myformsubmit-form" class="btn btn-quaternary text-color-light text-uppercase font-weight-semibold outline-none custom-btn-style-2 custom-border-radius-1" value="Submit" />
										</div>
									</form>

								</div>
							</div>
						</section>';
}

add_shortcode('pform_contact', 'pform_output_htmlfile');