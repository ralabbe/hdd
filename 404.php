<?php
    get_header();
    get_template_part('nav');
?>

<section class="bg-grey">
	<div class="uk-container height-50 uk-text-center dis-table">
		<div class="dis-table-center bg-white uk-padding-large">
			<h2 class="uk-text-uppercase err404"> <span>404</span> <br> Page Not Found</h2>
			<p class="uk-width-2-3@m uk-margin-auto">
				This page does not exist. If this problem persists, please contact <a href="mailto:info@hddofflorida.com">info@hddofflorida.com</a> for assistance.
				<br>
				<a class="btn-orange text-white uk-margin uk-display-inline-block" href="<?php echo site_url(); ?>">Return to home</a>
			</p>
		</div>
	</div>
</section>

<?php 
    get_footer();
?>
