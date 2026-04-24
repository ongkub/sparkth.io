<?php /*** The template for displaying 404 pages (not found) ***/ ?>

<?php get_header(); ?>
<!-- PAGE CONTENTS STARTS
	========================================================================= -->
<section class="blog-content-section page-404">
	<div class="container">
		<div class="row rtd">
            
      
           
            
			<div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
                
                 <div class="bg-404">
                 <img src="<?php echo get_template_directory_uri() . '/img/404-page.png'?>" />
                
                
                     <div class="page-404-info">
				<h2 class="notfound_title">
					<?php esc_html_e('Page not found', 'oscend'); ?>
				</h2>
				
				<p class="notfound_description large">
					<?php esc_html_e('The page you are looking for seems to be missing.', 'oscend'); ?>
				</p>
				<a class="notfound_button" href="javascript: history.go(-1)">
				<?php esc_html_e('Return to previous page', 'oscend'); ?>
                         </a></div>
                     </div>
			</div>
            
           
            
		</div>
	</div>
</section>
<!-- /. PAGE CONTENTS ENDS
	========================================================================= -->
<?php get_footer(); ?>
