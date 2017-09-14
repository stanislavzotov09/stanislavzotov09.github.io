<?php
/*
Template Name: Card - Contact Form
*/
?>
<section id="section-<?php echo basename(get_permalink()); ?>" data-name="<?php the_title(); ?>" class="section-card_contact_container col-fixed-normal">

	<div class="section section-card section-card_contact col-content">

		<div class="container">

			<div class="section-card_title">
				<h3><?php the_title(); ?></h3>
			</div>

			<form class="form section-form-fields" method="post" enctype="" action="">
				<div class="col-group">
					<div class="col-mb-12 col-tb-6">
						<!-- text field -->
						<div class="section-form-field_group">
							<label for="name">
							<input type="text" id="name" name="username" required placeholder="Name"/>
							</label>
						</div>
						<div class="section-form-field_group">
						  <label for="company mail">
							  <input type="email" id="mail" name="companymail" required  placeholder="Company Email"/>
						  </label>
						  </div>
						<div class="section-form-field_group">
						  <label for="company">
 							<input type="text" id="name" name="company" required placeholder="Company Name"/>
 						  </label>
						</div>
					</div>
					<div class="col-mb-12 col-tb-6">
						<div class="section-form-field_group">
							<div class="select">
								<select>
									<option>Reason</option>
									<option>Option</option>
									<option>Option</option>
								</select>
								<div class="select__arrow"></div>
							</div>
						</div>
						<div class="section-form-field_group">
							<input type="file" name="file-7[]" id="file-7" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
							<label for="file-7"><span></span><strong>Search&hellip;</strong></label>
						</div>
						<div class="section-form-field_group">
						  <a class="btn submit">SUBMIT</a>
						</div>
					</div>
					<div class="col-mb-12">
						<div class="section-form-field_group">
							<div class="error">
								<h2>ERROR</h2>
								<span>Proin ex sapien, varius nec lectus quis, porta tempus mi.</span>
							</div>
						</div>
					</div>

				</div>

			</form>

		</div>

</section>
