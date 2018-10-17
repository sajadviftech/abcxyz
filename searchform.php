<!-- Start SearchForm -->
<form method="get" class="searchform" role="search" action="<?php echo esc_url(home_url('/')); ?>">
	<div class="searchform-bar"></div>
    <fieldset>
    	<input name="s" type="text" class="s" placeholder="<?php esc_html_e( 'Type here to search', 'viftech' ); ?>">
    	<button type="submit" class="submit"><?php get_template_part( 'assets/img/svg/search.svg' ); ?></button>
    </fieldset>
</form>
<!-- End SearchForm -->
