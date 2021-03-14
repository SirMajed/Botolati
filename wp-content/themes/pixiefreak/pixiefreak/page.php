<?php $withOutHeader = false; ?>
<?php get_header(); ?>

<?php
if(have_posts()) {
	the_post();
	$postID = array(get_the_ID());

	$addClass = ['single-page'];
}
?>
<section class="<?php echo esc_attr(implode(' ', $addClass)); ?>">

    <div class="container">

	    <?php if (has_post_thumbnail()): ?>
            <figure class="featured-box">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>">
            </figure>
	    <?php endif; ?>

        <div class="wrapper">
	        <?php $fullWidth = true; ?>

            <?php
            $class = $fullWidth ? 'post full-width': '';
            if (pixiefreak_woo_page() || pixiefreak_bbpress_page()) {
               $class = 'page' . ($fullWidth ? ' full-width' : '');
            }
            ?>
            <div class="<?php echo esc_attr($class) ?>">

                <?php if(!pixiefreak_bbpress_page()): ?>
                <h1><?php the_title(); ?></h1>
                <?php endif; ?>


                <?php if (!pixiefreak_woo_page() && !pixiefreak_bbpress_page()): ?>
              
                <?php endif; ?>

	            <?php the_content(); ?>

	         
            </div>
        </div>
		
    </div>
</section>
<?php get_footer(); ?>