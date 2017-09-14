<?php
/*
Template Name: Page - contact
*/
?>
<?php

  //response generation function

  $response = "";

  //function to generate response
  function my_contact_form_generate_response($type, $message){

    global $response;

    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";

  }

  //response messages
  $not_human       = "Human verification incorrect.";
  $missing_content = "Please supply all information.";
  $email_invalid   = "Email Address Invalid.";
  $message_unsent  = "Message was not sent. Try Again.";
  $message_sent    = "Thanks! Your message has been sent.";

  //user posted variables
  $name = $_POST['message_name'];
  $email = $_POST['message_email'];
  $message = $_POST['message_company'];
  $reason = $_POST['reason'] ;
  $human = $_POST['message_human'];

  //php mailer variables
  $to = get_option('admin_email');
  $subject = $reason;
  $headers = 'From: '. $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n";

  if(!$human == 0){
    if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
    else {

      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        my_contact_form_generate_response("error", $email_invalid);
      else //email is valid
      {
        //validate presence of name and message
        if(empty($name) || empty($email)){
          my_contact_form_generate_response("error", $missing_content);
        }
        else //ready to go!
        {
          $sent = wp_mail($to, $subject, strip_tags($message), $headers, $attachments);
          if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
          else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
        }
      }
    }
  }
  else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);

?>
<?php get_header(); ?>

	<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="section_landing-page section_double-box background-blue">

		<div class="section section-top">

			<div class="container col-flex" id="post-<?php the_ID(); ?>">
				<div class="col-group">
					<div class="col-mb-12 col-tb-12 col-dt-10 col-ld-10 col-el-10 section-card-block" data-aos="flip-left" data-aos-delay="100">

						<div class="col-content">

							<div class="section-top-title">

								<h1><?php the_title(); ?></h1>
								<?php wp_nav_menu( array( 'theme_location' => 'social' ) ); ?>

							</div>

						</div>

					</div>
				</div>

			</div>

			<div class="col-group">

				<div class="col-mb-12 col-tb-7 col-dt-6 section_double-box--one" data-aos="flip-left" data-aos-delay="100">

					<div class="col-content col-fixed-square"></div>

				</div>
				<div class="col-mb-12 col-tb-5 col-dt-6 section_double-box--two" data-aos="flip-right" data-aos-delay="50">

					<div class="col-content col-fixed-square" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>)"></div>

				</div>

			</div>

		</div>

	</section>

	<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="section-card_contact_container col-fixed-normal">

		<div class="section section-card section-card_contact col-content" id="form">

			<div class="container">

				<div class="section-card_title">
					<h3>Please, fill the form</h3>
				</div>

				<form class="form section-form-fields" action="<?php the_permalink(); ?>#form" method="post" novalidate>
					<div class="col-group">
						<div class="col-mb-12 col-tb-6">
							<!-- text field -->
							<div class="section-form-field_group">
							  <label for="name">
								<input value="<?php echo esc_attr($_POST['message_name']); ?>" type="text" id="name" name="message_name" required placeholder="Name"/>
							  </label>
							</div>
							<div class="section-form-field_group">
							  <label for="company mail">
								  <input value="<?php echo esc_attr($_POST['message_email']); ?>" type="email" id="mail" name="message_email" required  placeholder="Company Email"/>
							  </label>
							  </div>
							<div class="section-form-field_group">
							  <label for="company">
	 							<input value="<?php echo esc_attr($_POST['message_company']); ?>" type="text" id="name" name="message_company" required placeholder="Company Name"/>
	 						  </label>
							</div>
						</div>
						<div class="col-mb-12 col-tb-6">
							<div class="section-form-field_group">
								<div class="select">
									<?php $reason = $_POST["reason"]; ?>
									<select name="reason">
										<option>Select a reason</option>
										<option <?php if (isset($reason) && $reason=="Product inquiry") echo "selected";?>>Product inquiry</option>
										<option <?php if (isset($reason) && $reason=="Job application") echo "selected";?>>Job application</option>
										<option <?php if (isset($reason) && $reason=="Other Reason") echo "selected";?>>Other Reason</option>
									</select>
									<div class="select__arrow"></div>
								</div>
							</div>
							<div class="section-form-field_group">
								<input type="file" name="message_file" id="file-7" class="inputfile inputfile-6" value="<?php echo esc_attr($_POST['message_file']); ?>" />
								<label for="file-7"><span></span><strong>Search&hellip;</strong></label>
							</div>
							<div class="section-form-field_group">
								<label for="message_human">Human Verification: <input type="text" style="width: 60px;" name="message_human"> + 3 = 5</label>
							</div>
							<div class="section-form-field_group">
								<input type="hidden" name="submitted" value="1">
   		   				  		<input type="submit">
							</div>
						</div>
						<div class="col-mb-12">
							<div class="section-form-field_group">
								<div class="error">
									<span><?php echo $response; ?></span>
								</div>
							</div>
						</div>

					</div>

				</form>

			</div>

	</section>

<?php
get_footer();?>
